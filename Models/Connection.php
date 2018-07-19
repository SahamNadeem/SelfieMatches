<?php

/**
* 
*/

class Connection
{
	private $database;
	private $username;
	private $password;
	private $server;

	public function connect()
	{
		$this->database='selfidate';
		$this->username='root';
		$this->password='';
		$this->server='localhost';
		$conn = mysqli_connect($this->server, $this->username, $this->password,$this->database);
		if(!$conn)
		{
			die("cnnnnnn".mysqli_connect_error());
			return false;
		}else{
			return $conn;
		}
	}

	public function execute($query)
	{
		$conn = $this->connect();
		if ($conn) {
			return mysqli_query($conn,$query);
		}
	}
}
