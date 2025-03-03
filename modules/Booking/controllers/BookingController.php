<?php

require_once '../../../config/database.php';
require_once '../models/MilkOrdersModel.php';
require_once '../../../helpers/JWTHandler.php';  // Include your JWTHandler class

class MilkOrdersController
{
    private $db;
    public $milkordersModel;
    private $jwtHandler;

    public function __construct()
    {
        // Get database connection and initialize the User model
        $this->db = Database::getInstance();
        $this->milkordersModel = new MilkOrdersModel($this->db);

        // Initialize JWTHandler to manage JWT tokens
        $this->jwtHandler = new JWTHandler();
    }
    
    // Record new milk collection info
    public function capturedOrdersMilk($package20L, $package5L, $package3L, $package2L, $package1L, $payment_method, $user)
    {

        // Create user
        if ($this->milkordersModel->recordOrdersMilk($package20L, $package5L, $package3L, $package2L, $package1L, $payment_method, $user)) {
            return ['success' => true, 'message' => 'Order is successful wait for Approval!'];
        }

        return ['success' => false, 'message' => 'Failed to Order Your product.'];
    }

    public function deleteController($orderid){
        // echo 'contro'.$orderid;
        if ($this->milkordersModel->deleteOrderModel($orderid)) {
            return ['success' => true, 'message' => 'Order Deleted!'];
        }
        return ['success' => false, 'message' => 'Order Failed to be Delete!'];
    }

    // Fetch Order Information method 
    public function fetchOrders()
    {
        $orders = $this->milkordersModel->ordersFetch();
        if (!empty($orders)) {
            return $orders; // Return the fetched data
        }
        return [];
    }

    // Fetch Order Information method 
    public function fetchOrdersAdmin()
    {
        $orders = $this->milkordersModel->ordersFetchAdmin();
        if (!empty($orders)) {
            return $orders; // Return the fetched data
        }
        return [];
    }
    public function updateMilkOrdersData($orderid, $package20L, $package5L, $package3L, $package2L, $package1L, $payment_method)
    {
        // echo 'contro'.$package20L;
        // Update Data
        if ($this->milkordersModel->updateOrders($orderid, $package20L, $package5L, $package3L, $package2L, $package1L, $payment_method)) {
            return ['success' => true, 'message' => 'Update successful!'];
        }

        return ['success' => false, 'message' => 'Failed to Update Milk Data.'];
    }
    public function updateMilkOrdersStatus($orderid, $order_status, $comment)
    {
        // echo 'contro'.$package20L;
        // Update Data
        if ($this->milkordersModel->updateOrderStatus($orderid, $order_status, $comment)) {
            return ['success' => true, 'message' => 'Updated successful!'];
        }

        return ['success' => false, 'message' => 'Failed to Update Milk Data.'];
    }

    public function fetchOrdersReport($userid, $roleid) {
        $orders = $this->milkordersModel->ordersFetchReport($userid, $roleid);
        if (!empty($orders)) {
            return $orders; // Return the fetched data
        }
        return [];
    }
    
    public function fetchOrdersAdminReport() {
        $orders = $this->milkordersModel->ordersFetchAdminReport();
        if (!empty($orders)) {
            return $orders; // Return the fetched data
        }
        return [];
    }

}