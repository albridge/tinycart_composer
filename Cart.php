<?php
namespace app;
class Cart{

	protected $items = array();		

	function __construct()
	{
		/* empty constructor which is actually not neccessary in this case as it contributes absolutely nothing to the working of the software. code would still work perfectly if i deleted this constructor
		*/

	}

	public function getItems()
	{
		return $this->items;
	}	

	public function addToCart($item)
	{			
		$cartItems = $this->getItems();
		$alreadyInCart = false;		
		if(count($cartItems)>0){			
			foreach($cartItems as $anItem)
			{	
				// if there is a match then item is already in cart so just increament item quantity cos no need to add as a fresh item			
				if($anItem->getCartItemId()==$item->getCartItemId())
				{					
					$alreadyInCart = true;
					$cart_item = $this->getItemAt($anItem->getCartItemId());					
					if($cart_item)
					{
						$cart_item->increaseQuantity();
					}										 
				}
			}
		}
			// if item is not already in cart then add to cart as a new item
			if($alreadyInCart == false)
			{
				$item = new CartItem($item->getCartItemId(),$item->getItemName(),$item->getItemPrice(),$item->getItemQuantity(),$item_quantity=1);
				$this->items[]=$item;
			}
	}	

	

	public function getItemAt($position){		
		foreach($this->getItems() as $item)
		{
			if($item->getCartItemId()==$position)
			{
				return $item;
			}
		}
	}

	public function getPositions()
	{
		return $this->items;
	}	

	public function getCartItemQuantity()
	{
		return $this->item_quantity;
	}	

	public function setCartQuantity($quantity,$position)
	{			
		foreach($this->items as $item)
		{
			if($item->getCartItemId()==$position)
			{
				$item->setQuantity($quantity);
			}
		}
	}

	public function removeItem($position)
	{
		foreach($this->items as $key=>$value)
		{
			if($value->getCartItemId()==$position){
				unset($this->items[$key]);
			}
		}		
		// regenerate array keys from 0,1,2 etc
		$this->items=array_values($this->items);
	}	

	// get total cart quantity

	public function getTotalCartQuantity()
	{
		$total_quantity = 0;
		foreach($this->items as $item)
		{
			$total_quantity+=$item->getCartQuantity();
		}
		return $total_quantity;
	}

	// get total cart value or amount

	public function getTotalCartAmount()
	{
		$total = 0;
		foreach($this->items as $item)
		{
			$total+=$item->getCartQuantity()*$item->getItemPrice();
		}
		return $total;
	}

	// get item line total

	public function getLineTotal($itemId)
	{		
		foreach($this->items as $singleItem)
		{
			if($singleItem->getCartItemId()==$itemId)
			{
				return $singleItem->getCartQuantity()*$singleItem->getItemPrice();
			}
		}
	}

	public function getCount()
	{
		return count($this->items);
	}

	public function increaseCartQuantity($id)
	{
		$this->getItemAt($id)->increaseQuantity();
	}


	public function decreaseCartQuantity($id)
	{
		$target=$this->getItemAt($id);
		if($target->getCartQuantity()==0)
		{
			$this->removeItem($target->getCartItemId());
		}else{
			$target->decreaseQuantity();
		}
	}

	public function emptyCart()
	{
		$this->items=array();
	}

}

