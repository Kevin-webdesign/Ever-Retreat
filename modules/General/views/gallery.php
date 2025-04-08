<?php
        // Database connection
        require_once '../../../config/database.php';
        $db = Database::getInstance();
        
        // Fetch gallery images from database
        $query = "SELECT * FROM gallery WHERE status = 'active' ORDER BY id DESC";
        $statement = $db->prepare($query);
        $statement->execute();
        $images = $statement->fetchAll(PDO::FETCH_ASSOC);
        ?>
<!DOCTYPE html>
<html lang="en">

<!-- HEADER LINKS -->
<?php include("../../../layouts/header.php"); ?>

<body>
    <!-- Navbar -->
    <?php include("../../../layouts/navbar.php"); ?>
    <!-- End navbar -->

    <div class="hero-content2 text-white text-center vh-50">
        <!-- Video Background -->
        <div class="video-background2">
            <!-- <video autoplay muted loop playsinline>
                <source src="../../../assets/video/EverRetreatInvestment.mp4" type="video/mp4">
            </video> -->
            <div class="gallery-pic vh-50" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(../../../assets/image/Gallely-1.jpg) no-repeat center center; background-size:cover"></div>
        </div>
        <div class="container-top2">
            <h1 class="display-4">Gallery</h1>
        </div>
    </div>

    <div class="new mb-5">

        <section class="about-section">
        <div class="container-fluid">
        <!-- <div class="gallery-header">
            <p>Explore our beautiful resort through these captivating images. Discover the luxury, comfort, and natural beauty that awaits you at EVERRETREAT.</p>
        </div> -->

        

        <div id="gallery">
            <?php 
            $count = 0;
            foreach ($images as $image): 
                $count++;
            ?>
                <div>
                    <img src="../../../uploads/gallery/<?php echo $image['image_path']; ?>" alt="<?php echo htmlspecialchars($image['title']); ?>" />
                    <a href="#lightbox-<?php echo $count; ?>"><?php echo htmlspecialchars($image['title']); ?></a>
                </div>
            <?php endforeach; ?>
        </div>

        <?php 
        // Create lightboxes for each image
        $count = 0;
        foreach ($images as $image): 
            $count++;
        ?>
            <div class="lightbox" id="lightbox-<?php echo $count; ?>">
                <div class="content">
                    <img src="../../../uploads/gallery/<?php echo $image['image_path']; ?>" alt="<?php echo htmlspecialchars($image['title']); ?>" />
                    <div class="title"><?php echo htmlspecialchars($image['title']); ?><br><small><?php echo htmlspecialchars($image['description']); ?></small></div>
                    <a class="close" href="#gallery"></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
        </section>
        <?php
        include("../../../layouts/footer.php");
        ?>
    </div>


    <!-- ADDING JAVASCRIPTS -->
    <?php include("../../../layouts/scripts.php"); ?>

</body>

</html>