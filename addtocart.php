<?php

require  __DIR__.'/vendor/autoload.php';
session_start();
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

use app\CartItem;
use app\Cart;
use app\BasketClass;
use app\SessionCheck;
use app\InputFilters;
use app\classes\DB;



ob_start();

$data=new InputFilters();
$input = $data->getBody();

$conn = new DB($_ENV['DB_HOST'],$_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD'],$_ENV['DB_DATABASE']);

$id = $input['id'];
$query = "select *from inventory where id ='".$id."'";
$result = mysqli_query($conn->connect(),$query);
$row = mysqli_fetch_assoc($result);

$CartItem = new CartItem($row['id'],$row['name'],$row['price'],$row['quantity']);

$cart=SessionCheck::getCartInstance();

$cart->addToCart($CartItem);

// include 'basket.php';
BasketClass::buildCart($cart);


?>



