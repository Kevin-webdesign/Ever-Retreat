<?php
require_once '../../../config/database.php';

// Initialize database
$db = Database::getInstance();

// Get page content
$page = $db->query("SELECT * FROM tourism_content WHERE page_key = 'how'")->fetch(PDO::FETCH_ASSOC);
$sections = $db->query("SELECT * FROM tourism_sections WHERE tourism_content_id = {$page['id']} ORDER BY section_order")->fetchAll(PDO::FETCH_ASSOC);

// Get features for each section
foreach ($sections as &$section) {
    $section['features'] = $db->query("SELECT * FROM tourism_features WHERE tourism_section_id = {$section['id']} ORDER BY feature_order")->fetchAll(PDO::FETCH_ASSOC);
}
unset($section);
?>

<!DOCTYPE html>
<html lang="en">

<!-- HEADER LINKS -->
<?php include("../../../layouts/header.php"); ?>

<body>
    <style>
        /* Same styles as adventure.php */
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        .section { display: flex; margin-bottom: 30px; border: 1px dotted #ccc; border-radius: 4px; overflow: hidden; background-color: #fff; }
        .content-box { flex: 1; padding: 30px; display: flex; flex-direction: column; justify-content: center; }
        .image-box { flex: 1; min-height: 300px; background-size: cover; background-position: center; }
        .section-title { color: rgb(17, 17, 16); margin-bottom: 15px; font-size: 24px; }
        .section-text { margin-bottom: 20px; color: #555; margin-left: 10px; margin-right: 10px; text-align: justify; }
        .feature-list { list-style: none; margin-top: 15px; }
        .feature-item { display: flex; align-items: center; margin-bottom: 10px; font-size: 12px; }
        .feature-icon { color: #65c9bb; margin-right: 10px; }
        .section:nth-child(even) { flex-direction: row-reverse; }
        @media (max-width: 768px) {
            .section, .section:nth-child(even) { flex-direction: column; }
            .image-box { min-height: 250px; width: 100%; }
            .content-box { width: 100%; }
        }
    </style>
    
    <!-- Navbar -->
    <?php include("../../../layouts/navbar.php"); ?>
    <!-- End navbar -->

    <div class="hero-content2 text-white text-center vh-90">
        <div class="video-background2" style="border: solid 2p red; height: 100%;">
            <div class="gallery-pic vh-100"
                style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(../../../assets/image/<?php echo htmlspecialchars($page['hero_image']); ?>) no-repeat center center; background-size:cover;">
            </div>
        </div>
        <div class="container-top">
            <h1 class="display-4"><?php echo htmlspecialchars($page['title']); ?></h1>
        </div>
    </div>

    <div class="new">
        <section class="about-section">
            <div class="container">
                <?php foreach ($sections as $index => $section): ?>
                <div class="section">
                    <div class="content-box">
                        <?php if ($index === 0): ?>
                        <small style="color: #b08d4c;font-weight: 500;">Investment</small>
                        <?php endif; ?>
                        <?php if (!empty($section['title'])): ?>
                        <h2 class="section-title"><?php echo htmlspecialchars($section['title']); ?></h2>
                        <?php endif; ?>
                        <p class="section-text">
                            <?php echo nl2br(htmlspecialchars($section['content'])); ?>
                        </p>
                        <?php if (!empty($section['features'])): ?>
                        <ul class="feature-list">
                            <?php foreach ($section['features'] as $feature): ?>
                            <li class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span><?php echo htmlspecialchars($feature['feature_text']); ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                    <div class="image-box" style="background-image: url('../../../assets/image/<?php echo htmlspecialchars($section['image_path']); ?>');"></div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php include("../../../layouts/footer.php"); ?>
    </div>

    <!-- ADDING JAVASCRIPTS -->
    <?php include("../../../layouts/scripts.php"); ?>

    <script>
        // Same JavaScript as adventure.php
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    if (targetId !== '#') {
                        document.querySelector(targetId).scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });

            function checkResponsive() {
                const sections = document.querySelectorAll('.section');
                const isMobile = window.innerWidth <= 768;
                sections.forEach(section => {});
            }
            checkResponsive();
            window.addEventListener('resize', checkResponsive);
        });
    </script>
</body>
</html>