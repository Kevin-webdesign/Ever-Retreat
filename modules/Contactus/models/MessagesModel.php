<?php
class MessagesModel {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    // Save Contact Us Message 
    public function recordMessage($names, $email, $phone, $subject, $message) {
        $status = 'New';
        $query = "INSERT INTO messages(names, email, phone, subject, message, status)
        values(:names, :email, :phone, :subject, :message, :status) ";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':names', $names, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':subject', $subject, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    // Get all messages with pagination and filtering
    public function getMessages($status = '', $page = 1, $search = '', $limit = 20) {
        $offset = ($page - 1) * $limit;
        
        $query = "SELECT id, names, email, phone, subject, message, status, is_starred, created_at 
                 FROM messages WHERE 1=1";
        
        // Add status filter
        if (!empty($status)) {
            if ($status == 'starred') {
                $query .= " AND is_starred = 1";
            } else if ($status == 'trash') {
                $query .= " AND status = 'Trash'";
            } else {
                $query .= " AND status != 'Trash'";
            }
        } else {
            // Default view excludes trash
            $query .= " AND status != 'Trash'";
        }
        
        // Add search filter
        if (!empty($search)) {
            $query .= " AND (names LIKE :search OR email LIKE :search OR subject LIKE :search OR message LIKE :search)";
        }
        
        // Add order and limit
        $query .= " ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
        
        $stmt = $this->db->prepare($query);
        
        if (!empty($search)) {
            $searchParam = "%$search%";
            $stmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
        }
        
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Get total message count for pagination
    public function getTotalMessageCount($status = '', $search = '') {
        $query = "SELECT COUNT(*) as total FROM messages WHERE 1=1";
        
        // Add status filter
        if (!empty($status)) {
            if ($status == 'starred') {
                $query .= " AND is_starred = 1";
            } else if ($status == 'trash') {
                $query .= " AND status = 'Trash'";
            } else {
                $query .= " AND status != 'Trash'";
            }
        } else {
            // Default view excludes trash
            $query .= " AND status != 'Trash'";
        }
        
        // Add search filter
        if (!empty($search)) {
            $query .= " AND (names LIKE :search OR email LIKE :search OR subject LIKE :search OR message LIKE :search)";
        }
        
        $stmt = $this->db->prepare($query);
        
        if (!empty($search)) {
            $searchParam = "%$search%";
            $stmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
        }
        
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    
    // Get new message count (unread)
    public function getNewMessageCount() {
        $query = "SELECT COUNT(*) as total FROM messages WHERE status = 'New'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    
    // Get a single message by ID
    public function getMessageById($id) {
        $query = "SELECT * FROM messages WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    // Toggle star status for a message
    public function toggleStarStatus($id) {
        $query = "UPDATE messages SET is_starred = NOT is_starred WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            // Return the new star status
            $queryCheck = "SELECT is_starred FROM messages WHERE id = :id";
            $stmtCheck = $this->db->prepare($queryCheck);
            $stmtCheck->bindParam(':id', $id, PDO::PARAM_INT);
            $stmtCheck->execute();
            $result = $stmtCheck->fetch(PDO::FETCH_ASSOC);
            return $result['is_starred'];
        }
        
        return false;
    }
    
    // Move messages to trash
    public function moveToTrash($ids) {
        $idArray = explode(',', $ids);
        $placeholders = implode(',', array_fill(0, count($idArray), '?'));
        
        $query = "UPDATE messages SET status = 'Trash' WHERE id IN ($placeholders)";
        $stmt = $this->db->prepare($query);
        
        foreach ($idArray as $index => $id) {
            $stmt->bindValue($index + 1, $id, PDO::PARAM_INT);
        }
        
        return $stmt->execute();
    }
    
    // Permanently delete messages
    public function deleteMessages($ids) {
        $idArray = explode(',', $ids);
        $placeholders = implode(',', array_fill(0, count($idArray), '?'));
        
        $query = "DELETE FROM messages WHERE id IN ($placeholders)";
        $stmt = $this->db->prepare($query);
        
        foreach ($idArray as $index => $id) {
            $stmt->bindValue($index + 1, $id, PDO::PARAM_INT);
        }
        
        return $stmt->execute();
    }
    
    // Mark message as read
    public function markAsRead($id) {
        $query = "UPDATE messages SET status = 'Read' WHERE id = :id AND status = 'New'";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>