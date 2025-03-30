<?php
class PriceSettingModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Select all Farmers exists in the database
    public function priceFetch() {
        $query = "SELECT * FROM price_settings LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // return all fetched price
    }


    public function updatePricesetting($cost, $addition) {
        $pricesetting_id = 1;
        $query = "UPDATE price_settings SET cost=:cost, addition=:addition";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':cost', $cost, PDO::PARAM_STR);
        $stmt->bindParam(':addition', $addition, PDO::PARAM_STR);
       
     
        if ($stmt->execute()) {
            return true; // Return true if registration was successful
        } else {
            return false; // Return false if registration failed
        }
    }    
}
?>
