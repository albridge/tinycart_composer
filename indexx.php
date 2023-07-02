<?php

include_once 'Cart.php';
include_once 'CartItem.php';
include_once 'Product.php';


$CartItem1 = new CartItem($product1->getId(),$product1->getName(),$product1->getPrice(),$product1->getQuantity());
$CartItem2 = new CartItem($product2->getId(),$product2->getName(),$product2->getPrice(),$product2->getQuantity());
$CartItem3 = new CartItem($product3->getId(),$product3->getName(),$product3->getPrice(),$product3->getQuantity());


$cart = new Cart;

$cart->addToCart($CartItem1);

$cart->addToCart($CartItem1);

$cart->addToCart($CartItem1);

$cart->addToCart($CartItem1);

$cart->addToCart($CartItem1);

$cart->addToCart($CartItem1);

$cart->addToCart($CartItem2);

$cart->addToCart($CartItem2);

$cart->addToCart($CartItem1);

$cart->addToCart($CartItem1);

$cart->addToCart($CartItem3);

$cart->addToCart($CartItem3);

$cart->addToCart($CartItem3);

$cart->addToCart($CartItem1);

// $cart->addToCart($CartItem3);

// var_dump($cart);
var_dump($cart->getItems());



// $item = $cart->getItemAt($product2->getId());
// echo $item->getItemName();
// var_dump($item);

foreach($cart->getPositions() as $ca)
{
	echo ucwords($ca->getItemName()).' - '.$ca->getCartQuantity().' - '.$ca->getItemQuantity(); echo "<br>";
}

$cart->setCartQuantity(6,$CartItem1->getCartItemId());
$cart->setCartQuantity(4,$CartItem2->getCartItemId());



// $cart->addToCart($CartItem1);

var_dump($cart);

$cart->removeItem($CartItem1->getCartItemId());

var_dump($cart);

echo "Total cart quantities: ". $cart->getTotalCartQuantity().' and '.$cart->getCount().' in cart';

echo "<br>";

echo "Total cart amount ".number_format($cart->getTotalCartAmount(),2);

echo "<br>";

// get line total of cart itme
echo $cart->getLineTotal($CartItem1->getCartItemId());

echo "<br>";

echo $cart->getLineTotal($CartItem3->getCartItemId());

echo "<br>";

// increase cart quantity for cart item
// $cart->increaseCartQuantity($CartItem1->getCartItemId());

// decrease cart quantity for cart item
$cart->decreaseCartQuantity($CartItem1->getCartItemId());

// loop through cart items and show name and line total
foreach($cart->getItems() as $ca)
{
	echo $ca->getItemName().' '.$ca->getItemPrice()*$ca->getCartQuantity(); echo "<br>";
}

$cart->emptyCart();

var_dump($cart);

$cart->addToCart($CartItem1);

var_dump($cart);

$cart->removeItem($CartItem1->getCartItemId());

var_dump($cart);