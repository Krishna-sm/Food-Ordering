<?php
session_start();
include "inc/navbar.php";
?>

<style>
    body {
        background-color: rgb(58, 175, 169);
    }
</style>

<div class="container py-3 mt-4 col-sm-8  d-flex justify-content-center m-auto" style="background: aliceblue;">


    <form action="code/ForgetPassword" method="post">
        <div class="container col-md-8  d-flex justify-content-center m-auto row py-5">
            <h1 class="text-center paraPannel">Forget Password</h1>



            <div class="mb-3 d-flex justify-content-center ">
                <img src="img/piz.png" class="w-25" alt="">
            </div>
            <div class="mb-3 " style="height: 80px;">
                <?php
                                if(isset($_SESSION['msg_f']) && $_SESSION['msg_f']!='')
                                {
                                    ?>
                                    <div class="alert alert-danger" role="alert">
                  <?=$_SESSION['msg_f']?>
                </div>
                                    <?php
                                    unset($_SESSION['msg_f']);
                                }

                ?>
            </div>

            <div class="mb-3 col-sm-3 col-md-8 ">
                <label for="">Email Id</label>
                <input type="text" name="email" class="form-control py-2 mt-2">
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
                <button name="ForgetBtn" class="btn btn-secondary px-5">Forget Password</button>
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-around ">
            <a href="Login" class="text-decoration-none">&larr;  Already Know </a>
        </div>
    </form>
</div>
<?php

include "inc/Footer.php";
?>

<script>
    $(document).ready(() => {
        $("#refresh").on("click", () => {
            $("#captchaImg").attr("src", "img/captcha_r.php")
        })
    })
</script>