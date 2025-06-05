<!-- TOURISM BEFORE EDITED EVERY THING TO BE RETRIEVED IN DATABASE -->

<?php
require_once '../../../config/database.php';

// Initialize database
$db = Database::getInstance();

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
                <source src="../../../assets/video/EverRetreatTourism.mp4" type="video/mp4">
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
        <div id="destinations" class="content-section-tourism">
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
        <!-- Packages Section -->
        <div id="packages" class="content-section-tourism active">
            <div class="container">
                <div class="section-header">
                    <span>Packages</span>
                    <h2>Explore Our Exquisite Tourism Packages</h2>
                </div>
                <div class="packages-grid">
                    <!-- Package 1 -->
                    <div class="package-card">
                        <div class="package-image">
                            <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80"
                                alt="Package 1">
                        </div>
                        <div class="package-content">
                            <div class="package-data">
                                <h3>8 Days of Exploring a thousand hills</h3>
                                <p>An in-depth look at Innovate Hub's impact in supporting</p>
                            </div>
                            <div class="package-link">
                                <button class="package-btn" onclick="showPackageDetails('package1')">View
                                    Details</button>
                            </div>
                        </div>
                    </div>

                    <!-- Package 2 -->
                    <div class="package-card">
                        <div class="package-image">
                            <img src="https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80"
                                alt="Package 2">
                        </div>
                        <div class="package-content">
                            <div class="package-data">
                                <h3>5 Days Exploring Rwanda's amazing primates</h3>
                                <p>An in-depth look at InnovaHIub's impact in supporting</p>
                            </div>
                            <div class="package-link">
                                <button class="package-btn" onclick="showPackageDetails('package2')">View
                                    Details</button>
                            </div>
                        </div>
                    </div>

                    <!-- Package 3 -->
                    <div class="package-card">
                        <div class="package-image">
                            <img src="https://images.unsplash.com/photo-1523805009345-7448845a9e53?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80"
                                alt="Package 3">
                        </div>
                        <div class="package-content">
                            <div class="package-data">
                                <h3>6 Day hiking vacation</h3>
                                <p>An in-depth look at innovatethub's impact in supporting</p>
                            </div>
                            <div class="package-link">
                                <button class="package-btn" onclick="showPackageDetails('package3')">View
                                    Details</button>
                            </div>
                        </div>
                    </div>

                    <!-- Package 4 -->
                    <div class="package-card">
                        <div class="package-image">
                            <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80"
                                alt="Package 4">
                        </div>
                        <div class="package-content">
                            <div class="package-data">
                                <h3>3 Days Akagera and Umva Muhazi</h3>
                                <p>An in-depth look at innovatethub's impact in supporting</p>
                            </div>
                            <div class="package-link">
                                <button class="package-btn" onclick="showPackageDetails('package4')">View
                                    Details</button>
                            </div>
                        </div>
                    </div>

                    <!-- Package 5 -->
                    <div class="package-card">
                        <div class="package-image">
                            <img src="https://images.unsplash.com/photo-1580654712603-eb43273aff33?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80"
                                alt="Package 5">
                        </div>
                        <div class="package-content">
                            <div class="package-data">
                                <h3>3 Gorilla Trekking and Lake kivu (Rubavu)</h3>
                                <p>An in-depth look at innovatethub's impact in supporting</p>
                            </div>
                            <div class="package-link">
                                <button class="package-btn" onclick="showPackageDetails('package5')">View
                                    Details</button>
                            </div>
                        </div>
                    </div>

                    <!-- Package 6 -->
                    <div class="package-card">
                        <div class="package-image">
                            <img src="https://images.unsplash.com/photo-1470115636492-6d2b56f9146d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80"
                                alt="Package 6">
                        </div>
                        <div class="package-content">
                            <div class="package-data">
                                <h3>3 Days Nyungwe National Park & Tea Plantation</h3>
                                <p>An in-depth look at innovatethub's impact in supporting</p>
                            </div>
                            <div class="package-link">
                                <button class="package-btn" onclick="showPackageDetails('package6')">View
                                    Details</button>
                            </div>
                        </div>
                    </div>

                    <!-- Package 7 -->
                    <div class="package-card">
                        <div class="package-image">
                            <img src="https://images.unsplash.com/photo-1475483768296-6163e08872a1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80"
                                alt="Package 7">
                        </div>
                        <div class="package-content">
                            <div class="package-data">
                                <h3>Mountain Gorilla Adventure</h3>
                                <p>An in-depth look at innovateltub's impact in supporting</p>
                            </div>
                            <div class="package-link">
                                <button class="package-btn" onclick="showPackageDetails('package7')">View
                                    Details</button>
                            </div>
                        </div>
                    </div>

                    <!-- Package 8 -->
                    <div class="package-card">
                        <div class="package-image">
                            <img src="https://images.unsplash.com/photo-1505228395891-9a51e7e86bf6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80"
                                alt="Package 8">
                        </div>
                        <div class="package-content">
                            <div class="package-data">
                                <h3>2-Day Escape to Umva Muhazi</h3>
                                <p>An in-depth look at innovateltub's impact in supporting</p>
                            </div>
                            <div class="package-link">
                                <button class="package-btn" onclick="showPackageDetails('package8')">View
                                    Details</button>
                            </div>
                        </div>
                    </div>

                    <!-- Package 9 -->
                    <div class="package-card">
                        <div class="package-image">
                            <img src="https://images.unsplash.com/photo-1503917988258-f87a78e3c995?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80"
                                alt="Package 9">
                        </div>
                        <div class="package-content">
                            <div class="package-data">
                                <h3>2 Days SAFARI Vacation</h3>
                                <p>An in-depth look at innovatiet/ub's impact in supporting</p>
                            </div>
                            <div class="package-link">
                                <button class="package-btn" onclick="showPackageDetails('package9')">View
                                    Details</button>
                            </div>
                        </div>
                    </div>

                    <!-- Package 10 -->
                    <div class="package-card">
                        <div class="package-image">
                            <img src="https://images.unsplash.com/photo-1483729558449-99ef09a8c325?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80"
                                alt="Package 10">
                        </div>
                        <div class="package-content">
                            <div class="package-data">
                                <h3>5 Days Exploring Landscapes of Rwanda</h3>
                                <p>An in-depth look at innovatiet/ub's impact in supporting</p>
                            </div>
                            <div class="package-link">
                                <button class="package-btn" onclick="showPackageDetails('package10')">View
                                    Details</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Package Details Modals -->
        <div id="packageModal" class="package-modal">
            <div class="modal-contents package-modal-content">
                <button class="close-btn" onclick="closePackageModal()">&times;</button>

                <!-- Package 1 Details -->
                <div id="package1-details" class="package-details">
                    <div class="package-details-holder">
                        <!-- Left Navigation -->
                        <div class="left-nav">
                            <div class="nav-title">8 Days of Exploring a thousand hills</div>
                            <ul class="nav-menu">
                                <li class="det-nav-item active">
                                    <a href="#" class="det-nav-link">Day 1: Kigali City Tour</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 2: Transfer to Akagera</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 3: Full-Day Safari in Akagera</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 4: Transfer to Umva Muhazi</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 5: Return to Kigali</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 6: Transfer to Volcanoes National Park</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 7: Gorilla Trekking or Golden Monkey Trek</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 8: Return to Kigali & Departure</a>
                                </li>
                            </ul>
                        </div>
    
                        <!-- Right Content Area -->
                        <div class="right-content">
                            <img src="https://images.unsplash.com/photo-1516026672322-bc52d61a55d5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                                alt="Beautiful landscape view" class="content-image">
    
                            <div class="content-details">
                                <p class="details-text">
                                    Upon arrival in Kigali, explore the capital by visiting the Kigali Genocide Memorial,
                                    Nyamirambo, and the Kimironko Market, with an appreciation for Rwandan art at the Inema
                                    Arts Center. Experience the vibrant culture and rich history of this beautiful city,
                                    known as the cleanest in Africa.
                                </p>
    
                                <button class="action-button" onclick="handleBooking()">
                                    Book Your Stay Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Package 2 Details -->
                <div id="package2-details" class="package-details" style="display:none;">
                    <div class="package-details-holder">
                        <div class="left-nav">
                            <div class="nav-title">5 Days Exploring Rwanda's amazing primates</div>
                            <ul class="nav-menu">
                                <li class="det-nav-item active">
                                    <a href="#" class="det-nav-link">Day 1: Transfer to Nyungwe Forest</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 2: Chimpanzee Walk</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 3: Transfer to Volcanoes</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 4: Cultural Village Visit</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 5: Return to Kigali</a>
                                </li>
                            </ul>
                        </div>
    
                        <div class="right-content">
                            <img src="https://images.unsplash.com/photo-1551632436-cbf8dd35adfa?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                                alt="Nyungwe Forest" class="content-image">
    
                            <div class="content-details">
                                <p class="details-text">
                                    Start on Day 1 with a picturesque drive from Kigali to Nyungwe Forest National Park. In
                                    the afternoon, take a canopy walk that provides expansive views of the old rainforest
                                    and opportunities to see monkeys in the treetops.
                                </p>
    
                                <button class="action-button" onclick="handleBooking()">
                                    Book Your Stay Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Package 3 Details -->
                <div id="package3-details" class="package-details" style="display:none;">
                    <div class="package-details-holder">
                        <div class="left-nav">
                            <div class="nav-title">6 Day hiking vacation</div>
                            <ul class="nav-menu">
                                <li class="det-nav-item active">
                                    <a href="#" class="det-nav-link">Day 1: Arrival in Kigali</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 2: Mount Kigali Hike</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 3: Transfer to Volcanoes</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 4: Dian Fossey's Tomb</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 5: Mount Bisoke Climb</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 6: Departure</a>
                                </li>
                            </ul>
                        </div>
    
                        <div class="right-content">
                            <img src="https://images.unsplash.com/photo-1589998059171-988d887df646?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                                alt="Hiking in Rwanda" class="content-image">
    
                            <div class="content-details">
                                <p class="details-text">
                                    Arrival in Kigali and transfer to the hotel for orientation. Prepare for an exciting
                                    hiking adventure through Rwanda's beautiful landscapes, including Mount Kigali and Mount
                                    Bisoke with its stunning crater lake.
                                </p>
    
                                <button class="action-button" onclick="handleBooking()">
                                    Book Your Stay Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Package 4 Details -->
                <div id="package4-details" class="package-details" style="display:none;">
                    <div class="package-details-holder">
                        <div class="left-nav">
                            <div class="nav-title">3 Days Akagera and Umva Muhazi</div>
                            <ul class="nav-menu">
                                <li class="det-nav-item active">
                                    <a href="#" class="det-nav-link">Day 1: Akagera Safari</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 2: Umva Muhazi</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 3: Return to Kigali</a>
                                </li>
                            </ul>
                        </div>
    
                        <div class="right-content">
                            <img src="https://images.unsplash.com/photo-1564760055775-d63b17a55c44?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                                alt="Akagera National Park" class="content-image">
    
                            <div class="content-details">
                                <p class="details-text">
                                    Morning game drive in Akagera National Park, afternoon boat safari. Experience the
                                    diverse wildlife of Rwanda's only savanna park before relaxing at the beautiful Umva
                                    Muhazi lakeside resort.
                                </p>
    
                                <button class="action-button" onclick="handleBooking()">
                                    Book Your Stay Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Package 5 Details -->
                <div id="package5-details" class="package-details" style="display:none;">
                    <div class="package-details-holder">
                        <div class="left-nav">
                            <div class="nav-title">3 Gorilla Trekking and Lake kivu (Rubavu)</div>
                            <ul class="nav-menu">
                                <li class="det-nav-item active">
                                    <a href="#" class="det-nav-link">Day 1: Gorilla Trekking</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 2: Lake Kivu</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 3: Return to Kigali</a>
                                </li>
                            </ul>
                        </div>
    
                        <div class="right-content">
                            <img src="https://images.unsplash.com/photo-1527631746610-bca00a040d60?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                                alt="Gorilla Trekking" class="content-image">
    
                            <div class="content-details">
                                <p class="details-text">
                                    Early morning transfer to Volcanoes National Park for gorilla trekking. Experience the
                                    unforgettable encounter with mountain gorillas in their natural habitat, followed by
                                    relaxation at beautiful Lake Kivu.
                                </p>
    
                                <button class="action-button" onclick="handleBooking()">
                                    Book Your Stay Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Package 6 Details -->
                <div id="package6-details" class="package-details" style="display:none;">
                    <div class="package-details-holder">
                        <div class="left-nav">
                            <div class="nav-title">3 Days Nyungwe National Park & Tea Plantation</div>
                            <ul class="nav-menu">
                                <li class="det-nav-item active">
                                    <a href="#" class="det-nav-link">Day 1: Transfer to Nyungwe</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 2: Chimpanzee Tracking</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 3: Return to Kigali</a>
                                </li>
                            </ul>
                        </div>
    
                        <div class="right-content">
                            <img src="https://images.unsplash.com/photo-1551632436-cbf8dd35adfa?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                                alt="Nyungwe Forest" class="content-image">
    
                            <div class="content-details">
                                <p class="details-text">
                                    Transfer to Nyungwe Forest, afternoon canopy walk. Experience the biodiversity of one of
                                    Africa's oldest rainforests, with chimpanzee tracking and a visit to scenic tea
                                    plantations.
                                </p>
    
                                <button class="action-button" onclick="handleBooking()">
                                    Book Your Stay Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Package 7 Details -->
                <div id="package7-details" class="package-details" style="display:none;">
                    <div class="package-details-holder">
                        <div class="left-nav">
                            <div class="nav-title">Mountain Gorilla Adventure</div>
                            <ul class="nav-menu">
                                <li class="det-nav-item active">
                                    <a href="#" class="det-nav-link">Day 1: Arrival in Kigali</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 2: Transfer to Volcanoes</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 3: Gorilla Trekking</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 4: Optional Activities</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 5: Departure</a>
                                </li>
                            </ul>
                        </div>
    
                        <div class="right-content">
                            <img src="https://images.unsplash.com/photo-1527631746610-bca00a040d60?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                                alt="Mountain Gorilla" class="content-image">
    
                            <div class="content-details">
                                <p class="details-text">
                                    Arrival in Kigali, city tour including Genocide Memorial. The highlight of this
                                    adventure is the unforgettable gorilla trekking experience in Volcanoes National Park
                                    with local guides.
                                </p>
    
                                <button class="action-button" onclick="handleBooking()">
                                    Book Your Stay Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Package 8 Details -->
                <div id="package8-details" class="package-details" style="display:none;">
                    <div class="package-details-holder">
                        <div class="left-nav">
                            <div class="nav-title">2-Day Escape to Umva Muhazi</div>
                            <ul class="nav-menu">
                                <li class="det-nav-item active">
                                    <a href="#" class="det-nav-link">Day 1: Transfer to Umva Muhazi</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 2: Return to Kigali</a>
                                </li>
                            </ul>
                        </div>
    
                        <div class="right-content">
                    </div>
                        <img src="https://images.unsplash.com/photo-1470114716159-e389f8712fda?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                            alt="Umva Muhazi" class="content-image">

                        <div class="content-details">
                            <p class="details-text">
                                Morning transfer to Umva Muhazi, afternoon boat cruise and fishing. Enjoy a peaceful
                                retreat at this beautiful lakeside location with nature walks and water activities.
                            </p>

                            <button class="action-button" onclick="handleBooking()">
                                Book Your Stay Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Package 9 Details -->
                <div id="package9-details" class="package-details" style="display:none;">
                    <div class="package-details-holder">
                        <div class="left-nav">
                            <div class="nav-title">2 Days SAFARI Vacation</div>
                            <ul class="nav-menu">
                                <li class="det-nav-item active">
                                    <a href="#" class="det-nav-link">Day 1: Akagera Game Drives</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 2: Boat Safari & Return</a>
                                </li>
                            </ul>
                        </div>
    
                        <div class="right-content">
                            <img src="https://images.unsplash.com/photo-1564760055775-d63b17a55c44?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                                alt="Akagera Safari" class="content-image">
    
                            <div class="content-details">
                                <p class="details-text">
                                    Early morning transfer to Akagera National Park, full day game drives. Experience the
                                    thrill of spotting lions, elephants, rhinos and more in Rwanda's premier safari
                                    destination.
                                </p>
    
                                <button class="action-button" onclick="handleBooking()">
                                    Book Your Stay Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Package 10 Details -->
                <div id="package10-details" class="package-details" style="display:none;">
                    <div class="package-details-holder">
                        <div class="left-nav">
                            <div class="nav-title">5 Days Exploring Landscapes of Rwanda</div>
                            <ul class="nav-menu">
                                <li class="det-nav-item active">
                                    <a href="#" class="det-nav-link">Day 1: Transfer to Nyungwe</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 2: Chimpanzee Tracking</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 3: Lake Kivu</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 4: Volcanoes Area</a>
                                </li>
                                <li class="det-nav-item">
                                    <a href="#" class="det-nav-link">Day 5: Return to Kigali</a>
                                </li>
                            </ul>
                        </div>
    
                        <div class="right-content">
                            <img src="https://images.unsplash.com/photo-1516026672322-bc52d61a55d5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                                alt="Rwanda Landscapes" class="content-image">
    
                            <div class="content-details">
                                <p class="details-text">
                                    Leave Kigali and travel through the verdant hills of Rwanda to Nyungwe Forest National
                                    Park. There, you will do an afternoon canopy walk above the old rainforest, which
                                    provides breathtaking views of the valleys and trees below.
                                </p>
    
                                <button class="action-button" onclick="handleBooking()">
                                    Book Your Stay Now
                                </button>
                            </div>
                        </div>
                    </div>
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

        /* +++++++++++++++++++++++++++++++++++++++++++++++++++
                             Package Modal scripts
         +++++++++++++++++++++++++++++++++++++++++++++++++++ */
        function showPackageDetails(packageId) {
            // Hide all package details first
            document.querySelectorAll('.package-details').forEach(detail => {
                detail.style.display = 'none';
            });

            // Show the selected package details
            document.getElementById(packageId + '-details').style.display = 'block';

            // Show the modal
            document.getElementById('packageModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closePackageModal() {
            document.getElementById('packageModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('packageModal').addEventListener('click', function (e) {
            if (e.target === this) {
                closePackageModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && document.getElementById('packageModal').classList.contains('active')) {
                closePackageModal();
            }
        });
    </script>

</body>

</html>

<!-- TOURISM BEFORE EDITED EVERY THING TO BE RETRIEVED IN DATABASE -->