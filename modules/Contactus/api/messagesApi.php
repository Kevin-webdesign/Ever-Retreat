<?php
// autoload.php should include all necessary classes (like controllers, DB classes)
require_once '../../../config/database.php';
require_once '../controllers/MessagesController.php';
require_once '../models/MessagesModel.php';
require_once '../../../helpers/JWTHandler.php'; // Include your JWT helper

header('Content-Type: application/json');

// Initialize JWT handler
$jwt = new JWTHandler();

// $action = $_GET['action'] ?? '';
$action = isset($_GET['action']) ? $_GET['action'] : (isset($_POST['action']) ? $_POST['action'] : '');

switch ($action) {
    case 'new_message':
        $messages = new MessagesController();
        $names = $_POST['names'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $subject = $_POST['subject'] ?? '';
        $message = $_POST['message'] ?? '';
        
        // Call the register method and check if the registration is successful
        $result = $messages->recordMessageController($names, $email, $phone, $subject, $message);
        
        if ($result['success']) {
            echo json_encode(['success' => true, 'message' => $result['message']]);
        } else {
            echo json_encode(['success' => false, 'message' => $result['message']]);
        }
        exit;
    
    case 'get_messages':
        $controller = new MessagesController();
        
        // Get parameters from request
        $status = $_GET['status'] ?? '';
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $search = $_GET['search'] ?? '';
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 20;
        
        $result = $controller->getMessagesController($status, $page, $search, $limit);
        echo json_encode($result);
        exit;
    
    case 'get_message':
        $controller = new MessagesController();
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        
        $result = $controller->getMessageController($id);
        echo json_encode($result);
        exit;
    
    case 'toggle_star':
        $controller = new MessagesController();
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
        
        $result = $controller->toggleStarController($id);
        echo json_encode($result);
        exit;
    
    case 'move_to_trash':
        $controller = new MessagesController();
        $ids = $_POST['ids'] ?? '';
        
        $result = $controller->moveToTrashController($ids);
        echo json_encode($result);
        exit;
    
    case 'delete_messages':
        $controller = new MessagesController();
        $ids = $_POST['ids'] ?? '';
        
        $result = $controller->deleteMessagesController($ids);
        echo json_encode($result);
        exit;
            
    default:
        echo json_encode(['success' => false, 'message' => 'Invalid action.']);
        break;
}