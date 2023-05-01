<?php

    $connection = mysqli_connect('localhost','root',' ', 'register');

    if(isset($_POST['Send'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $age = $_POST['age'];
        $time = $_POST['time'];
        $from = $_POST['from'];
        $leave = $_POST['leave'];

        $request = " Insert into register_form(name, email, phone, address, age, time, from, leave) values ('$name',
        '$email','$phone','$address','$age','$time','$from','$leave')";

        mysqli_query($connection,$request);

        header('location:book.php');
    }
    else{
        echo 'Please try again'
    }

?>