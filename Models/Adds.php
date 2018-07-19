<?php
/**
* 
*/
class Adds
{
	function __construct()
	{
		
	}

	public static function getadd($id){
		$query = "select * from adds where pg_id =".$id." ";
		//echo $query;
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}
}
?>