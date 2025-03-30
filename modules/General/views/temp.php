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
                <source src="../../../assets/video/short_inside.mp4" type="video/mp4">
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
                    <div id="map" style="height: 100%; min-height: 400px;"></div>
                </div>
            </div>
        </div>
    </section>

    <div class="new mb-5">
        <div class="row d-flex" style="margin: 60px; border: solid 2px red;">
            
        </div>
        <?php include("../../../layouts/footer.php"); ?>
    </div>

    <!-- ADDING JAVASCRIPTS -->
    <?php include("../../../layouts/scripts.php"); ?>

    <!-- Google Maps API -->
    <script>
    function initMap() {
        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -1.7638287544250488, lng: 29.275720596313477},
            zoom: 18,  // Increased zoom level for better detail
            mapTypeId: 'satellite', // This sets the default view to satellite
            tilt: 0    // Ensures straight-down satellite view
        });
        
        // Create a marker
        var marker = new google.maps.Marker({
            position: {lat: -1.7638287544250488, lng: 29.275720596313477},
            map: map,
            title: 'B&P Beach Villa',
            icon: {
                url: "https://maps.google.com/mapfiles/ms/icons/red-dot.png" // Custom marker icon
            }
        });
    }
    
    // Load the map after the window loads
    window.onload = function() {
        initMap();
    };
    </script>
    
    <!-- Load Google Maps API with callback -->
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUd3yrAhSHE-ecKWcrdyLfd-aI5WPUGFk&callback=initMap">
    </script>

</body>
</html>