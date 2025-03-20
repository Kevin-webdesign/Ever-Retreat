<!DOCTYPE html>
<html lang="en">

<?php include("../../../layouts/header.php"); ?>

<body>
    <style>
        .fancybox-content {
          width: 90vw;
          height: 80vh;
          margin-top: 80px;
          max-width: 90vw;  /* Limit width to 90% of viewport width */
          max-height: 95vh; /* Limit height to 80% of viewport height */
          margin: 0 auto;   /* Center horizontally */
          border-radius: 4px;
          overflow: hidden;
          box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }
        
        .fancybox-slide {
          display: flex;
          align-items: center;
          justify-content: center;
          padding: 0;
        }
        
        /* Video element styling */
        .fancybox-video {
          width: 100%;
          height: 100%;
          object-fit: contain;
          background: rgba(0, 0, 0, 0.3);
        }
        
        /* Animation for open/close transitions */
        .fancybox-container {
          opacity: 0;
          transition: opacity 0.4s ease;
        }
        
        .fancybox-is-open {
          opacity: 1;
        }
        
        /* Mobile-specific enhancements */
        @media screen and (max-width: 768px) {
          .fancybox-content {
            width: 90vw!important;
            height: 80vh!important;
            margin-top: 20px;
            max-width: 95vw;
            max-height: 60vh;
          }
          
          .fancybox-caption {
            padding: 12px;
            font-size: 14px;
          }
          
          .fancybox-toolbar {
            opacity: 1;
          }
        }
        
        /* Improved caption styling */
        .fancybox-caption {
          background: rgba(0, 0, 0, 0.75);
          padding: 15px;
          text-align: center;
        }
        /* Custom FancyBox styling for videos */
        
    </style>
    <!-- Navbar -->
    <?php include("../../../layouts/navbar.php"); ?>



    <!-- Hero Section -->
    <div class="hero-content text-white text-center vh-100">
        <!-- Video Background -->
        <div class="video-background">
            <video autoplay muted loop playsinline>
                <source src="../../../assets/video/EverRetreatInvestment.mp4" type="video/mp4">
            </video>
        </div>
        <div class="container" id="Booking">
            <h1 class="display-4 mb-4">B&P Ever Retreat Beach Villa</h1>
            <p class="lead mb-5">Welcome to our Master Suite, where time slows down and the elegance of simplicity
                flourishes.</p>

            <!-- Centered Booking Form at Bottom -->
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12">
                    <div class="booking-form p-4 bg-dark bg-opacity-75 rounded">
                        <div class="cs-reservation-form style-banner-3 style-banner cs-form-square inline-label">
                            <form class="cs-form-wrap" data-date-format="DD-MM-YYYY" id="myForm" method="POST">
                                <div class="cs-form-field cs-check-in">
                                    <div class="field-wrap">
                                        <label class="cs-form-label">Check In</label>

                                        <div class="field-input-wrap checkin-date">
                                            <input type="text" value="" readonly="" placeholder="04-01-2024"
                                                class="check-in-date" id="start" name="start" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="cs-form-field cs-check-out">
                                    <div class="field-wrap">
                                        <label class="cs-form-label">Check Out</label>

                                        <div class="field-input-wrap checkout-date">
                                            <input type="text" value="" readonly="" placeholder="03-04-2024"
                                                class="check-in-date" id="end" name="end" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="cs-form-field cs-guests cs-has-dropdown">
                                    <div class="field-wrap">
                                        <label class="cs-form-label">Guests</label>

                                        <div class="field-input-wrap has-dropdown">
                                            <input type="text" name="guest" id="guest" value="1 Adult, 0 Child"
                                                style="cursor: pointer;" readonly="">
                                        </div>

                                        <div class="csf-dropdown is-open" style="display: none;">
                                            <div class="csf-dropdown-item">
                                                <label class="cs-form-label">Adult</label>

                                                <div class="quantity cs-quantity" data-label="adult">
                                                    <label class="screen-reader-text">Adults quantity</label>
                                                    <span class="minus" id="decreaseAdults"></span>
                                                    <input type="text" name="adult-quantity" id="adults" value="1"
                                                        min="1" required="" class="input-text" autocomplete="off"
                                                        readonly="" data-min="1" data-max="50">
                                                    <span class="plus" id="increaseAdults"></span>
                                                </div>
                                            </div>
                                            <div class="csf-dropdown-item">
                                                <label class="cs-form-label">Child</label>

                                                <div class="quantity cs-quantity" data-label="child">
                                                    <label class="screen-reader-text">Children quantity</label>
                                                    <span class="minus" id="decreaseKids"></span>
                                                    <input type="text" name="child-quantity" id="kids" onchange=""
                                                        value="0" class="input-text" autocomplete="off" readonly=""
                                                        data-min="0" data-max="50">
                                                    <span class="plus" id="increaseKids"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cs-form-field cs-submit">
                                    <div class="field-wrap">
                                        <button class="button book-now-btn2" role="button" style="z-index: 0;" type="submit">
                                            <span class="btn-text">Book Now</span>
                                        </button>
                                    </div>
                                </div>
                                <input type="hidden" name="search_rooms" value="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="new ">
        <div class="row holder">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="title-p">About us</p>
                        <h5 class="head-title"><b>Welcome to <span class="color-primary">Everretreat</span>, The Best
                                Destination for Tranquility</b>
                        </h5>
                        <a href="../../../modules/General/views/aboutus.php" class="btn book-now-btn text-white">More
                            About us &nbsp;&nbsp;<i class="bi bi-arrow-right"></i></a>
                    </div>
                    <div class="col-md-6">
                        <p class="head-text">There are two types of travelers: trend-seekers and those chasing the
                            unexpected. Our accommodations
                            offer the best of both - luxury and discovery.</p>
                        <hr>
                        <div class="row d-flex">
                            <div class="col-md">
                                <h1>150k +</h1>
                                <p>Guests Served</p>
                            </div>
                            <div class="col-md">
                                <h1>24</h1>
                                <p>Villas & Resorts</p>
                            </div>
                            <div class="col-md">
                                <h1>06 +</h1>
                                <p>Years of Experience</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="location-row ev-container">

                <!-- HTML Structure -->
                <div class="ab-col-4 margin-right-img">
                    <div class="video-player">
                        <img src="../../../assets/image/first.jpg" alt="Video Thumbnail" class="video-thumbnail">
                        <a href="../../../assets/video/Ever-short-vid.mp4" class="play-button js-fancybox"
                            data-fancybox>
                            <i class="bi bi-play-fill"></i>
                        </a>
                    </div>
                </div>
                <div class="ab-col-8 about-img">
                    <img src="../../../assets/image/second.jpg" alt="">
                </div>
            </div>
            <div class="location-row text-center mt-5 marg-50">
                <div class="col-md-12">
                    <p class="title-p"><span>Our Accommodation</span></p>
                    <h4 style="font-weight: bold;">Find the Perfect Space for Your Stay</h4>
                    <div class="content">
                        <p style="font-size: 12px">
                            The resort offers a total of 139 suites and villas and a wide range of facilities, services,
                            and activities to <br>its guests in an effort to provide a peaceful and tranquil
                            environment.
                        </p>
                    </div>
                </div>
            </div>
            <div class="location-row">
                <div class="col-md-6 vh80">
                    <img class="img-responsive" src="../../../assets/image/firstb.png">
                </div>
                <div class="col-md-6">
                    <div class="content-1">
                        <h5><b>B&P Beach Villa</b></h5>
                        <p>
                            Welcome to our Master Suite, where time slows down
                            and the elegance of simplicity flourishes. Our Master Suite accommodates
                            up to two guests, featuring a luxurious jacuzzi with
                            a stunning view of Lake Kivu. This 45-square-meter
                            retreat offers a serene escape, complete with a king-sized
                            pillow top bed and a bathroom with both a tub and shower.
                            Indulge in our top-notch amenities, including a flat-screen TV with
                            satellite channels, wireless internet, Elenis bath amenities, a hair
                            dryer, and cozy bathrobe and slippers. Enjoy the convenience of a
                            work desk and chair, 24-hour room service, and air conditioning.
                            Experience unparalleled comfort and tranquility in our Master Suite.</p>
                        <button class="btn more-btn text-white">Discover More <i
                                class="fas fa-long-arrow-alt-right"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row text-center mt-5 mb-5">
                <div class="col-md-12">
                    <p class="title-p"><span>Our Location</span></p>
                    <h5 style="font-weight: bold;">Explore Our Best Location for an Unforgettable Vacation</h5>
                </div>
            </div>
            <div class="content mafoto location-row">
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
                            <p>Musanze, surrounded by misty volcanic peaks, calls to adventurers and nature lovers
                                alike.</p>
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
                            <p>Nyungwe Forest, a timeless sanctuary, offers breathtaking beauty and rich biodiversity.
                            </p>
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
                            <p>Huye is where history and innovation meet. Sit with local elders under ancient trees,
                                hearing tales of Rwanda's journey through time.</p>
                        </div>
                        <a href="../../../modules/General/views/location_huye.php" class="link-circle">
                            <i class="fa fa-arrow-right diagonal"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4 " style="position: relative;">
            <div class="col-md-12 elevetor1">

            </div>
            <div class="col-md-12 elevetor2">
                <div class="img">
                    <img src="../../../assets/image/dsc_9633.jpg" alt="fresh">
                    <div class="after-det2 d-flex">
                        <h4 class="ev-title">Elevate Your stay with Premium <br>Features and Services</h4>
                    </div>
                    <a href="#" class="link-circle2">
                        <i class="bi bi-arrow-up-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row text-center message marg-50">
            <div class="col-md-12">
                <p class="title-p"><span>Testimonials</span></p>
                <h5>What Are Guests Saying ? </h5>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="testimonial-slider" class="owl-carousel">
                        <div class="testimonial">
                            <div class="pic">
                                <img src="../../../assets/img/profile2.jpg">
                            </div>
                            <h3 class="title">Williamson</h3>
                            <span class="post">Customer</span>
                            <p class="description">
                                Staying at Ever Retreat was an unforgettable experience.
                                The attention to detail in the architecture, the serene environment, and the commitment
                                to sustainability made it stand out from any other place I’ve visited in Rwanda. It’s
                                not just a retreat; it’s a movement towards responsible tourism.
                                I left feeling refreshed and deeply inspired by the vision behind this place. Highly
                                recommended for anyone looking to escape the ordinary!
                            </p>
                        </div>

                        <div class="testimonial">
                            <div class="pic">
                                <img src="../../../assets/img/Pamela.jpg">
                            </div>
                            <h3 class="title">Pamella</h3>
                            <span class="post">Customer</span>
                            <p class="description">
                                Ever Retreat is truly a hidden gem! From the moment I arrived, I felt an overwhelming
                                sense of peace and connection with nature.
                                The eco-friendly design is breathtaking, blending luxury with sustainability in a way
                                I’ve never experienced before.
                                The staff were incredibly warm, and it was inspiring to see how the retreat empowers the
                                local community.
                                This is more than just a getaway—it’s a meaningful experience that leaves a lasting
                                impact. I can’t wait to return.
                            </p>
                        </div>
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

    <!-- TEST POP UP VIDEO -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script> -->

    <script>

        $(document).ready(function() {
            $("[data-fancybox]").fancybox({
              // Core settings
              buttons: ["play", "close"],
              animationEffect: "zoom",
              animationDuration: 400,
              
              // Video settings
              youtube: { controls: 1, showinfo: 0 },
              vimeo: { color: "f00" },
              
              // Responsive behavior
              responsive: true,
              autoFocus: false,
              
              // Center content
              centerOnScroll: true,
              
              // Mobile settings
              mobile: {
                clickContent: "close",
                clickSlide: "close",
                touch: {
                  vertical: true,
                  momentum: true
                }
              },
              
              // Prevent scrolling behind modal
              beforeShow: function() {
                $('body').css('overflow', 'hidden');
              },
              afterClose: function() {
                $('body').css('overflow', 'visible');
              }
            });
          });
    </script>

    <script>
        // document.addEventListener('DOMContentLoaded', function () {
        //     const playButtons = document.querySelectorAll('.play-button');

        //     playButtons.forEach(button => {
        //         button.addEventListener('click', function () {
        //             const videoId = this.getAttribute('data-video-id');
        //             const youtubeUrl = `https://www.youtube.com/watch?v=${videoId}`;
        //             window.open(youtubeUrl, '_blank');
        //         });
        //     });
        // });

        $(document).ready(function () {
            $("#testimonial-slider").owlCarousel({
                items: 2,
                itemsDesktop: [1000, 2],
                itemsDesktopSmall: [979, 2],
                itemsTablet: [768, 1],
                pagination: true,
                navigation: false,
                autoplay: true
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            function updateGuestField() {
                var adults = $('#adults').val();
                var kids = $('#kids').val();
                $('#guest').val(adults + ' Adult, ' + kids + ' Child');
            }

            $('#increaseAdults').click(function() {
                $('#adults').val(parseInt($('#adults').val()) + 1);
                updateGuestField();
            });

            $('#decreaseAdults').click(function() {
                if ($('#adults').val() > 0) {
                    $('#adults').val(parseInt($('#adults').val()) - 1);
                }
                updateGuestField();
            });

            $('#increaseKids').click(function() {
                $('#kids').val(parseInt($('#kids').val()) + 1);
                updateGuestField();
            });

            $('#decreaseKids').click(function() {
                if ($('#kids').val() > 0) {
                    $('#kids').val(parseInt($('#kids').val()) - 1);
                }
                updateGuestField();
            });
        });

        $(document).ready(function() {
            // When the input field is clicked
            $('#guest').on('click', function(event) {
                event.stopPropagation(); // Prevent the click from bubbling up
                $('.csf-dropdown.is-open').css('display', 'block'); // Change display to none
            });
        
            // When the input field is clicked
            $('.csf-dropdown.is-open').on('mouseleave', function(event) {
                event.stopPropagation(); // Prevent the click from bubbling up
                $('.csf-dropdown.is-open').css('display', 'none'); // Change display to none
            });
        });
        $(function() {
            var start = $('#start');
            var end = $('#end');

            $('#start').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                },
                minDate: new Date() // Disable past dates
            });
            $('#end').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                },
                minDate: new Date() // Disable past dates
            });

            $('input').on('apply.daterangepicker', function(ev, picker) {
                start.val(picker.startDate.format('YYYY-MM-DD'));
                end.val(picker.endDate.format('YYYY-MM-DD'));
            });

            $('input').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        });
    </script>

</body>

</html>