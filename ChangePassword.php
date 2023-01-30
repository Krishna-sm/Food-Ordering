<?php

include "inc/navbar.php";
?>

<style>
    body {
        background-color: rgb(58, 175, 169);
    }
</style>

<div class="container py-3 mt-4  d-flex justify-content-center m-auto" style="background: aliceblue;">

    <form action="">
        <div class="container col-md-12 row py-5">

    <div class="mb-3 " style="height: 80px;">
    <!-- <div class="alert alert-primary" role="alert">
  A simple primary alert—check it out!
</div> -->
    </div>
            <div class="mb-3 ">
                <label for="">Old Password</label>
                <input type="text" class="form-control py-2 mt-2">
            </div>
            <div class="mb-3 ">
                <label for="">New Password</label>
                <input type="text" class="form-control py-2 mt-2">
            </div>
            <div class="mb-3 d-flex justify-content-center row">
                <img src="img/captcha_r.php" alt="" id="captchaImg" class="w-25 ">
                <div class="col-sm-1 d-flex justify-content-center align-content-center pt-3 ">

                    <i id="refresh" class="fa fa-rotate"></i>
                </div>
               
            </div>
            <div class="mb-3 d-flex justify-content-center">
            <div class="col-sm-3 col-md-8">
                <label>Enter Captcha</label>
                    <input type="text" class="form-control py-2 mt-2">
                </div>
            </div>
            <div class="mb-3  ">
                <button class="btn btn-primary" style="background-color: #fc4a69; border: none;">Submit</button>
            </div>
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