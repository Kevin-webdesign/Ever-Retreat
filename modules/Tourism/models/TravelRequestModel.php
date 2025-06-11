<?php
class TravelRequestModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createTravelRequest($requestData) {
        // Generate unique request code
        $requestCode = 'TVREQ' . mt_rand(100000, 999999);
        
        $query = "INSERT INTO travel_requests (
            request_code, first_name, last_name, email, phone, 
            travel_from_country, start_date, end_date, nights, 
            activities, gorilla_treks, budget_range, hear_about_us, 
            special_requests
        ) VALUES (
            :request_code, :first_name, :last_name, :email, :phone, 
            :travel_from_country, :start_date, :end_date, :nights, 
            :activities, :gorilla_treks, :budget_range, :hear_about_us, 
            :special_requests
        )";
        
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':request_code', $requestCode);
        $stmt->bindParam(':first_name', $requestData['first_name']);
        $stmt->bindParam(':last_name', $requestData['last_name']);
        $stmt->bindParam(':email', $requestData['email']);
        $stmt->bindParam(':phone', $requestData['phone']);
        $stmt->bindParam(':travel_from_country', $requestData['travel_from_country']);
        $stmt->bindParam(':start_date', $requestData['start_date']);
        $stmt->bindParam(':end_date', $requestData['end_date']);
        $stmt->bindParam(':nights', $requestData['nights'], PDO::PARAM_INT);
        $stmt->bindParam(':activities', $requestData['activities']);
        $stmt->bindParam(':gorilla_treks', $requestData['gorilla_treks'], PDO::PARAM_INT);
        $stmt->bindParam(':budget_range', $requestData['budget_range']);
        $stmt->bindParam(':hear_about_us', $requestData['hear_about_us']);
        $stmt->bindParam(':special_requests', $requestData['special_requests']);
        
        if ($stmt->execute()) {
            return [
                'success' => true,
                'request_code' => $requestCode,
                'message' => 'Travel request submitted successfully'
            ];
        }
        
        return [
            'success' => false,
            'message' => 'Failed to submit travel request'
        ];
    }
}