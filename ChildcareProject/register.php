<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>

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
        <h1>Register Now</h1>
    </div>

    <!-- booking section starts -->

    <section class="booking">

        <h1 class="heading-title"> Be a Member!</h1>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="book-form" name="f1">

            <div class="flex">
                <div class="inputBox">
                    <span>Category:</span>
                    <select id="selector" name="cagtegory" class="selector">
                        <option value="" selected disabled>Choose here</option>
                        <option value="Babies">Babies</option>
                        <option value="Wobblers">Wobblers</option>
                        <option value="Toddlers">Toddlers</option>
                        <option value="PreSchool">PreSchool</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>Duration:</span>
                    <select id="selector" name="duration" class="selector">
                        <option value="" selected disabled>Choose here</option>
                        <option value="Half/Full">Half/Full Day</option>
                        <option value="OneDay">One Day</option>
                        <option value="ThreeDay">Three Day</option>
                        <option value="FiveDay">Five Day</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>Child Name:</span>
                    <input type="text" placeholder="Enter the name" name="name">
                </div>
                <div class="inputBox">
                    <span>Child Age:</span>
                    <input type="text" placeholder="Enter age" name="age">
                </div>
                <div class="inputBox">
                    <span>Address:</span>
                    <input type="text" placeholder="Enter your address" name="address">
                </div>
                <div class="inputBox">
                    <span>Email:</span>
                    <input type="email" placeholder="Enter your email" name="email">
                </div>

                <div class="inputBox">
                    <span>Phone:</span>
                    <input type="number" placeholder="Enter your phone number" name="phone">
                </div>
                <div class="inputBox">
                    <span>From:</span>
                    <input type="date" name="from">
                </div>
                <div class="inputBox">
                    <span>Leave:</span>
                    <input type="date" name="leave">
                </div>
                <div class="inputBox">
                    <span>Username:</span>
                    <input type="text" placeholder="Enter username" name="username">
                </div>
                <div class="inputBox">
                    <span>Password:</span>
                    <input type="text" placeholder="Enter password" name="password">
                </div>
            </div>

            <input type="submit" value="Register" class="btn" name="Send">

        </form>

    </section>

    <!-- booking section ends -->

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
<?php

$connection = mysqli_connect('localhost', 'root', ' ', 'childcare');
if (!$conn) {
    die("Connection to this database failed due to " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'] ?? '';
    $duration = $_POST['duration'] ?? '';
    $name = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? '';
    $address = $_POST['address'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $from = $_POST['from'] ?? '';
    $leave = $_POST['leave'] ?? '';
    $uname = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $pwd=password_hash($pwd, PASSWORD_DEFAULT);

    $dupCheck = "SELECT COUNT(*) as count FROM `user` WHERE `uname.` = '$uname'";
    $checkResult = mysqli_query($conn, $dupCheck);
    $row = mysqli_fetch_assoc($checkResult);
    if (empty($err)) {
        if ($row['count'] > 0) {
            $err = "User already exists";
        } else {
            $request = " Insert into register_form(category,duration,name,age,address, email,phone, from, leave,username,password) values ('$category','$duration','$name',
            ,'$age','$address','$email','$phone','$from','$leave','$uname','$pwd')";

            $result = mysqli_query($connection, $request);
            if ($result) {
                $success = "User Registered.";
            } else {
                $success = "User cannot be Registered.";
            }
        }
    }
    header('location:book.php');
} else {
    echo "Please try again";
}

?>