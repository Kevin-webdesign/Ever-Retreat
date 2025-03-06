<!DOCTYPE html>
<html lang="en">

<?php include("../../../layouts/header.php"); ?>

<body>
    <!-- Navbar -->
    <?php include("../../../layouts/navbar.php"); ?>

    
    
    <!-- Hero Section -->
    <div class="hero-content text-white text-center vh-100">
        <!-- Video Background -->
        <div class="video-background">
            <video autoplay muted loop playsinline>
                <source
                    src="../../../assets/video/FOUR POINTS BY SHERATON HOTEL KIGALI _ HOTEL COMMERCIAL _ 1MIN _-VIDEO PROJECT 4K.mp4"
                    type="video/mp4">
            </video>
        </div>
        <div class="container" id="Booking">
            <h1 class="display-4 mb-4">Premier B&P Beach Villa</h1>
            <p class="lead mb-5">Welcome to our Master Suite, where time slows down and the elegance of simplicity
                flourishes.</p>

            <!-- Centered Booking Form at Bottom -->
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12">
                    <div class="booking-form p-4 bg-dark bg-opacity-75 rounded">
                        <div class="row g-3">
                            <div class="col-md">
                                <input type="text" class="form-control" id="checkin" placeholder="Check-in Date"
                                    readonly>
                            </div>
                            <div class="col-md">
                                <input type="text" class="form-control" id="checkout" placeholder="Check-out Date"
                                    readonly>
                            </div>
                            <div class="col-md">
                                <input type="number" class="form-control" id="guests" placeholder="Number of Guests">
                            </div>
                            <div class="col-md">
                                <select class="form-select" id="villa">
                                    <option selected>Master Suite</option>
                                    <option value="villa2">Villa Type B</option>
                                    <option value="villa3">Villa Type C</option>
                                </select>
                            </div>
                            <div class="col-md">
                                <button class="btn btn-primary book-now-btn w-100">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="new ">
        <div class="row d-flex" style="margin: 60px; margin-bottom:30px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>About us</p>
                        <h5><b>Welcome to <span>Premier B&P Beach Villa</span>, the Best <br>Destination for Tranquility</b>
                        </h5>
                        <a href="" class="btn book-now-btn text-white">More About us</a>
                    </div>
                    <div class="col-md-6">
                        <p>There are two types of travelers: trend-seekers and those chasing the unexpected. Our accommodations
                            offer the best of both - luxury and discovery.</p>
                        <hr>
                        <div class="row d-flex">
                            <div class="col-md">
                                <h1>150k +</h1>
                                <p>Guests Served</p>
                            </div>
                            <div class="col-md">
                                <h1>24</h1>
                                <p>Villas & Resorts</p>
                            </div>
                            <div class="col-md">
                                <h1>06 +</h1>
                                <p>Years of Experience</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="location-row ev-container" style="padding: 50px;">
                
                <!-- HTML Structure -->
                <div class="ab-col-4 margin-right-img">
                    <div class="video-player">
                        <img src="../../../assets/image/first.jpg"  alt="Video Thumbnail" class="video-thumbnail">
                        <button class="play-button" data-video-id="s8vnc9l8sz4&ab_channel=CircleDigitalMarketingAgency">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 68 48" style="height:60px; width:60px; border-radius:95px;">
                                <path d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z" fill="#C5A880"></path>
                                <path d="M 45,24 27,14 27,34" fill="#fff"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="ab-col-8 about-img">
                    <img src="../../../assets/image/second.jpg" alt="">
                </div>
            </div>
            <div class="location-row text-center mt-5" style="padding: 50px;">
                <div class="col-md-12">
                    <p><span>Our Accommodation</span></p>
                    <h4 style="font-weight: bold;">Find the Perfect Space for Your Stay</h4>
                    <div class="content">
                        <p style="font-size: 12px">
                            The resort offers a total of 139 suites and villas and a wide range of facilities, services,
                            and activities to <br>its guests in an effort to provide a peaceful and tranquil
                            environment.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-6">
                    <img src="../../../assets/image/first.jpg">
                </div>
                <div class="col-md-6 mt-5">
                    <div class="content-1">
                        <h5><b>Premier B&P Beach Villa</b></h5>
                        <p>
                            Welcome to our Master Suite, where time slows down
                            and the elegance of simplicity flourishes. Our Master Suite accommodates
                            up to two guests, featuring a luxurious jacuzzi with
                            a stunning view of Lake Kivu. This 45-square-meter
                            retreat offers a serene escape, complete with a king-sized
                            pillow top bed and a bathroom with both a tub and shower.
                            Indulge in our top-notch amenities, including a flat-screen TV with
                            satellite channels, wireless internet, Elenis bath amenities, a hair
                            dryer, and cozy bathrobe and slippers. Enjoy the convenience of a
                            work desk and chair, 24-hour room service, and air conditioning.
                            Experience unparalleled comfort and tranquility in our Master Suite.</p>
                        <button class="btn more-btn text-white">Discover More <i
                                class="fas fa-long-arrow-alt-right"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row text-center mt-5 mb-5">
                <div class="col-md-12">
                    <p><span>Our Location</span></p>
                    <h5 style="font-weight: bold;">Explore Our Best Location for an Unforgettable Vacation</h5>
                </div>
            </div>
            <div class="content location-row">
                <div class="image loc-col-3 margin-right-img">
                    <div class="img">
                        <img src="../../../assets/image/kigali.jpg" alt="Kigali" class="img-fluid">
                        <div class="details">
                            <h6>Kigali</h6>
                            <p>The heart of modern Rwanda</p>
                        </div>
                        <div class="after-det text-white">
                            <h6>Kigali</h6>
                            <p>Kigali pulses with Rwanda's dynamic transformation, where modernity meets culture.</p>
                        </div>
                        <a href="../../../modules/General/views/location_kigali.php" class="link-circle">
                            <i class="fa fa-arrow-right diagonal"></i>
                        </a>
                    </div>
                </div>
                <div class="image loc-col-5 margin-right-img">
                    <div class="img">
                        <img src="../../../assets/image/rubavu.jpg" alt="rubavu" class="img-fluid">
                        <div class="details">
                            <a href=""></a>
                            <h6>Rubavu</h6>
                            <p>The Wisdom of History</p>
                        </div>
                        <div class="after-det text-white">
                            <h6>Rubavu</h6>
                            <p>Huye is where history and innovation meet. Sit with local elders under ancient trees, hearing tales of Rwanda's journey through time. Art and cultural camps celebrate creative traditions, preserving community spirit while inspiring the future. Huye is a place of reflection and progress, where the past shapes the promise of tomorrow Huye: The Wisdom of History.</p>
                        </div>
                        <a href="../../../modules/General/views/location_rubavu.php" class="link-circle">
                            <i class="fa fa-arrow-right diagonal"></i>
                        </a>
                    </div>
                </div>
                <div class="image loc-col-3">
                    <div class="img">
                        <img src="../../../assets/image/musanze.jpg" alt="musanze" class="img-fluid">
                        <div class="details">
                            <h6>Musanze</h6>
                            <p>The heart of modern Rwanda</p>
                        </div>
                        <div class="after-det text-white">
                            <h6>Musanze</h6>
                            <p>Kigali pulses with Rwanda's dynamic transformation, where modernity meets culture.</p>
                        </div>
                        <a href="../../../modules/General/views/location_musanze.php" class="link-circle">
                            <i class="fa fa-arrow-right diagonal"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="content location-row">
                <div class="image loc-col-5 margin-right-img">
                    <div class="img">
                        <img src="../../../assets/image/nyungwe.jpg" alt="nyungwe" class="img-fluid">
                        <div class="details">
                            <h6>Nyungwe</h6>
                            <p>The heart of modern Rwanda</p>
                        </div>
                        <div class="after-det text-white">
                            <h6>Nyungwe</h6>
                            <p>Nyungwe pulses with Rwanda's dynamic transformation, where modernity meets culture.</p>
                        </div>
                        <a href="../../../modules/General/views/location_nyungwe.php" class="link-circle">
                            <i class="fa fa-arrow-right diagonal"></i>
                        </a>
                    </div>
                </div>
                <div class="image loc-col-3 margin-right-img">
                    <div class="img">
                        <img src="../../../assets/image/nyanza.jpg" alt="Nyanza" class="img-fluid">
                        <div class="details">
                            <a href=""></a>
                            <h6>Nyanza</h6>
                            <p>The serenity of lake kivu</p>
                        </div>
                        <div class="after-det text-white">
                            <h6>Nyanza</h6>
                            <p>Nyanza offers an unmatched sense <br> of tranquility.</p>
                        </div>
                        <a href="../../../modules/General/views/location_nyanza.php" class="link-circle">
                            <i class="fa fa-arrow-right diagonal"></i>
                        </a>
                    </div>
                </div>
                <div class="image loc-col-3">
                    <div class="img">
                        <img src="../../../assets/image/huye.jpg" alt="musanze" class="img-fluid">
                        <div class="details">
                            <h6>Huye</h6>
                            <p>The heart of modern Rwanda</p>
                        </div>
                        <div class="after-det text-white">
                            <h6>Huye</h6>
                            <p>Huye pulses with Rwanda's dynamic transformation, where modernity meets culture.</p>
                        </div>
                        <a href="../../../modules/General/views/location_huye.php" class="link-circle">
                            <i class="fa fa-arrow-right diagonal"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4 " style="position: relative;">
            <div class="col-md-12 elevetor1">

            </div>
            <div class="col-md-12 elevetor2">
                <div class="img">
                    <img src="../../../assets/image/dsc_9633.jpg" alt="fresh">
                    <div class="after-det2 d-flex">
                        <h4 class="ev-title" >Elevate Your stay with Premium <br>Features and Services</h4>
                        <!-- <a href=""><i class="bi bi-arrow-up-right"></i></a> -->
                    </div>
                    <a href="#" class="link-circle2">
                        <i class="bi bi-arrow-up-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row text-center message">
            <div class="col-md-12">
                <p><span>Testimonials</span></p>
                <h3>What Guests saying ? </h3>
            </div>
        </div>
        <div class="row d-flex justify-content-center messagebox">
            <div class="container">
                <div class="box">
                    <div class="card-header d-flex">
                        <div class="img">
                            <img src="../../../assets/img/profile.jpg" alt="Profile" class="avatar-img rounded-circle" />
                        </div>
                        <div class="title">
                            <label for="name"><span> UMULISA Alice </span></label> <br>
                            <label for="title">Our customer</label>
                        </div>
                    </div>
                    <div class="msg">
                        <p>"From the moment we arrived, we were blown away by the villa's
                            beauty and tranquility the private pool and stunning views provided
                            the perfect backdrop for a relaxing getway."</p>
                    </div>
                </div>
                <!-- <div class="box">
                    <div class="card-header d-flex">
                        <div class="img">
                            <img src="img/profile.jpg" alt="Profile" class="avatar-img rounded-circle" />
                        </div>
                        <div class="title">
                            <label for="name"><span> MUKAMANA Alice </span></label> <br>
                            <label for="title">Our customer</label>
                        </div>
                    </div>
                    <div class="msg">
                        <p>"From the moment we arrived, we were blown away by the villa's
                            beauty and tranquility the private pool and stunning views provided
                            the perfect backdrop for a relaxing getway."</p>
                    </div>
                </div>
                <div class="box">
                    <div class="card-header d-flex">
                        <div class="img">
                            <img src="img/profile.jpg" alt="Profile" class="avatar-img rounded-circle" />
                        </div>
                        <div class="title">
                            <label for="name"><span> MUKAMANA Alice </span></label> <br>
                            <label for="title">Our customer</label>
                        </div>
                    </div>
                    <div class="msg">
                        <p>"From the moment we arrived, we were blown away by the villa's
                            beauty and tranquility the private pool and stunning views provided
                            the perfect backdrop for a relaxing getway."</p>
                    </div>
                </div>
                <div class="box">
                    <div class="card-header d-flex">
                        <div class="img">
                            <img src="img/profile.jpg" alt="Profile" class="avatar-img rounded-circle" />
                        </div>
                        <div class="title">
                            <label for="name"><span> MUKAMANA Alice </span></label> <br>
                            <label for="title">Our customer</label>
                        </div>
                    </div>
                    <div class="msg">
                        <p>"From the moment we arrived, we were blown away by the villa's
                            beauty and tranquility the private pool and stunning views provided
                            the perfect backdrop for a relaxing getway."</p>
                    </div>
                </div>
                <div class="box">
                    <div class="card-header d-flex">
                        <div class="img">
                            <img src="img/profile.jpg" alt="Profile" class="avatar-img rounded-circle" />
                        </div>
                        <div class="title">
                            <label for="name"><span> MUKAMANA Alice </span></label> <br>
                            <label for="title">Our customer</label>
                        </div>
                    </div>
                    <div class="msg">
                        <p>"From the moment we arrived, we were blown away by the villa's
                            beauty and tranquility the private pool and stunning views provided
                            the perfect backdrop for a relaxing getway."</p>
                    </div>
                </div>
                <div class="box">
                    <div class="card-header d-flex">
                        <div class="img">
                            <img src="img/profile.jpg" alt="Profile" class="avatar-img rounded-circle" />
                        </div>
                        <div class="title">
                            <label for="name"><span> MUKAMANA Alice </span></label> <br>
                            <label for="title">Our customer</label>
                        </div>
                    </div>
                    <div class="msg">
                        <p>"From the moment we arrived, we were blown away by the villa's
                            beauty and tranquility the private pool and stunning views provided
                            the perfect backdrop for a relaxing getway."</p>
                    </div>
                </div> -->
            </div>
            <div class="move justify-content-center d-flex">
                <div class="icon" id="prev">
                    <i class="fas fa-arrow-left"></i>
                </div>
                <div class="icon" id="next">
                    <i class="fas fa-arrow-right"></i>
                </div>
            </div>
        </div>
        <footer class="d-flex justify-content-center  text-white">
            <div class=" row footer">
                <div class="part col-md-3">
                    <a class="footerimage" href="#">
                        <img src="../../../assets/image/logo-retreat.png" alt="Logo">
                    </a>
                    <p>kN 4 AVe,kigali ,Rwanda</p>
                </div>
                <div class="part col-md-3">
                    <p><b>Address</b></p>
                    <p>kN 4 AVe,kigali ,Rwanda</p>
                </div>
                <div class="part col-md-3">
                    <p><b>Contact Us </b></p>
                    <p>Email: info@everretreat.com</p>
                    <p>Phone: +250 787524298</p>
                    <p>Phone: +250 785035071</p>
                </div>
                <div class="part col-md-3">
                    <p><b>subscribe to our newsletter to get update information
                            news and free insight </b>
                    </p>

                    <form action="">
                        <input type="email" name="email" placeholder="email">
                        <button>Subscribe</button>
                    </form>


                </div>
                <hr />
                <div class="d-flex icons">
                    <div class="copy">
                        <P>&copy; Copyright Everestreat .2025</P>
                    </div>
                    <div class="links">
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-x-twitter"></i>
                        <i class="fab fa-youtube"></i>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- ADDING JAVASCRIPTS -->
    <?php include("../../../layouts/scripts.php"); ?>
    <script>
document.addEventListener('DOMContentLoaded', function() {
  const playButtons = document.querySelectorAll('.play-button');
  
  playButtons.forEach(button => {
    button.addEventListener('click', function() {
      const videoId = this.getAttribute('data-video-id');
      const youtubeUrl = `https://www.youtube.com/watch?v=${videoId}`;
      window.open(youtubeUrl, '_blank');
    });
  });
});
</script>
    
</body>

</html>