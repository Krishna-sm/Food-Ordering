<?php
session_start();
include "inc/navbar.php";
?>
<?php
if(isset($_GET['token']) && isset($_GET['id']))
{

$reset_token = trim(mysqli_real_escape_string($conn, $_GET['token']));
$id = trim(mysqli_real_escape_string($conn, $_GET['id']));
date_default_timezone_set('Asia/Kolkata');
$dates=date("Y-m-d");
$query = "select * from users where resettoeken='$reset_token' and user_id='$id' and resettokenexpire='$dates'";
    echo $query;
$run_query = mysqli_query($conn, $query);
    print_r(mysqli_fetch_assoc($run_query));
if(mysqli_num_rows($run_query) ==1)
{
   ?>

  
            <?php

if (isset($_POST['updateBtn'])) {
    $reset_token = trim(mysqli_real_escape_string($conn, $_GET['token']));
    $id = trim(mysqli_real_escape_string($conn, $_GET['id']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['password']));
    $cpassword = trim(mysqli_real_escape_string($conn, $_POST['cpassword']));
    $captcha = trim(mysqli_real_escape_string($conn, $_POST['captcha']));


    if ($password == '' || $cpassword == '' || $captcha == '') {
        $_SESSION['msg_u'] = "Fill All Feilds";
    } else {
        if ($password == $cpassword) 
        {
            if ($_SESSION['captcha'] == $captcha) {
                // $query_forget="UPDATE users SET resettoeken='$reset_token',user_id='$date' WHERE email='$userid'";
                // $run_query = mysqli_query($conn, $query);


                if ($run_query) {
                    $data = mysqli_fetch_assoc($run_query);
                    $pass_hash = password_hash($password, PASSWORD_BCRYPT);
                     $query_forget="UPDATE users SET resettoeken=' ',password='$pass_hash' ,resettokenexpire='' WHERE user_id='$id'";
                $run_query = mysqli_query($conn, $query_forget);
                
                $_SESSION['msg_l'] = "Update Success";
              
                header('location: Login');
        //         echo '
        //         <script>
        //                 window.location.href="'.base_url("Login").'"
        //         </script>
        // ';



                } else {
                    $_SESSION['msg_u'] = "Invalid Token and User Id";
                }



            } else {
                $_SESSION['msg_u'] = "Captcha Not Match";
            }
        } else {
            $_SESSION['msg_u'] = "Password and confirm passowrd not match";
        }
    }

}

?>




<style>
    body {
        background-color: rgb(58, 175, 169);
    }
</style>

<div class="container py-3 mt-4 col-sm-8  d-flex justify-content-center m-auto" style="background: aliceblue;">


    <form method="post">
        <div class="container col-md-8  d-flex justify-content-center m-auto row py-5">
            <h1 class="text-center paraPannel">Update Password</h1>



            <div class="mb-3 d-flex justify-content-center ">
                <img src="img/piz.png" class="w-25" alt="">
            </div>
            <div class="mb-3 " style="height: 80px;">
                <?php
                if (isset($_SESSION['msg_u']) && $_SESSION['msg_u'] != '') {
                    ?>
                    <div class="alert alert-warning" role="alert">
                        <?= $_SESSION['msg_u'] ?>
                    </div>
                    <?php
                    unset($_SESSION['msg_u']);
                }

                ?>
            </div>

            <div class="mb-3 col-sm-3 col-md-8 ">
                <label for="">New Password</label>
                <input type="text" name="password" class="form-control py-2 mt-2">
            </div>
            <div class="mb-3 col-sm-3 col-md-8 ">
                <label for="">Confirm Password</label>
                <input type="text" name="cpassword" class="form-control py-2 mt-2">
            </div>

            <div class="mb-3 d-flex justify-content-center row">
                <img src="img/captcha_r.php" alt="" id="captchaImg" class="w-25 ">
                <div class="col-sm-1 d-flex justify-content-center align-content-center pt-3 ">

                    <i id="refresh" class="fa fa-rotate"></i>
                </div>
                <div class="mb-3 d-flex justify-content-center">
                    <div class="col-sm-3 col-md-8">
                        <label>Enter Captcha</label>
                        <input type="text" name="captcha" class="form-control py-2 mt-2">
                    </div>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-center ">
                <button name="updateBtn" class="btn btn-secondary px-5">Update Password</button>
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-around ">
            <a href="Login" class="text-decoration-none">&larr; Already Know </a>
        </div>
    </form>
</div>
<?php

include "inc/Footer.php";
?>

<?php
}
else{
    $_SESSION['msg_f'] = "Invalid Token ";
        header('location: Forget');
        // echo '
        //         <script>
        //                 window.location.href='.base_url("Forget").'
        //         </script>
        // ';
}
}
else{
    $_SESSION['msg_l'] = "Invalid Token";
    header('location: Login');
}

?>
<script>
    $(document).ready(() => {
        $("#refresh").on("click", () => {
            $("#captchaImg").attr("src", "img/captcha_r.php")
        })
    })
</script>
