<?php

/**
* 
*/

class City 
{
	public $id;
	public $country;

	public function __construct()
	{
		
	}

	public function ctrydata($table)
	{
		$query = "Select * from ".$table."";
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}
}