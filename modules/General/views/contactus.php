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
                <source src="../../../assets/video/contactus.mp4" type="video/mp4">
            </video>
        </div>
        <div class="container-top">
            <!-- <h1 class="display-4">Contact Us</h1> -->
        </div>
    </div>

    <div class="new mb-5">
        <div class="row d-flex marg-20 globe-bg">
            <div class="row text-center mb-5">
                <div class="col-md-12">
                    <p style="font-size: 20px;"><span>Get in Touch</span></p>
                    <h4 style="font-weight: bold;font-size: 23px;">Don't Hesitate to Contact us for more Information
                    </h4>
                </div>
            </div>
            <div class="content location-row">
                <div class="loc-col-12">
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
                            <div class="col-md-4 col-lg-6">
                                <div class="contact-info-card">
                                    <div class="contact-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <h5 class="contact-info-title">Our Address</h5>
                                    <p class="contact-info-text">
                                       <small style="font-size: 14px;"> M.peace plaza 3rd Floor Block B F331 ROOM;  
                                        KN 4 Ave, Kigali, Rwanda</small>
                                    </p>
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
                </div>
            </div>
            <div class="map-row">
                <div class="loc-col-7">
                    <div class="contact-form">
                        <h4>Fill out the Request Form</h4>
                        <form class="myContactForm" id="contactUsForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="names" id="names" class="c-form-control" placeholder="Your Name">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" id="email" class="c-form-control" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="tel" name="phone" id="phone" class="c-form-control" placeholder="Phone Number">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="subject" id="subject" class="c-form-control" placeholder="Subject">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea class="c-form-control" name="message" id="message" placeholder="Your Message"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" style="display: flex; justify-content: center; align-items: center;">
                                    <button type="submit" class="btn book-now-btn send-contact">
                                        Send Message <i class="fas fa-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="loc-col-5">
                    <div id="map" style="height: 100%; min-height: 400px;"></div>
                </div>
            </div>
        </div>
        <?php
        include("../../../layouts/footer.php");
        ?>
    </div>


    <!-- ADDING JAVASCRIPTS -->
    <?php include("../../../layouts/scripts.php"); ?>

    <!-- map scripts -->
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

    <script>
        $(document).ready(function() {
            $('#contactUsForm').on('submit', function(e) {
                e.preventDefault();

                // Check if there's any error before submitting

                let formData = {
                    names: $('#names').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    subject: $('#subject').val(),
                    message: $('#message').val()                    
                };
                console.log('names:' + formData.names +
                    ', email:' + formData.email + ', phone:' + formData.phone + ', subject:' + formData.subject
                    + ', message:' + formData.message);

                $.ajax({
                    type: 'POST',
                    url: '../../Contactus/api/messagesApi.php?action=new_message',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            // Use SweetAlert for success message
                            Swal.fire({
                                icon: 'success',
                                title: 'MESSAGE SENT!',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                window.location.href =
                                    '../../General/views/contactus.php'; // Redirect after success
                            });
                        } else {
                            // Use SweetAlert for error message
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response.message
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Something went wrong. Please try again. ' + status +
                                ' ' + error
                        });
                    }
                });


            });
        });
    </script>
</body>

</html>