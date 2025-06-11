<style>
    /* EXPERT MODAL STYLES */
        .modal-expert {
            display: none;
            position: fixed;
            z-index: 1200;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color:rgba(247, 247, 247, 1);
            backdrop-filter: blur(5px);
        }

        .modal-expert.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background:rgba(255, 255, 255, .3);
            border-radius: 2px;
            padding: 30px;
            max-width: 800px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
        }

        .modal-header h2 {
            margin: 0;
            color: #333;
            font-size: 24px;
        }

        .close-btn-2 {
            background: none;
            border: none;
            font-size: 28px;
            cursor: pointer;
            color: #999;
            padding: 0;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .close-btn-2:hover {
            background-color: #f0f0f0;
            color: #333;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
            font-size: 14px;
        }

        .form-group input,
        .form-group select {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color:rgb(175, 140, 76);
            box-shadow: 0 0 0 2px rgba(76, 175, 80, 0.1);
        }

        .activities-section {
            margin: 30px 0;
        }

        .activities-section h3 {
            margin-bottom: 20px;
            color: #333;
            font-size: 18px;
        }

        .activities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
        }

        .activity-item {
            display: flex;
            align-items: center;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .activity-item:hover {
            background: #e9ecef;
        }

        .activity-item input[type="checkbox"] {
            margin-right: 10px;
            width: 18px;
            height: 18px;
            accent-color:rgb(175, 135, 76);
        }

        .activity-item label {
            cursor: pointer;
            font-size: 14px;
            color: #333;
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg,rgb(196, 159, 103),rgb(175, 141, 89));
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .submit-btn:hover {
            background: linear-gradient(135deg,rgb(197, 161, 106), #b8945e);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(175, 140, 76, 0.3);
        }
        .loading-spinner {
            text-align: center;
            padding: 20px;
            color: #666;
        }

        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }

        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
        }
</style>


<?php
require_once '../../../config/database.php';

// Initialize database
$db = Database::getInstance();

// Get selected region from query parameter
$selectedRegion = $_GET['region'] ?? 'rwanda';
$validRegions = ['rwanda', 'east_africa'];
if (!in_array($selectedRegion, $validRegions)) {
    $selectedRegion = 'rwanda';
}

// Fetch all active packages for the selected region
$packages = $db->prepare("SELECT * FROM tourism_packages 
                         WHERE is_active = TRUE AND region = ? 
                         ORDER BY display_order");
$packages->execute([$selectedRegion]);
$packages = $packages->fetchAll(PDO::FETCH_ASSOC);

// Fetch all dynamic content
$locations = $db->query("SELECT * FROM locations WHERE is_active = TRUE ORDER BY display_order")->fetchAll(PDO::FETCH_ASSOC);
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
                    
                    <!-- Region Filter -->
                    <div class="region-filter mb-4 ">
                        <div class="button-group-2" id="locationGroup">
                            <button class="btn-2  <?php echo $selectedRegion === 'rwanda' ? 'active' : ''; ?>"
                             onclick="filterPackages('rwanda')" data-value="rwanda">
                                Rwanda
                            </button>
                            <button class="btn-2  <?php echo $selectedRegion === 'east_africa' ? 'active' : ''; ?>"
                                onclick="filterPackages('east_africa')" data-value="east-africa">
                                East Africa
                            </button>
                        </div>
                    </div>
                </div>
                <div class="packages-grid">
                    <?php foreach ($packages as $package): ?>
                        <div class="package-card">
                            <div class="package-image">
                                <img src="../../../assets/image/<?php echo htmlspecialchars($package['main_image']); ?>"
                                    alt="<?php echo htmlspecialchars($package['title']); ?>" class="img-fluid">
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
        <div id="expertModal" class="modal-expert">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Speak To A Travel Specialist</h2>
                    <button class="close-btn" onclick="closeModal()">&times;</button>
                </div>
                <p style="margin-bottom: 30px; color: #666;">Please share with us a little information about your travel requirements. One of our travel consultants will then reach out to begin sculpting your journey of a lifetime!</p>

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
                            <label for="phoneNumber">Phone Number</label>
                            <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Type here...">
                        </div>
                        <div class="form-group">
                            <label for="travelFromCountry">Which Country are you travelling from</label>
                            <input type="text" id="travelFromCountry" name="travelFromCountry" placeholder="Type here..." required>
                        </div>
                        <div class="form-group">
                            <label for="startDate">Do you have a travel start date in mind?</label>
                            <input type="date" id="startDate" name="startDate">
                        </div>
                        <div class="form-group">
                            <label for="endDate">Do you have a travel end date in mind?</label>
                            <input type="date" id="endDate" name="endDate">
                        </div>
                        <div class="form-group">
                            <label for="nights">How many nights would you like to travel for?</label>
                            <input type="number" id="nights" name="nights" placeholder="Type here..." min="1">
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
                            <input type="number" id="gorillaTreks" name="gorillaTreks" placeholder="Type here..." min="0">
                        </div>
                        <div class="form-group">
                            <label for="budgetRange">Budget Range</label>
                            <select id="budgetRange" name="budgetRange">
                                <option value="">Select budget range...</option>
                                <option value="under_1000">Under $1,000</option>
                                <option value="1000_2500">$1,000 - $2,500</option>
                                <option value="2500_5000">$2,500 - $5,000</option>
                                <option value="5000_10000">$5,000 - $10,000</option>
                                <option value="over_10000">Over $10,000</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="hearAboutUs">How Did You Hear About Us</label>
                            <select id="hearAboutUs" name="hearAboutUs">
                                <option value="">Select option...</option>
                                <option value="google">Google Search</option>
                                <option value="social_media">Social Media</option>
                                <option value="friend_referral">Friend/Family Referral</option>
                                <option value="travel_blog">Travel Blog</option>
                                <option value="advertisement">Advertisement</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="specialRequests">Special Requests or Comments</label>
                            <input type="text" id="specialRequests" name="specialRequests" placeholder="Any special requirements...">
                        </div>
                    </div>

                    <button type="submit" class="submit-btn">Submit Request</button>
                </form>
            </div>
        </div>

        <?php include("../../../layouts/footer.php"); ?>
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

        /* =========== EXPERT MODAL START ============*/
        function showModal() {
            console.log('showModal called'); // Debug log
            const modal = document.getElementById('expertModal');
            if (modal) {
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
                console.log('Modal should be visible now'); // Debug log
            } else {
                console.error('Modal element not found');
            }
        }

        function closeModal() {
            console.log('closeModal called'); // Debug log
            const modal = document.getElementById('expertModal');
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
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

            // Show loading state
            const submitBtn = this.querySelector('.submit-btn');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Submitting...';
            submitBtn.disabled = true;

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

            // Simulate form submission (replace with actual AJAX call)
            setTimeout(() => {
                console.log('Form submitted with data:', data);
                
                // Show success message
                const successDiv = document.createElement('div');
                successDiv.className = 'success-message';
                successDiv.textContent = 'Thank you for your interest! We will contact you soon.';
                this.insertBefore(successDiv, this.firstChild);
                
                // Reset form
                this.reset();
                
                // Reset button
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
                
                // Close modal after 2 seconds
                setTimeout(() => {
                    closeModal();
                    // Remove success message
                    if (successDiv.parentNode) {
                        successDiv.parentNode.removeChild(successDiv);
                    }
                }, 2000);
                
            }, 1000);
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });

        // Auto-calculate nights based on dates
        document.getElementById('startDate').addEventListener('change', calculateNights);
        document.getElementById('endDate').addEventListener('change', calculateNights);

        function calculateNights() {
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            
            if (startDate && endDate) {
                const start = new Date(startDate);
                const end = new Date(endDate);
                const timeDiff = end.getTime() - start.getTime();
                const nights = Math.ceil(timeDiff / (1000 * 3600 * 24));
                
                if (nights > 0) {
                    document.getElementById('nights').value = nights;
                }
            }
        }
        /* ==== END EXPERT MODAL =========================== */

        // Package details modal functions
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
            showModal();
        }

        // Region filtering functions
        function filterPackages(region) {
            // Update URL without reloading the page
            const url = new URL(window.location.href);
            url.searchParams.set('region', region);
            window.history.pushState({}, '', url);
            
            // Highlight active button
            document.querySelectorAll('.region-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
            
            // Reload packages via AJAX
            fetchPackages(region);
        }
        
        function fetchPackages(region) {
            // Show loading state
            const packagesGrid = document.querySelector('.packages-grid');
            packagesGrid.innerHTML = '<div class="loading-spinner">Loading packages...</div>';
            
            // Fetch packages for the selected region
            fetch(`../static/get_packages.php?region=${region}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success && data.packages && data.packages.length > 0) {
                        renderPackages(data.packages);
                    } else {
                        packagesGrid.innerHTML = '<div class="alert alert-info">No packages found for this region.</div>';
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                    packagesGrid.innerHTML = '<div class="alert alert-danger">Failed to load packages. Please try again.</div>';
                });
        }
        
        function renderPackages(packages) {
            const packagesGrid = document.querySelector('.packages-grid');
            let html = '';
            
            packages.forEach(package => {
                html += `
                    <div class="package-card">
                        <div class="package-image">
                            <img src="../../../assets/image/${escapeHtml(package.main_image)}" 
                                 alt="${escapeHtml(package.title)}" class="img-fluid">
                        </div>
                        <div class="package-content">
                            <div class="package-data">
                                <h3>${escapeHtml(package.title)}</h3>
                                <p>${escapeHtml(package.short_description)}</p>
                            </div>
                            <div class="package-link">
                                <button class="package-btn" onclick="showPackageDetails(${package.id})">
                                    View Details
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            });
            
            packagesGrid.innerHTML = html;
        }
        
        function escapeHtml(unsafe) {
            if (!unsafe) return '';
            return unsafe.toString()
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }
    </script>

    <script>
        class MinimalButtonGroup {
            constructor(groupElement) {
                this.group = groupElement;
                this.buttons = Array.from(this.group.querySelectorAll('.btn-2'));
                this.activeIndex = this.buttons.findIndex(btn => btn.classList.contains('active'));
                
                this.init();
                this.updateSlider();
            }

            init() {
                this.buttons.forEach((btn, index) => {
                    btn.addEventListener('click', () => this.selectButton(index));
                });
            }

            selectButton(index) {
                if (index === this.activeIndex) return;

                // Update active states
                this.buttons[this.activeIndex].classList.remove('active');
                this.buttons[index].classList.add('active');
                this.activeIndex = index;

                // Update slider position
                this.updateSlider();

                // Emit change event
                const selectedValue = this.buttons[index].dataset.value;
                this.group.dispatchEvent(new CustomEvent('change', {
                    detail: { 
                        value: selectedValue, 
                        index: index,
                        button: this.buttons[index]
                    }
                }));
            }

            updateSlider() {
                const activeButton = this.buttons[this.activeIndex];
                const groupRect = this.group.getBoundingClientRect();
                const buttonRect = activeButton.getBoundingClientRect();
                
                const offsetLeft = buttonRect.left - groupRect.left - 4;
                const buttonWidth = buttonRect.width;
                
                this.group.style.setProperty('--slider-left', `${offsetLeft}px`);
                this.group.style.setProperty('--slider-width', `${buttonWidth}px`);
            }
        }

        // Initialize the button group
        document.addEventListener('DOMContentLoaded', () => {
            // Add CSS custom properties for slider animation
            const style = document.createElement('style');
            style.textContent = `
                .button-group::before {
                    left: var(--slider-left, 4px);
                    width: var(--slider-width, 70px);
                }
            `;
            document.head.appendChild(style);

            const group = document.getElementById('locationGroup');
            const buttonGroup = new MinimalButtonGroup(group);
            
            // Listen for changes
            group.addEventListener('change', (e) => {
                console.log('Selected:', e.detail.value);
            });
        });

        // Handle window resize
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                const group = document.getElementById('locationGroup');
                if (group.buttonGroup) {
                    group.buttonGroup.updateSlider();
                }
            }, 100);
        });
    </script>
</body>
</html>