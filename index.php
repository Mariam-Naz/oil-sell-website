<?php

ob_start();
// session_start();
// session_destroy();

defined("DS") ? null : define("DS",DIRECTORY_SEPARATOR); 

defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT", __DIR__ . DS . "resources/templates/front");

defined("TEMPLATE_BACK") ? null : define("TEMPLATE_BACK",__DIR__ . DS . "resources/templates/back");

defined("UPLOAD_DIR") ? null : define("UPLOAD_DIR",__DIR__ . DS . "resources/uploads");

defined("SLIDER_DIR") ? null : define("SLIDER_DIR",__DIR__ . DS . "resources/slider-imgs");

defined("DB_HOST") ? null : define("DB_HOST","localhost"); 

defined("DB_USER") ? null : define("DB_USER", "root");

defined("DB_PASS") ? null : define("DB_PASS","");

defined("DB_NAME") ? null : define("DB_NAME","ecommerce_db");

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

require_once("./resources/functions.php");

//my
// echo DIRECTORY_SEPARATOR; /

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="PC computers, mobiles, tablets, smart TVs, laptops">
    <meta name="description" content="Best place for tech products with free delivery all over Pakistan">

    <title>Technofy</title>

    <!-- Bootstrap Core CSS -->
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

    <link href="public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="public/css/shop-homepage.css" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">
    <!-- font-awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>

<body>
    <!-- Navigation -->
    <header>
        <div class="container-fluid nav-confluid">
        <!-- brandname -->
            <div class="logo-container">
           <h3 class="nav-brand"> <a href="./public/admin"> <img class="logo" src="./public/images/logo.jpg" alt='logo'></a> Sahas Organic Care</h3> 
            </div>
        </div>
    </header>
<div class="container-fluid mb-5">
        <img class="cover" src="./public/images/cover-pic.PNG" alt="cover">
</div>

<div class="container-fluid mb-5 mt-5">

    <?php include(TEMPLATE_FRONT . DS . "praise.php") ?>

<div class="row">

    <div class="text-center">
        <h1 class="pd">Our Products</h1>
    </div>
    <?php get_products(); ?>
</div>
</div>


<!-- /.container -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>