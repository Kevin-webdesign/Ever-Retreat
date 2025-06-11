<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set headers first
header('Content-Type: application/json');

require_once '../../../config/database.php';
require_once '../controllers/TravelRequestController.php';
require_once '../models/TravelRequestModel.php';

// Log the raw input for debugging
file_put_contents('travel_request_debug.log', print_r(file_get_contents('php://input'), true), FILE_APPEND);

try {
    // Get the raw POST data
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception('Invalid JSON data received');
    }
    
    $action = $_GET['action'] ?? '';
    
    switch ($action) {
        case 'submit_request':
            if (!class_exists('TravelRequestController')) {
                throw new Exception('TravelRequestController class not found');
            }
            
            $travelRequest = new TravelRequestController();
            $result = $travelRequest->submitTravelRequest($data);
            echo json_encode($result);
            break;
            
        default:
            echo json_encode(['success' => false, 'message' => 'Invalid action.']);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Server error: ' . $e->getMessage(),
        'trace' => $e->getTraceAsString() // Only for debugging
    ]);
}

exit;