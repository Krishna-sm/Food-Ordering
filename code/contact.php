<?php
include '../db/config.php';

// array(3) { ["name"]=> string(7) "trhis i" ["email"]=> string(7) "ihnkjnk" ["message"]=> string(10) " nkjnklnnk" }
// var_dump($_POST);
// // // header("location: /");
// // // echo "hello";

        if($_POST['name']!='' || $_POST['email'] !=''|| $_POST['message']!='' )
        {
    $name = trim(mysqli_real_escape_string($conn, $_POST['name']));     
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));     
    $message = trim(mysqli_real_escape_string($conn, $_POST['message']));

    $query = "INSERT INTO `contact`( `name`, `email`, `message`) VALUES ('$name','$email','$message')";
    $run_query = mysqli_query($conn, $query);
    if($run_query)
    {
        echo "Thanku for contacting";
    }
        }
        else{
    echo "Technical issue";
        }


?>