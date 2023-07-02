<?php
namespace app;
class Product{
	protected $id;
	protected $name;
	protected $price;
	protected $quantity;


	function __construct($id,$name,$price,$quantity)
	{
		$this->id = $id;
		$this->name = $name;
		$this->price = $price;
		$this->quantity = $quantity;
	}

	function getName()
	{
		return $this->name;
	}

	function getQuantity()
	{
		return $this->quantity;
	}

	function getId()
	{
		return $this->id;
	}

	function getPrice()
	{
		return $this->price;
	}
	

	function setQuantity($quantity)
	{
		$this->quantity=$quantity;
	}
}

$product1 = new Product(1,'jam',100,10);
$product2 = new Product(2,'bread',50,12);
$product3 = new Product(3,'sweet suya',20,3);

