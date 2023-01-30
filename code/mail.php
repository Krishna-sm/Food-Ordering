<?php



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// $emp_id,$email,$sender,$message,$date

function sendMail($email,$name,$resetToken,$userId){
 
   require 'PHPMailer/Exception.php';
   require 'PHPMailer/SMTP.php';
   require 'PHPMailer/PHPMailer.php';

   $mail = new PHPMailer(true);

   try {
       //Server settings
       $mail->isSMTP();                                            //Send using SMTP
       $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
       $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
       $mail->Username   = 'crsogigov@gmail.com';                     //SMTP username
       $mail->Password   = 'aktuepmzvxspssnm';                               //SMTP password
       $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
       $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
   
       //Recipients
       $mail->setFrom('crsogigov@gmail.com', 'FoodieMeal ');
       $mail->addAddress($email);  
          //Add a recipient
   
   
       //Content
       $mail->isHTML(true);                                  //Set email format to HTML
       $mail->Subject = 'Forget Password';
        $mail->Body =  '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Mail</title>
        </head>
        <body>
            <div class="" style="width: 100%; min-height:100vh ; display: flex;flex-direction: column; justify-content: center; ">
                <div class="" style="background-color: aliceblue; width: 500px; ">
                        <div class="" style="margin-top: -36px;background-color:rgb(24 21 71);padding:0 20px; color: white; ">
                            <h1 style="padding: 10px 0; font-family: cursive;">FoodieMeal</h1>
                        </div>
                        <div class="">
                            <img src="https://img.freepik.com/premium-photo/tasty-pepperoni-pizza-black-concrete-background_79782-103.jpg?w=2000" style="width: 100%;" alt="">
                        </div>
                        <table style="display: flex; justify-content: center;">
                     
                        <tr>
                            <td>
                                <span style="padding: 6px;  font-size: 30px; font-family:\'Segoe UI\', Tahoma, Geneva, Verdana, sans-serif;">
                                    <b>Hi,</b>'.$name.' </span>
    
                               
                            </td>
                          
                        </tr>
                        <tr>
                            <td>
                                <span style="padding: 6px;  font-size: 20px; font-family:monospace;"><b>User ID : </b> '.$userId.'</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                
                                    <span style="padding: 20px;"><a href="http://localhost/project1/updatePassword?id='.$userId.'&token='.$resetToken.'" style="
                                        background: #131378;
                                        color: white;
                                        padding: 9px 15px;
                                        display: flex;
                                        justify-content: center;
                                        text-decoration: none;
                                        font-family: cursive;
                                        
                                        border-radius: 5px;
                                    ">Forget password </a></span>
                           
                                   
                            </td>
                        </tr>
                        <tr>
                            <td>
                          
                                        <p tyle="display: flex; justify-content: center; align-items: center;" align="center">&copy; FoodieMeal</p>
                                    
                                
                            </td>
                        </tr>
                    </table>
                       
                        
                </div>
        
            </div>
        </body>
        </html>
        ';
   
       $mail->send();
       return true;
           } catch (Exception $e) {
               // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
               return false;
           }

}




?>