<?php

require  __DIR__.'/vendor/autoload.php';
use app\InputFilters;
use app\classes\DB;

$data=new InputFilters();
$input = $data->getBody();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();


	$conn = new DB($_ENV['DB_HOST'],$_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD'],$_ENV['DB_DATABASE']);

$item = $input['item'];
$query = "select *from inventory where name like '".$item."%'";
$result = mysqli_query($conn->connect(),$query);
$items='';

while($rows = mysqli_fetch_assoc($result)){
	
	$items.="<div style='background-color: red; color:white; border-bottom: 1px solid white; padding: 5px; cursor:pointer;' onclick='addtocart(".$rows['id'].")' >".$rows['name']."</div>";	
}

echo $items;



?>
