<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}
$err = '';
$success = '';

$conn = mysqli_connect("localhost", "root", "", "childcare");
if (!$conn) {
    die("Connection to this database failed due to " . mysqli_connect_error());
} else {
    echo "<div class='bconn'><font color=4CAF50>Connected</font></div>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty(trim($_POST["username"]))||empty(trim($_POST["password"]))) {
        $err = "Please enter details.";
    } else {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
    }

    if (empty($err)) {
        $query = "SELECT username, password FROM `user` WHERE `username`=?";

        $stmt = mysqli_prepare($conn, $query);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $username);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if ($password==$hashed_password) {
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["username"] = $username;
                            header("location: index.php");
                        } else {
                            $err = "Invalid username or password.";
                        }
                    }
                } else {
                    $err = "Invalid username or password.";
                }
            } else {
                $err = "Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
   
    mysqli_close($conn);
}
?>
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
        <a href="index.php">Home</a>
        <a href="services.php">Services</a>
        <a href="testinomial.php">Testinomial</a>
        <a href="register.php">Register</a>
        <a href="login.php">LogIn</a>
        <a href="contact.php">Contact Us</a>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>

</section>

<!-- header section ends -->
    
<div class="heading" style="background:url(images/about-img.jpg) no-repeat">
    <h1>LogIn</h1>
</div>

<!-- login section starts -->

<section class="login">

<h1>Not Registered? <a href="register.php"><i class="fas fa-angle-right"></i>Register Here</a></h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method ="POST" class="login-form">

        <div class="flex">
            <div class="inputBox">
                <span>Username:</span>
                <input type="text" placeholder="Enter your username" name = "username">
            </div>
            <div class="inputBox">
                <span>Password:</span>
                <input type="password" placeholder="Enter your password" name = "password">
            </div>
        </div>

        <input type="submit" value="LogIn" class="btn" name="login">
        <span class="error-message" style="color:red;font-size:1.6rem;"><?php echo $err; ?></span>
    </form>

</section>

<!-- packages section ends -->

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
<script src = "js/script.js"></script>

</body>
</html>
