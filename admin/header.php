<?php

session_start();

// Save last visited page except for logout
// if (!isset($_SESSION['last_page']) || $_SESSION['last_page'] !== $_SERVER['REQUEST_URI'])  {
//     $_SESSION['last_page'] = $_SERVER['REQUEST_URI'];
// }

if (isset($_SERVER['HTTP_REFERER'])) {
    $_SESSION['last_page'] = $_SERVER['HTTP_REFERER']; //gets the actual previous page.
}


?>

<?php  include('../server/connection.php');  ?>



<!DOCTYPE html>
<html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
            <meta name="generator" content="Hugo 0.88.1">
            <title>Dashboard Template · Bootstrap v5.1</title>

            <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

            <!-- Favicons -->
            <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png">
            <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32">
            <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16">
            <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
            <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
            <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
            <meta name="theme-color" content="#7952b3">

              <style>
                 
              </style>

              <!-- custom style for this template -->
              <link href="dashboard.css" rel="stylesheet"></link>

        </head>

        <body>


             <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">    
                    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Mira Bella</a>
                    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="navbar-nav">
                        <div class="nav-item text-nowrap">
                              <?php if(isset($_SESSION['admin_logged_in'])) { ?>
                               <a class="nav-link px-3" href="logout.php?logout=1">Sign out</a>
                            <?php }?>
                        </div>
                    </div>
                </header>
