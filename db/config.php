<?php

$conn=mysqli_connect("localhost","root","","foodiemeal");

// if($conn)
// {
//         echo "connected successful";
// }
// else{
//     echo "connected rejected";

// }

// header('location: ../index');

function base_url($url)
{
    echo 'http://localhost/project1/'.$url;
}       
?>