<?php

include "inc/navbar.php";
?>

<style>
    body {
        background-color: rgb(58, 175, 169);
    }
</style>

<div class="container py-3 mt-4  d-flex justify-content-center m-auto" style="background: aliceblue;">

    <form method="post" id="contactForm" name="contactForm">
        <div class="container col-md-12 row py-5">
            <h1 class="text-center paraPannel">Contact</h1>
                <span id="msg " class="text-center"></span>
            <div class="mb-3">.
                <label for="">Name</label>
                <input type="text" name="name" id="name" class="form-control py-2 mt-2">
                <span class="text-danger" id="errorName"></span>
            </div>
            <div class="mb-3">
                <label for="">Email</label>
                <input type="text" name="email" id="email" class="form-control py-2 mt-2">
                <span class="text-danger" id="errorEmail"></span>

            </div>
            <div class="mb-3">
                <label for="">Message</label>
                <textarea name="message" id="msgId" cols="3" rows="2" class="form-control"></textarea>
                <span class="text-danger" id="errorMsg"></span>
            </div>
            <div class="mb-3  ">
                <button type="submit" id="submitBtn" class="btn btn-primary"
                    style="background-color: #fc4a69; border: none;">Submit</button>
            </div>
        </div>
    </form>
</div>
<?php

include "inc/Footer.php";
?>

<script>
    $(document).ready(() => {

        $("#contactForm").on("submit", function(e) {
            e.preventDefault();
         
       
            console.log('gaya');

            let name = $("#name").val();
            let email = $("#email").val();
            let msgId = $("#msgId").val();
            const fun=()=>{
                $("#submitBtn").attr("disabled",true);
                $("#submitBtn").html("plese wait....");
                
               jQuery.ajax({
                
                url:"code/contact",
                type:"post",
                data: $("#contactForm").serialize(),
                success:function(s){
                     alert(s);
                     $("#submitBtn").attr("disabled",false);
                     $("#submitBtn").html("Submit");
                }
            });
            }

                 if (name.length === 0) {
                    $("#errorName").html("<i class=\"fa fa-times\" ></i>  Enter Name")
                        return false;
                }
               else if (email.length === 0) {
                    $("#errorEmail").html("<i class=\"fa fa-times\" ></i>  Enter Email")
                    return false;

                }
               else if (msgId.length <= 5) {
                    $("#errorMsg").html("<i class=\"fa fa-times\" ></i>  Enter Message")
                    return false;

                }
                else{
                  setTimeout(()=>{
                    fun();
                  },2000)
                }

            
       
        })
    })
</script>