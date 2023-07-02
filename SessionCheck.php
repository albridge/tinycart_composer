<?php
namespace app;
use app\Cart;
class SessionCheck{

	protected static $cartInstance;	

	public static function getCartInstance()
	{
		if(empty($_SESSION['tinycart'])){	
			$cartInstance = new Cart;
			$_SESSION['tinycart'] = $cartInstance;
		}else{	
			$cartInstance= $_SESSION['tinycart'];
		}
		return $cartInstance;
	}

	public static function getActiveSession()
	{
		if($_SESSION['tinycart'])
			{
				$cartInstance=$_SESSION['tinycart'];
				BasketClass::buildCart($cartInstance);
			}	
	}


}