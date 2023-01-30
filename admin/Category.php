<?php
include 'security.php';
include 'include/header.php';
include 'include/sidebar.php';
include 'include/Navbar.php';
include '../db/config.php';

?>



<?php

if (isset($_POST['submit'])) {

    $slug = trim(mysqli_real_escape_string($conn, $_POST['slug']));
    $name = trim(mysqli_real_escape_string($conn, $_POST['name']));
    $description = trim(mysqli_real_escape_string($conn, $_POST['description']));
    $image = trim(mysqli_real_escape_string($conn, $_FILES['image']['name']));


    if ($slug == '' || $name == '' || $image == ''||$description=='') {
        $msg = "All fields are manadary";

    } else {
        // echo $slug.spilt
        $sulg_explod = explode(" ", $slug);
        $slug_implod = implode("-", $sulg_explod);
        // print_r($slug_implod);

        $image_extenison = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $ext = ['jpg', 'jpeg', 'png'];

        $fileName = time() . "." . $image_extenison;

        $c = in_array($image_extenison, $ext);
        if ($c) {
            $query = "INSERT INTO 
            `food_category`( `name`, `slug`, `image`,`description`) 
            VALUES ('$name','$slug_implod','$fileName','$description')";
            $run_query = mysqli_query($conn, $query);
            if($run_query && move_uploaded_file($_FILES['image']['tmp_name'],'../img/category/'.$fileName))
            {
                $msg = "Category Added";

            }
            else{
            $msg = "Technical issue";

            }
        } else {
            $msg = "Enter valid File Extension jpg,png,jpeg";

        }

    }
    // food_category


    // echo "<pre>";
    // print_r($_POST);
    // print_r($_FILES);

    //     //if($image_extenison)
    // echo $image_extenison;
    // echo "<br/>";
    // echo $fileName;
    // move_uploaded_file($_FILES['image']['tmp_name'],$fileName);
    //    $c= in_array($image_extenison,$ext);
    //    if($c)
    //    {
    //     echo "valid";
    //    }
    //    else{
    //     echo 'Not valid ';
    //    }





}

?>









<!--  -->
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="container  col-md-8">
        <h1 class="text-center">Add Food Category</h1>
        <?php
        if (isset($msg) && $msg != '') {
            echo '
                            <div class="alert alert-primary" role="alert">
                           ' . $msg . '
                          </div>
                            
                            ';
        }
        ?>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="">Category Name</label>
                <input type="text" name="name" class="form-control p-2">
            </div>
            <div class="mb-3">
                <label for="">Slug</label>
                <input type="text" name="slug" class="form-control p-2">
            </div>
            <div class="mb-3">
                <label for="">Description</label>
                <textarea name="description" id="" cols="2" rows="3" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="">Image</label>
                <input type="file" accept="image/*" id="img" name="image" class="form-control ">
            </div>

            <div class="mb-3">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
    </div>
    <div class="container w-50 d-flex justify-content-center">
        <img src="" alt="" id="DataImg" class="w-50">
    </div>
</div>
<script>
    let img = document.getElementById("img");
    let DataImg = document.getElementById("DataImg");
    img.addEventListener("change", (e) => {
        // console.log(e);
        // console.log(img.value);
        const [file] = img.files
        if (file) {
            DataImg.src = URL.createObjectURL(file)
        }
        // DataImg.setAttribute("src",img.value);

    })


</script>
<!--  -->

<!-- <img src="../img" alt=""> -->
<?php

include 'include/Footer.php';

?>