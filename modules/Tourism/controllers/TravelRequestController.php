<?php
require_once '../../../config/database.php';
require_once '../models/TravelRequestModel.php';
require_once '../../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class TravelRequestController {
    private $db;
    public $travelRequestModel;

    public function __construct() {
        $this->db = Database::getInstance();
        $this->travelRequestModel = new TravelRequestModel($this->db);
    }
    
    public function submitTravelRequest($requestData) {
        // Validate required fields
        if (empty($requestData['firstName']) || empty($requestData['lastName']) || empty($requestData['email'])) {
            return ['success' => false, 'message' => 'First name, last name, and email are required'];
        }

        // Prepare data for model
        $data = [
            'first_name' => $requestData['firstName'],
            'last_name' => $requestData['lastName'],
            'email' => $requestData['email'],
            'phone' => $requestData['phoneNumber'] ?? '',
            'travel_from_country' => $requestData['travelFromCountry'] ?? '',
            'start_date' => $requestData['startDate'] ?? null,
            'end_date' => $requestData['endDate'] ?? null,
            'nights' => $requestData['nights'] ?? 0,
            'activities' => isset($requestData['activities']) ? json_encode($requestData['activities']) : '[]',
            'gorilla_treks' => $requestData['gorillaTreks'] ?? 0,
            'budget_range' => $requestData['budgetRange'] ?? '',
            'hear_about_us' => $requestData['hearAboutUs'] ?? '',
            'special_requests' => $requestData['specialRequests'] ?? ''
        ];

        // Save the travel request
        $result = $this->travelRequestModel->createTravelRequest($data);
        
        if ($result['success']) {
            // Send email notifications
            $this->sendAdminNotification($data, $result['request_code']);
            $this->sendClientConfirmation($data, $result['request_code']);
            
            return ['success' => true, 'message' => 'Your travel request has been submitted successfully!'];
        }
        
        return ['success' => false, 'message' => 'Failed to submit your travel request.'];
    }
    
    public function sendAdminNotification($requestData, $requestCode) {
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
            $mail->setFrom('reservation@everretreat.com', 'Ever Retreat Travel' . ' - ' . $requestData['last_name']);
            $mail->addAddress('info@everretreat.com', 'Ever Retreat Travel');
            $mail->addBCC('info.abaremy@gmail.com');
            
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'New Travel Request - ' . $requestCode;
            
            // Load email template
            $emailTemplate = file_get_contents('../views/admin_travel_request_template.html');
            
            // Format dates
            $startDate = $requestData['start_date'] ? date('Y-m-d', strtotime($requestData['start_date'])) : 'Not specified';
            $endDate = $requestData['end_date'] ? date('Y-m-d', strtotime($requestData['end_date'])) : 'Not specified';
            
            // Decode activities
            $activities = json_decode($requestData['activities'], true);
            $activitiesList = !empty($activities) ? implode(', ', $activities) : 'None selected';
            
            // Replace placeholders with actual data
            $replacements = [
                '{REQUEST_CODE}' => $requestCode,
                '{FULL_NAME}' => $requestData['first_name'] . ' ' . $requestData['last_name'],
                '{EMAIL}' => $requestData['email'],
                '{PHONE}' => $requestData['phone'] ?: 'Not provided',
                '{TRAVEL_FROM}' => $requestData['travel_from_country'],
                '{START_DATE}' => $startDate,
                '{END_DATE}' => $endDate,
                '{NIGHTS}' => $requestData['nights'] ?: 'Not specified',
                '{ACTIVITIES}' => $activitiesList,
                '{GORILLA_TREKS}' => $requestData['gorilla_treks'] ?: '0',
                '{BUDGET_RANGE}' => $requestData['budget_range'] ?: 'Not specified',
                '{HEAR_ABOUT_US}' => $requestData['hear_about_us'] ?: 'Not specified',
                '{SPECIAL_REQUESTS}' => $requestData['special_requests'] ?: 'None',
                '{MANAGE_REQUEST_URL}' => 'https://everretreat.com/modules/Tourism/views/manage-request.php?code=' . $requestCode
            ];
            
            foreach ($replacements as $placeholder => $value) {
                $emailTemplate = str_replace($placeholder, $value, $emailTemplate);
            }
            
            $mail->Body = $emailTemplate;
            $mail->AltBody = strip_tags(str_replace(['<br>', '<br/>', '<br />'], "\n", $emailTemplate));
            
            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Admin notification email could not be sent. Mailer Error: {$mail->ErrorInfo}");
            return false;
        }
    }
    
    public function sendClientConfirmation($requestData, $requestCode) {
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
            $mail->setFrom('reservation@everretreat.com', 'Ever Retreat Travel');
            $mail->addAddress($requestData['email'], $requestData['first_name'] . ' ' . $requestData['last_name']);
            $mail->addBCC('info@everretreat.com');
            
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Your Travel Request Confirmation - ' . $requestCode;
            
            // Load email template
            $emailTemplate = file_get_contents('../views/client_travel_request_template.html');
            
            // Replace placeholders with actual data
            $replacements = [
                '{REQUEST_CODE}' => $requestCode,
                '{FULL_NAME}' => $requestData['first_name'] . ' ' . $requestData['last_name'],
                '{COMPANY_EMAIL}' => 'reservation@everretreat.com',
                '{COMPANY_NAME}' => 'EVER RETREAT',
                '{CURRENT_YEAR}' => date('Y')
            ];
            
            foreach ($replacements as $placeholder => $value) {
                $emailTemplate = str_replace($placeholder, $value, $emailTemplate);
            }
            
            $mail->Body = $emailTemplate;
            $mail->AltBody = strip_tags(str_replace(['<br>', '<br/>', '<br />'], "\n", $emailTemplate));
            
            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Client confirmation email could not be sent. Mailer Error: {$mail->ErrorInfo}");
            return false;
        }
    }
}