<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>

    <!-- swiper css link -->
    <link rel = "stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

    <!-- font awesome cdn link -->
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel = "stylesheet" href= "css/style.css">

</head>
<body>

<!-- header section starts  -->

<section class="header">

    <a href="home.php" class="logo">AAAChildcare.</a>

    <nav class="navbar">
        <a href="home.php">Home</a>
        <a href="about.php">About</a>
        <a href="login.php">LogIn</a>
        <a href="register.php">Register</a>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>

</section>

<!-- header section ends -->
    
<div class="heading" style="background:url(images/about-img.jpg) no-repeat">
    <h1>Register Now</h1>
</div>

<!-- booking section starts -->

<section class="booking">

    <h1 class = "heading-title"> Be a Member!</h1>

    <form action="book_form.php" method="POST" class="book-form">

        <div class="flex">
            <div class="inputBox">
                <span>Name:</span>
                <input type="text" placeholder="Enter your name" name="name">
            </div>
            <div class="inputBox">
                <span>Email:</span>
                <input type="email" placeholder="Enter your email" name="email">
            </div>
            <div class="inputBox">
                <span>Phone:</span>
                <input type="number" placeholder="Enter your number" name="phone">
            </div>
            <div class="inputBox">
                <span>Address:</span>
                <input type="text" placeholder="Enter your address" name="address">
            </div>
            <div class="inputBox">
                <span>Age:</span>
                <input type="text" placeholder="What age" name="age">
            </div>
            <div class="inputBox">
                <span>Time:</span>
                <input type="number" placeholder="Time to stay" name="time">
            </div>
            <div class="inputBox">
                <span>From:</span>
                <input type="date" name="from">
            </div>
            <div class="inputBox">
                <span>Leave:</span>
                <input type="date" name="leave">
            </div>
        </div>

        <input type="submit" value="submit" class="btn" name="Send">

    </form>

</section>

<!-- booking section ends -->

<!-- footer section starts -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>Quick links</h3>
            <a href="home.php"><i class="fas fa-angle-right"></i>Home</a>
            <a href="about.php"><i class="fas fa-angle-right"></i>About</a>
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
<script src = "js/script.js"></script>

</body>
</html>