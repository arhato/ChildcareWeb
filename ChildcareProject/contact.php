<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    $_SESSION["loggedin"] = false;
}
$err = '';
$success = '';

$conn = mysqli_connect("localhost", "root", "", "childcare");
if (!$conn) {
    die("Connection to this database failed due to " . mysqli_connect_error());
} else {
    echo "<div class='blink'><font color=4CAF50>Connected</font></div>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $_POST['message'] ?? '';
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'];
    // Check if all fields are filled
    if (empty($message) || empty($name) || empty($email) || empty($phone)) {
        $err = "Please fill all the fields.";
    }

    $dupCheck = "SELECT COUNT(*) as count FROM `usermessage` WHERE `email` = '$email'";
    $checkResult = mysqli_query($conn, $dupCheck);
    $row = mysqli_fetch_assoc($checkResult);
    if (empty($err)) {
        if (!$row['count'] > 0) {
            $query = "INSERT INTO `usermessage`(`message`,`name`,`email`,`phone`) 
            VALUES('$message', '$name','$email','$phone')";

            $result = mysqli_query($conn, $query);
            if ($result) {
                $success = "Messege Sent.";
            } else {
                $success = "Message cannot be Sent!!.";
            }
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
    <title>Contact Us</title>

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
        <h1>SEND YOUR MESSAGE TO US!!</h1>
    </div>

    <section class="booking">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="book-form">

            <div class="flex">
                <div class="inputBox">
                    <span>Name:</span>
                    <input type="text" placeholder="Enter the name" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                </div>
                <div class="inputBox">
                </div>
                <div class="inputBox">
                    <span>Email:</span>
                    <input type="email" name="email" value="<?php echo isset($_POST['rdate']) ? htmlspecialchars($_POST['rdate']) : ''; ?>">
                </div>
                <div class="inputBox">
                </div>
                <div class="inputBox">
                    <span>Phone No.:</span>
                    <input type="number" name="phone" placeholder="Enter your Phone Number">
                </div>
                
                <div class="inputBox">
                </div>
                <div class="inputBox">
                    <span>Message:</span>
                    <input type="text" name="message" placeholder="Maximum 512 Characters" style="height: 300px;">
                </div>
                
                <input type="submit" value="Send" class="btn" name="messagesend">
                <span class="error-message" style="color:red;font-size:1.6rem;"><?php echo $err; ?></span>
        </form>

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

        <div class="credit"> Created By<span> Team AAA</span> | @Copyright 2023</div>

    </section>

    <!-- footer section ends -->


    <!-- swiper js link -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link -->
    <script src="js/script.js"></script>

</body>

</html>