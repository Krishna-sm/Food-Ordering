<?php

include "inc/navbar.php";
?>

<style>
    body {
        background-color: rgb(58, 175, 169);
    }
</style>

<div class="container py-3 mt-4 " style="background: aliceblue;">
    <div class="row col-lg-12 d-flex py-2">


        <div class="col-lg-6">
            <img src="img/2.png" alt="" class="w-100">
        </div>
        <div class="col-lg-6">
            <h1 class="display-4 h1">Pizza </h1>
            <h5 class="display-6">&#8377; 564/- </h5>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora alias ipsam magni?</p>

            <!-- <button class="btn btn-success me-2">Order Now</button> -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Order Now
            </button>
        </div>



    </div>

</div>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade mt-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin-top: 50px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="mb-3 ">
                        <div class="row d-flex">
                            <h2>Quanity</h2>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend ">
                                    <span id="desc" disabled class="input-group-text bg-secondary">-</span>
                                </div>
                                <input type="text" value="1" id="Quantity" class="form-control col-sm-2">
                                <div class="input-group-prepend ">

                                    <span id="inc" class="input-group-text bg-secondary">+</span>
                                </div>
                                <span id="error"></span>
                            </div>
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="">Payment Option</label>
                        <select name="" id="" class="form-control">
                            <option value="">Select Payment Option</option>
                            <option value="Cash">Cash</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<?php

include "inc/Footer.php";
?>

<script>
    let Quantity = document.getElementById("Quantity")
    let desc = document.getElementById("desc")
    let inc = document.getElementById("inc")
    desc.addEventListener("click", () => {
        if (parseInt(Quantity.value) >= 2) {
            Quantity.value--;
        }
    })
    inc.addEventListener("click", () => {
        Quantity.value++;
    })
    Quantity.addEventListener("input", () => {
        if (Quantity.value === '' || Quantity.value <= 0) {
            document.getElementById("error").innerHTML = "Enter Proper Quantity";
            document.getElementById("error").style.color = "red";
        }
        else {
            document.getElementById("error").innerHTML = "Gud";
            document.getElementById("error").style.color = "green";
        }


    })
</script>