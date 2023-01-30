<?php
session_start();
include '../db/config.php';

if (isset($_POST['loginBtn'])) {
    $userid = trim(mysqli_real_escape_string($conn, $_POST['userid']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['password']));
    $captcha = trim(mysqli_real_escape_string($conn, $_POST['captcha']));

    if ($userid == '' || $password == '' || $captcha == '') {
        $_SESSION['msg_l'] = "All feilds are Required";
        header('location: ../Login');
    } else {
       if($captcha!==$_SESSION['captcha']){
        $_SESSION['msg_l'] = "Enter Valid Captcha";
        header('location: ../Login');
       }
       else{
        $query = "select * from users where user_id='$userid'";
        $run_query = mysqli_query($conn, $query);
        if(mysqli_num_rows($run_query)==1)
        {
                $data = mysqli_fetch_assoc($run_query);
                $password_hash = $data['password'];
                $verify = password_verify($password, $password_hash);
                if($verify)
                {
                    $_SESSION['msg_l'] = "Login Success";
                    header('location: ../Login');
                }   
                else{
                    $_SESSION['msg_l'] = "Plese login with Right Credentials";
        header('location: ../Login');
                }   
        }
        else{
            $_SESSION['msg_l'] = "Plese login with Right Credentials";
            header('location: ../Login');
        }
       }

    }
}



?>