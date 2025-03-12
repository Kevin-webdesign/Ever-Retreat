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
                font-size: 14px;
                line-height: 1.7;
                color: #666666;
                margin: 0px;
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


            /*//////////////////////////////////////////////////////////////////[ Contact ]*/

            .container-contact100 {
                width: 100%;
                /* min-height: 100vh; */
                display: -webkit-box;
                display: -webkit-flex;
                display: -moz-box;
                display: -ms-flexbox;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
            }

            .wrap-contact100 {
                width: 100%;
                overflow: hidden;
                /* padding: 62px 55px 90px 55px; */
            }


            /*------------------------------------------------------------------[  ]*/

            .contact100-form {
                width: 100%;
                display: -webkit-box;
                display: -webkit-flex;
                display: -moz-box;
                display: -ms-flexbox;
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }

            .contact100-form-title {
                display: block;
                width: 100%;
                font-family: Montserrat-Black;
                font-size: 39px;
                color: #333333;
                line-height: 1.2;
                text-align: center;
                padding-bottom: 59px;
            }



            /*------------------------------------------------------------------[  ]*/

            .wrap-input100 {
                width: 100%;
                position: relative;
                border: 1px solid #9c6f3e;
                background-color: white;
                padding: 10px 30px 9px 22px;
                margin-bottom: 20px;
            }
            .wrap-input100b {
                width: 100%;
                position: relative;
                border: 1px solidrgb(253, 253, 253);
                background-color: #f9f9f9 !important;
                padding: 10px 30px 9px 22px;
                /* margin-bottom: 20px; */
            }

            .rs1-wrap-input100 {
                width: calc((100% - 30px) / 2);
            }

            .label-input100 {
                font-family: Montserrat-SemiBold;
                font-size: 10px;
                color: #393939;
                line-height: 1.5;
                text-transform: uppercase;
            }

            .input100 {
                display: block;
                width: 100%;
                background: transparent;
                font-family: Montserrat-SemiBold;
                font-size: 18px;
                color: #555555;
                line-height: 1.2;
                padding-right: 15px;
            }


            /*---------------------------------------------*/
            input.input100 {
                height: 40px;
            }


            textarea.input100 {
                min-height: 90px;
                padding-top: 9px;
                padding-bottom: 13px;
            }


            .input100:focus+.focus-input100::before {
                width: 100%;
            }

            .has-val.input100+.focus-input100::before {
                width: 100%;
            }


            /*------------------------------------------------------------------[ Button ]*/
            .container-contact100-form-btn {
                display: -webkit-box;
                display: -webkit-flex;
                display: -moz-box;
                display: -ms-flexbox;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                padding: 10px;
                width: 100%;
            }

            .contact100-form-btn {
                display: -webkit-box;
                display: -webkit-flex;
                display: -moz-box;
                display: -ms-flexbox;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 0 20px;
                width: 100%;
                height: 50px;
                background-color: #b38749;
                cursor: pointer;
                transition: background-color 0.3s;

                font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
                font-size: 16px;
                color: white;
                line-height: 1.2;

                -webkit-transition: all 0.4s;
                -o-transition: all 0.4s;
                -moz-transition: all 0.4s;
                transition: all 0.4s;
            }

            .contact100-form-btn i {
                -webkit-transition: all 0.4s;
                -o-transition: all 0.4s;
                -moz-transition: all 0.4s;
                transition: all 0.4s;
            }

            .contact100-form-btn:hover {
                background-color: #9c6f3e;
            }

            .contact100-form-btn:hover i {
                -webkit-transform: translateX(10px);
                -moz-transform: translateX(10px);
                -ms-transform: translateX(10px);
                -o-transform: translateX(10px);
                transform: translateX(10px);
            }

            /*------------------------------------------------------------------[ Responsive ]*/

            @media (max-width: 768px) {
                .rs1-wrap-input100 {
                    width: 100%;
                }

            }

            @media (max-width: 576px) {
                .wrap-contact100 {
                    padding: 62px 15px 90px 15px;
                }

                .wrap-input100 {
                    padding: 10px 10px 9px 10px;
                }
            }



            /*------------------------------------------------------------------[ Alert validate ]*/

            .validate-input {
                position: relative;
            }

            .alert-validate::before {
                content: attr(data-validate);
                display: -webkit-box;
                display: -webkit-flex;
                display: -moz-box;
                display: -ms-flexbox;
                display: flex;
                align-items: center;
                position: absolute;
                width: 100%;
                min-height: 40px;
                background-color: #f7f7f7;
                top: 35px;
                left: 0px;
                padding: 0 45px 0 22px;
                pointer-events: none;

                font-family: Montserrat-SemiBold;
                font-size: 18px;
                color: #fa4251;
                line-height: 1.2;
            }

            .btn-hide-validate {
                font-family: Material-Design-Iconic-Font;
                font-size: 18px;
                color: #fa4251;
                cursor: pointer;
                display: -webkit-box;
                display: -webkit-flex;
                display: -moz-box;
                display: -ms-flexbox;
                display: flex;
                align-items: center;
                justify-content: center;
                position: absolute;
                width: 40px;
                height: 40px;
                top: 35px;
                right: 12px;
            }

            .rs1-alert-validate.alert-validate::before {
                background-color: #fff;
            }

            .true-validate::after {
                content: "\f26b";
                font-family: Arial, Helvetica, sans-serif;
                font-size: 18px;
                color: #9c6f3e;
                display: -webkit-box;
                display: -webkit-flex;
                display: -moz-box;
                display: -ms-flexbox;
                display: flex;
                align-items: center;
                justify-content: center;
                position: absolute;
                width: 40px;
                height: 40px;
                top: 35px;
                right: 10px;
            }

            /*---------------------------------------------*/
            @media (max-width: 576px) {
                .alert-validate::before {
                    padding: 0 10px 0 10px;
                }

                .true-validate::after,
                .btn-hide-validate {
                    right: 0px;
                    width: 30px;
                }
            }


            /*==================================================================[ Restyle Select2 ]*/

            .select2-container {
                display: block;
                max-width: 100% !important;
                width: auto !important;
            }

            .select2-container .select2-selection--single {
                display: -webkit-box;
                display: -webkit-flex;
                display: -moz-box;
                display: -ms-flexbox;
                display: flex;
                align-items: center;
                background-color: transparent;
                border: none;
                height: 40px;
                outline: none;
                position: relative;
            }

            /*------------------------------------------------------------------[ in select ]*/
            .select2-container .select2-selection--single .select2-selection__rendered {
                font-family: Montserrat-SemiBold;
                font-size: 15px;
                color:rgb(32, 32, 32);
                line-height: 1.2;
                padding-left: 0px;
                background-color: transparent;
            }

            .select2-container--default .select2-selection--single .select2-selection__arrow {
                height: 100%;
                top: 50%;
                transform: translateY(-50%);
                right: 0px;
                display: -webkit-box;
                display: -webkit-flex;
                display: -moz-box;
                display: -ms-flexbox;
                display: flex;
                align-items: center;
                justify-content: flex-end;
            }

            .select2-selection__arrow b {
                display: none;
            }

            .select2-selection__arrow::before {
                content: '\f312';
                font-family: Material-Design-Iconic-Font;
                font-size: 15px;
                color:rgb(34, 33, 33);
            }


            /*------------------------------------------------------------------[ Dropdown option ]*/
            .select2-container--open .select2-dropdown {
                z-index: 1251;
                width: calc(100% + 2px);
                border: 0px solid transparent;
                /* border-radius: 10px; */
                overflow: hidden;
                background-color: white;
                left: -24px;

                box-shadow: 0 3px 10px 0px rgba(0, 0, 0, 0.2);
                -moz-box-shadow: 0 3px 10px 0px rgba(0, 0, 0, 0.2);
                -webkit-box-shadow: 0 3px 10px 0px rgba(0, 0, 0, 0.2);
                -o-box-shadow: 0 3px 10px 0px rgba(0, 0, 0, 0.2);
                -ms-box-shadow: 0 3px 10px 0px rgba(0, 0, 0, 0.2);
            }

            @media (max-width: 576px) {
                .select2-container--open .select2-dropdown {
                    left: -12px;
                }
            }

            .select2-dropdown--above {
                top: -38px;
            }

            .select2-dropdown--below {
                top: 10px;
            }

            .select2-container .select2-results__option[aria-selected] {
                padding-top: 10px;
                padding-bottom: 10px;
                padding-left: 24px;
            }

            @media (max-width: 576px) {
                .select2-container .select2-results__option[aria-selected] {
                    padding-left: 12px;
                }
            }

            .select2-container .select2-results__option[aria-selected="true"] {
                background: #00ad5f;
                color: white;
            }

            .select2-container .select2-results__option--highlighted[aria-selected] {
                background: #00ad5f;
                color: white;
            }

            .select2-results__options {
                font-family: Montserrat-SemiBold;
                font-size: 14px;
                color: #555555;
                line-height: 1.2;
            }

            .select2-search--dropdown .select2-search__field {
                border: 1px solid #aaa;
                outline: none;
                font-family: Poppins-Regular;
                font-size: 15px;
                color: #333333;
                line-height: 1.2;
            }

            .wrap-input100 .dropDownSelect2 .select2-container--open {
                width: 100% !important;
            }

            .wrap-input100 .dropDownSelect2 .select2-dropdown {
                width: calc(100% + 2px) !important;
            }

            /*==================================================================[ Restyle Radio ]*/
            .wrap-contact100-form-radio {
                width: 100%;
                padding: 15px 25px 0 25px;
            }

            .contact100-form-radio {
                padding-bottom: 5px;
            }

            .input-radio100 {
                display: none;
            }

            .label-radio100 {
                display: block;
                position: relative;
                padding-left: 28px;
                cursor: pointer;
                font-family: Montserrat-SemiBold;
                font-size: 18px;
                color: #555555;
                line-height: 1.2;
            }

            .label-radio100::before {
                content: "";
                display: block;
                position: absolute;
                width: 20px;
                height: 20px;
                border-radius: 50%;
                border: 1px solid #cdcdcd;
                background: #fff;
                left: 0;
                top: 50%;
                -webkit-transform: translateY(-50%);
                -moz-transform: translateY(-50%);
                -ms-transform: translateY(-50%);
                -o-transform: translateY(-50%);
                transform: translateY(-50%);
            }

            .label-radio100::after {
                content: "";
                display: block;
                position: absolute;
                width: 20px;
                height: 20px;
                border-radius: 50%;
                border: 6px solid transparent;
                background: #00ad5f;
                -moz-background-clip: padding;
                -webkit-background-clip: padding;
                background-clip: padding-box;
                left: 0;
                top: 50%;
                -webkit-transform: translateY(-50%);
                -moz-transform: translateY(-50%);
                -ms-transform: translateY(-50%);
                -o-transform: translateY(-50%);
                transform: translateY(-50%);
                display: none;

            }

            .input-radio100:checked+.label-radio100::after {
                display: block;
            }

            /*==================================================================[ rs NoUI ]*/
            .wrap-contact100-form-range {
                width: 100%;
                padding: 20px 25px 57px 25px;
            }

            .contact100-form-range-value {
                font-family: Montserrat-SemiBold;
                font-size: 18px;
                color: #555555;
                line-height: 1.2;
                padding-top: 10px;
                padding-bottom: 30px;
            }

            .contact100-form-range-value input {
                display: none;
            }

            #filter-bar {
                height: 20px;
                border: 1px solid #e6e6e6;
                border-radius: 9px;
                background-color: #f7f7f7;
            }

            #filter-bar .noUi-connect {
                border: 1px solid #e6e6e6;
                border-radius: 9px;
                background-color: #00ad5f;
                box-shadow: none;
            }

            #filter-bar .noUi-handle {
                width: 40px;
                height: 36px;
                border: 1px solid #cccccc;
                border-radius: 9px;
                background: #f5f5f5;
                cursor: pointer;
                box-shadow: none;
                outline: none;
                top: -8px;
                display: -webkit-box;
                display: -webkit-flex;
                display: -moz-box;
                display: -ms-flexbox;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            #filter-bar .noUi-handle.noUi-handle-lower {
                left: -1px;
            }

            #filter-bar .noUi-handle.noUi-handle-upper {
                left: -39px;
            }

            #filter-bar .noUi-handle:before {
                content: "";
                display: block;
                position: unset;
                height: 12px;
                width: 9px;
                background-color: transparent;
                border-left: 2px solid #cccccc;
                border-right: 2px solid #cccccc;
            }

            #filter-bar .noUi-handle:after {
                display: none;
            }

            @media (max-width: 576px) {
                .wrap-contact100-form-range {
                    padding: 20px 0px 57px 0px;
                }

                .wrap-contact100-form-radio {
                    padding: 15px 0px 0 0px;
                }
            }
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
                height: 55px;
            }

            .word-icon-holder .amenity-icon{
                width: 30%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                color:rgb(255, 255, 255)!important;
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

            .word-icon-holder .icon-text{
                width: 70%;
                height: 100%;
                display: flex;
                align-items: center;
                /* justify-content: center; */
                color:rgb(255, 255, 255)!important;
            }
            .border-padding{
                border-radius: 5px;
            }
        </style>
        <div class="container-fluid" style="padding: 80px;">
            <div class="accommodation">
                <div class="row">
                    <div class="col-lg-7">
                        <h5>MASTER</h5>
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
                            <h5>Family Friendly Amenities</h5>
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
                            <h5>Room Amenities</h5>
                            <div class="row">
                                <div class="col-4 text-center mb-3">
                                    <div class="word-icon-holder">
                                        <div class="amenity-icon2 det-suit-bg border-padding">
                                            <img src="../../../assets/icons/boots.png" alt="boots_icon">
                                        </div>
                                        <p>Boots</p>
                                    </div>
                                </div>
                                <div class="col-4 text-center mb-3">
                                    <div class="word-icon-holder">
                                        <div class="amenity-icon2 det-suit-bg border-padding">
                                            <img src="../../../assets/icons/swimming_costume.png" alt="swimming_costume_icon">
                                        </div>
                                        <p>Swimming costume</p>
                                    </div>
                                </div>
                                <div class="col-4 text-center mb-3">
                                    <div class="word-icon-holder">
                                        <div class="amenity-icon2 det-suit-bg border-padding">
                                            <img src="../../../assets/icons/slippers.png" alt="slippers_icon">
                                        </div>
                                        <p>Slippers</p>
                                    </div>
                                </div>
                                <div class="col-4 text-center mb-3">
                                    <div class="word-icon-holder">
                                        <div class="amenity-icon2 det-suit-bg border-padding">
                                            <img src="../../../assets/icons/towels.png" alt="towels_icon">
                                        </div>
                                        <p>Towels</p>
                                    </div>
                                </div>
                                <div class="col-4 text-center mb-3">
                                    <div class="word-icon-holder">
                                        <div class="amenity-icon2 det-suit-bg border-padding">
                                            <img src="../../../assets/icons/welcome-drink.png" alt="welcome-drink_icon">
                                        </div>
                                        <p>Welcome Drinks</p>
                                    </div>
                                </div>
                                <div class="col-4 text-center mb-3">
                                    <div class="word-icon-holder">
                                        <div class="amenity-icon2 det-suit-bg border-padding">
                                            <img src="../../../assets/icons/shampoo.png" alt="shampoo_icon">
                                        </div>
                                        <p>Shampoo</p>
                                    </div>
                                </div>
                                <div class="col-4 text-center mb-3">
                                    <div class="word-icon-holder">
                                        <div class="amenity-icon2 det-suit-bg border-padding">
                                            <img src="../../../assets/icons/hair-dryer.png" alt="hair-dryer_icon">
                                        </div>
                                        <p>Hair Dryer</p>
                                    </div>
                                </div>
                                <div class="col-4 text-center mb-3">
                                    <div class="word-icon-holder">
                                        <div class="amenity-icon2 det-suit-bg border-padding">
                                            <img src="../../../assets/icons/wifi.png" alt="wifi_icon">
                                        </div>
                                        <p>Wifi & Internet</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="block">
                                    <label class="card-title label"> <i class="h5">Reserve </i><i
                                            class="text-right t-small">From $2,000/night</i></label>
                                </div>
                                <div class="block">
                                    <div class="container-contact100">
                                        <div class="wrap-contact100">
                                            <form class="contact100-form validate-form">

                                                <div class="wrap-input100 validate-input bg1"
                                                    data-validate="Please Select Check in Date">
                                                    <span class="label-input100">Check in *</span>
                                                    <input class="input100" type="date" name="checkin"
                                                        placeholder="Enter Check in date">
                                                </div>
                                                
                                                <div class="wrap-input100 validate-input bg1"
                                                    data-validate="Please Select Check out Date">
                                                    <span class="label-input100">Check out *</span>
                                                    <input class="input100" type="date" name="checkout"
                                                        placeholder="Enter Check out date">
                                                </div>
                                                
                                                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100"
                                                    data-validate="Enter Number of Adults and (or) Children">
                                                    <span class="label-input100">Adults *</span>
                                                    <input class="input100" type="number" name="adults"
                                                      min="0" placeholder="Adults">
                                                </div>
                                                
                                                <div class="wrap-input100 bg1 rs1-wrap-input100">
                                                    <span class="label-input100">Child</span>
                                                    <input class="input100" type="number" name="child"
                                                       min="0" placeholder="Child">
                                                </div>
                                                
                                                <div class="wrap-input100 validate-input bg1"
                                                    data-validate="Please Enter Your Names">
                                                    <span class="label-input100">NAMES *</span>
                                                    <input class="input100" type="text" name="names"
                                                        placeholder="Enter Your Name">
                                                </div>

                                                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100"
                                                    data-validate="Enter Your Email (e@a.x)">
                                                    <span class="label-input100">Email *</span>
                                                    <input class="input100" type="number" name="email"
                                                        placeholder="Your Email ">
                                                </div>

                                                <div class="wrap-input100 bg1 rs1-wrap-input100">
                                                    <span class="label-input100">Phone</span>
                                                    <input class="input100" type="text" name="phone"
                                                        placeholder="Phone Number">
                                                </div>

                                                <div class="wrap-input100 validate-input bg0 rs1-alert-validate"
                                                    data-validate="Please Type Your Message">
                                                    <span class="label-input100">Message</span>
                                                    <textarea class="input100" name="message"
                                                        placeholder="Your message here..."></textarea>
                                                </div>
                                                <div class="wrap-input100b reservation-forms" style="background-color: white;">
                                                    <div class="extra-services">
                                                        <label>
                                                            <input type="checkbox" checked>
                                                            Daily room clean
                                                            <span style="margin-left: auto;">$0/night</span>
                                                        </label>
                                                        <label>
                                                            <input type="checkbox">
                                                            Daily room clean
                                                            <span style="margin-left: auto;">$125/person</span>
                                                        </label>
                                                    </div>
                                                    
                                                    <hr class="hr">
                                                    <div class="total-cost">
                                                        Total cost: $786
                                                    </div>
                                                </div>

                                                <div class="container-contact100-form-btn">
                                                    <button class="contact100-form-btn">
                                                        <span style="color: white !important;">
                                                            Book Your Stay Now
                                                            <i class="fa fa-long-arrow-right m-l-7"
                                                                aria-hidden="true"></i>
                                                        </span>
                                                    </button>
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
    </script>

</body>

</html>