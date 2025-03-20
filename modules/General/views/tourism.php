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
                <div class="image loc-col-3 margin-right-img">
                    <div class="img">
                        <img src="../../../assets/image/kigali.jpg" alt="Kigali" class="img-fluid">
                        <div class="details">
                            <h6>Kigali</h6>
                            <p>The heart of modern Rwanda</p>
                        </div>
                        <div class="after-det text-white">
                            <h6>Kigali</h6>
                            <p>Kigali pulses with Rwanda's dynamic transformation, where modernity meets culture.</p>
                        </div>
                        <a href="../../../modules/General/views/location_kigali.php" class="link-circle">
                            <i class="fa fa-arrow-right diagonal"></i>
                        </a>
                    </div>
                </div>
                <div class="image loc-col-5 margin-right-img">
                    <div class="img">
                        <img src="../../../assets/image/rubavu.jpg" alt="rubavu" class="img-fluid">
                        <div class="details">
                            <a href=""></a>
                            <h6>Rubavu</h6>
                            <p>The Serenity of Lake Kivu</p>
                        </div>
                        <div class="after-det text-white">
                            <h6>Rubavu</h6>
                            <p>Rubavu, offers an unmatched sense of the tranquility .</p>
                        </div>
                        <a href="../../../modules/General/views/location_rubavu.php" class="link-circle">
                            <i class="fa fa-arrow-right diagonal"></i>
                        </a>
                    </div>
                </div>
                <div class="image loc-col-3">
                    <div class="img">
                        <img src="../../../assets/image/musanze.jpg" alt="musanze" class="img-fluid">
                        <div class="details">
                            <h6>Musanze</h6>
                            <p>The Call of the Mountains</p>
                        </div>
                        <div class="after-det text-white">
                            <h6>Musanze</h6>
                            <p>Musanze, surrounded by misty volcanic peaks, calls to adventurers and nature lovers alike.</p>
                        </div>
                        <a href="../../../modules/General/views/location_musanze.php" class="link-circle">
                            <i class="fa fa-arrow-right diagonal"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="content location-row">
                <div class="image loc-col-5 margin-right-img">
                    <div class="img">
                        <img src="../../../assets/image/nyungwe.jpg" alt="nyungwe" class="img-fluid">
                        <div class="details">
                            <h6>Nyungwe</h6>
                            <p>The Soul of Tradition</p>
                        </div>
                        <div class="after-det text-white">
                            <h6>Nyungwe</h6>
                            <p>Nyungwe Forest, a timeless sanctuary, offers breathtaking beauty and rich biodiversity.</p>
                        </div>
                        <a href="../../../modules/General/views/location_nyungwe.php" class="link-circle">
                            <i class="fa fa-arrow-right diagonal"></i>
                        </a>
                    </div>
                </div>
                <div class="image loc-col-3 margin-right-img">
                    <div class="img">
                        <img src="../../../assets/image/nyanza.jpg" alt="Nyanza" class="img-fluid">
                        <div class="details">
                            <a href=""></a>
                            <h6>Nyanza</h6>
                            <p>The Trail of Kings</p>
                        </div>
                        <div class="after-det text-white">
                            <h6>Nyanza</h6>
                            <p>Nyanza, Tradition thrives through cultural experiences.</p>
                        </div>
                        <a href="../../../modules/General/views/location_nyanza.php" class="link-circle">
                            <i class="fa fa-arrow-right diagonal"></i>
                        </a>
                    </div>
                </div>
                <div class="image loc-col-3">
                    <div class="img">
                        <img src="../../../assets/image/huye.jpg" alt="musanze" class="img-fluid">
                        <div class="details">
                            <h6>Huye</h6>
                            <p>The Wisdom of the History</p>
                        </div>
                        <div class="after-det text-white">
                            <h6>Huye</h6>
                            <p>Huye is where history and innovation meet. Sit with local elders under ancient trees, hearing tales of Rwanda's journey through time.</p>
                        </div>
                        <a href="../../../modules/General/views/location_huye.php" class="link-circle">
                            <i class="fa fa-arrow-right diagonal"></i>
                        </a>
                    </div>
                </div>
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