<!DOCTYPE html>
<html lang="en">

<!-- HEADER LINKS -->
<?php include("../../../layouts/header.php"); 

// Include database configuration
require_once '../../../config/database.php';

// Get location ID from URL parameter
$location_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Initialize database
$db = Database::getInstance();

// Fetch location data based on ID
if ($location_id > 0) {
    $location = $db->prepare("SELECT * FROM locations WHERE id = ? AND is_active = 1 LIMIT 1");
    $location->execute([$location_id]);
    $locationData = $location->fetch(PDO::FETCH_ASSOC);
} else {
    // Redirect to locations page if no valid ID provided
    header("Location: ../../../index.php");
    exit;
}

// Fetch other locations for the bottom section
$otherLocations = $db->query("SELECT * FROM locations WHERE id != $location_id AND is_active = 1 ORDER BY display_order LIMIT 4")->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <!-- Navbar -->
    <?php include("../../../layouts/navbar.php"); ?>
    <!-- End navbar -->

    <div class="hero-content2 text-white text-center vh-90">
        <!-- Video Background -->
        <div class="video-background2" style="height: 100%;">
            <div class="gallery-pic vh-100"
                style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(../../../assets/image/<?php echo htmlspecialchars($locationData['image_path']); ?>) no-repeat center center; background-size:cover">
            </div>
        </div>
        <div class="container-top">
            <h1 class="display-4"><?php echo htmlspecialchars($locationData['title']); ?></h1>
        </div>
    </div>


    <div class="new mb-5">
        <section class="about-section">
            
            <div class="x-container">
                <div class="x-title">
                    <div class="tit">
                        <p class="subtitle">Location</p>
                        <h5><?php echo htmlspecialchars($locationData['name']); ?>: <?php echo htmlspecialchars($locationData['tagline']); ?></h5>
                    </div>
                </div>
                <div class="x-content" style="padding:10px; font-size: 14px; text-align: justify;">
                    <div class="x-img">
                        <?php echo $locationData['full_description']; ?>
                    </div>
                </div>
            </div>

            <div class="x-container">
                <div class="x-content">
                    <div class="x-img">
                        <img src="../../../assets/image/<?php echo htmlspecialchars($locationData['image_path2']); ?>" alt="<?php echo htmlspecialchars($locationData['name']); ?>">
                    </div>
                </div>
                <div class="vison-title">
                    <div>
                        <h3 class="mt-5">What Inspired Us</h3>
                        <p><?php echo nl2br(htmlspecialchars($locationData['inspired_us'])); ?></p>
                    </div>
                </div>
            </div>
            
            <div class="x-container">
                <div class="x-title">
                    <div>
                        <h3>What We Love About <?php echo htmlspecialchars($locationData['name']); ?></h3>
                        <p><?php echo $locationData['love_about']; ?></p>
                    </div>
                </div>
                <div class="x-content">
                    <div class="x-img">
                        <img src="../../../assets/image/<?php echo htmlspecialchars($locationData['image_path3']); ?>" alt="<?php echo htmlspecialchars($locationData['name']); ?>">
                    </div>
                </div>
            </div>
        </section>

        <div class="container mt-5">
            <h3 class="text-center mb-4">Explore Other Locations</h3>
        </div>
        
        <div class="content location-row">
            <?php foreach ($otherLocations as $otherLocation): ?>
            <div class="image loc-col-3">
                <div class="img">
                    <img src="../../../assets/image/<?php echo htmlspecialchars($otherLocation['image_path']); ?>" alt="<?php echo htmlspecialchars($otherLocation['name']); ?>" class="img-fluid">
                    <div class="details">
                        <h6><?php echo htmlspecialchars($otherLocation['name']); ?></h6>
                        <p><?php echo htmlspecialchars($otherLocation['tagline']); ?></p>
                    </div>
                    <div class="after-det text-white">
                        <h6><?php echo htmlspecialchars($otherLocation['name']); ?></h6>
                        <p><?php echo htmlspecialchars($otherLocation['description']); ?></p>
                    </div>
                    <a href="location_x.php?id=<?php echo $otherLocation['id']; ?>" class="link-circle">
                        <i class="fa fa-arrow-right diagonal"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php
        include("../../../layouts/footer.php");
        ?>
    </div>


    <!-- ADDING JAVASCRIPTS -->
    <?php include("../../../layouts/scripts.php"); ?>

</body>

</html>