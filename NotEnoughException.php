<?php
namespace app;
class NotEnoughException extends \Exception{
	
	function __construct()
	{
		$this->code = 404;
		$this->message = 'You do not have sufficent quantities';	
	}
}