<?php

 require  __DIR__.'/vendor/autoload.php';
 $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
 $dotenv->safeLoad();

 session_start();
 use app\Cart;
 use app\CartItem;
 use app\SessionCheck;
 use app\BasketClass;
 use app\DB;


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TinyCart</title>
	<link rel="stylesheet" type="text/css" href="bootstrap511/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap511/js/bootstrap.js"></script>
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="scripts.js"></script>

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Tiny Cart</h1>

		<div>
			<input type="text" name="products" id="products" class="form-control" onkeyup="getItems()" autofocus>
		</div>

		<div id="list"></div>

		<div id="cart" style="margin-top: 20px;">
			<?php SessionCheck::getActiveSession(); ?>
		</div>
	
<div id="connection">
	<?php
	// connecting use env information rather than config
	// $connection = new DB($_ENV['DB_HOST'],$_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD'],$_ENV['DB_DATABASE']);
	?>
</div>

	</div>

</body>
</html>