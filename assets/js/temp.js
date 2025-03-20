       
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

    
   
       $(document).ready(function() {
    $('#myForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

     // Prices
const costOne = 1200;
const costTwo = 150;
const kidPrice = 150;

// Get the values from the form fields
const start = $('#start').val();
const end = $('#end').val();
const adults = parseInt($('#adults').val(), 10);
const kids = parseInt($('#kids').val(), 10);

// Convert input dates to Date objects
const startDate = new Date(start);
const endDate = new Date(end);

// Calculate the difference in milliseconds
const diff = endDate - startDate;

// Convert the difference from milliseconds to days
const numDays = Math.round(diff / (1000 * 60 * 60 * 24));

// Calculate total price for adults
let totalPrice = 0;
if (adults > 2) {
    totalPrice = costOne + (adults - 2) * costTwo;
} else {
    totalPrice = costOne;
}

// Calculate additional cost for kids (only those exceeding 2)
if (kids > 2) {
    totalPrice += (kids - 2) * kidPrice;
}

// Calculate the total price for the number of days
let total = totalPrice * numDays;

// Apply discount if staying more than 3 days but not more than 7 days
const discountThreshold = 3;
const discountRate = 0.10;
const freeNightThreshold = 7;
if (numDays > discountThreshold && numDays <= freeNightThreshold) {
    total -= total * discountRate;
}

// Apply one night free if staying more than 7 days
if (numDays > freeNightThreshold) {
    total -= totalPrice; // Subtract the cost of one night
}

// Update form fields with calculated values
document.getElementById('checkin').value = start;
document.getElementById('checkout').value = end;
document.getElementById('numberofadults').value = adults;
document.getElementById('numberofkids').value = kids;
document.getElementById('daysofstay').value = numDays;
document.getElementById('totalamount').value = total.toFixed(2); // Ensure the total is in a proper format

// Create the message to display in the pop-up
const message = `
    1. Check-In Date: ${start}<br>
    2. Check-out Date: ${end}<br>
    3. Number Adults: ${adults}<br>
    4. Number Children: ${kids}<br>
    5. Number of Days: ${numDays}<br>
    Total Amount: ${total.toFixed(2)}$
`;


        //real pop up
         $('#pop-up-block').css('display', 'block');
        // Update the pop-up with the message and set its display to block
        $('#display').html(message).css('display', 'block');
    });
});
    


//  old one on BOOKING FORM
document.addEventListener("DOMContentLoaded", function () {
    const dropdownItems = document.querySelectorAll(".dropdown-item[data-target]");
    const contentItems = document.querySelectorAll(".content-item");
    const dropdownMenus = document.querySelectorAll(".dropdown-menu.custom-dropdown");
    const defaultContents = document.querySelectorAll(".content");
    const boxContainer = document.querySelector('.box-container');
    const boxes = document.querySelectorAll('.box');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    let currentIndex = 0;


    // Function to hide all content items and show the default content
    const showDefaultContent = (dropdownMenu) => {
        // Hide all content items
        contentItems.forEach((content) => content.classList.remove("active"));

        // Show the default content for the specific dropdown
        const defaultContent = dropdownMenu.querySelector(".content-item");
        if (defaultContent) {
            defaultContent.classList.add("active");
        }
    };

    // Show content on hover
    dropdownItems.forEach((item) => {
        item.addEventListener("mouseenter", function (e) {
            e.preventDefault();

            // Hide all content items and default content
            contentItems.forEach((content) => content.classList.remove("active"));
            defaultContents.forEach((content) => content.classList.remove("active"));

            // Show the selected content item
            const target = this.getAttribute("data-target");
            const activeContent = document.getElementById(target);
            if (activeContent) {
                activeContent.classList.add("active");
            }
        });
    });

    // Set default content when dropdown is opened
    dropdownMenus.forEach((dropdownMenu) => {
        dropdownMenu.addEventListener("mouseenter", () => {
            showDefaultContent(dropdownMenu);
        });

        // Reset to default content when mouse leaves the dropdown menu
        dropdownMenu.addEventListener("mouseleave", () => {
            showDefaultContent(dropdownMenu);
        });
    });
    
    // Calculate the width of one box
    const boxWidth = boxes[0].offsetWidth;

    function updateCarousel() {
        const offset = -currentIndex * boxWidth;
        boxContainer.style.transform = `translateX(${offset}px)`;
    }

    prevButton.addEventListener('click', function() {
        if (currentIndex > 0) {
            currentIndex--;
        } 
        else {
            currentIndex = boxes.length - 1; // Loop to the last box
        }
        updateCarousel();
    });

    nextButton.addEventListener('click', function() {
        if (currentIndex < boxes.length - 1) {
            currentIndex++;
        } else {
            currentIndex = 0; x
        }
        updateCarousel();
    });

    // Optional: Handle window resizing to recalculate box width
    window.addEventListener('resize', function() {
        const newBoxWidth = boxes[0].offsetWidth;
        if (newBoxWidth !== boxWidth) {
            boxWidth = newBoxWidth;
            updateCarousel();
        }
    });
});

    
$(document).ready(function() {
    // Initialize datepicker for check-in
    $('#checkin').datepicker({
        dateFormat: 'yy-mm-dd', // Date format
        minDate: 0,
        maxDate: '+10Y', // Maximum date: 10 years from now
        yearRange: '2000:' + (new Date().getFullYear() + 10), // Year range: 2000 to current year + 10
        beforeShow: function(input, inst) {
            // Add a custom title to the calendar
            setTimeout(function() {
                var title = 'Select Check-in Date';
                $(inst.dpDiv).find('.ui-datepicker-header')
                    .before('<div class="ui-datepicker-title-custom">' + title + '</div>');
            }, 0);
        },
        onSelect: function(selectedDate) {
            // Set the minDate for the check-out date picker
            $('#checkout').datepicker('option', 'minDate', selectedDate);
        }
    });

    // Initialize datepicker for check-out
    $('#checkout').datepicker({
        dateFormat: 'yy-mm-dd', // Date format
        minDate: 0, // Minimum date: today
        maxDate: '+10Y', // Maximum date: 10 years from now
        yearRange: '2000:' + (new Date().getFullYear() + 10), // Year range: 2000 to current year + 10
        beforeShow: function(input, inst) {
            // Add a custom title to the calendar
            setTimeout(function() {
                var title = 'Select Check-out Date';
                $(inst.dpDiv).find('.ui-datepicker-header')
                    .before('<div class="ui-datepicker-title-custom">' + title + '</div>');
            }, 0);
        },
        onSelect: function(selectedDate) {
            // Set the maxDate for the check-in date picker
            $('#checkin').datepicker('option', 'maxDate', selectedDate);
        }
    });

    // Optional: Open the date picker when the input is clicked
    $('#checkin, #checkout').on('click', function() {
        $(this).datepicker('show');
    });
});