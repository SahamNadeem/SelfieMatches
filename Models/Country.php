<?php

/**
* 
*/

class Country 
{
	public $id;
	public $country;

	public function __construct()
	{
		
	}

	public function ctrydata($table)
	{
		echo "string";
		$query = "Select * from ".$table."";
		echo $query;
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}
}