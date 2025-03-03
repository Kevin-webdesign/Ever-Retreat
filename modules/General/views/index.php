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
        <div class="row d-flex" style="margin: 60px;">
            <div class="col-md-6">
                <p>About us</p>
                <h4><b>Welcome to <span>Premier B&P Beach Villa</span>, the Best <br>Destination for Tranquility</b>
                </h4>
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
            <div class="row d-flex about">
                <div class="col-md-6">
                    <img src="./image/first.jpg" alt="">
                </div>
                <div class="col-md-6">
                    <img src="./image/second.jpg" alt="">
                </div>
            </div>
            <div class="row text-center mt-5">
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
            <div class="row text-center mt-5">
                <div class="col-md-12">
                    <p><span>Our Location</span></p>
                    <h4 style="font-weight: bold;">Explore Our Best Location for an Unforgettable Vacation</h4>
                </div>
            </div>
            <div class="row content">
                <div class="image col-md-3">
                    <div class="img">
                        <img src="../../../assets/image/kigali.jpg" alt="Kigali" class="img-fluid">
                        <div class="details">
                            <h3>Kigali</h3>
                            <p>The heart of modern Rwanda</p>
                        </div>
                        <div class="after-det text-white">
                            <h3>Kigali</h3>
                            <p>Kigali pulses with Rwanda's dynamic transformation, where modernity meets culture.</p>
                        </div>
                    </div>
                </div>
                <div class="image col-md-6">
                    <div class="img">
                        <img src="../../../assets/image/rubavu.jpg" alt="rubavu" class="img-fluid">
                        <div class="details">
                            <a href=""></a>
                            <h3>Rubavu</h3>
                            <p>The serenity of lake kivu</p>
                        </div>
                        <div class="after-det text-white">
                            <h3>Rubavu</h3>
                            <p>Rubavu offers an unmatched sense <br> of tranquility.</p>
                        </div>
                    </div>
                </div>
                <div class="image col-md-3">
                    <div class="img">
                        <img src="../../../assets/image/musanze.jpg" alt="musanze" class="img-fluid">
                        <div class="details">
                            <h3>musanze</h3>
                            <p>The heart of modern Rwanda</p>
                        </div>
                        <div class="after-det text-white">
                            <h3>Musanze</h3>
                            <p>Kigali pulses with Rwanda's dynamic transformation, where modernity meets culture.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row content mt-4">
                <div class="image col-md-6">
                    <div class="img">
                        <img src="../../../assets/image/nyungwe.jpg" alt="nyungwe" class="img-fluid">
                        <div class="details">
                            <h3>Nyungwe</h3>
                            <p>The heart of modern Rwanda</p>
                        </div>
                        <div class="after-det text-white">
                            <h3>Nyungwe</h3>
                            <p>Kigali pulses with Rwanda's dynamic transformation, where modernity meets culture.</p>
                        </div>
                    </div>
                </div>
                <div class="image col-md-3">
                    <div class="img">
                        <img src="../../../assets/image/nyanza.jpg" alt="Nyanza" class="img-fluid">
                        <div class="details">
                            <a href=""></a>
                            <h3>Nyanza</h3>
                            <p>The serenity of lake kivu</p>
                        </div>
                        <div class="after-det text-white">
                            <h3>Nyanza</h3>
                            <p>Rubavu offers an unmatched sense <br> of tranquility.</p>
                        </div>
                    </div>
                </div>
                <div class="image col-md-3">
                    <div class="img">
                        <img src="../../../assets/image/huye.jpg" alt="musanze" class="img-fluid">
                        <div class="details">
                            <h3>huye</h3>
                            <p>The heart of modern Rwanda</p>
                        </div>
                        <div class="after-det text-white">
                            <h3>huye</h3>
                            <p>Kigali pulses with Rwanda's dynamic transformation, where modernity meets culture.</p>
                        </div>
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
                    <div class="details d-flex">
                        <h3>Elevetor Your stay With Premium <br>features and services</h3>
                        <a href=""><i class="fas fa-arrow-right"></i></a>
                    </div>
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
            <div class="box-container">
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
    
</body>

</html>