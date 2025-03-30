<?php

// autoload.php should include all necessary classes (like controllers, DB classes)
require_once '../../../config/database.php';
require_once '../controllers/PriceSettingController.php';
require_once '../../../helpers/JWTHandler.php'; // Include your JWT helper

header('Content-Type: application/json');

// Initialize JWT handler
$jwt = new JWTHandler();

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'fetchPrice':
        $priceSettingController = new PriceSettingController();
        
        $price = $priceSettingController->fetchPriceController();
        if ($price) {
            echo json_encode($price);
        } else {
            echo json_encode(['exists' => false, 'message' => 'No Price Found']);
        }
        exit;

    case 'updatePrice':
        $priceSettingController = new PriceSettingController();

        $cost = $_POST['cost'] ?? '';
        $addition = $_POST['addition'] ?? '';
        // echo '<script>console.log("contro'.$purchaseprice.'")</script>';
        

        // Call the register method and check if the registration is successful
        $result = $priceSettingController->updatePricesetting($cost, $addition);

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





   