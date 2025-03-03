<?php
class MilkOrdersModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Create a new user (for registration)
    public function recordOrdersMilk($package20L, $package5L, $package3L, $package2L, $package1L, $payment_method, $user) {
        $query = "INSERT INTO orders (package20L, package5L, package3L, package2L, package1L, payment_method, userid ) VALUES 
        (:package20L, :package5L, :package3L, :package2L, :package1L, :payment_method, :userid)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':package20L', $package20L, PDO::PARAM_STR);
        $stmt->bindParam(':package5L', $package5L, PDO::PARAM_STR);
        $stmt->bindParam(':package3L', $package3L, PDO::PARAM_STR);
        $stmt->bindParam(':package2L', $package2L, PDO::PARAM_STR);
        $stmt->bindParam(':package1L', $package1L, PDO::PARAM_STR);
        $stmt->bindParam(':payment_method', $payment_method, PDO::PARAM_STR);
        $stmt->bindParam(':userid', $user, PDO::PARAM_STR);
     
        if ($stmt->execute()) {
            return true; // Return true if registration was successful
        } else {
            return false; // Return false if registration failed
        }
    }    

    // Select all Data about Orders in the database [customer, Orders data]
    public function ordersFetch() {
        $query = "SELECT    
                customer.username AS customer_username,
                oda.userid,
                oda.orderid,
                oda.package20L, 
                oda.package5L, 
                oda.package3L, 
                oda.package2L, 
                oda.package1L, 
                oda.payment_method, 
                oda.order_status,
                oda.date
              FROM orders AS oda
              JOIN users AS customer ON oda.userid = customer.userid  -- Get customer details
              ORDER BY oda.date DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // retur all fetched COLLECTION
    }

    // Select all Data about Orders in the database [customer, Orders data]
    public function ordersFetchAdmin() {
        $query = "SELECT    
                customer.username AS customer_username,
                oda.userid,
                oda.orderid,
                oda.package20L, 
                oda.package5L, 
                oda.package3L, 
                oda.package2L, 
                oda.package1L, 
                oda.payment_method, 
                oda.order_status,
                oda.comment,
                oda.date
              FROM orders AS oda
              JOIN users AS customer ON oda.userid = customer.userid  -- Get customer details
              ORDER BY oda.date DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // retur all fetched COLLECTION
    }

    public function deleteOrderModel($orderid){
        
        // echo 'Model'.$orderid;
        $query = "DELETE FROM orders WHERE orderid = :orderid";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':orderid', $orderid, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true; // Return true if Delete Order was successful
        } else {
            return false; // Return false if Delete Order failed
        }
    }
    public function updateOrders($orderid, $package20L, $package5L, $package3L, $package2L, $package1L, $payment_method) {
        $query = "UPDATE orders SET package20L = :package20L, package5L = :package5L,
         package3L = :package3L, package2L = :package2L, package1L = :package1L, payment_method = :payment_method WHERE orderid = :orderid";


        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':orderid', $orderid);
        $stmt->bindParam(':package20L', $package20L);
        $stmt->bindParam(':package5L', $package5L);
        $stmt->bindParam(':package3L', $package3L);
        $stmt->bindParam(':package2L', $package2L);
        $stmt->bindParam(':package1L', $package1L); 
        $stmt->bindParam(':payment_method', $payment_method);
       
        if ($stmt->execute()) {
            return true; // Return true if registration was successful
        } else {
            return false; // Return false if registration failed
        }
    }
    public function updateOrderStatus($orderid, $order_status, $comment) {
        $query = "UPDATE orders SET order_status = :order_status, comment = :comment  WHERE orderid = :orderid";


        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':orderid', $orderid);
        $stmt->bindParam(':order_status', $order_status);
        $stmt->bindParam(':comment', $comment);
       
        if ($stmt->execute()) {
            return true; // Return true if updated
        } else {
            return false; // Return false if not updated
        }
    }

    public function ordersFetchReport($userid, $roleid) {
        $sql = "SELECT 
                    o.orderid, 
                    u.firstname, u.lastname, 
                    CONCAT_WS(', ',
                        IF(o.package20L > 0, CONCAT('20L (', o.package20L, ')'), NULL),
                        IF(o.package5L > 0, CONCAT('5L (', o.package5L, ')'), NULL),
                        IF(o.package3L > 0, CONCAT('3L (', o.package3L, ')'), NULL),
                        IF(o.package2L > 0, CONCAT('2L (', o.package2L, ')'), NULL),
                        IF(o.package1L > 0, CONCAT('1L (', o.package1L, ')'), NULL)
                    ) AS package_details,
                    (o.package20L * p.price_20L +
                     o.package5L * p.price_5L +
                     o.package3L * p.price_3L +
                     o.package2L * p.price_2L +
                     o.package1L * p.price_1L) AS total_amount,
                    o.payment_method, o.discount, o.order_status, o.comment, o.date
                FROM orders o
                JOIN users u ON o.userid = u.userid
                CROSS JOIN price_setting p";

        if ($roleid == 4) {
            $sql .= " WHERE o.userid = :userid";
        }

        $stmt = $this->db->prepare($sql);
        $params = ($roleid == 4) ? ['userid' => $userid] : [];
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function ordersFetchAdminReport() {
        $query = "SELECT    
                    o.orderid, 
                    u.firstname, u.lastname, 
                    CONCAT_WS(', ',
                        IF(o.package20L > 0, CONCAT('20L (', o.package20L, ')'), NULL),
                        IF(o.package5L > 0, CONCAT('5L (', o.package5L, ')'), NULL),
                        IF(o.package3L > 0, CONCAT('3L (', o.package3L, ')'), NULL),
                        IF(o.package2L > 0, CONCAT('2L (', o.package2L, ')'), NULL),
                        IF(o.package1L > 0, CONCAT('1L (', o.package1L, ')'), NULL)
                    ) AS package_details,
                    (o.package20L * p.price_20L +
                     o.package5L * p.price_5L +
                     o.package3L * p.price_3L +
                     o.package2L * p.price_2L +
                     o.package1L * p.price_1L) AS total_amount,
                    o.payment_method, o.discount, o.order_status, o.comment, o.date
                FROM orders o
                JOIN users u ON o.userid = u.userid
                CROSS JOIN price_setting p ORDER BY o.orderid DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
