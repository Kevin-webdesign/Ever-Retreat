<?php
    require_once '../../../config/database.php';

    // Initialize database
    $db = Database::getInstance();

    // Fetch all dynamic content
    $locations = $db->query("SELECT * FROM locations WHERE is_active = TRUE ORDER BY display_order")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<!-- HEADER LINKS -->
<?php include("../../../layouts/header.php"); ?>

<body>
    <!-- Navbar -->
    <?php include("../../../layouts/navbar.php"); ?>
    <!-- End navbar -->

    <div class="hero-content text-white text-center vh-100">
        <!-- Video Background -->
        <div class="video-background">
            <video autoplay muted loop playsinline>
                <source src="../../../assets/video/EverRetreatTourism.mp4" type="video/mp4">
            </video>
        </div>
        <div class="container-top">
            <h1 class="display-4">Tourism</h1> 
        </div>
    </div>

    <div class="new mb-5">
        <div class="row d-flex marg-60">
            <div class="row text-center mb-5">
                <div class="col-md-12">
                    <p style="font-size: 20px;"><span>Our Location</span></p>
                    <h4 style="font-weight: bold;font-size: 23px;">Explore Our Best Location for an Unforgettable
                        Vacation</h4>
                </div>
            </div>
            <div class="content location-row">
                <?php foreach ($locations as $location): ?>
                    <div class="image loc-col-<?php echo ($location['display_order'] == 2 || $location['display_order'] == 4) ? '5' : '3'; ?> margin-right-img margin-btm-img">
                        <div class="img">
                            <?php if (!empty($location['image_path'])): ?>
                            <img src="../../../assets/image/<?php echo htmlspecialchars($location['image_path']); ?>" alt="<?php echo htmlspecialchars($location['name']); ?>" class="img-fluid">
                            <?php endif; ?>
                            <div class="details">
                                <h6><?php echo htmlspecialchars($location['name']); ?></h6>
                                <p><?php echo htmlspecialchars($location['tagline']); ?></p>
                            </div>
                            <div class="after-det text-white">
                                <h6><?php echo htmlspecialchars($location['name']); ?></h6>
                                <p><?php echo htmlspecialchars($location['description']); ?></p>
                            </div>
                            <a href="../../../modules/General/views/location_x.php?id=<?php echo $location['id']; ?>" class="link-circle">
                                <i class="fa fa-arrow-right diagonal"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
        include("../../../layouts/footer.php");
        ?>
    </div>


    <!-- ADDING JAVASCRIPTS -->
    <?php include("../../../layouts/scripts.php"); ?>

</body>

</html>