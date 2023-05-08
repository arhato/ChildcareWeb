<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    $_SESSION["loggedin"] = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- swiper css link -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- header section starts  -->

    <section class="header">

        <a href="index.php" class="logo">AAAChildcare.</a>
        <?php if ($_SESSION["loggedin"]) {
            echo ('<nav class="navbar">
        <a href="index.php">Home</a>
        <a href="services.php">Services</a>
        <a href="testinomial.php">Testinomial</a>
        <a href="logout.php">LogOut</a>
        <a href="contact.php">Contact Us</a>
        </nav>'
            );
        } else {
            echo ('<nav class="navbar">
            <a href="index.php">Home</a>
            <a href="services.php">Services</a>
            <a href="testinomial.php">Testinomial</a>
            <a href="register.php">Register</a>
            <a href="login.php">LogIn</a>
            <a href="contact.php">Contact Us</a>
            </nav>'
            );
        } ?>

        <div id="menu-btn" class="fas fa-bars"></div>


    </section>

    
    <section class="services">

        <h1 class="heading-title">Our services</h1>

        <div class="box-container">

            <div class="box">
                <img src="images/icon1.jpg" alt="">
                <h3>CHILDCARE</h3>
            </div>

            <div class="box">
                <img src="images/icon2.png" alt="">
                <h3>HOUSEKEEPING</h3>
            </div>

            <div class="box">
                <img src="images/icon3.png" alt="">
                <h3>TUTORING</h3>
            </div>

            <div class="box">
                <img src="images/icon4.png" alt="">
                <h3>SENIOR CARE</h3>
            </div>

            <div class="box">
                <img src="images/icon6.png" alt="">
                <h3>SPECIAL NEEDS</h3>
            </div>

        </div>

    </section>


    

    

    <!-- home about section ends -->

    <!-- home packages section starts -->

    <section class="home-package">

        <h1 class="heading-title">Our Packages</h1>

        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img src="images/package1.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Categories</h3>
                    <p>Childcare can be divided into four categories based on age groups: babies, wobblers, toddlers, and preschoolers.
                        Each category has its own set of developmental needs, which are addressed through age-appropriate activities, toys, and opportunities.</p>
                    <a href="register.php" class="btn"> Register</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/package4.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Full-time/Half-time Care</h3>
                    <p>Full-time package provides care for children throughout the entire day, usually five days a week.
                        Half-time package provides care for children for a certain number of hours or days per week, typically on a set schedule.</p>
                    <a href="register.php" class="btn"> Register</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/package3.png" alt="">
                </div>
                <div class="content">
                    <h3>Enrichment classes</h3>
                    <p>This package offers a variety of classes such as music, dance, sports, or foreign language to supplement the regular program.
                        Our premise includes indoor and outdoor play areas, classrooms, a kitchen for meal preparation, and other amenities to ensure the comfort.
                    </p>
                    <a href="register.php" class="btn"> Register</a>
                </div>
            </div>

        </div>
        <?php if ($_SESSION["loggedin"] == false) {
            echo ('<div class="load-more"><a href="login.php" class="btn">Login</a></div>');
            echo ('<div class="load-more"><a href="register.php" class="btn">Register</a></div>');
        }
        ?>
    </section>

    <!-- home packages section ends -->

    <!-- footer section starts -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>Quick links</h3>
                <a href="index.php"><i class="fas fa-angle-right"></i>Home</a>
                <a href="services.php"><i class="fas fa-angle-right"></i>Services</a>
                <a href="login.php"><i class="fas fa-angle-right"></i>LogIn</a>
                <a href="register.php"><i class="fas fa-angle-right"></i>Register</a>
            </div>

            <div class="box">
                <h3>Extra links</h3>
                <a href="#"><i class="fas fa-angle-right"></i>Ask Questions</a>
                <a href="about.php"><i class="fas fa-angle-right"></i>About Us</a>
                <a href="#"><i class="fas fa-angle-right"></i>Privacy Policy</a>
                <a href="#"><i class="fas fa-angle-right"></i>Terms and Conditions</a>
            </div>

            <div class="box">
                <h3>Contact Info</h3>
                <a href="#"><i class="fas fa-phone"></i>+000-000-0000</a>
                <a href="#"><i class="fas fa-phone"></i>+111-111-1111</a>
                <a href="#"><i class="fas fa-envelope"></i>AAAChildcare@gmail.com</a>
                <a href="#"><i class="fas fa-map"></i>Griffith College, Cork</a>
            </div>

            <div class="box">
                <h3>Follow Us</h3>
                <a href="#"><i class="fab fa-facebook-f"></i>Facebook</a>
                <a href="#"><i class="fab fa-twitter"></i>Twitter</a>
                <a href="#"><i class="fab fa-instagram"></i>Instagram</a>
                <a href="#"><i class="fab fa-linkedin"></i>LinkedIn</a>
            </div>

        </div>

        <div class="credit"> Created By<span> Team AAA</span> | @Copyright 2023</div>

    </section>

    <!-- footer section ends -->


    <!-- swiper js link -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link -->
    <script src="js/script.js"></script>

</body>

</html>