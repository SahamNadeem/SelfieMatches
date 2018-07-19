<?php
/**
* 
*/
class Block
{

	function __construct()
	{
		
	}
	public function checkblock($id){
		$query = "select * from block where my_id = ".$_SESSION["id"]." and his_id=".$id." or my_id = ".$id." and his_id=".$_SESSION["id"]."";
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}
	public static function getblock(){
		$query = "select * from block where my_id = ".$_SESSION["id"]."";
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}
	public function blockuser($id,$uid){
		$query = "insert into block (my_id,his_id,block) values (".$id.",".$uid.",1)";
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}
	public function unblockuser($id,$uid){
		$query = "delete from block where my_id=".$id." and his_id=".$uid."";
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}

}
?>