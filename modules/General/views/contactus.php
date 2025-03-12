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
                <source
                    src="../../../assets/video/short_inside.mp4"
                    type="video/mp4">
            </video>
        </div>
        <div class="container-top">
            <h1 class="display-4">Contact Us</h1>
        </div>
    </div>
<!-- Contact Header Section -->
<section class="contact-header">
        <div class="container">
            <h6>Get in touch</h6>
            <h1>Don't hesitate to contact us for more information.</h1>
        </div>
    </section>

    <!-- Contact Info Cards Section -->
    <section class="world-map-bg" style="background-image: url('../../../assets/image/footer-map.png');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 col-lg-3">
                    <div class="contact-info-card">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h5 class="contact-info-title">Our Email</h5>
                        <p class="contact-info-text">info@everretreat.com</p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="contact-info-card">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h5 class="contact-info-title">Our Address</h5>
                        <p class="contact-info-text">Kigali, Rwanda</p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="contact-info-card">
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <h5 class="contact-info-title">Our Phone</h5>
                        <p class="contact-info-text">+250 788846668</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Form and Map Section -->
    <section>
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-6">
                    <div class="contact-form">
                        <h2>Fill out the Request Form</h2>
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="c-form-control" placeholder="Your Name">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="c-form-control" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="c-form-control" placeholder="Your Name">
                                </div>
                                <div class="col-md-6">
                                    <input type="tel" class="c-form-control" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <textarea class="c-form-control" placeholder="Your Message"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-submit">
                                        Send Message <i class="fas fa-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="map-container">
                        <!-- Replace this iframe with your actual Google Maps embed code -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63799.41004956211!2d30.03955566953125!3d-1.9440562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca4258ed8e797%3A0xf32b36a5411e0e7e!2sKigali%2C%20Rwanda!5e0!3m2!1sen!2sus!4v1614926548897!5m2!1sen!2sus" 
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="map-container">
                    <iframe style="height: 400px; width: 100%;" src="https://www.openstreetmap.org/export/embed.html?bbox=30.05815386772156%2C-1.947573777669934%2C30.06020843982697%2C-1.946024355699963&amp;layer=mapnik" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?#map=19/-1.946799/30.059181">View Larger Map</a></small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.5159553475164!2d30.056990474967098!3d-1.9465655980357923!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca4240db7b3f5%3A0x5256fd511623ef15!2sMakuza%20Peace%20Plaza!5e0!3m2!1sen!2srw!4v1741457610139!5m2!1sen!2srw&t=k" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <div id="map" style="border: solid 2px red;"></div>
                </div>
            </div>
        </div>
    </section>

    <div class="new mb-5">
        <div class="row d-flex" style="margin: 60px; border: solid 2px red;">
            
        </div>
        <?php
            include("../../../layouts/footer.php");
        ?>
    </div>


    <!-- ADDING JAVASCRIPTS -->
    <?php include("../../../layouts/scripts.php"); ?>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUd3yrAhSHE-ecKWcrdyLfd-aI5WPUGFk"></script>
    <script>
    function initMap() {
    // Create a map object and specify the DOM element for display.
    var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -1.7638287544250488, lng: 29.275720596313477},
    zoom: 17,
    mapTypeId: 'satellite' // This sets the default view to satellite
    });
    var marker = new google.maps.Marker({
    position: {lat: -1.7638287544250488, lng: 29.275720596313477},
    map: map,
    title: 'B&P Beach Villa'
    });
    }
    initMap();
    console.log("map: ",map);
    </script>

</body>

</html>