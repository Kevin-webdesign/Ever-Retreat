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
    
    // Record new milk collection info
    public function recordBookingController($bookingCode, $checkin, $checkout, $adults, $child, $names, $email, $phone, $message, $addition_rate, $base_rate, $addedGuest, $total_amount)
    {

        // SAVE BOOKING
        if ($this->bookingModel->recordBooking($bookingCode, $checkin, $checkout, $adults, $child, $names, $email, $phone, $message)) {
            $bookingData = [
                'bookingCode' => $bookingCode, // Generated booking ID
                'names' => $names,
                'email' => $email,
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
            $this->sendBookingConfirmationEmail($bookingData);

            return ['success' => true, 'message' => 'Booking is successful wait for Approval!'];
        }

        return ['success' => false, 'message' => 'Booking Failed.'];
    }

    public function sendBookingConfirmationEmail($bookingData) {
        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);
        
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';          // SMTP server
            $mail->SMTPAuth   = true;
            $mail->Username   = 'abaremy1997@gmail.com';    // SMTP username
            $mail->Password   = 'tdkkisnekobxueuo';       // SMTP password
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;
            
            // Recipients
            $mail->setFrom('abaremy1997@gmail.com', 'EVER RETREAT');
            $mail->addAddress($bookingData['email'], $bookingData['names']);  // Guest email iradukundaericmbabazi@gmail.com
            $mail->addBCC('info.abaremy@gmail.com');        // BCC to your booking department
            
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'NEW BOOKING - #' . $bookingData['bookingCode'];
            
            // Calculate days between dates
            $checkin = new DateTime($bookingData['checkin']);
            $checkout = new DateTime($bookingData['checkout']);
            $interval = $checkin->diff($checkout);
            $nights = $interval->days;
            
            // Calculate extra guests (if more than 3)
            $totalGuests = intval($bookingData['adults']) + intval($bookingData['child']);
            // $extraGuests = max(0, $totalGuests - 3);
            $extraGuests = $bookingData['addedGuest'];
            
            // Load email template
            $emailTemplate = file_get_contents('../views/email_template.html');
            
            // Replace placeholders with actual data
            $replacements = array(
                '{GUEST_NAME}' => $bookingData['names'],
                '{BOOKING_ID}' => $bookingData['bookingCode'],
                '{CHECK_IN}' => date('l, F j, Y', strtotime($bookingData['checkin'])),
                '{CHECK_OUT}' => date('l, F j, Y', strtotime($bookingData['checkout'])),
                '{NIGHTS}' => $nights,
                '{ADULTS}' => $bookingData['adults'],
                '{CHILDREN}' => $bookingData['child'],
                '{BASE_RATE}' => number_format($bookingData['base_rate'], 2),
                '{EXTRA_GUESTS}' => $extraGuests,
                '{ADDITION_RATE}' => number_format($bookingData['addition_rate'], 2),
                '{TOTAL_AMOUNT}' => number_format($bookingData['total_amount'], 2),
                '{GUEST_MESSAGE}' => $bookingData['message'] ? $bookingData['message'] : 'No special requests.',
                '{MANAGE_BOOKING_URL}' => 'http://localhost:8080/ever-retreat/modules/Booking/views/manage-booking.php?bcode=' . $bookingData['bookingCode'],
                '{COMPANY_PHONE}' => '+250 788846668',
                '{COMPANY_EMAIL}' => 'info@everretreat.com',
                '{FACEBOOK_URL}' => 'https://facebook.com/everretreat',
                '{INSTAGRAM_URL}' => 'https://www.instagram.com/everretreat/',
                '{TWITTER_URL}' => 'https://twitter.com/everretreat',
                '{CURRENT_YEAR}' => date('Y'),
                '{COMPANY_NAME}' => 'EVER RETREAT',
                '{COMPANY_ADDRESS}' => 'M.peace plaza 3rd Floor Block B F331 ROOM KN 4 Ave, Kigali, Rwanda'
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

}