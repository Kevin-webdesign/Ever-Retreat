<?php
require_once '../../../config/database.php';

// Initialize database
$db = Database::getInstance();

// Fetch all dynamic content
$locations = $db->query("SELECT * FROM locations WHERE is_active = TRUE ORDER BY display_order")->fetchAll(PDO::FETCH_ASSOC);

// Fetch all active packages
$packages = $db->query("SELECT * FROM tourism_packages WHERE is_active = TRUE ORDER BY display_order")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<!-- HEADER LINKS -->
<?php include("../../../layouts/header.php"); ?>

<body style="background: #f8f9fa;">
    <?php include("../static/tourism-styles.php"); ?>
    <!-- Navbar -->
    <?php include("../../../layouts/navbar.php"); ?>
    <!-- End navbar -->

    <div class="hero-content text-white text-center vh-100">
        <!-- Video Background -->
        <div class="video-background">
            <video autoplay muted loop playsinline>
                <source src="../../../assets/video/hero_1746553018_Video @.mp4" type="video/mp4">
            </video>
        </div>
        <div class="container-top">
            <h1 class="display-4">Tourism</h1>
        </div>
        <div class="nav-buttons">
            <button class="nav-btn active" onclick="showSection('destinations')">Destinations</button>
            <button class="nav-btn" onclick="showSection('packages')">Tour Packages</button>
            <button class="nav-btn" onclick="showModal()">Talk to a Travel Expert</button>
        </div>
    </div>

    <div class="new mb-5">
        <div id="destinations" class="content-section-tourism active">
            <div class="row d-flex ">
                <div class="section-header">
                    <span>Our Location</span>
                    <h2>Explore Our Best Location for<br>an Unforgettable Vacation</h2>
                </div>
                <div class="content location-row">
                    <?php foreach ($locations as $location): ?>
                        <div
                            class="image loc-col-<?php echo ($location['display_order'] == 2 || $location['display_order'] == 4) ? '5' : '3'; ?> margin-right-img margin-btm-img">
                            <div class="img">
                                <?php if (!empty($location['image_path'])): ?>
                                    <img src="../../../assets/image/<?php echo htmlspecialchars($location['image_path']); ?>"
                                        alt="<?php echo htmlspecialchars($location['name']); ?>" class="img-fluid">
                                <?php endif; ?>
                                <div class="details">
                                    <h6><?php echo htmlspecialchars($location['name']); ?></h6>
                                    <p><?php echo htmlspecialchars($location['tagline']); ?></p>
                                </div>
                                <div class="after-det text-white">
                                    <h6><?php echo htmlspecialchars($location['name']); ?></h6>
                                    <p><?php echo htmlspecialchars($location['description']); ?></p>
                                </div>
                                <a href="../../../modules/General/views/location_x.php?id=<?php echo $location['id']; ?>"
                                    class="link-circle">
                                    <i class="fa fa-arrow-right diagonal"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Packages Section -->
        <div id="packages" class="content-section-tourism">
            <div class="container">
                <div class="section-header">
                    <span>Packages</span>
                    <h2>Explore Our Exquisite Tourism Packages</h2>
                </div>
                <div class="packages-grid">
                    <?php foreach ($packages as $package): ?>
                        <div class="package-card">
                            <div class="package-image">
                                <img src="../../../assets/image/<?php echo htmlspecialchars($package['main_image']); ?>"
                                    alt="<?php echo htmlspecialchars($package['title']); ?>">
                            </div>
                            <div class="package-content">
                                <div class="package-data">
                                    <h3><?php echo htmlspecialchars($package['title']); ?></h3>
                                    <p><?php echo htmlspecialchars($package['short_description']); ?></p>
                                </div>
                                <div class="package-link">
                                    <button class="package-btn" onclick="showPackageDetails(<?php echo $package['id']; ?>)">
                                        View Details
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Package Details Modal -->
        <div id="packageModal" class="package-modal">
            <div class="modal-contents package-modal-content">
                <button class="close-btn" onclick="closePackageModal()">&times;</button>
                <div id="package-details-container" class="package-details">
                    <!-- Content will be loaded via AJAX -->
                </div>
            </div>
        </div>

        <!-- Travel Expert Modal -->
        <div id="expertModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Speak To A Travel Specialist</h2>
                    <button class="close-btn" onclick="closeModal()">&times;</button>
                </div>
                <p style="margin-bottom: 30px; color: #666;">Please share with us a little information about your travel
                    requirements. One of our travel consultants will then reach out to begin sculpting your journey of a
                    lifetime!</p>

                <form id="travelForm">
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="firstName">First name</label>
                            <input type="text" id="firstName" name="firstName" placeholder="Type here..." required>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last name</label>
                            <input type="text" id="lastName" name="lastName" placeholder="Type here..." required>
                        </div>
                        <div class="form-group">
                            <label for="email">Please enter your email address</label>
                            <input type="email" id="email" name="email" placeholder="Type here..." required>
                        </div>
                        <div class="form-group">
                            <label for="country">Which Country are you travelling from</label>
                            <input type="text" id="country" name="country" placeholder="Type here..." required>
                        </div>
                        <div class="form-group">
                            <label for="startDate">Do you have a travel start date in mind?</label>
                            <input type="date" id="startDate" name="startDate">
                        </div>
                        <div class="form-group">
                            <label for="nights">How many nights would you like to travel for?</label>
                            <input type="number" id="nights" name="nights" placeholder="Type here..." min="1">
                        </div>
                        <div class="form-group">
                            <label for="endDate">Do you have a travel start date in mind?</label>
                            <input type="date" id="endDate" name="endDate">
                        </div>
                    </div>

                    <div class="activities-section">
                        <h3>Key Activities</h3>
                        <div class="activities-grid">
                            <div class="activity-item">
                                <input type="checkbox" id="gorilla" name="activities[]" value="gorilla">
                                <label for="gorilla">Gorilla Trekking</label>
                            </div>
                            <div class="activity-item">
                                <input type="checkbox" id="golden" name="activities[]" value="golden">
                                <label for="golden">Golden monkey tracking</label>
                            </div>
                            <div class="activity-item">
                                <input type="checkbox" id="chimp" name="activities[]" value="chimp">
                                <label for="chimp">Chimpanzee tracking</label>
                            </div>
                            <div class="activity-item">
                                <input type="checkbox" id="kivu" name="activities[]" value="kivu">
                                <label for="kivu">Lake Kivu activities</label>
                            </div>
                            <div class="activity-item">
                                <input type="checkbox" id="hiking" name="activities[]" value="hiking">
                                <label for="hiking">Hiking</label>
                            </div>
                            <div class="activity-item">
                                <input type="checkbox" id="museum" name="activities[]" value="museum">
                                <label for="museum">Ethnographic Museum</label>
                            </div>
                            <div class="activity-item">
                                <input type="checkbox" id="village" name="activities[]" value="village">
                                <label for="village">Iby'iwacu Cultural Village</label>
                            </div>
                            <div class="activity-item">
                                <input type="checkbox" id="bird" name="activities[]" value="bird">
                                <label for="bird">Bird watching</label>
                            </div>
                            <div class="activity-item">
                                <input type="checkbox" id="safari" name="activities[]" value="safari">
                                <label for="safari">Big Five safari</label>
                            </div>
                            <div class="activity-item">
                                <input type="checkbox" id="canopy" name="activities[]" value="canopy">
                                <label for="canopy">Canopy walk</label>
                            </div>
                            <div class="activity-item">
                                <input type="checkbox" id="tea" name="activities[]" value="tea">
                                <label for="tea">Tea & coffee tours</label>
                            </div>
                            <div class="activity-item">
                                <input type="checkbox" id="agri" name="activities[]" value="agri">
                                <label for="agri">Agri-tourism experiences</label>
                            </div>
                            <div class="activity-item">
                                <input type="checkbox" id="genocide" name="activities[]" value="genocide">
                                <label for="genocide">Kigali Genocide Memorial</label>
                            </div>
                            <div class="activity-item">
                                <input type="checkbox" id="cycling" name="activities[]" value="cycling">
                                <label for="cycling">Cycling the Congo Nile Trail</label>
                            </div>
                            <div class="activity-item">
                                <input type="checkbox" id="city" name="activities[]" value="city">
                                <label for="city">Kigali city tour</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="gorillaTreks">How many Gorilla Treks Would You Like to Book</label>
                            <input type="number" id="gorillaTreks" name="gorillaTreks" placeholder="Type here..."
                                min="0">
                        </div>
                        <div class="form-group">
                            <label for="travelCountry">Which Country are you travelling from</label>
                            <input type="text" id="travelCountry" name="travelCountry" placeholder="Type here...">
                        </div>
                    </div>

                    <button type="submit" class="submit-btn">Submit Request</button>
                </form>
            </div>
        </div>


        <?php
        include("../../../layouts/footer.php");
        ?>
    </div>


    <!-- ADDING JAVASCRIPTS -->
    <?php include("../../../layouts/scripts.php"); ?>

    <script>
        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.content-section-tourism').forEach(section => {
                section.classList.remove('active');
            });

            // Remove active class from all buttons
            document.querySelectorAll('.nav-btn').forEach(btn => {
                btn.classList.remove('active');
            });

            // Show selected section
            document.getElementById(sectionId).classList.add('active');

            // Add active class to clicked button
            event.target.classList.add('active');
        }

        function showModal() {
            document.getElementById('expertModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('expertModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('expertModal').addEventListener('click', function (e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Handle form submission
        document.getElementById('travelForm').addEventListener('submit', function (e) {
            e.preventDefault();

            // Get form data
            const formData = new FormData(this);
            const data = {};

            // Convert FormData to regular object
            for (let [key, value] of formData.entries()) {
                if (key === 'activities[]') {
                    if (!data.activities) data.activities = [];
                    data.activities.push(value);
                } else {
                    data[key] = value;
                }
            }

            console.log('Form submitted with data:', data);
            alert('Thank you for your interest! We will contact you soon.');
            closeModal();
            this.reset();
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });

        // New function to load package details via AJAX
        function showPackageDetails(packageId) {
            // Show loading state
            $('#package-details-container').html('<div class="loading-spinner">Loading package details...</div>');
            
            // Show the modal
            $('#packageModal').addClass('active');
            $('body').css('overflow', 'hidden');
            
            // Load package details via AJAX
            $.ajax({
                url: '../static/getPackageDetails.php',
                type: 'GET',
                data: { package_id: packageId },
                dataType: 'html',
                success: function(response) {
                    $('#package-details-container').html(response);
                    
                    // Set up click handlers for day navigation
                    $('.det-nav-item').click(function(e) {
                        e.preventDefault();
                        $('.det-nav-item').removeClass('active');
                        $(this).addClass('active');
                        
                        const dayNumber = $(this).data('day');
                        $('.day-content').hide();
                        $(`#day-${dayNumber}`).show();
                    });
                    
                    // Show first day by default
                    $('.det-nav-item:first').click();
                },
                error: function() {
                    $('#package-details-container').html('<div class="error-message">Failed to load package details. Please try again.</div>');
                }
            });
        }
        
        function closePackageModal() {
            $('#packageModal').removeClass('active');
            $('body').css('overflow', 'auto');
        }
        
        // Close modal when clicking outside
        $(document).on('click', '#packageModal', function(e) {
            if (e.target === this) {
                closePackageModal();
            }
        });
        
        // Close modal with Escape key
        $(document).keydown(function(e) {
            if (e.key === 'Escape' && $('#packageModal').hasClass('active')) {
                closePackageModal();
            }
        });
        
        // Handle booking button click
        function handleBooking() {
            // You can implement booking logic here
            // For now, just show the travel expert modal
            showModal();
        }
    </script>

</body>

</html>