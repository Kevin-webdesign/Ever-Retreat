<?php
class BookingModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Updated to include villa field
    public function recordBooking($bookingCode, $villa, $checkin, $checkout, $adults, $child, $names, $email, $phone, $message) {
        $query = "INSERT INTO booking (bookingCode, villa, checkin, checkout, adults, child, names, email, phone, message) VALUES 
        (:bookingCode, :villa, :checkin, :checkout, :adults, :child, :names, :email, :phone, :message)";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':bookingCode', $bookingCode, PDO::PARAM_STR);
        $stmt->bindParam(':villa', $villa, PDO::PARAM_STR);
        $stmt->bindParam(':checkin', $checkin, PDO::PARAM_STR);
        $stmt->bindParam(':checkout', $checkout, PDO::PARAM_STR);
        $stmt->bindParam(':adults', $adults, PDO::PARAM_STR);
        $stmt->bindParam(':child', $child, PDO::PARAM_STR);
        $stmt->bindParam(':names', $names, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
     
        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }    
}