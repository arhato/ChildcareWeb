<?php
session_start();
$err = '';
$success = '';

$conn = mysqli_connect("localhost", "root", "", "childcare");
if (!$conn) {
    die("Connection to this database failed due to " . mysqli_connect_error());
} else {
    echo "<div class='blink'><font color=4CAF50>Connected</font></div>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'] ?? '';
    $duration = $_POST['duration'] ?? '';
    $name = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? '';
    $address = $_POST['address'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $start = $_POST['start'] ?? '';
    $finish = $_POST['finish'] ?? '';
    $username = $_POST['username'] ?? '';
    $pwd = $_POST['password'] ?? '';
    $password = password_hash($pwd, PASSWORD_DEFAULT);


    // Check if all fields are filled
    if (empty($name) || empty($age) || empty($address) || empty($email) || empty($phone) || empty($username) || empty($password)) {
        $err = "Please fill all the fields.";
    }
    // Check if the selected category is valid
    elseif (!isset($_POST['category']) || ($_POST['category'] != 'Babies' && $_POST['category'] != 'Wobblers' && $_POST['category'] != 'Toddlers' && $_POST['category'] != 'PreSchool')) {
        $err = "Please select a valid category.";
    }
    // Check if the selected duration is valid
    elseif (!isset($_POST['duration']) || ($_POST['duration'] != 'Half/Full' && $_POST['duration'] != 'OneDay' && $_POST['duration'] != 'ThreeDay' && $_POST['duration'] != 'FiveDay')) {
        $err = "Please select a valid duration.";
    }
    // Check if the email is valid
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err = "Please enter a valid email address.";
    }
    // Check if the phone number is valid
    elseif (!ctype_digit($phone) || strlen($phone) != 10) {
        $err = "Please enter a valid phone number.";
    }
    // Check if the username and password are at least 7 characters long
    elseif (strlen($username) < 7 || strlen($password) < 7) {
        $err = "Username and password must be at least 7 characters long.";
    }

    $dupCheck = "SELECT COUNT(*) as count FROM `user` WHERE `username` = '$username'";
    $checkResult = mysqli_query($conn, $dupCheck);
    $row = mysqli_fetch_assoc($checkResult);
    if (empty($err)) {
        if ($row['count'] > 0) {
            $err = "User already exists";
        } else {
            $query = "INSERT INTO `user`(`category`, `duration`, `name`, `age`, `address`, `email`, `phone`, `start`, `finish`, `username`, `password`) 
            VALUES('$category','$duration','$name','$age','$address','$email','$phone','$start','$finish','$username','$password')";

            $result = mysqli_query($conn, $query);
            if ($result) {
                $success = "User Registered.";
            } else {
                $success = "User cannot be Registered.";
            }
        }
    }
    mysqli_close($conn);
    if ($success == "User Registered.") {
        header('Location:registered.php');
    }
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

        <a href="home.php" class="logo">AAAChildcare.</a>

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
        <h1>Register Now</h1>
    </div>

    <!-- booking section starts -->
    <div class="credit"> Created By<span> Team AAA</span> | @Copyright 2023</div>

    <section class="booking">

        <h1 class="heading-title"> Be a Member!</h1>
        <h1>Already Registered? <a href="login.php"><i class="fas fa-angle-right"></i>Login Here</a></h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="book-form">

            <div class="flex">
                <div class="inputBox">
                    <span>Category:</span>
                    <select id="selector" name="category" class="selector" value="<?php echo isset($_POST['category']) ? htmlspecialchars($_POST['category']) : ''; ?>">
                        <option value="" selected disabled>Choose here</option>
                        <option value="Babies">Babies</option>
                        <option value="Wobblers">Wobblers</option>
                        <option value="Toddlers">Toddlers</option>
                        <option value="PreSchool">PreSchool</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>Duration:</span>
                    <select id="selector" name="duration" class="selector" value="<?php echo isset($_POST['duration']) ? htmlspecialchars($_POST['duration']) : ''; ?>">
                        <option value="" selected disabled>Choose here</option>
                        <option value="Half/Full">Half/Full Day</option>
                        <option value="OneDay">One Day</option>
                        <option value="ThreeDay">Three Day</option>
                        <option value="FiveDay">Five Day</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>Child Name:</span>
                    <input type="text" placeholder="Enter the name" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                </div>
                <div class="inputBox">
                    <span>Child Age:</span>
                    <input type="text" placeholder="Enter age" name="age" value="<?php echo isset($_POST['age']) ? htmlspecialchars($_POST['age']) : ''; ?>">
                </div>
                <div class="inputBox">
                    <span>Address:</span>
                    <input type="text" placeholder="Enter your address" name="address" value="<?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?>">
                </div>
                <div class="inputBox">
                    <span>Email:</span>
                    <input type="email" placeholder="Enter your email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                </div>

                <div class="inputBox">
                    <span>Phone:</span>
                    <input type="number" placeholder="Enter your phone number -At least 10 characters" name="phone" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
                </div>
                <div class="inputBox">
                    <span>Start:</span>
                    <input type="date" name="start" value="<?php echo isset($_POST['start']) ? htmlspecialchars($_POST['start']) : ''; ?>">
                </div>
                <div class="inputBox">
                    <span>Finish:</span>
                    <input type="date" name="finish" value="<?php echo isset($_POST['finish']) ? htmlspecialchars($_POST['finish']) : ''; ?>">
                </div>
                <div class="inputBox">
                    <span>Username:</span>
                    <input type="text" placeholder="Enter username - At least 7 characters" name="username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                </div>
                <div class="inputBox">
                    <span>Password:</span>
                    <input type="password" placeholder="Enter password - At least 7 characters" name="password">
                </div>
            </div>

            <input type="submit" value="Register" class="btn" name="register">
            <span class="error-message" style="color:red;font-size:1.6rem;"><?php echo $err; ?></span>
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