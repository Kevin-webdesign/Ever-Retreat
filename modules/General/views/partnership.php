
<!DOCTYPE html>
<html lang="en">

<!-- HEADER LINKS -->
<?php include("../../../layouts/header.php"); ?>

<body>
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .section {
            display: flex;
            margin-bottom: 30px;
            border: 1px dotted #ccc;
            border-radius: 4px;
            overflow: hidden;
            background-color: #fff;
        }

        .content-box {
            flex: 1;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .image-box {
            flex: 1;
            min-height: 300px;
            background-size: cover;
            background-position: center;
        }

        .section-title {
            color:rgb(17, 17, 16);
            margin-bottom: 15px;
            font-size: 24px;
        }

        .section-text {
            margin-bottom: 20px;
            color: #555;
            margin-left: 10px;
            margin-right: 10px;
            text-align: justify;
        }

        .feature-list {
            list-style: none;
            margin-top: 15px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            font-size: 12px;
        }

        .feature-icon {
            color: #65c9bb;
            margin-right: 10px;
        }

        .cta-button {
            display: inline-block;
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 15px;
            align-self: flex-start;
        }

        .cta-button:hover {
            background-color: #0056b3;
        }
        /* Partnerships Section Styling */
        .partnerships-section {
            text-align: center;
            padding: 40px 0;
            margin-bottom: 30px;
        }

        .partnerships-title {
            color: #e9a825;
            font-size: 18px;
            margin-bottom: 15px;
            font-weight: normal;
        }

        .partnerships-headline {
            font-size: 20px;
            max-width: 800px;
            margin: 0 auto 40px;
            line-height: 1.4;
        }

        .partners-container {
            background-color: #f5f5f5;
            border-radius: 12px;
            padding: 40px 20px;
        }

        .partners-logo-box {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 40px;
            max-width: 900px;
            margin: 0 auto;
        }

        .partner-logo {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            font-weight: bold;
            font-size: 16px;
        }

        .logo-icon {
            width: 80px;
            height: 80px;
            margin-right: 10px;
        }

        .resecurb {
            margin-top: 20px;
        }

        /* Media query for logos on mobile */
        @media (max-width: 768px) {
            .partners-logo-box {
                gap: 30px;
            }

            .logo {
                font-size: 14px;
            }

            .logo-icon {
                width: 24px;
                height: 24px;
            }

            .partnerships-headline {
                font-size: 14px;
                padding: 0 20px;
            }
        }

        /* Alternate the layout of sections */
        .section:nth-child(even) {
            flex-direction: row-reverse;
        }

        /* Media query for mobile devices */
        @media (max-width: 768px) {
            .section, .section:nth-child(even) {
                flex-direction: column;
            }

            .image-box {
                min-height: 250px;
                width: 100%;
            }

            .content-box {
                width: 100%;
            }
        }
    </style>
    <!-- Navbar -->
    <?php include("../../../layouts/navbar.php"); ?>
    <!-- End navbar -->

    <div class="hero-content2 text-white text-center vh-100">
        <!-- Video Background -->
        <div class="video-background2" style="height: 100%;">
            <div class="gallery-pic vh-100"
                style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(../../../assets/image/partnership.jpg) no-repeat center center; background-size:cover;">
            </div>
        </div>
        <div class="container-top">
            <h1 class="display-4">Partnership</h1>
        </div>
    </div>

    <div class="new">

        <section class="about-section">
        <div class="container">

        <!-- Partnerships Section -->
        <div class="partnerships-section">
            <h3 class="partnerships-title">Partnerships</h3>
            <h2 class="partnerships-headline">
                Ever Retreat thrives through strong partnerships that help us deliver sustainable tourism experiences in Rwanda.
            </h2>
            <div class="partners-container">
                <div class="partners-logo-box">
                    <div class="partner-logo">
                        <div class="logo welytics">
                            <!-- <svg viewBox="0 0 24 24" class="logo-icon">
                                <path d="M8,6L12,2L16,6L20,2V10L16,14L12,10L8,14L4,10V2L8,6Z" fill="#1ad698"/>
                            </svg> -->
                            <img src="../../../assets/image/everdesign.jpeg" alt="" class="logo-icon">
                            <span>EVER DESIGN</span>
                        </div>
                    </div>
                    <!-- <div class="partner-logo">
                        <div class="logo jiggle">
                            <svg viewBox="0 0 24 24" class="logo-icon">
                                <path d="M4,2H8V4H4V2M4,6H10V8H4V6M4,10H8V12H4V10M12,2H16V12H12V2M12,16H16V18H12V16M18,2H22V4H18V2M18,6H22V8H18V6M18,10H22V12H18V10M10,18V16H8V14H6V18H10Z" fill="#ff5533"/>
                            </svg>
                            <span>JIGGLE</span>
                        </div>
                    </div>
                    <div class="partner-logo">
                        <div class="logo symtric">
                            <svg viewBox="0 0 24 24" class="logo-icon">
                                <path d="M12,2L17,7H14V17H17L12,22L7,17H10V7H7L12,2Z" fill="#7c4dff"/>
                            </svg>
                            <span>SYMTRIC</span>
                        </div>
                    </div>
                    <div class="partner-logo">
                        <div class="logo wishelp">
                            <svg viewBox="0 0 24 24" class="logo-icon">
                                <path d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z" fill="#ff6666"/>
                            </svg>
                            <span>Wishelp</span>
                        </div>
                    </div>
                    <div class="partner-logo resecurb">
                        <div class="logo">
                            <svg viewBox="0 0 24 24" class="logo-icon">
                                <path d="M12,3L1,9L12,15L21,10.09V17H23V9M5,13.18V17.18L12,21L19,17.18V13.18L12,17L5,13.18Z" fill="#2ec4d1"/>
                            </svg>
                            <span>resecurb</span>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
        </section>
        <?php
        include("../../../layouts/footer.php");
        ?>
    </div>

    <!-- ADDING JAVASCRIPTS -->
    <?php include("../../../layouts/scripts.php"); ?>

    <script>
        // JavaScript for additional functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Add smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    if (targetId !== '#') {
                        document.querySelector(targetId).scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Add responsive behavior
            function checkResponsive() {
                const sections = document.querySelectorAll('.section');
                const isMobile = window.innerWidth <= 768;
                
                sections.forEach(section => {
                    // Any additional responsive adjustments can be added here
                });
            }

            // Check on load and resize
            checkResponsive();
            window.addEventListener('resize', checkResponsive);
        });
    </script>
</body>

</html>