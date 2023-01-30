<?php

include "inc/navbar.php";
?>
<style>
     body {
        background-color: rgb(58, 175, 169);
    }
      
    .Item{
        background-color: aliceblue;
    }
</style>

<div class="container w-full h-50 pt-4 mx-x px-4">
    <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?=base_url("img/5.jpg") ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?=base_url("img/2.png") ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?=base_url("img/3.jpg") ?>" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    
    <div class="container Item py-4">
     <h1 class="h1 text-center p-2 serviceHeading">Our Services 🍽️</h1>
 <div class="row d-flex justify-content-center">
            <?php


            $query = " SELECT * FROM `food_category`";
            $run_query = mysqli_query($conn, $query);

            if(mysqli_num_rows($run_query)>0)
            {
                while($row=mysqli_fetch_assoc($run_query))
                {
                    echo '
                
                        <div class="card mx-3 col-sm-4 my-2" style="width: 18rem;">
                        <img class="card-img-top" src="img/category/'.$row['image'].'" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">'.trim($row['name']).'</h5>
                            <p class="card-text">'.trim($row['description']).'</p>
                            <a href="MenuPage/'.trim($row['slug']).'" class="btn btn-primary pkg">
                        Visit	&rarr;
                            </a>
                        </div>
                    </div>
                   
                        ';
                    
                }
            }


            // for($i=0;$i<3;$i++)
            // {
            //     echo '
                
            //     <div class="card mx-3 col-sm-4 my-2" style="width: 18rem;">
            //     <img class="card-img-top" src="img/2.png" alt="Card image cap">
            //     <div class="card-body">
            //         <h5 class="card-title">Card title</h5>
            //         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            //             card\'s content.</p>
            //         <a href="OrderFood" class="btn btn-primary pkg">
            //     Visit	&rarr;
            //         </a>
            //     </div>
            // </div>
           
            //     ';
            // }

            ?>
  </div>

 </div>
</div>

<?php

include "inc/Footer.php";
?>