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