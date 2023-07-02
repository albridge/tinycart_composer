<?php
namespace app\classes;

class DB{
	protected $host;
	protected $user;
	protected $pass;
	protected $db;
	public $conn5;

	function __construct($host,$user,$pass,$db)
	{
		$this->host=$host;
		$this->user=$user;
		$this->pass=$pass;
		$this->db=$db;
	}


	public function connect()
	{
		$conn5 = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
		if($conn5)
		{
			return $conn5;
		}
		die('Could not connect to database');
	}
	
}