<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    $_SESSION["loggedin"] = false;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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

    <!-- header section ends -->

    <div class="heading" style="background:url(images/about-img.jpg) no-repeat">
        <h1>You Are Registered</h1>
    </div>
    <section class="booking">
    <h1 class="heading-title"> You can now login!!!</h1>
        <h1 class="heading-title"><a href="login.php">Click Here</a></h1>
    </section>


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

        <div class="credit"> Created By<span> Team AAA</span> | All Rights Reserved</div>

    </section>

    <!-- footer section ends -->


    <!-- swiper js link -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link -->
    <script src="js/script.js"></script>

</body>

</html>