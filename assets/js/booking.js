// Add this script to your scripts section
$(document).ready(function() {
    // Variables to store price settings
    let baseCost = 0;
    let additionCost = 0;
    
    // Fetch price data when the page loads
    fetchPrice();
    
    // Function to fetch price from the API
    function fetchPrice() {
        // Use AJAX to fetch price data
        $.ajax({
            url: '../../PriceSetting/api/priceSettingApi.php?action=fetchPrice',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data && typeof data === "object" && "cost" in data && "addition" in data) {
                    // Store cost and addition values
                    baseCost = parseFloat(data.cost || 0);
                    additionCost = parseFloat(data.addition || 0);
                    
                    // Update the display with base rate
                    $('.text-right.t-small').text(`From $${baseCost.toFixed(0)}/night`);
                }
            },
            error: function(error) {
                console.error('Error fetching price:', error);
            }
        });
    }

    // Book Now button click handler
    $('#book_now').on('click', function(e) {
        e.preventDefault();
        
        // Transfer values from the main form to the popup form
        $('#startPopup').val($('#start').val());
        $('#endPopup').val($('#end').val());
        
        // Get the guest info
        const guestText = $('#guest').val();
        const adultMatch = guestText.match(/(\d+) Adult/);
        const childMatch = guestText.match(/(\d+) Child/);
        
        const adults = adultMatch ? parseInt(adultMatch[1]) : 1;
        const kids = childMatch ? parseInt(childMatch[1]) : 0;
        
        $('#adultsPopup').val(adults);
        $('#childPopup').val(kids);
        console.log("kids ", kids);
        
        // Calculate initial total
        calculateTotal();
        
        // Show the modal
        $('#bookingModal').modal('show');
    });
    
    // Calculate total on any change to relevant fields
    $('#adultsPopup, #kidsPopup').on('input', validatePeopleCount);
    $('#startPopup, #endPopup').on('change', calculateTotal);
    
    // Function to validate people count
    function validatePeopleCount() {
        let adults = parseInt($('#adultsPopup').val()) || 0;
        let children = parseInt($('#kidsPopup').val()) || 0;
        
        // Ensure adults is at least 1
        if (adults < 1) $('#adultsPopup').val(1);
        
        // Ensure children is at least 0
        if (children < 0) $('#kidsPopup').val(0);
        
        // Calculate total cost after validation
        calculateTotal();
    }
    
    // Function to calculate total cost
    function calculateTotal() {
        let adults = parseInt($('#adultsPopup').val()) || 1;
        let children = parseInt($('#kidsPopup').val()) || 0;
        let totalPeople = adults;
        
        // Get date values
        let startDate = new Date($('#startPopup').val());
        let endDate = new Date($('#endPopup').val());
        
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
        $('.cost-right-popup').text(`$${totalCost.toFixed(0)}`);
        
        // Update hidden fields
        var addedGuest = (totalPeople > 3) ? (totalPeople - 3) : 0;
        $('#addition_rate_popup').val(additionCost);
        $('#base_rate_popup').val(baseCost);
        $('#addedGuest_popup').val(addedGuest);
        $('#total_amount_popup').val(totalCost);
    }
    
    // Handle popup form submission
    $('#bookingFormPopup').on('submit', function(e) {
        e.preventDefault();
        
        // Check if there's any error before submitting
        if ($('#emailErrorPopup').text() === '') {
            let rand = Math.floor(100000 + Math.random() * 900000);
            let bookingCode = 'EVBN' + rand;
            
            let formData = {
                bookingCode: bookingCode,
                checkin: $('#startPopup').val(),
                checkout: $('#endPopup').val(),
                adults: $('#adultsPopup').val(),
                child: $('#childPopup').val(),
                names: $('#namesPopup').val(),
                email: $('#emailPopup').val(),
                phone: $('#phonePopup').val(),
                message: $('#messagePopup').val(),
                addition_rate: $('#addition_rate_popup').val(),
                base_rate: $('#base_rate_popup').val(),
                addedGuest: $('#addedGuest_popup').val(),
                total_amount: $('#total_amount_popup').val()
            };
            
            $.ajax({
                type: 'POST',
                url: '../../Booking/api/bookingApi.php?action=booking',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Use SweetAlert for success message
                        Swal.fire({
                            icon: 'success',
                            title: 'BOOKING REQUEST SENT!',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            // Close the modal and reset form
                            $('#bookingModal').modal('hide');
                            $('#bookingFormPopup')[0].reset();
                            $('#myForm')[0].reset();
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
                        text: 'Something went wrong. Please try again. ' + status + ' ' + error
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