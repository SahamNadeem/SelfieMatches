<?php

/**
* 
*/
include 'Models/Country.php';
include 'Models/City.php';

class CountryController
{	
	private $table;
	public function __construct()
	{
		$this->table="country";
	}

	public function getdata()
	{
		echo "string";
		$ctrObj =  new Country();
		$result = $ctrObj->ctrydata($this->table);
		if(mysqli_num_rows($result)>0){
			return $result;
		}
	}

	public function getcitydata()
	{
		$ctrObj =  new City();
		$result = $ctrObj->ctrydata("meta_location");
		if(mysqli_num_rows($result)>0){
			return $result;
		}
	}
}

/*$ctrObj->id=$row["id"];
$ctrObj->country=$row["country"];*/