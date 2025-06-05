<?php
require_once '../../../helpers/JWTHandler.php';
require_once '../../../config/database.php';

header('Content-Type: application/json');

// Authentication check (same as above)
// ...

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(400);
    die(json_encode(['error' => 'Bad request']));
}

$db = Database::getInstance();

try {
    $title = $_POST['title'] ?? '';
    $shortDescription = $_POST['short_description'] ?? '';
    $durationDays = $_POST['duration_days'] ?? 1;
    $displayOrder = $_POST['display_order'] ?? 0;
    $isActive = isset($_POST['is_active']) ? 1 : 0;
    
    // Handle file upload
    $imagePath = '';
    if (isset($_FILES['main_image']) && $_FILES['main_image']['error'] == 0) {
        $uploadDir = '../../../assets/image/';
        $fileExt = strtolower(pathinfo($_FILES['main_image']['name'], PATHINFO_EXTENSION));
        $fileName = 'PKG_' . time() . '_' . uniqid() . '.' . $fileExt;
        $targetPath = $uploadDir . $fileName;
        
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        if (in_array($fileExt, $allowedTypes)) {
            if (move_uploaded_file($_FILES['main_image']['tmp_name'], $targetPath)) {
                $imagePath = $fileName;
            }
        }
    }
    
    if (empty($imagePath)) {
        http_response_code(400);
        die(json_encode(['error' => 'Valid image file is required']));
    }
    
    $stmt = $db->prepare("INSERT INTO tourism_packages 
                         (title, short_description, main_image, duration_days, display_order, is_active) 
                         VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$title, $shortDescription, $imagePath, $durationDays, $displayOrder, $isActive]);
    
    echo json_encode(['message' => 'Package added successfully']);
} catch (PDOException $e) {
    http_response_code(500);
    die(json_encode(['error' => 'Database error: ' . $e->getMessage()]));
}