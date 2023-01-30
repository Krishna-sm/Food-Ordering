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

            <div class="mb-3 d-flex justify-content-center ">
                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="" class="" style="border-radius: 50%; height:250px; width: 250px;">
            </div>
           <div class="mb-3 d-flex justify-content-end">
           <input type="file" name="" id="">
           </div>




            <div class="mb-3">
            <table class="table table-hover">

  <tbody>
    <tr class="">
      <td class="font-weight-bold">Name</td>
      <td>Krishna Agrawal</td>
    </tr>
 
    <tr>
      <td class="font-weight-bold">Email</td>
      <td>kana.sonkh@bgmail.com</td>
    </tr>
   
  </tbody>
</table>
            </div>




            <!-- <div class="mb-3 d-flex justify-content-">
                <label for="">Name</label>
                <h1>Krishna Agrawal</h1>
            </div>
            <div class="mb-3">
                <label for="">Email</label>
                <input type="text" class="form-control py-2 mt-2">
            </div>
            <div class="mb-3">
                <label for="">Message</label>
                <textarea name="" id="" cols="3" rows="2" class="form-control"></textarea>
            </div> -->
            <div class="mb-3  " >
                    <button class="btn btn-primary" style="background-color: #fc4a69; border: none;">Submit</button>
            </div>
        </div>
    </form>
</div>
<?php

include "inc/Footer.php";
?>