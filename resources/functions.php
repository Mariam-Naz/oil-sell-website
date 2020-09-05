<?php

function set_message($msg){
    if(!empty($msg)){
        $_SESSION['message'] = $msg;
    }else{
        $msg = "";
    }
}

function display_message(){
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function redirect($location){
    header("Location: $location");
}

function query($sql){
    global $connection;
    return mysqli_query($connection,$sql);
}

function confirm($result){
    global $connection;
    if(!$result){
        die("Query Failed!!!" + mysqli_error($connection));
    }
}

function escape($string)
{
    global $connection;
    return mysqli_real_escape_string($connection,$string);
}
// ********************************** FRONT END *****************************************************************************
function get_products(){
$query = query('SELECT * FROM products');
confirm($query);
while($row = mysqli_fetch_array($query)){
    $product = <<< DELIMETER
    <div class="col-md-4">
    <div class="card card-product" style="width: 30rem;">
  <img class="card-img-top" src="$row[product_image]" alt="$row[product_image]">
  <div class="card-body">
    <h5 class="card-title">$row[product_title]</h5>
    <p class="card-text">$row[product_long_description]</p>
    <div class="card-footer text-muted">
    Rs. $row[product_price]
  </div>
  </div>
</div>
    </div>
DELIMETER;
echo $product;
    }

}


function login_user(){
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $query = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'");
        confirm($query);
        if(mysqli_num_rows($query) == 0){
            set_message("Invalid Username Or Password");
            redirect('login.php');
        }
        else{
            $_SESSION['username'] = $username;
            set_message("Welcome {$username}");
            redirect('../public/admin');
        }
    }
}
//*******************************************for registered clients*****************************************
function reg_login(){
    if(isset($_POST['login'])){
        $username = $_POST['reg_login_username'];
        $password = md5($_POST['reg_login_password']);
        $query = query("SELECT * FROM registration WHERE username = '{$username}' AND password = '{$password}'");
        confirm($query);
        if(mysqli_num_rows($query) == 0){
            set_message("Invalid Username Or Password");
            redirect('registeration.php');
        }
        else{
            set_message("Welcome {$username}");
            $_SESSION['reg_user'] = $username;
            redirect('checkout.php');
        }
    }
}


function reg_logout(){
    if(isset($_POST['reg_logout'])){
        session_start();
        session_unset();
        session_destroy();
        session_write_close();
        setcookie(session_name(),'',0,'/');
        session_regenerate_id(true);
        header("Location: http://".$_SERVER['HTTP_HOST'].'/sahas-organic-care/public');
    }
}


// ********************************** BACK END *****************************************************************************


function displayProducts(){

    $query = query('SELECT product_id, product_title, product_image, product_price FROM products');
    confirm($query);

    while($row = mysqli_fetch_array($query)){
       
        $product = <<< DELIMETER
        <tr>
        <td>{$row['product_id']}</td>
        <td>{$row['product_title']}<br>
        <img style="width: 100px" src={$row['product_image']} alt={$row['product_title']} >
        </td>
        <td>{$row['product_price']}</td>
        <td><a class='btn btn-danger' href="../../resources/templates/back/delete_product.php?id={$row['product_id']}"><span class = 'glyphicon glyphicon-remove'></span></a></td>
        </tr>
        DELIMETER;
        echo $product;
            }

}

function addProducts(){
    if(isset($_POST['publish'])){
    $product_title = escape($_POST['product_title']);
    $product_description = escape($_POST['product_description']);
    $product_price = escape($_POST['product_price']);
    $product_image = escape($_POST['product_image']);
    $query = query("INSERT INTO products(product_title, product_price,  product_long_description, product_image) VALUES('{$product_title}' , '{$product_price}' , '{$product_description}' , '{$product_image}')" );
    confirm($query);
    // redirect('index.php?products');
        }
}


function product_count(){
    $query = query("SELECT COUNT(*) as count FROM products");
    confirm($query);
    while($row = mysqli_fetch_array($query)){
    $products = <<< DELIMETER
    <div class="huge">{$row['count']}</div>
    DELIMETER;
    echo $products;
    }
}

?>