<?php

    $connection = mysqli_connect('localhost','root',' ', 'register');

    if(isset($_POST['Send'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $childname = $_POST['childname'];
        $age = $_POST['age'];
        $category = $_POST['category'];
        $duration = $_POST['duration'];

        $request = " Insert into register_form(username, email, phone, password, childname, age, category, duration) values ('$username',
        '$email','$phone','$password','$childname','$age','$category','$duration')";

        mysqli_query($connection,$request);

        header('location:register.php');
    }
    else{
        echo 'Please try again'
    }

?>