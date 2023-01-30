

<?php
include 'security.php';
include 'include/header.php';
include 'include/sidebar.php';
include 'include/Navbar.php';
include '../db/config.php';

?>


<?php

// admin_user

if(isset($_REQUEST['submit']))
{
    $name = trim(mysqli_real_escape_string($conn, $_POST['name']));
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $pass = trim(mysqli_real_escape_string($conn, $_POST['pass']));
    $cpass = trim(mysqli_real_escape_string($conn, $_POST['cpass']));

    if($name==''||$email==''||$pass==''||$cpass=='')
    {
        $msg = "All fields are requirement ";
    }
    else{
        if($pass!=$cpass)
        {
            $msg = "password and confirm password are not matched";
        }
        else{
         
            $query = "select * from admin_user where email='$email' ";
            $run_query=mysqli_query($conn,$query);
            if(mysqli_num_rows($run_query)>0)
            {
            $msg = "user already registered";
            }
           else{
            $auth_password = password_hash($pass, PASSWORD_BCRYPT);
            $msg = $auth_password;
            $query = "INSERT INTO `admin_user`( `name`, `email`, `password`) VALUES ('$name','$email','$auth_password')";
            if(mysqli_query($conn,$query))
            {
            $msg = "User added successful";

            }
            else{
            $msg = "Techincail issue faces";

            }
           }
        }
    }
    
}
?>










<!--  -->
 <!-- Begin Page Content -->
 <div class="container-fluid">
            <div class="container  col-md-8">
                <h1 class="text-center">Add Admin</h1>
                        <?php
                        if(isset($msg) && $msg!='')
                        {
                            echo '
                            <div class="alert alert-primary" role="alert">
                           '.$msg.'
                          </div>
                            
                            ';
                        }
                        ?>
                <form method="post">
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control p-2">
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control p-2">
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input type="text" id="pass" name="pass" class="form-control p-2">
                    </div>
                    <div class="mb-3">
                        <label for="">Confirm Password</label>
                        <input type="text" id="cpass" name="cpass" class="form-control p-2">
                        <span id="errorMsg"></span>
                    </div>
                    <div class="mb-3">
                      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                      <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>

</div>
<!--  -->
      <script>
        let pass=document.getElementById("pass")
        let cpass=document.getElementById("cpass")

        cpass.addEventListener("input",()=>{
            if(pass.value!==cpass.value || !cpass.value==="" )
            {
                        document.getElementById("errorMsg").innerHTML="Password and confirm password can not match";
                        document.getElementById("errorMsg").style.color="red";
            }
            else{

                document.getElementById("errorMsg").innerHTML="Match";
                        document.getElementById("errorMsg").style.color="green";
            }
        })
      </script>
   
<?php

include 'include/Footer.php';

?>

