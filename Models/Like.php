<?php
/**
* 
*/

class Like
{

	function __construct()
	{
		
	}

	public function likeme($id,$uid){
		$query = "insert into likes (my_id,his_id,likebool) values (".$id.",".$uid.",1)";
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}

	public function checklike(){
		$query = "select * from likes where my_id = ".$_SESSION["id"]."";
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}
	public function dislikeme($id,$uid){
		$query = "delete from likes where my_id=".$id." and his_id=".$uid."";
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}
	public function mylikes($id){
		$query = "select * from likes where his_id=".$id."";
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}
}
?>