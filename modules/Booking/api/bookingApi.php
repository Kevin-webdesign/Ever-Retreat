<?php

// autoload.php should include all necessary classes (like controllers, DB classes)
require_once '../../../config/database.php';
require_once '../controllers/BookingController.php';
require_once '../models/BookingModel.php';
require_once '../../../helpers/JWTHandler.php'; // Include your JWT helper

header('Content-Type: application/json');

// Initialize JWT handler
$jwt = new JWTHandler();

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'booking':
        $bookings = new BookingController();
        $bookingCode = $_POST['bookingCode'] ?? '';
        $checkin = $_POST['checkin'] ?? '';
        $checkout = $_POST['checkout'] ?? '';
        $adults = $_POST['adults'] ?? '';
        $child = $_POST['child'] ?? '';
        $names = $_POST['names'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $message = $_POST['message'] ?? '';
        $addition_rate = $_POST['addition_rate'] ?? '';
        $base_rate = $_POST['base_rate'] ?? '';
        $addedGuest = $_POST['addedGuest'] ?? '';
        $total_amount = $_POST['total_amount'] ?? '';

        // Call the register method and check if the registration is successful
        $result = $bookings->recordBookingController($bookingCode,$checkin, $checkout, $adults, $child, $names, $email, $phone, $message, $addition_rate, $base_rate, $addedGuest, $total_amount);

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

