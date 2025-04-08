<?php
    require_once '../../../config/database.php';

    // Initialize database
    $db = Database::getInstance();

    // Fetch all dynamic content
    $hero = $db->query("SELECT * FROM homepage_hero LIMIT 1")->fetch(PDO::FETCH_ASSOC);
    $testimonials = $db->query("SELECT * FROM testimonials WHERE is_active = TRUE ORDER BY display_order")->fetchAll(PDO::FETCH_ASSOC);
    $accommodation = $db->query("SELECT * FROM accommodations WHERE is_active = TRUE ORDER BY display_order LIMIT 1")->fetch(PDO::FETCH_ASSOC);
    $locations = $db->query("SELECT * FROM locations WHERE is_active = TRUE ORDER BY display_order")->fetchAll(PDO::FETCH_ASSOC);
    $aboutUs = $db->query("SELECT * FROM about_us LIMIT 1")->fetch(PDO::FETCH_ASSOC);
    $premiumFeatures = $db->query("SELECT * FROM premium_features LIMIT 1")->fetch(PDO::FETCH_ASSOC);
?>
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
                <source src="../../../assets/video/<?php echo htmlspecialchars($hero['video_path']); ?>" type="video/mp4">
            </video>
        </div>
        <div class="container" id="Booking">
            <h1 class="display-4 mb-4"><?php echo htmlspecialchars($hero['title']); ?></h1>
            <p class="lead mb-5"><?php echo htmlspecialchars($hero['subtitle']); ?></p>

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
                        <h5 class="head-title"><b><?php echo $aboutUs['main_title']; ?></b></h5>
                        <a href="<?php echo htmlspecialchars($aboutUs['button_link']); ?>" class="btn book-now-btn text-white">
                            <?php echo htmlspecialchars($aboutUs['button_text']); ?> &nbsp;&nbsp;<i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <p class="head-text"><?php echo htmlspecialchars($aboutUs['description']); ?></p>
                        <hr>
                        <div class="row d-flex">
                            <div class="col-md">
                                <h1><?php echo htmlspecialchars($aboutUs['stats_value_1']); ?></h1>
                                <p><?php echo htmlspecialchars($aboutUs['stats_text_1']); ?></p>
                            </div>
                            <div class="col-md">
                                <h1><?php echo htmlspecialchars($aboutUs['stats_value_2']); ?></h1>
                                <p><?php echo htmlspecialchars($aboutUs['stats_text_2']); ?></p>
                            </div>
                            <div class="col-md">
                                <h1><?php echo htmlspecialchars($aboutUs['stats_value_3']); ?></h1>
                                <p><?php echo htmlspecialchars($aboutUs['stats_text_3']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="location-row ev-container">
                <!-- HTML Structure -->
                <div class="ab-col-4 margin-right-img">
                    <div class="video-player">
                        <?php if (!empty($aboutUs['image_path'])): ?>
                        <img src="../../../assets/image/<?php echo htmlspecialchars($aboutUs['image_path']); ?>" alt="About Us Image" class="video-thumbnail">
                        <?php endif; ?>
                        <?php if (!empty($aboutUs['video_path'])): ?>
                        <a href="../../../assets/video/<?php echo htmlspecialchars($aboutUs['video_path']); ?>" class="play-button js-fancybox" data-fancybox>
                            <i class="bi bi-play-fill"></i>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="ab-col-8 about-img">
                    <!-- You can add another image here if needed -->
                    <?php if (!empty($aboutUs['image_path_right'])): ?>
                        <img src="../../../assets/image/<?php echo htmlspecialchars($aboutUs['image_path_right']); ?>" alt="">
                    <?php endif; ?>
                </div>
            </div>
            <div class="location-row text-center mt-5 marg-50">
                <div class="col-md-12">
                    <p class="title-p"><span>Our Accommodation</span></p>
                    <h4 style="font-weight: bold;">Find the Perfect Space for Your Stay</h4>
                    <div class="content">
                        <p style="font-size: 16px">
                            The resort offers a total of 139 suites and villas and a wide range of facilities, services, and activities to
                            its guests in an effort to provide a peaceful and tranquil environment
                        </p>
                    </div>
                </div>
            </div>
            <div class="location-row">
                <div class="col-md-6 vh80">
                    <?php if (!empty($accommodation['image_path'])): ?>
                    <img class="img-responsive" src="../../../assets/image/<?php echo htmlspecialchars($accommodation['image_path']); ?>">
                    <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <div class="content-1">
                        <h5><b><?php echo htmlspecialchars($accommodation['title']); ?></b></h5>
                        <p><?php echo htmlspecialchars($accommodation['description']); ?></p>
                        <a href="<?php echo htmlspecialchars($accommodation['button_link']); ?>" class="btn more-btn text-white">
                            <?php echo htmlspecialchars($accommodation['button_text']); ?> <i class="fas fa-long-arrow-alt-right"></i>
                        </a>
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
                        <a href="<?php echo htmlspecialchars($location['link']); ?>" class="link-circle">
                            <i class="fa fa-arrow-right diagonal"></i>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- premium feature -->
        <div class="row mt-4 mb-2" style="position: relative;">
            <div class="col-md-12 elevetor1"></div>
            <div class="col-md-12 elevetor2">
                <div class="img">
                    <?php if (!empty($premiumFeatures['image_path'])): ?>
                    <img src="../../../assets/image/<?php echo htmlspecialchars($premiumFeatures['image_path']); ?>" alt="fresh">
                    <?php endif; ?>
                    <div class="after-det2 d-flex">
                        <h4 class="ev-title"><?php echo htmlspecialchars($premiumFeatures['title']); ?></h4>
                    </div>
                    <a href="<?php echo htmlspecialchars($premiumFeatures['link']); ?>" class="link-circle2">
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
                        <?php foreach ($testimonials as $testimonial): ?>
                        <div class="testimonial">
                            <div class="pic">
                                <?php if (!empty($testimonial['photo_path'])): ?>
                                <img src="../../../assets/img/<?php echo htmlspecialchars($testimonial['photo_path']); ?>">
                                <?php endif; ?>
                            </div>
                            <h3 class="title"><?php echo htmlspecialchars($testimonial['name']); ?></h3>
                            <span class="post"><?php echo htmlspecialchars($testimonial['title']); ?></span>
                            <p class="description">
                                <?php echo htmlspecialchars($testimonial['content']); ?>
                            </p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include("../../../layouts/footer.php"); ?>
    </div>

    <!-- ADDING JAVASCRIPTS -->
    <?php include("../../../layouts/scripts.php"); ?>

    <!-- TEST POP UP VIDEO -->
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