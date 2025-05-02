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
        .modal-lg {
            max-width: 800px;
        }
        
        .modal-content {
            /* border-radius: 4px; */
            border: none;
        }
        
        .modal-header {
            background-color:rgba(37, 33, 21, 0.64);
            color: white;
            border-bottom: none;
        }
        
        .modal-header h5 {
            font-size: 12px;
            font-weight: 300;
        }
        
        .modal-title {
            font-weight: bold;
            font-size: 15px;
        }
        
        .btn-close {
            color: white;
        }
        
        .wrap-input100b {
            margin-top: 15px;
        }
        
        /* Fix for the booking modal to be properly styled */
        #bookingModal .wrap-contact100 {
            padding: 20px 0;
        }
        
        #bookingModal .container-contact100 {
            min-height: auto;
        }
        
        #bookingModal .bg1 {
            background-color: #f7f7f7;
            margin-bottom: 15px;
        }
        
        #bookingModal .bg0 {
            background-color: #f7f7f7;
        }

        #bookingFormPopup input, 
        #bookingFormPopup textarea {
            color:rgba(19, 18, 18, 0.75)!important;
        }
        .label-input100{
            font-size: 13px;
            padding-left: 10px;
            padding-right: 20px;
        }

        /* RESERVATION INDEX FORM */
        .booking-form {
            background: rgba(30, 30, 30, 0.7);
            backdrop-filter: blur(10px);
            width: 100%;
            max-width: 1200px;
            padding: 20px;
            margin: 0 auto;
            border-radius: 0;
        }
        
        .booking-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            align-items: center;
        }
        
        .booking-field {
            position: relative;
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            height: 50px;
        }
        
        .booking-label {
            display: inline-block;
            color: rgba(255, 255, 255, 0.7);
            font-size: 9px;
            font-weight: 200;
            opacity: 0.7;
            padding-left: 15px;
            width: 35%;
        }
        
        .booking-input {
            width: 65%;
            flex: 1;
            height: 100%;
            background: transparent;
            border: none;
            color: #fff;
            padding: 0 12px;
            font-size: 11px;
            text-align: right;
            cursor: pointer;
        }
        
        .booking-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }
        
        .book-now-btn {
            width: 100%;
            height: 50px;
            background-color: #b8945e;
            border: none;
            color: white;
            font-weight: 600;
            font-size: 12px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .btneve-primary {
            max-width: 60%;
            height: 38px;
            background-color: #b8945e;
            border: none;
            border-radius: 0px;
            color: white;
            font-weight: 300;
            font-size: 13px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            align-content: center;
        }
        
        .book-now-btn:hover, .btneve-primary:hover {
            background-color: #9e7e4d;
        }
        
        /* Dropdown styles */
        .guest-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background: #fff;
            border: 1px solid #ddd;
            border-top: none;
            z-index: 10;
            display: none;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .dropdown-item {
            margin-bottom: 10px;
        }
        
        .dropdown-item:last-child {
            margin-bottom: 0;
        }
        
        .quantity-control {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .quantity-btn {
            width: 30px;
            height: 30px;
            background: #f0f0f0;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }
        
        .quantity-input {
            width: 40px;
            height: 30px;
            text-align: center;
            border: 1px solid #ddd;
            margin: 0 10px;
        }
        .booking-form .csf-dropdown {
        position: absolute;
        bottom: -12px;
        left: -280px;
        -webkit-transform: translateY(100%);
        -ms-transform: translateY(100%);
        transform: translateY(100%);
        z-index: -1;
        display: block;
        min-width: 320px;
        background: #fff;
        color:rgb(0, 0, 0);
        border: 1px solid var(--dropdown-border);
        padding: 30px;
        transition: 0.3s;
        opacity: 0;
        pointer-events: none;
        visibility: hidden;
    }
    
    .booking-form .csf-dropdown.is-open {
        z-index: 999;
        opacity: 1;
        pointer-events: auto;
        visibility: visible;
    }
    
    .booking-form .csf-dropdown .csf-dropdown-item, .booking-form .csf-dropdown .cs-quantity {
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    
    .booking-form .csf-dropdown .csf-dropdown-item:not(:last-child) {
        margin-bottom: 15px;
    }
    
    .booking-form .csf-dropdown .cs-quantity .input-text {
        padding: 0;
        margin: 0;
        width: 40px;
        height: auto;
        background: none;
        border: none;
        text-align: center;
        color: inherit;
        font-size: 16px;
        line-height: 1.2;
    }
    
    .booking-form .csf-dropdown .cs-quantity .minus, .booking-form .csf-dropdown .cs-quantity .plus {
        position: relative;
        background: none;
        border: none;
        box-shadow: none;
        outline: none;
        width: 30px;
        height: 30px;
        padding: 0;
        color: inherit;
        text-align: center;
        line-height: 30px;
        cursor: pointer;
    }
    
    .booking-form .csf-dropdown .cs-quantity .minus:before, .booking-form .csf-dropdown .cs-quantity .minus:after, .booking-form .csf-dropdown .cs-quantity .plus:before, .booking-form .csf-dropdown .cs-quantity .plus:after {
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        display: block;
        content: "";
        background: currentColor;
    }
    
    .booking-form .csf-dropdown .cs-quantity .minus:before, .booking-form .csf-dropdown .cs-quantity .plus:before {
        width: 12px;
        height: 1px;
    }
    
    .booking-form .csf-dropdown .cs-quantity .plus:after {
        width: 1px;
        height: 12px;
    }
        
        /* For tablet view */
        @media (min-width: 768px) and (max-width: 1024px) {
            .booking-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .book-btn-container {
                grid-column: span 2;
            }
        }
        
        /* For mobile view */
        @media (max-width: 767px) {
            .booking-grid {
                grid-template-columns: 1fr;
                gap: 10px;
            }
            
            .booking-form {
                padding: 15px;
            }
            
            .booking-field {
                height: 45px;
            }
            
            .booking-label {
                font-size: 12px;
                width: 40%;
                padding-left: 10px;
            }
            
            .booking-input {
                font-size: 13px;
            }
            
            .book-now-btn {
                height: 45px;
            }
            
            .guest-dropdown {
                width: 100%;
                left: 0;
                right: 0;
            }
            .booking-form .csf-dropdown {
                margin-top: -200px;
                left: 10px;
                -webkit-transform: translateY(58%);
                -ms-transform: translateY(58%);
                transform: translateY(58%);
            }
        }
        /* RESERVATION FORM STYLE */
        .form-field {
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 2px;
            padding: 12px 15px;
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: solid 1px rgb(190, 155, 105);
            background-color:rgb(255, 255, 255);
        }
        
        .form-field label {
            font-size: 13px;
            color: #666;
        }
        
        .form-field .value {
            font-size: 13px;
            color:rgba(119, 110, 101, 0.66);
            font-weight: 500;
        }
        
        .form-field input,
        .form-field select,
        .form-field textarea {
            border: none;
            background: none;
            color: rgba(37, 36, 35, 0.66);
            font-size: 13px;
            font-weight: 500;
            text-align: right;
            outline: none;
            width: 70%;
            font-family: Poppins-Regular;
        }
        
        .form-field textarea {
            resize: vertical;
            min-height: 60px;
            border: 1px solid #eee;
            padding: 8px;
            width: 100%;
            margin-top: 10px;
            /* color: #333; */
        }
        
        .form-field input[type="date"] {
            font-family: inherit;
        }
        
        .form-row {
            display: flex;
            gap: 12px;
            margin-bottom: 12px;
        }
        
        .form-row .form-field {
            flex: 1;
            margin-bottom: 0;
        }
        
        .total-cost {
            width: 100%;
            padding: 15px;
            margin-top: 10px;
            margin-bottom: 20px;
            background: #f0f0f0;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .total-cost .cost-left {
            font-weight: 600;
            font-size: 16px;
        }
        
        .total-cost .cost-right {
            font-size: 18px;
            font-weight: 700;
            color: #b38749;
        }
        
        .contact100-form-btn {
            width: 100%;
            font-family: Poppins-Regular;
            padding: 14px;
            background-color: #b38749;
            color: white;
            border: none;
            border-radius: 0px;
            font-size: 13px;
            font-weight: 300;
            cursor: pointer;
            margin-top: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .contact100-form-btn:hover {
            background-color:rgb(160, 121, 67);
        }
        
        .container-contact100-form-btn {
            width: 100%;
        }
        
        .invalid-feedbacks {
            color:rgb(179, 66, 66);
            margin-top: 5px;
            font-size: 12px;
        }
        
        hr.hr {
            border: none;
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }
        
        /* Special style for date inputs to make them look consistent */
        input[type="date"]::-webkit-calendar-picker-indicator,
        input[type="date"]::-webkit-inner-spin-button {
            display: none;
            -webkit-appearance: none;
        }
        
        /* Mobile responsiveness */
        @media (max-width: 480px) {
            .reservation-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .price {
                margin-top: 5px;
            }
            
            .form-row {
                flex-direction: column;
                gap: 12px;
            }
            
            .form-field input,
            .form-field select {
                width: 60%;
            }
        }
            /* END RESERVATION FORM STYLE */

        .pd-left {
            padding-left: 36px
        }
        @media (max-width: 480px) {
            .pd-left {
            padding-left: 0px
            }
        }
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
        <div class="container" id="Booking" style="padding-left: 0px!important;padding-right: 0px!important;">
            <h1 class="display-4"><?php echo $hero['title']; ?></h1>
            <p class="lead"><?php echo $hero['subtitle']; ?></p>

            <!-- Centered Booking Form at Bottom -->
            <div class="row justify-content-center" style="">
                <div class="col-lg-12 col-md-12">
                    <!-- Booking Form -->
                    <div class="booking-form">
                        <form id="bookingForm">
                            <div class="booking-grid">
                                <div class="booking-field">
                                    <label class="booking-label">Check In</label>
                                    <input type="text" class="booking-input check-in-date" id="start" readonly placeholder="DD-MM-YYYY" value="04-01-2024">
                                </div>
                                
                                <div class="booking-field">
                                    <label class="booking-label">Check Out</label>
                                    <input type="text" class="booking-input check-in-date" id="end" readonly placeholder="DD-MM-YYYY" value="08-01-2024">
                                </div>
                                
                                <div class="booking-field">
                                    <label class="booking-label">Guests</label>
                                    <input type="text" class="booking-input" id="guest" readonly value="1 Adult, 0 Child">
                                </div>
                                
                                <div class="booking-field">
                                    <label class="booking-label">Select Villa</label>
                                    <!-- <input type="text" class="booking-input" id="villa" readonly placeholder="Choose Villa"> -->
                                    <select id="villa" name="villa" class="booking-input" style="color: white; background: transparent; border-radius:0px">
                                        <option value="">Choose Villa</option>
                                        <option value="Ever Retreat">Ever Retreat</option>
                                    </select>
                                    <!-- Guest dropdown placed outside the field to prevent layout issues -->
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
                                
                                    
                                <div class="book-btn-container">
                                    <button type="submit" class="book-now-btn" id="book_now">
                                        <span>Book Now</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="new ">
        <div class="row holder">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 pd-left">
                        <p class="title-p">About us</p>
                        <h5 class="head-title"><b><?php echo $aboutUs['main_title']; ?></b></h5>
                        <a href="<?php echo htmlspecialchars($aboutUs['button_link']); ?>" class="btn btneve-primary text-white">
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
                    <h5 style="font-weight: bold;">Find the Perfect Space for Your Stay</h5>
                    <div class="content">
                        <p style="font-size: 12px">
                            The resort offers a total of 139 suites and villas and a wide range of facilities, services, and activities to
                            <br> its guests in an effort to provide a peaceful and tranquil environment
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
                            <?php echo htmlspecialchars($accommodation['button_text']); ?> <i class="bi bi-arrow-right"></i>
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
                            <a href="../../../modules/General/views/location_x.php?id=<?php echo $location['id']; ?>" class="link-circle">
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

    <!-- Add this HTML code at the end of your body tag but before the scripts -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">Complete Your Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="block">
                            <form id="bookingFormPopup">
                                <!-- Villa Selection Field -->
                                <div class="form-field">
                                    <label for="villaPopup">Villa *</label>
                                    <select id="villaPopup" name="villa" required>
                                        <option value="Ever Retreat">Ever Retreat (Default)</option>
                                        <!-- <option value="Rubavu Villa">Rubavu Villa</option>
                                        <option value="Huye Villa">Huye Villa</option> -->
                                    </select>
                                </div>
                                
                                <!-- Date fields -->
                                <div class="form-field">
                                    <label for="startPopup">Check in *</label>
                                    <input type="date" id="startPopup" name="checkin" required>
                                </div>
                                
                                <div class="form-field">
                                    <label for="endPopup">Check out *</label>
                                    <input type="date" id="endPopup" name="checkout" required>
                                </div>
                                
                                <!-- Adults and Children - on same row -->
                                <div class="form-row">
                                    <div class="form-field">
                                        <label for="adultsPopup">Adults *</label>
                                        <input type="number" id="adultsPopup" name="adults" min="1" placeholder="2" required>
                                    </div>
                                    
                                    <div class="form-field">
                                        <label for="childPopup">Child <small style="color:#e03131">(under 11yrs)</small></label>
                                        <input type="number" id="childPopup" name="child" min="0" placeholder="0">
                                    </div>
                                </div>
                                
                                <!-- Personal Details -->
                                <div class="form-field">
                                    <label for="namesPopup">Full Name *</label>
                                    <input type="text" id="namesPopup" name="names" placeholder="Enter your full name" required>
                                </div>
                                
                                <!-- Email and Phone - on same row -->
                                <div class="form-row">
                                    <div class="form-field">
                                        <label for="emailPopup">Email *</label>
                                        <input type="email" id="emailPopup" name="email" placeholder="Your email address" required>
                                    </div>
                                    
                                    <div class="form-field">
                                        <label for="phonePopup">Phone *</label>
                                        <input type="text" id="phonePopup" name="phone" placeholder="Your phone number" required>
                                    </div>
                                </div>
                                
                                <!-- Special Requests / Message -->
                                <div class="form-field">
                                    <label for="messagePopup">Special Requests</label>
                                    <textarea id="messagePopup" name="message" placeholder="Any special requests or requirements?"></textarea>
                                </div>
                                
                                <!-- Total Cost Section -->
                                <div class="total-cost">
                                    <span class="cost-left">Total cost:</span>
                                    <span class="cost-right-popup">$0</span>
                                </div>
                                
                                <!-- Hidden fields for calculations -->
                                <div style="display:none;">
                                    <input type="text" name="addition_rate" id="addition_rate_popup">
                                    <input type="text" name="base_rate" id="base_rate_popup">
                                    <input type="text" name="addedGuest" id="addedGuest_popup">
                                    <input type="text" name="total_amount" id="total_amount_popup">
                                </div>
                                
                                <!-- Submit Button -->
                                <div class="container-contact100-form-btn">
                                    <button type="submit" class="contact100-form-btn">
                                        <span style="color: white;">
                                            Book Your Stay Now
                                        </span>
                                    </button>
                                    <div class="invalid-feedbacks" id="emailErrorPopup"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

        // Function to handle hover color change for select
        document.addEventListener('DOMContentLoaded', function() {
            const villaSelect = document.getElementById('villa');
            
            if (villaSelect) {
                // Add mouseover event listener
                villaSelect.addEventListener('mouseover', function() {
                    this.style.color = '#000';
                });
                
                // Add mouseout event listener
                villaSelect.addEventListener('mouseout', function() {
                    this.style.color = '#fff';
                });
            }
        });
    
    </script>

    <!-- booking scripts -->
    <script src="../../../assets/js/booking.js"></script>

</body>
</html>