<?php
/**
* 
*/

class Messages
{

	function __construct()
	{
		
	}

	public function forgetpass($email){
		$date = date('m/d/Y h:i:s', time());
		$query = "insert into resets (msg,date,status,email) values ('I forgot my password my account is <a>".$email."</a> kindly reset my password and send me a confirmation...!!',now(),'0','".$email."')";
		//echo $query;
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}
	public static function read(){
		$query = "select * from resets";
		//echo $query;
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}
	public static function unnread(){
		$query = "select * from resets where status=0";
		//echo $query;
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}
	public function update($id){
		$query = "update resets set status=1 where id=".$id."";
		//echo $query;
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}
	public static function getone($id){
		$query = "select * from resets where id=".$id."";
		//echo $query;
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}
	public static function view($id){
		$query = "update resets set status=1 where id=".$id."";
		//echo $query;
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}
}
?>