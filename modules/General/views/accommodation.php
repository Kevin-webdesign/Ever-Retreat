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
                <source src="../../../assets/video/EverRetreatInvestment.mp4" type="video/mp4">
            </video>
        </div>
        <div class="container-top">
            <h1 class="display-4">ACCOMMODATION</h1> 
        </div>
    </div>

    <div class="new mb-5">
        <style>
            :root {
                --gold: #b8a060;
            }

            body {
                font-family: Arial, sans-serif;
            }

            .logo {
                max-width: 150px;
            }

            .btn-gold {
                background-color: var(--gold);
                color: white;
            }

            .room-details {
                background-color: #f8f9fa;
                padding: 20px;
                border-radius: 10px;
            }

            .accommodation h5,
            .h5 {
                font-weight: 800;
            }

            .accommodation .subtitle {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 19px;
                font-weight: 400;
                color: #b8a060;
            }

            .accommodation .card {
                background-color: #f8f9fa;
                padding: 20px;
                border: 0px;
                border-radius: 0px;
            }
            @media (max-width: 768px) {
                .accommodation .card {
                padding: 5px;
                margin-top: 10px;
            }
            }
            .accommodation .text-right {
                float: right;
            }

            .accommodation i {
                font-style: normal;
                ;
            }

            .card .label {
                width: 100%;
            }

            .t-small {
                font-size: 13px;
                font-family: Arial, Helvetica, sans-serif;
                font-weight: 600;
                letter-spacing: 0.5px;
            }


            .reservation-form {
                background-color: white;
                border-radius: 8px;
                padding: 20px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            .form-group {
                margin-bottom: 15px;
            }

            .form-group label {
                display: block;
                margin-bottom: 5px;
                color: #333;
            }

            .frm-control {
                width: 100%;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 4px;
                box-sizing: border-box;
            }

            .extra-services {
                background-color: #f9f9f9;
                padding: 15px;
                border-radius: 4px;
                margin-bottom: 15px;
            }

            .extra-services label {
                display: flex;
                align-items: center;
                margin-bottom: 10px;
            }

            .extra-services input[type="checkbox"] {
                margin-right: 10px;
            }

            .total-cost {
                text-align: right;
                font-weight: bold;
                margin-bottom: 15px;
            }

            .book-button {
                width: 100%;
                padding: 12px;
                background-color: #b38749;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .book-button:hover {
                background-color: #9c6f3e;
            }

            /* form new way of shaping */

            /*//////////////////////////////////////////////////////////////////[ RESTYLE TAG ]*/

            * {
                margin: 0px;
                padding: 0px;
                box-sizing: border-box;
            }

            a:focus {
                outline: none !important;
            }

            a:hover {
                text-decoration: none;
            }

            /*---------------------------------------------*/
            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                margin: 0px;
            }

            p {
                font-family: Poppins-Regular;
                font-size: 15px;
                line-height: 1.7;
                color: #666666;
                margin: 0px;
                text-align: justify;
            }

            ul,
            li {
                margin: 0px;
                list-style-type: none;
            }


            /*---------------------------------------------*/
            input {
                outline: none;
                border: none;
            }

            input[type="number"] {
                -moz-appearance: textfield;
                appearance: none;
                -webkit-appearance: none;
            }

            input[type="number"]::-webkit-outer-spin-button,
            input[type="number"]::-webkit-inner-spin-button {
                -webkit-appearance: none;
            }

            textarea {
                outline: none;
                border: none;
            }

            textarea:focus,
            input:focus {
                border-color: transparent !important;
            }

            input:focus::-webkit-input-placeholder {
                color: transparent;
            }

            input:focus:-moz-placeholder {
                color: transparent;
            }

            input:focus::-moz-placeholder {
                color: transparent;
            }

            input:focus:-ms-input-placeholder {
                color: transparent;
            }

            textarea:focus::-webkit-input-placeholder {
                color: transparent;
            }

            textarea:focus:-moz-placeholder {
                color: transparent;
            }

            textarea:focus::-moz-placeholder {
                color: transparent;
            }

            textarea:focus:-ms-input-placeholder {
                color: transparent;
            }

            input::-webkit-input-placeholder {
                color: #adadad;
            }

            input:-moz-placeholder {
                color: #adadad;
            }

            input::-moz-placeholder {
                color: #adadad;
            }

            input:-ms-input-placeholder {
                color: #adadad;
            }

            textarea::-webkit-input-placeholder {
                color: #adadad;
            }

            textarea:-moz-placeholder {
                color: #adadad;
            }

            textarea::-moz-placeholder {
                color: #adadad;
            }

            textarea:-ms-input-placeholder {
                color: #adadad;
            }

            /*---------------------------------------------*/
            button {
                outline: none !important;
                border: none;
                background: transparent;
            }

            button:hover {
                cursor: pointer;
            }

            iframe {
                border: none !important;
            }


            /*---------------------------------------------*/
            .container {
                max-width: 1200px;
            }


            /*//////////////////////////////////////////////////////////////////[ Utility ]*/

            .bg0 {
                background-color: #fff;
            }

            .bg1 {
                background-color: #f7f7f7;
            }

            

            /* Row styling for side-by-side fields */
            .row {
                display: flex;
                flex-wrap: wrap;
                margin-right: -5px;
                margin-left: -5px;
            }

            .m-0 {
                margin: 0 !important;
            }

            .p-0 {
                padding: 0 !important;
            }

            .col-6 {
                flex: 0 0 50%;
                max-width: 50%;
                padding-right: 5px;
                padding-left: 5px;
            }

            /* Submit button styling */
            .container-contact100-form-btn {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                padding: 10px 0;
                width: 100%;
            }

            .contact100-form-btn {
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 0 20px;
                width: 100%;
                height: 40px; /* Reduced height */
                background-color: #b38749;
                cursor: pointer;
                transition: background-color 0.3s;
                font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
                font-size: 15px; /* Smaller font */
                color: white;
                line-height: 1.2;
                transition: all 0.4s;
            }

            .contact100-form-btn:hover {
                background-color: #9c6f3e;
            }

            .contact100-form-btn i {
                transition: all 0.4s;
            }

            .contact100-form-btn:hover i {
                transform: translateX(10px);
            }

            .hr {
                margin-top: 10px;
                margin-bottom: 10px;
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {
                .rs1-wrap-input100 {
                    width: 100%;
                }
            }

            @media (max-width: 576px) {
                .wrap-input100 {
                    padding: 5px 8px;
                }
                .wrap-input-phone {
                    width: 50%;
                }
            }

            /* Rest of your existing styles */
            .det-suit{
                margin-top: 20px;
            }

            .det-suit-bg{
                background-color:rgb(190, 155, 105);
            }
            
            .word-icon-holder {
                display: flex;
                align-items: center;
                margin-bottom: 10px;
                height: 45px; 
                border-radius: 2px;
                /* border: solid 2px red; */
            }

            .word-icon-holder .amenity-icon{
                width: 30%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                color:rgb(255, 255, 255)!important;
            }

            .word-icon-holder .amenity-icon img{
                max-width: 90%;
                max-height: 90%;
            }
            
            .word-icon-holder .amenity-icon2{
                width: 20%;
                height: 80%;
                margin: 10%;
                display: flex;
                align-items: center;
                justify-content: center;
                color:rgb(255, 255, 255)!important;
            }
            
            .word-icon-holder .amenity-icon2 img{
                max-width: 90%;
                max-height: 90%;
            }

            .word-icon-holder .icon-text{
                width: 70%;
                height: 100%;
                display: flex;
                align-items: center;
                /* justify-content: center; */
                color:rgb(255, 255, 255)!important;
            }
            @media (max-width: 768px) {
                .word-icon-holder {
                    border-radius: 5px;
                    margin-left: 40px;
                    height: 50px;
                    margin-right: 40px;
                    padding: 10px;
                }
                .word-icon-holder .amenity-icon{
                    width: 30%;
                    height: 90%;
                    margin: 10px;
                }
                .word-icon-holder .amenity-icon2{
                    width: 28%;
                    height: 40px;
                    margin: 3px;
                }
                .word-icon-holder .amenity-icon2 img{
                    width: 96%;
                    /* height: 90%; */
                    margin: 3%;
                }
                .mb-comp{
                    margin-bottom: 30px;
                }
            }
            .border-padding{
                border-radius: 5px;
            }
            .master-container{
                padding: 80px;
            }
            @media (max-width: 768px) {
                .master-container{
                    padding: 30px 10px;
                }
                .t-center,.subtitle{
                    text-align: center;
                }
                .col-4{
                    width: 100%;
                }
                .col-4.icn2{
                    width: 50%;
                }
                .icn2>.word-icon-holder {
                    border-radius: 3px;
                    margin-left: 4px;
                    height: 40px;
                    margin-right: 4px;
                    padding: 1px;
                }
            }
            ul {
                list-style-type: noe;
                padding-left: 0;
            }

            ul.main-list {
                font-size: 13px;
                line-height: 10px;
                padding-left: 20px;
            }

            ul.main-list > li {
                margin-bottom: 15px;
                font-weight: 400;
                list-style: disc!important;
            }
            @media (max-width: 480px) {
                ul.main-list > li {
                    line-height: 18px;
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
            .spinner-border {
                display: inline-block;
                width: 1rem;
                height: 1rem;
                vertical-align: text-bottom;
                border: 0.25em solid currentColor;
                border-right-color: transparent;
                border-radius: 50%;
                animation: spinner-border .75s linear infinite;
            }
            
            @keyframes spinner-border {
                to { transform: rotate(360deg); }
            }
                
        </style>
        <div class="container-fluid master-container">
            <div class="accommodation">
                <div class="row">
                    <div class="col-lg-7">
                        <h5 class="t-center">MASTER</h5>
                        <p class="subtitle">68 m² / Farm View / 2 Guests</p>

                        <div class="room-details">
                            <p>Welcome to our Master Suite, where time slows down and the elegance of simplicity
                                flourishes. Our Master Suite accommodates up to two guests, featuring a luxurious
                                jacuzzi with a stunning view of Lake Kivu. This 45-square-meter retreat offers a serene
                                escape, complete with a king-sized pillow top bed and a bathroom with both a tub and
                                shower. Indulge in our top-notch amenities, including a flat-screen TV with satellite
                                channels, wireless internet, Elemis bath amenities, a hair dryer, and cozy bathrobe and
                                slippers. Enjoy the convenience of a work desk and chair, 24-hour room service, and air
                                conditioning. Experience unparalleled comfort and tranquility in our Master Suite.</p>
                        </div>

                        <div class="mt-4">
                            <h5 class="t-center">Family Friendly Amenities</h5>
                            <div class="row det-suit">
                                <div class="col-4">
                                    <div class="word-icon-holder det-suit-bg">
                                        <div class="amenity-icon">
                                            <img src="../../../assets/icons/bed-old.png" alt="bed-old_icon">
                                        </div>
                                        <p class="text-center icon-text">1 Bed</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="word-icon-holder det-suit-bg">
                                        <div class="amenity-icon">
                                            <img src="../../../assets/icons/bed-child.png" alt="bed-child_icon">
                                        </div>
                                        <p class="text-center icon-text">Children beds</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="word-icon-holder det-suit-bg">
                                        <div class="amenity-icon">
                                            <img src="../../../assets/icons/lake.png" alt="lake_icon">
                                        </div>
                                        <p class="text-center icon-text">Lots of Lake activities</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h5 class="t-center mb-comp">Room Amenities</h5>
                            <div class="row">
                                <div class="col-4 icn2 text-center mb-3">
                                    <div class="word-icon-holder">
                                        <div class="amenity-icon2 det-suit-bg border-padding">
                                            <img src="../../../assets/icons/boots.png" alt="boots_icon">
                                        </div>
                                        <p>Boots</p>
                                    </div>
                                </div>
                                <div class="col-4 icn2 text-center mb-3">
                                    <div class="word-icon-holder">
                                        <div class="amenity-icon2 det-suit-bg border-padding">
                                            <img src="../../../assets/icons/swimming_costume.png" alt="swimming_costume_icon">
                                        </div>
                                        <p>Swimming costume</p>
                                    </div>
                                </div>
                                <div class="col-4 icn2 text-center mb-3">
                                    <div class="word-icon-holder">
                                        <div class="amenity-icon2 det-suit-bg border-padding">
                                            <img src="../../../assets/icons/slippers.png" alt="slippers_icon">
                                        </div>
                                        <p>Slippers</p>
                                    </div>
                                </div>
                                <div class="col-4 icn2 text-center mb-3">
                                    <div class="word-icon-holder">
                                        <div class="amenity-icon2 det-suit-bg border-padding">
                                            <img src="../../../assets/icons/towels.png" alt="towels_icon">
                                        </div>
                                        <p>Towels</p>
                                    </div>
                                </div>
                                <div class="col-4 icn2 text-center mb-3">
                                    <div class="word-icon-holder">
                                        <div class="amenity-icon2 det-suit-bg border-padding">
                                            <img src="../../../assets/icons/welcome-drink.png" alt="welcome-drink_icon">
                                        </div>
                                        <p>Welcome Drinks</p>
                                    </div>
                                </div>
                                <div class="col-4 icn2 text-center mb-3">
                                    <div class="word-icon-holder">
                                        <div class="amenity-icon2 det-suit-bg border-padding">
                                            <img src="../../../assets/icons/shampoo.png" alt="shampoo_icon">
                                        </div>
                                        <p>Shampoo</p>
                                    </div>
                                </div>
                                <div class="col-4 icn2 text-center mb-3">
                                    <div class="word-icon-holder">
                                        <div class="amenity-icon2 det-suit-bg border-padding">
                                            <img src="../../../assets/icons/hair-dryer.png" alt="hair-dryer_icon">
                                        </div>
                                        <p>Hair Dryer</p>
                                    </div>
                                </div>
                                <div class="col-4 icn2 text-center mb-3">
                                    <div class="word-icon-holder">
                                        <div class="amenity-icon2 det-suit-bg border-padding">
                                            <img src="../../../assets/icons/wifi.png" alt="wifi_icon">
                                        </div>
                                        <p>Wifi & Internet</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h5 class="t-center">What is included</h5>
                            <div class="row det-suit">
                                <div class="col-12">
                                <ul class="main-list">
                                    <li>Master Suite with private Balcony</li>
                                    <li>180x200 cm Siesta Bed</li>
                                    <li>Smart TV for watching Films</li>
                                    <li>Full Board Basis; All Meals are included</li>
                                    <li>All Non-Alcoholic Drinks, Beers and House Wines included</li>
                                    <li>Exclusive Access to a 15 Hectares Garden and Lake Kivu</li>
                                    <li>Bathrooms with rain shower</li>
                                    <li>Comfortable white towels</li>
                                </ul>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="block">
                                    <label class="card-title label"> <i class="h5">Reserve </i><i
                                            class="text-right t-small">From $0/night</i></label>
                                </div>
                                <div class="block">
                                    <div class="container-contact100">
                                        <div class="wrap-contact100">
                                        <form id="bookingForm">
                                            <!-- Villa Selection Field -->
                                            <div class="form-field">
                                                <label for="villa">Villa *</label>
                                                <select id="villa" name="villa" required>
                                                    <option value="Ever Retreat">Ever Retreat (Default)</option>
                                                    <!-- <option value="Rubavu Villa">Rubavu Villa</option>
                                                    <option value="Huye Villa">Huye Villa</option> -->
                                                </select>
                                            </div>
                                            
                                            <!-- Date fields -->
                                            <div class="form-field">
                                                <label for="start">Check in *</label>
                                                <input type="date" id="start" name="checkin" required>
                                            </div>
                                            
                                            <div class="form-field">
                                                <label for="end">Check out *</label>
                                                <input type="date" id="end" name="checkout" required>
                                            </div>
                                            
                                            <!-- Adults and Children - on same row -->
                                            <div class="form-row">
                                                <div class="form-field">
                                                    <label for="adults">Adults *</label>
                                                    <input type="number" id="adults" name="adults" min="1" placeholder="2" required>
                                                </div>
                                                
                                                <div class="form-field">
                                                    <label for="child">Children <small style="color:#e03131">(under 11yrs)</small></label>
                                                    <input type="number" id="child" name="child" min="0" placeholder="0">
                                                </div>
                                            </div>
                                            
                                            <!-- Personal Details -->
                                            <div class="form-field">
                                                <label for="names">Full Name *</label>
                                                <input type="text" id="names" name="names" placeholder="Enter your full name" required>
                                            </div>
                                            
                                            <!-- Email and Phone - on same row -->
                                            <div class="form-row">
                                                <div class="form-field">
                                                    <label for="email">Email *</label>
                                                    <input type="email" id="email" name="email" placeholder="Your email address" required>
                                                </div>
                                                
                                                <div class="form-field">
                                                    <label for="phone">Phone *</label>
                                                    <input type="text" id="phone" name="phone" placeholder="Your phone number" required>
                                                </div>
                                            </div>
                                            
                                            <!-- Special Requests / Message -->
                                            <div class="form-field">
                                                <label for="message">Special Requests</label>
                                                <textarea id="message" name="message" placeholder="Any special requests or requirements?"></textarea>
                                            </div>
                                            
                                            <!-- Total Cost Section -->
                                            <div class="total-cost">
                                                <span class="cost-left">Total cost:</span>
                                                <span class="cost-right">$0</span>
                                            </div>
                                            
                                            <!-- Hidden fields for calculations -->
                                            <div style="display:none;">
                                                <input type="text" name="addition_rate" id="addition_rate">
                                                <input type="text" name="base_rate" id="base_rate">
                                                <input type="text" name="addedGuest" id="addedGuest">
                                                <input type="text" name="total_amount" id="total_amount">
                                            </div>
                                            
                                            <!-- Submit Button -->
                                            <div class="container-contact100-form-btn">
                                                <button type="submit" class="contact100-form-btn">
                                                    <span style="color: white;">
                                                        Book Your Stay Now
                                                    </span>
                                                </button>
                                                <div class="invalid-feedbacks" id="emailError"></div>
                                            </div>
                                        </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const checkboxes = document.querySelectorAll('.extra-services input[type="checkbox"]');
            const totalCostElement = document.querySelector('.total-cost');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateTotalCost);
            });

            function updateTotalCost() {
                const basePrice = 2000;
                const additionalServicePrice = 125;
                let totalCost = basePrice;

                checkboxes.forEach(checkbox => {
                    if (checkbox.checked && checkbox.parentElement.textContent.includes('$125/person')) {
                        const adultSelect = document.querySelector('select[aria-label="Adult"]');
                        const numAdults = parseInt(adultSelect.value);
                        totalCost += additionalServicePrice * numAdults;
                    }
                });

                totalCostElement.textContent = `Total cost: $${totalCost}`;
            }
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

    <!-- PERFORM BOOKING -->
    <script>
        $(document).ready(function () {
            // Form submission logic
            $('#bookingForm').on('submit', function (e) {
                e.preventDefault();

                // Show loading SweetAlert
                Swal.fire({
                    title: 'Processing your booking',
                    html: 'Please wait while we process your request...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                // Check if there's any error before submitting
                if ($('#emailError').text() === '') {
                    let rand = Math.floor(100000 + Math.random() * 900000);
                    let bookingCode = 'EVBN'+rand;
                    console.log("Booking code", bookingCode);
                    
                    let formData = {
                        bookingCode: bookingCode,
                        villa: $('#villa').val(),         // Added villa field
                        checkin: $('#start').val(),
                        checkout: $('#end').val(),
                        adults: $('#adults').val(),
                        child: $('#child').val(),
                        names: $('#names').val(),
                        email: $('#email').val(),
                        phone: $('#phone').val(),
                        message: $('#message').val(),
                        addition_rate: $('#addition_rate').val(),
                        base_rate: $('#base_rate').val(),
                        addedGuest: $('#addedGuest').val(),
                        total_amount: $('#total_amount').val()
                    };
                    
                    console.log('Booking details - Villa:'+formData.villa+', checkin:'+formData.checkin+', phone:'+formData.phone+', email:'+formData.email+', checkout:'+formData.checkout+', adults:'+formData.adults+' child:'+
                    formData.child+' message:'+formData.message+' base_rate:'+formData.base_rate+' addition_rate:'+formData.addition_rate+ 
                    ' addedGuest:'+formData.addedGuest+' total_amount:'+formData.total_amount);
                    
                    $.ajax({
                        type: 'POST',
                        url: '../../Booking/api/bookingApi.php?action=booking',
                        data: formData,
                        dataType: 'json',
                        success: function (response) {
                            if (response.success) {
                                // Use SweetAlert for success message
                                Swal.fire({
                                    icon: 'success',
                                    title: 'BOOKING REQUEST SENT!',
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(() => {
                                    window.location.href = 'accommodation.php'; // Redirect after success
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
                                text: 'Something went wrong. Please try again. '+status+' '+error
                            });
                        }
                    });
                } else {
                    // Notify the user about the error using SweetAlert
                    Swal.fire({
                        icon: 'warning',
                        title: 'EMPTY FORM FIELDS',
                        text: 'Please Fill all Required Fields.'
                    });
                }
            });
        });

        // CONTROL BOOKING
        $(document).ready(function() {
            // Fetch price data when the page loads
            fetchPrice();

            // Set initial values and constraints
            $('#adults').attr('min', 1);
            $('#child').attr('min', 0);

            // Variables to store price settings
            let baseCost = 0;
            let additionCost = 0;

            // Function to fetch price from the API
            function fetchPrice() {
                fetch('../../PriceSetting/api/priceSettingApi.php?action=fetchPrice')
                    .then(response => response.json())
                    .then(data => {
                        // console.log("data ", data);
            
                        // Check if data is an object and has the expected properties
                        if (data && typeof data === "object" && "cost" in data && "addition" in data) {
                            // console.log("pricedata ", data);
                            
                            // Store cost and addition values
                            baseCost = parseFloat(data.cost || 0);
                            additionCost = parseFloat(data.addition || 0);
                            
                            // Update the display with base rate
                            $('.text-right.t-small').text(`From $${baseCost.toFixed(0)}/night`);
                            
                            // Calculate initial total
                            calculateTotal();
                        } else {
                            console.log("condition not met");
                        }
                    })
                    .catch(error => console.error('Error fetching price:', error));
            }
                

            // Event listeners for input fields and date selection
            $('#adults, #child').on('input', validatePeopleCount);
            $('#start, #end').on('change', calculateTotal);

            // Function to validate people count
            function validatePeopleCount() {
                let adults = parseInt($('#adults').val()) || 0;
                let children = parseInt($('#child').val()) || 0;
                let totalPeople = adults + children;

                // Ensure adults is at least 1
                if (adults < 1) $('#adults').val(1);

                // Ensure children is at least 0
                if (children < 0) $('#child').val(0);

                // Calculate total cost after validation
                calculateTotal();
            }

            // Function to calculate total cost
            function calculateTotal() {
                let adults = parseInt($('#adults').val()) || 1;
                let children = parseInt($('#child').val()) || 0;
                let totalPeople = adults;
                // let totalPeople = adults + children;

                // Get date values
                let startDate = new Date($('#start').val());
                let endDate = new Date($('#end').val());

                // Calculate number of nights
                let nights = 1;
                if (!isNaN(startDate.getTime()) && !isNaN(endDate.getTime())) {
                    nights = Math.max(1, Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24)));
                }

                // Calculate cost: base cost for 3 people, additional cost for extra people
                let totalCost = baseCost;
                if (totalPeople > 3) {
                    totalCost += (totalPeople - 3) * additionCost;
                }

                // Multiply by number of nights
                totalCost *= nights;

                // Update the total cost display
                $('.cost-right').text(`$${totalCost.toFixed(0)}`);
                var total_amount = totalCost;
                var addedGuest = (totalPeople > 3)? (totalPeople - 3) : 0;
                var addition_rate = additionCost;
                var base_rate = baseCost;
                $('#addition_rate').val(addition_rate);
                $('#base_rate').val(base_rate);
                $('#addedGuest').val(addedGuest);
                $('#total_amount').val(total_amount);
            }
        });
    </script>
</body>

</html>