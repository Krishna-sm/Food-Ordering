<?php
session_start();

    include 'include/header.php';
    include '../db/config.php';
    ?>

<?php

if(isset($_REQUEST['loginBtn']))
{
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['password']));
    if($email=='' || $password=='')
    {
        $_SESSION['login_msg'] = "Fill All fields"; 
    }
    else{
        $query = "SELECT * FROM `admin_user` WHERE email='$email'";
        $run_query = mysqli_query($conn, $query);
        if(mysqli_num_rows($run_query)==1)
        {
            $data = mysqli_fetch_assoc($run_query);
            $db_pass = $data['password'];

            $ValidPassword = password_verify($password, $db_pass);
            if($ValidPassword)
            {
                $_SESSION['admin_user'] = $email;
                header('location:index');
            }
            else{
                $_SESSION['login_msg'] = "Credential Not Match"; 
            }
            
            // echo $data;
            // print_r($data);
        }
    }
}

?>


<body class="bg-gradient-primary my-5" style="background: #0c0849;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-16 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Admin</h1>
                                        <div class="container">
                                            <img src="img/piz.png" alt="" class="w-25">
                                        </div>
                                    </div>
                                    <div class="mb-1" style="height:50px;">
                                    <?php
                                    if(isset($_SESSION['login_msg']) && $_SESSION['login_msg']!='' )
                                    {
                                        ?>
                                        <div class="alert alert-primary" role="alert">
  <?= $_SESSION['login_msg'] ?>
</div>
                                        <?php
                                        unset($_SESSION['login_msg']);
                                    }

                                    ?>

                                    </div>
                                    <form method="post" class="user">
                                        <div class="form-group">
                                 <input type="email" name="email" 
                               
                                 class="form-control"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control " 
                                           

                                            name="password" placeholder="Password" id="pass">
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-sm btn-success" id="showPass">Show</button>
                                        </div>
                                        <button  name="loginBtn" class="btn btn-primary  btn-block">Login</button>
                                       
                                       
                                        <a href="/" class="btn btn-danger  btn-block">&#8592; Home</a>

                                    </form>
                                    <hr>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<script>
  let chec=  document.getElementById("showPass");
  let a=0;
  chec.addEventListener("click",()=>{
    if(a===0)
    {
        document.getElementById("pass").setAttribute("type","text");
        chec.innerText="Hide";
        a=1;
    }
    else{
        document.getElementById("pass").setAttribute("type","password");
        chec.innerText="Show";
        a=0;
    }

  })
</script>