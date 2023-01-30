<?php
session_start();
include('../db/config.php');
include('mail.php');
if (isset($_POST['ForgetBtn'])) {
    $reset_token = bin2hex(random_bytes(16));
    date_default_timezone_set('Asia/Kolkata');
    $date=date("Y-m-d");
   

    $userid = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $captcha = trim(mysqli_real_escape_string($conn, $_POST['captcha']));

    if ($userid == '' || $captcha == '') {
        // print_r($_POST);
        $_SESSION['msg_f'] = "Fill All Feilds";
        header('location: ../Forget');
    }
    else{
        if($_SESSION['captcha'] == $captcha)
        {
            $query = "select * from users where email='$userid'";
            $run_query = mysqli_query($conn, $query);
            if(mysqli_num_rows($run_query)==1)
            {

                $data = mysqli_fetch_assoc($run_query);
                $userid = $data['user_id'];
                $name = $data['	name'];
                // $_SESSION['msg_f'] = "Account found";
                // header('location: ../Forget');
                // $data = mysqli_fetch_assoc($run_query);
                 $query_forget="UPDATE users SET resettoeken='$reset_token',resettokenexpire='$date' WHERE user_id='$userid'";
                $run_query = mysqli_query($conn, $query_forget);
                if($run_query)
                {
                    // sendMail($userid,$html);
                    sendMail($email,$name, $reset_token, $userid);
                    $_SESSION['msg_f'] = "Message send $name";
                    header('location: ../Forget');
                }
                else{
                    
                    $_SESSION['msg_f'] = "Technical Issue";
                    header('location: ../Forget');
                }
                

            }
            else{
                $_SESSION['msg_f'] = "Credential Not Found";
                header('location: ../Forget');
            }

        }
        else{
            $_SESSION['msg_f'] = "Captcha Not Match";
            header('location: ../Forget');
        }
    }
}
?>