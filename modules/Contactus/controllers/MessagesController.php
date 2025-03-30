<?php

require_once '../../../config/database.php';
require_once '../models/MessagesModel.php';
require_once '../../../helpers/JWTHandler.php'; // Include your JWTHandler class

class MessagesController {
    private $db;
    public $messageModel;
    private $jwtHandler;
    
    public function __construct()
    {
        // Get database connection and initialize the User model
        $this->db = Database::getInstance();
        $this->messageModel = new MessagesModel($this->db);
        
        // Initialize JWTHandler to manage JWT tokens
        $this->jwtHandler = new JWTHandler();
    }
    
    // Record new Message
    public function recordMessageController($names, $email, $phone, $subject, $message)
    {
        // SAVE message
        if ($this->messageModel->recordMessage($names, $email, $phone, $subject, $message)) {
            return ['success' => true, 'message' => 'Message Sent Successfully!'];
        }
        
        return ['success' => false, 'message' => 'Message Failed.'];
    }
    
    // Get messages with pagination and filtering
    public function getMessagesController($status = '', $page = 1, $search = '', $limit = 20)
    {
        $messages = $this->messageModel->getMessages($status, $page, $search, $limit);
        $totalMessages = $this->messageModel->getTotalMessageCount($status, $search);
        $newMessages = $this->messageModel->getNewMessageCount();
        
        // Format dates and prepare data for display
        foreach ($messages as &$message) {
            // Format the date
            $created = new DateTime($message['created_at']);
            $now = new DateTime();
            $interval = $created->diff($now);
            
            if ($interval->y > 0) {
                $message['time_ago'] = $interval->y . ' year' . ($interval->y > 1 ? 's' : '') . ' ago';
            } elseif ($interval->m > 0) {
                $message['time_ago'] = $interval->m . ' month' . ($interval->m > 1 ? 's' : '') . ' ago';
            } elseif ($interval->d > 0) {
                $message['time_ago'] = $interval->d . ' day' . ($interval->d > 1 ? 's' : '') . ' ago';
            } elseif ($interval->h > 0) {
                $message['time_ago'] = $interval->h . ' hour' . ($interval->h > 1 ? 's' : '') . ' ago';
            } elseif ($interval->i > 0) {
                $message['time_ago'] = $interval->i . ' minute' . ($interval->i > 1 ? 's' : '') . ' ago';
            } else {
                $message['time_ago'] = 'just now';
            }
            
            // Truncate message for display
            $message['subject_preview'] = mb_strlen($message['subject']) > 80 
                ? mb_substr($message['subject'], 0, 80) . '...' 
                : $message['subject'];
                
            // Add the message preview (first 80 chars)    
            $message['message_preview'] = mb_strlen($message['message']) > 80 
                ? mb_substr($message['message'], 0, 80) . '...' 
                : $message['message'];
        }
        
        // Calculate pagination data
        $totalPages = ceil($totalMessages / $limit);
        $startIndex = ($page - 1) * $limit + 1;
        $endIndex = min($startIndex + $limit - 1, $totalMessages);
        
        return [
            'success' => true,
            'messages' => $messages,
            'pagination' => [
                'total' => $totalMessages,
                'new_messages' => $newMessages,
                'current_page' => $page,
                'total_pages' => $totalPages,
                'start_index' => $startIndex,
                'end_index' => $endIndex
            ]
        ];
    }
    
    // Toggle star status for a message
    public function toggleStarController($id)
    {
        $result = $this->messageModel->toggleStarStatus($id);
        
        if ($result !== false) {
            return [
                'success' => true, 
                'is_starred' => (bool)$result,
                'message' => 'Star status updated successfully'
            ];
        }
        
        return ['success' => false, 'message' => 'Failed to update star status'];
    }
    
    // Move messages to trash
    public function moveToTrashController($ids)
    {
        if (empty($ids)) {
            return ['success' => false, 'message' => 'No messages selected'];
        }
        
        if ($this->messageModel->moveToTrash($ids)) {
            return ['success' => true, 'message' => 'Messages moved to trash successfully'];
        }
        
        return ['success' => false, 'message' => 'Failed to move messages to trash'];
    }
    
    // Permanently delete messages
    public function deleteMessagesController($ids)
    {
        if (empty($ids)) {
            return ['success' => false, 'message' => 'No messages selected'];
        }
        
        if ($this->messageModel->deleteMessages($ids)) {
            return ['success' => true, 'message' => 'Messages deleted successfully'];
        }
        
        return ['success' => false, 'message' => 'Failed to delete messages'];
    }
    
    // Get a single message by ID
    public function getMessageController($id)
    {
        $message = $this->messageModel->getMessageById($id);
        
        if ($message) {
            // Mark as read if it's new
            if ($message['status'] === 'New') {
                $this->messageModel->markAsRead($id);
            }
            
            // Format the date
            $created = new DateTime($message['created_at']);
            $message['formatted_date'] = $created->format('M d, Y h:i A');
            
            return ['success' => true, 'message' => $message];
        }
        
        return ['success' => false, 'message' => 'Message not found'];
    }
}