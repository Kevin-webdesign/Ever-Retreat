<style>
    /* Updated form styles for smaller appearance */
    .container-contact100 {
                width: 100%;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
            }

            .wrap-contact100 {
                width: 100%;
                overflow: hidden;
            }

            .contact100-form {
                width: 100%;
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }

            /* Smaller form fields */
            .wrap-input100 {
                width: 100%;
                position: relative;
                border: 1px solid #9c6f3e;
                background-color: white;
                padding: 6px 15px 6px 12px; /* Reduced padding */
                margin-bottom: 12px; /* Reduced margin */
            }

            .wrap-input100b {
                width: 100%;
                position: relative;
                border: 1px solid rgb(253, 253, 253);
                background-color: #f9f9f9 !important;
                padding: 6px 15px 6px 12px; /* Reduced padding */
            }

            .rs1-wrap-input100 {
                width: calc((100% - 10px) / 2); /* Reduced gap between fields */
            }

            .label-input100 {
                font-family: Montserrat-SemiBold;
                font-size: 9px; /* Smaller label font */
                color: #393939;
                line-height: 1.2;
                text-transform: uppercase;
            }

            .input100 {
                display: block;
                width: 100%;
                background: transparent;
                font-family: Montserrat-SemiBold;
                font-size: 14px; /* Smaller input font */
                color: #555555;
                line-height: 1.2;
                padding-right: 15px;
            }

            /* Smaller input heights */
            input.input100 {
                height: 30px; /* Reduced height */
            }

            select.input100 {
                height: 30px; /* Reduced height */
                border: none;
                background: transparent;
                width: 100%;
                font-size: 14px;
                color: #555555;
                outline: none;
                cursor: pointer;
            }

            textarea.input100 {
                min-height: 60px; /* Reduced height */
                padding-top: 6px;
                padding-bottom: 6px;
            }
</style>

<form class="contact100-form validate-form" id="bookingForm">
                                                <!-- Villa Selection Field -->
                                                <div class="wrap-input100 validate-input bg1" data-validate="Please Select a Villa">
                                                    <span class="label-input100">Villa *</span>
                                                    <select class="input100" name="villa" id="villa" required>
                                                        <option value="Ever Retreat">Ever Retreat (Default)</option>
                                                        <option value="Rubavu Villa">Rubavu Villa</option>
                                                        <option value="Huye Villa">Huye Villa</option>
                                                    </select>
                                                </div>
                                                
                                                <!-- Date fields -->
                                                <div class="wrap-input100 validate-input bg1" data-validate="Please Select Check in Date">
                                                    <span class="label-input100">Check in *</span>
                                                    <input class="input100" type="text" id="start" name="checkin" placeholder="Check in date" required>
                                                </div>
                                                
                                                <div class="wrap-input100 validate-input bg1" data-validate="Please Select Check out Date">
                                                    <span class="label-input100">Check out *</span>
                                                    <input class="input100" type="text" id="end" name="checkout" placeholder="Check out date" required>
                                                </div>
                                                
                                                <!-- Adults and Children - on same row -->
                                                <div class="row m-0">
                                                    <div class="col-6 p-0">
                                                        <div class="wrap-input100 validate-input bg1" data-validate="Enter Number of Adults">
                                                            <span class="label-input100">Adults *</span>
                                                            <input class="input100" type="number" name="adults" id="adults" min="1" placeholder="2" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 p-0">
                                                        <div class="wrap-input100 bg1" style="margin-left: 5px;">
                                                            <span class="label-input100">Children <small class="text-danger">(under 11yrs)</small></span>
                                                            <input class="input100" type="number" name="child" id="child" min="0" placeholder="0">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Personal Details -->
                                                <div class="wrap-input100 validate-input bg1" data-validate="Please Enter Your Names">
                                                    <span class="label-input100">Full Name *</span>
                                                    <input class="input100" type="text" name="names" id="names" placeholder="Enter your full name" required>
                                                </div>

                                                <!-- Email and Phone - on same row -->
                                                <div class="row m-0">
                                                    <div class="col-6 p-0">
                                                        <div class="wrap-input100 validate-input bg1" data-validate="Enter Your Email (e@a.x)">
                                                            <span class="label-input100">Email *</span>
                                                            <input class="input100" type="email" name="email" id="email" placeholder="Your email address" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 p-0">
                                                        <div class="wrap-input100 bg1" style="margin-left: 5px;">
                                                            <span class="label-input100">Phone *</span>
                                                            <input class="input100" type="text" name="phone" id="phone" placeholder="Your phone number" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Special Requests / Message -->
                                                <div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate="Please Type Your Message">
                                                    <span class="label-input100">Special Requests</span>
                                                    <textarea class="input100" name="message" id="message" placeholder="Any special requests or requirements?"></textarea>
                                                </div>
                                                
                                                <!-- Total Cost Section -->
                                                <div class="wrap-input100b reservation-forms" style="background-color: white;">
                                                    <hr class="hr">
                                                    <div class="total-cost">
                                                        <span class="cost-left" style="float:left;"> Total cost:</span>  
                                                        <span class="cost-right">$0</span>
                                                    </div>
                                                </div>

                                                <!-- Hidden fields for calculations -->
                                                <div class="take_to_email" style="display:none;">
                                                    <input class="input100" type="text" name="addition_rate" id="addition_rate" placeholder="Addition Rate" required>
                                                    <input class="input100" type="text" name="base_rate" id="base_rate" placeholder="Base Rate" required>
                                                    <input class="input100" type="text" name="addedGuest" id="addedGuest" placeholder="addedGuest" required>
                                                    <input class="input100" type="text" name="total_amount" id="total_amount" placeholder="total_amount" required>
                                                </div>

                                                <!-- Submit Button -->
                                                <div class="container-contact100-form-btn">
                                                    <button type="submit" class="contact100-form-btn">
                                                        <span style="color: white !important;">
                                                            Book Your Stay Now
                                                            <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                                                        </span>
                                                    </button>
                                                    
                                                    <div class="invalid-feedbacks" id="emailError"></div>
                                                </div>
                                            </form>


<!-- index booking form -->
<div class="booking-form p-4 bg-dark bg-opacity-75">
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
                                <div class="cs-form-field cs-villa">
                                    <div class="field-wrap">
                                        <label class="cs-form-label">Select Villa</label>

                                        <div class="field-input-wrap checkout-date">
                                            <input type="text" value="" readonly="" placeholder=""
                                                class="select-villa" id="end" name="end" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="cs-form-field cs-submit">
                                    <div class="field-wrap">
                                        <button class="button book-now-btn2" id="book_now" role="button" style="z-index: 0; min-width: 170px;" type="submit">
                                            <span class="btn-text">Book Now</span>
                                        </button>
                                    </div>
                                </div>
                                <input type="hidden" name="search_rooms" value="">
                            </form>
                        </div>
                    </div>



                    <div class="guest-dropdown" id="guestDropdown">
                                    <div class="dropdown-item">
                                        <label>Adult</label>
                                        <div class="quantity-control">
                                            <button type="button" class="quantity-btn" id="decreaseAdult">-</button>
                                            <input type="text" class="quantity-input" id="adultCount" value="1" readonly>
                                            <button type="button" class="quantity-btn" id="increaseAdult">+</button>
                                        </div>
                                    </div>
                                    
                                    <div class="dropdown-item">
                                        <label>Child</label>
                                        <div class="quantity-control">
                                            <button type="button" class="quantity-btn" id="decreaseChild">-</button>
                                            <input type="text" class="quantity-input" id="childCount" value="0" readonly>
                                            <button type="button" class="quantity-btn" id="increaseChild">+</button>
                                        </div>
                                    </div>
                                </div>