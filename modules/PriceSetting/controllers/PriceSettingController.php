<?php

require_once '../../../config/database.php';
require_once '../models/PriceSettingModel.php';
require_once '../../../helpers/JWTHandler.php';  // Include your JWTHandler class

class PriceSettingController
{
    private $db;
    public $priceSettingModel;
    private $jwtHandler;

    public function __construct()
    {
        // Get database connection and initialize the User model
        $this->db = Database::getInstance();
        $this->priceSettingModel = new PriceSettingModel($this->db);

        // Initialize JWTHandler to manage JWT tokens
        $this->jwtHandler = new JWTHandler();
    }
    
    // Fetch Prices Information method 
    public function fetchPriceController()
    {
        $prices = $this->priceSettingModel->priceFetch();
        if (!empty($prices)) {
            return $prices; // Return the fetched data
        }
        return [];
    }

    
    public function updatePricesetting($cost, $addition)
    {
        //  echo 'contro'.$purchaseprice;

        // Create user
        if ($this->priceSettingModel->updatePricesetting($cost, $addition)) {
            return ['success' => true, 'message' => 'Price Settings Updated!'];
        }

        return ['success' => false, 'message' => 'Failed to Update Prices.'];
    }
}