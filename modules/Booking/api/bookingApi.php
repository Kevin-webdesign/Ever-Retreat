<?php

// autoload.php should include all necessary classes (like controllers, DB classes)
require_once '../../../config/database.php';
require_once '../controllers/MilkOrdersController.php';
require_once '../models/MilkOrdersModel.php';
require_once '../../../helpers/JWTHandler.php'; // Include your JWT helper

header('Content-Type: application/json');

// Initialize JWT handler
$jwt = new JWTHandler();

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'order':
        $milkorders = new MilkOrdersController();
        $package20L = $_POST['package20L'] ?? '';
        $package5L = $_POST['package5L'] ?? '';
        $package3L = $_POST['package3L'] ?? '';
        $package2L = $_POST['package2L'] ?? '';
        $package1L = $_POST['package1L'] ?? '';
        $payment_method = $_POST['payment_method'] ?? '';
        $user = $_POST['collectedby'] ?? '';
        

        // Call the register method and check if the registration is successful
        $result = $milkorders->capturedOrdersMilk($package20L, $package5L, $package3L, $package2L, $package1L, $payment_method, $user);

        if ($result['success']) {
            echo json_encode(['success' => true, 'message' => $result['message']]);
        } else {
            echo json_encode(['success' => false, 'message' => $result['message']]);
        }
        exit;
        
    case 'fetchOrderData':
        $milkorders = new MilkOrdersController();
        // $collectorId = $_GET['collectorId'] ?? '';

        // Call the Fetch Order Information method and check if the Order found
        $allOrders = $milkorders->fetchOrders();

        if ($allOrders) {
            echo json_encode($allOrders);
        } else {
            echo json_encode(['success' => false, 'message' => $result['message']]);
        }
        exit;
        
    case 'fetchOrderDataAdmin':
        $milkorders = new MilkOrdersController();
        // $collectorId = $_GET['collectorId'] ?? '';

        // Call the Fetch Order Information method and check if the Order found
        $allOrders = $milkorders->fetchOrdersAdmin();

        if ($allOrders) {
            echo json_encode($allOrders);
        } else {
            echo json_encode(['success' => false, 'message' => $result['message']]);
        }
        exit;

    case 'fetchOrderDataReport':
        $milkorders = new MilkOrdersController();
        $userid = $decodedToken->userid; // Get userid from JWT
        $roleid = $decodedToken->role; // Get roleid from JWT
    
        // Call the Fetch Order Information method and check if the Order found
        $allOrders = $milkorders->fetchOrdersReport($userid, $roleid);
    
        if ($allOrders) {
            echo json_encode($allOrders);
        } else {
            echo json_encode(['success' => false, 'message' => $result['message']]);
        }
        exit;
    
    case 'fetchOrderDataAdminReport':
        $milkorders = new MilkOrdersController();
        $allOrders = $milkorders->fetchOrdersAdminReport();
    
        if ($allOrders) {
            echo json_encode($allOrders);
        } else {
            echo json_encode(['success' => false, 'message' => 'KO BYANZE']);
        }
        exit;
        
    case 'deleteOrder':
        $milkorders = new MilkOrdersController();
        $orderid = $_POST['orderId'] ?? '';
        // echo 'order'.$orderid;

        // Call the Fetch Order Information method and check if the Order found
        $result = $milkorders->deleteController($orderid);
        // $result = $models->deleteOrderModel($orderid);
            

        if ($result['success']) {
            echo json_encode(['success' => true, 'message' => $result['message']]);
        } else {
            echo json_encode(['success' => false, 'message' => $result['message']]);
        }
        exit;

    case 'updateMilkorders':
        $milkorders = new MilkOrdersController();
        
        $orderid = $_POST['orderid'] ?? '';
        $package20L = $_POST['package20L'] ?? '';
        $package5L = $_POST['package5L'] ?? '';
        $package3L = $_POST['package3L'] ?? '';
        $package2L = $_POST['package2L'] ?? '';
        $package1L = $_POST['package1L'] ?? ''; 
        $payment_method = $_POST['payment_method'] ?? '';   
        
        // echo 'L1:'.$package1L;            

        // Call the Fetch Collected Milk Information method and check if the Milk Collection is found
        $result = $milkorders->updateMilkOrdersData($orderid, $package20L, $package5L, $package3L, $package2L, $package1L, $payment_method);

        if ($result['success']) {
            echo json_encode(['success' => true, 'message' => $result['message']]);
        } else {
            echo json_encode(['success' => false, 'message' => $result['message']]);
        }
        exit;

    case 'changeOrderStatus':
        $milkorders = new MilkOrdersController();
        
        $orderid = $_POST['orderid'] ?? '';
        $order_status = $_POST['status'] ?? '';     
        $comment = $_POST['comment'] ?? '';     

        // Call the Fetch Collected Milk Information method and check if the Milk Collection is found
        $result = $milkorders->updateMilkOrdersStatus($orderid, $order_status, $comment);

        if ($result['success']) {
            echo json_encode(['success' => true, 'message' => $result['message']]);
        } else {
            echo json_encode(['success' => false, 'message' => $result['message']]);
        }
        exit;

    default:
        echo json_encode(['success' => false, 'message' => 'Invalid action.']);
        break;
}

