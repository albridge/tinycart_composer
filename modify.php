<?php
 require  __DIR__.'/vendor/autoload.php';

use app\CartItem;
use app\Cart;
use app\BasketClass;
use app\InputFilters;

// this file connects increase, decrease and delete code.
session_start();

$data=new InputFilters();
$input = $data->getBody();

$action = $input['action'];
$id = $input['id'];

$cart = $_SESSION['tinycart'];
if($action==1)
{	
	$cart->increaseCartQuantity($id);	
}

if($action==2)
{	
	$cart->decreaseCartQuantity($id);	
}

if($action==3)
{	
	$cart->removeItem($id);
	$_SESSION['tinycart'] = $cart;
}

BasketClass::buildCart($cart);
