<?php
session_start();
if(!$_SESSION['admin_user'])
{
    header('location:login');
}


?>