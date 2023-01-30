<?php
session_start();
include '../db/config.php';


if (isset($_POST['RegisterBtn'])) {
    $name = trim(mysqli_real_escape_string($conn, $_POST['name']));
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['password']));
    $cpassword = trim(mysqli_real_escape_string($conn, $_POST['cpassword']));
    $captcha = trim(mysqli_real_escape_string($conn, $_POST['captcha']));

    if ($name == '' || $email == '' || $password == '' || $cpassword == '' || $captcha == '') {
        $_SESSION['msg_r'] = "All feilds are Required";
        header('location: ../Register');
    } else {
        if ($password != $cpassword) {
            $_SESSION['msg_r'] = "password and confirm password Not Matched";
            header('location: ../Register');
        } else {
            if ($captcha != $_SESSION['captcha']) {
                $_SESSION['msg_r'] = "Enter Valid Captcha";
                header('location: ../Register');

            } else {
                $query = "select * from users where email='$email'";
                $run_query = mysqli_query($conn, $query);
                if (mysqli_num_rows($run_query) > 0) {
                    $_SESSION['msg_r'] = "User already Exist";
                    header('location: ../Register');
                } else {
                    $user_id = "FOOD" . rand(1111, 9999) . "MEAL";
                    $passHash = password_hash($password, PASSWORD_BCRYPT);

                    $query = "INSERT INTO users( user_id, name, email, password) VALUES ('$user_id','$name','$email','$passHash')";
                    $run_query = mysqli_query($conn, $query);
                    if ($run_query) {
                        $_SESSION['msg_r'] = "Ragistered SuccessFully with User id '$user_id'";
                        header('location: ../Register');
                    } else {
                        $_SESSION['msg_r'] = "Server Error";
                        header('location: ../Register');
                    }
                }
            }
        }
    }

}

?>