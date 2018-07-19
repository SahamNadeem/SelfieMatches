<?php
/**
* 
*/

class Chat
{
	private $sender;
	private $receiver;
	private $image;

	function __construct()
	{
		
	}

	public function collectall($id)
	{
		$query="Select * from chats where sender_id=".$id." or receiver_id=".$id."";
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}

	public function getchats($id,$uid)
	{
		$query="Select * from chats where sender_id=".$id." and receiver_id=".$uid." or  sender_id=".$uid." and receiver_id=".$id."";
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}

	public function send($data,$user){
		$query = "insert into chats (sender_id,receiver_id,message_body) values ('".$_SESSION["id"]."','".$user."','".$data."')";
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}
}
?>