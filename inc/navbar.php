<?php

include 'db/config.php';


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Food Ordering || Food</title>


  <link rel="stylesheet" href="<?=base_url("css/style.css") ?>">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="shortcut icon" href="<?=base_url("img/favicon.png") ?>" type="image/x-icon">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?=base_url("/")?>">FoodieMeal</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?=base_url("/")?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?=base_url("Contact")?>">Contact Us</a>
          </li>
        </ul>

        <ul class="navbar-nav mr-5 mx-5  mb-2">
          <li class="nav-item dropdown mr-5">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{Name}}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?=base_url("Profile")?>">Profile</a></li>
              <li><a class="dropdown-item" href="<?=base_url("ChangePassword")?>">Change Password</a></li>
              <hr class="dropdown-divider">
              <li><a class="dropdown-item" href="#">Logout</a></li>
              <li>
              </li>
            </ul>
          </li>

          <li class="nav-item mx-2 pt-1">
            <a href="<?=base_url("Login")?>" class="btn btn-outline-success">Login <i class="fa fa-key-skeleton"></i></a>
          </li>
          <li class="nav-item mx-3 pt-1">
            <a href="<?=base_url("Register")?>" class="btn btn-outline-primary">Register</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>