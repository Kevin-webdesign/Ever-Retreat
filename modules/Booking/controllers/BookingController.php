<?php

require_once '../../../config/database.php';
require_once '../models/BookingModel.php';
require_once '../../../helpers/JWTHandler.php';  // Include your JWTHandler class

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class BookingController
{
    private $db;
    public $bookingModel;
    private $jwtHandler;

    public function __construct()
    {
        // Get database connection and initialize the User model
        $this->db = Database::getInstance();
        $this->bookingModel = new BookingModel($this->db);

        // Initialize JWTHandler to manage JWT tokens
        $this->jwtHandler = new JWTHandler();
    }
    
    // Updated to include villa parameter
    public function recordBookingController($bookingCode, $villa, $checkin, $checkout, $adults, $child, $names, $email, $phone, $message, $addition_rate, $base_rate, $addedGuest, $total_amount)
    {
        // SAVE BOOKING
        if ($this->bookingModel->recordBooking($bookingCode, $villa, $checkin, $checkout, $adults, $child, $names, $email, $phone, $message)) {
            $bookingData = [
                'bookingCode' => $bookingCode, // Generated booking ID
                'villa' => $villa, // New villa field
                'names' => $names,
                'email' => $email,
                'phone' => $phone,
                'checkin' => $checkin,
                'checkout' => $checkout,
                'adults' => $adults,
                'child' => $child,
                'message' => $message,
                'addedGuest' => $addedGuest, // calculated in API
                'base_rate' => $base_rate, // From your price settings
                'addition_rate' => $addition_rate, // From your price settings
                'total_amount' => $total_amount // Calculated total cost
            ];
            
            // Send email to administration
            $this->sendAdminNotificationEmail($bookingData);
            
            // Send confirmation email to client
            $this->sendClientConfirmationEmail($bookingData);

            return ['success' => true, 'message' => 'Booking is successful! Please check your email for confirmation details.'];
        }

        return ['success' => false, 'message' => 'Booking Failed.'];
    }

    // Updated admin email to include villa information
    public function sendAdminNotificationEmail($bookingData) {
        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);
        
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'mail.everretreat.com';     
            $mail->SMTPAuth   = true;
            $mail->Username   = 'reservation@everretreat.com';    
            $mail->Password   = 'everretreat@2025';       
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;
            
            // Recipients
            $mail->setFrom($bookingData['email'], $bookingData['names']);
            // $mail->addAddress('reservation@everretreat.com', 'Ever retreat');  
            $mail->addAddress('info.abaremy@gmail.com', 'Ever retreat');  
            // $mail->addBCC('iradukundaericmbabazi@gmail.com');        
            $mail->addBCC('info@everretreat.com');
            
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'New Booking - ' . $bookingData['villa'] . ' - #' . $bookingData['bookingCode'];
            
            // Calculate days between dates
            $checkin = new DateTime($bookingData['checkin']);
            $checkout = new DateTime($bookingData['checkout']);
            $interval = $checkin->diff($checkout);
            $nights = $interval->days;
            
            // Format dates in YYYY-MM-DD format
            $formattedCheckin = date('Y-m-d', strtotime($bookingData['checkin']));
            $formattedCheckout = date('Y-m-d', strtotime($bookingData['checkout']));
            
            // Calculate extra guests (if more than 3)
            $extraGuests = $bookingData['addedGuest'];
            
            // Load email template - using admin template
            $emailTemplate = file_get_contents('../views/admin_email_template.html');
            
            // Replace placeholders with actual data
            $replacements = array(
                '{VILLA_NAME}' => $bookingData['villa'],
                '{GUEST_NAME}' => $bookingData['names'],
                '{GUEST_EMAIL}' => $bookingData['email'],
                '{GUEST_PHONE}' => $bookingData['phone'],
                '{BOOKING_ID}' => $bookingData['bookingCode'],
                '{CHECK_IN}' => $formattedCheckin,
                '{CHECK_OUT}' => $formattedCheckout,
                '{NIGHTS}' => $nights,
                '{ADULTS}' => $bookingData['adults'],
                '{CHILDREN}' => $bookingData['child'],
                '{BASE_RATE}' => number_format($bookingData['base_rate'], 2),
                '{EXTRA_GUESTS}' => $extraGuests,
                '{ADDITION_RATE}' => number_format($bookingData['addition_rate'], 2),
                '{TOTAL_AMOUNT}' => number_format($bookingData['total_amount'], 2),
                '{GUEST_MESSAGE}' => $bookingData['message'] ? $bookingData['message'] : 'No special requests.',
                '{MANAGE_BOOKING_URL}' => 'https://everretreat.com/modules/Booking/views/manage-booking.php?bcode=' . $bookingData['bookingCode']
            );
            
            foreach ($replacements as $placeholder => $value) {
                $emailTemplate = str_replace($placeholder, $value, $emailTemplate);
            }
            
            $mail->Body = $emailTemplate;
            
            // Create plain text version by stripping HTML
            $mail->AltBody = strip_tags(str_replace(['<br>', '<br/>', '<br />'], "\n", $emailTemplate));
            
            // Send the email
            $mail->send();
            return true;
        } catch (Exception $e) {
            // Log the error
            error_log("Email could not be sent. Mailer Error: {$mail->ErrorInfo}");
            return false;
        }
    }
    
    // Updated client email to include villa information
    public function sendClientConfirmationEmail($bookingData) {
        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);
        
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'mail.everretreat.com';     
            $mail->SMTPAuth   = true;
            $mail->Username   = 'reservation@everretreat.com';    
            $mail->Password   = 'everretreat@2025';       
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;
            
            // Recipients - this time we're sending TO the client
            $mail->setFrom('reservation@everretreat.com', 'EverRetreat');
            $mail->addAddress($bookingData['email'], $bookingData['names']);
            $mail->addBCC('info@everretreat.com'); // Keep the admin in the loop
            
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Your ' . $bookingData['villa'] . ' Booking Confirmation - EverRetreat';
            
            // Calculate days between dates
            $checkin = new DateTime($bookingData['checkin']);
            $checkout = new DateTime($bookingData['checkout']);
            $interval = $checkin->diff($checkout);
            $nights = $interval->days;
            
            // Load client email template
            $emailTemplate = file_get_contents('../views/client_email_template.html');
            
            // Format dates in YYYY-MM-DD format
            $formattedCheckin = date('Y-m-d', strtotime($bookingData['checkin']));
            $formattedCheckout = date('Y-m-d', strtotime($bookingData['checkout']));
            
            // Replace placeholders with actual data
            $replacements = array(
                '{VILLA_NAME}' => $bookingData['villa'],
                '{GUEST_NAME}' => $bookingData['names'],
                '{GUEST_EMAIL}' => $bookingData['email'],
                '{GUEST_PHONE}' => $bookingData['phone'],
                '{BOOKING_ID}' => $bookingData['bookingCode'],
                '{CHECK_IN}' => $formattedCheckin,
                '{CHECK_OUT}' => $formattedCheckout,
                '{NIGHTS}' => $nights,
                '{ADULTS}' => $bookingData['adults'],
                '{CHILDREN}' => $bookingData['child'],
                '{TOTAL_AMOUNT}' => number_format($bookingData['total_amount'], 2),
                '{GUEST_MESSAGE}' => $bookingData['message'] ? $bookingData['message'] : 'No special requests.',
                '{COMPANY_EMAIL}' => 'reservation@everretreat.com',
                '{CURRENT_YEAR}' => date('Y'),
                '{COMPANY_NAME}' => 'EVER RETREAT'
            );
            
            foreach ($replacements as $placeholder => $value) {
                $emailTemplate = str_replace($placeholder, $value, $emailTemplate);
            }
            
            $mail->Body = $emailTemplate;
            
            // Create plain text version by stripping HTML
            $mail->AltBody = strip_tags(str_replace(['<br>', '<br/>', '<br />'], "\n", $emailTemplate));
            
            // Send the email
            $mail->send();
            return true;
        } catch (Exception $e) {
            // Log the error
            error_log("Client email could not be sent. Mailer Error: {$mail->ErrorInfo}");
            return false;
        }
    }
}