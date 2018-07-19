<?php

/**
* 
*/
include 'Models/Country.php';

class MessageController
{	
	private $table;
	public function __construct()
	{
		$this->table="messages";
	}

	public function sendtofgps($email)
	{
		echo "string";
		$ctrObj =  new Messages();
		$result = $ctrObj->forgetpass($email);
		if($result){
			return true;
		}else{
			return false;
		}
	}
}