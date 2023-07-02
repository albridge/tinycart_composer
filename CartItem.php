<?php
namespace app;
use app\NotEnoughException;

class CartItem{

	protected $item_id;
	protected $item_price;
	protected $cart_quantity;
	protected $item_quantity;
	protected $item_name;

	function __construct($item_id,$item_name,$item_price,$item_quantity,$cart_quantity=1)
	{
		$this->item_id = $item_id;
		$this->item_name = $item_name;
		$this->item_price = $item_price;
		$this->cart_quantity = $cart_quantity; // quantity is cart
		$this->item_quantity = $item_quantity; // quantity in stock of an item copied from products table
	}


	public function getCartItemId()
	{
		return $this->item_id;
	}

	public function getItemName()
	{
		return $this->item_name;
	}

	public function getItemPrice()
	{
		return $this->item_price;
	}

	public function getCartQuantity()
	{		
		return $this->cart_quantity;
	}

	public function getItemQuantity()
	{
		return $this->item_quantity;
	}

	public function increaseQuantity()
	{	
		try {
				if(($this->cart_quantity+1)>$this->item_quantity)
				{
					throw new NotEnoughException();
				}
				$this->cart_quantity+=1;
			} catch (\Exception $e) {
				echo $e->getCode().', '.$e->getMessage();
			}	
			
	}

	// decrease quantity

	public function decreaseQuantity()
	{		
		if(($this->cart_quantity-1)>=0)				
			$this->cart_quantity-=1;			
	}

	public function setQuantity($quantity)
	{			
		// improve this later by checking to see that the intended quantity is not higher than product quantity
		$this->cart_quantity=$quantity;
	}
	
}