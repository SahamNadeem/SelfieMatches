<?php

/**
* 
*/
include 'Connection.php';
class User 
{
	public $id;
	public $username;
	public $password;
	public $status;
	public $role;
	public $nick;
	public $image;
	public $name;
	public $created_at;

	public function __construct()
	{
		
	}

	public function checkattr($table,$attr,$id){
		$query = "Select ".$attr." from ".$table." Where id=".$id."";
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}

	public function deleteuser($id){
		$query = "delete from user Where id=".$id."";
		echo $query;
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}

	public function checkusername($user){
		$query = "Select * from user Where username='".$user."'";
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}

	public function updateattribute($attr,$value,$id){
		$query = "Update user Set ".$attr."='".$value."' Where id=".$id."";
		echo $query;
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}
	public function updatedetailsattribute($attr,$value,$id){
		$query = "Update details Set ".$attr."='".$value."' Where user_id=".$id."";
		echo $query;
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}

	public function checkUser($table,$username,$password)
	{
		$query = "Select * from ".$table." Where username='".$username.
		"' And password= '".$password."'";
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}

	public function updateuser($id,$status,$value,$table){
		$query = "Update ".$table." Set ".$status."=".$value." Where id=".$id."";
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}

	public static function getuserbyemail($email){
		$query ="SELECT * FROM user u
				WHERE u.username='".$email."'";
		//echo $query;
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}

	public function getsingleuser($table,$id){
		$query ="SELECT * FROM ".$table." u
				JOIN details d ON u.id=d.user_id
				LEFT JOIN personal_details p ON p.use_id=d.user_id
				WHERE u.id=".$id."";
				//echo $query;
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}

	public function getUsers($table,$agef,$aget,$gander,$country,$city,$status){
		$query ="SELECT d.nick,u.id,d.image,d.name,u.status,u.created_at FROM ".$table." u JOIN details d ON u.id=d.user_id where ";
		$x=0;
		if($agef!=0 || $aget!=0){
			if($agef!=0){
				$x = $x+1;
			}
			if($aget!=0){
				$x = $x+3;
			}
			if ($x==4) {
				$query = $query."age between ".$agef." and ".$aget;
			}elseif($x==1){
				$query = $query."age >= ".$agef;
			}elseif($x==3){
				$query = $query."age <=".$aget;
			}
		}
		if($gander!="x" && $x>0){
			$query = $query." and gander = '".$gander."'";
			$x++;
		}elseif($gander!="x" && $x==0){
			$query = $query." gander = '".$gander."'";
			$x++;
		}
		if($country!=0 && $x>0){
			$query = $query." and country = ".$country;
			$x++;
		}elseif($country!=0 && $x==0){
			$query = $query." country = ".$country;
			$x++;
		}
		if($city!=0 && $x>0){
			$query = $query." and city = ".$city;
			$x++;
		}elseif($city!=0 && $x==0){
			$query = $query." city = ".$city;
			$x++;
		}
		if($status!=0 && $x>0){
		$query = $query." and status = ".$status;
			$x++;
		}elseif($status!=0 && $x==0){
			$query = $query." status = ".$status;
			$x++;
		}
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}

	public function fullUsers($table){
		$query ="SELECT d.nick,u.id,d.image,d.name,u.status,u.created_at,u.username,u.password,u.status,u.role FROM user u RIGHT JOIN details d ON u.id=d.user_id";
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}

	public function insertuserstring($att,$value){
		$query = "insert into user (".$att.") values ('".$value."')";
		echo $query;
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}
	public function insertuserint($att,$value){
		$query = "insert into user (".$att.") values (".$value.")";
		echo $query;
		echo $query;
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}
	public function insertpersdet($att,$value){
		$query = "insert into personal_details (".$att.") values ('".$value."')";
		echo $query;
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}
	public function insertpersdetint($att,$value){
		$query = "insert into personal_details (".$att.") values (".$value.")";
		echo $query;
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}
	public function insertdet($att,$value){
		$query = "insert into details (".$att.") values ('".$value."')";
		echo $query;
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}
	public function insertdetint($att,$value){
		$query = "insert into details (".$att.") values (".$value.")";
		echo $query;
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}
	public function emailcheck($email){
		$query = "select * from user where username = '".$email."'";
		echo $query;
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}

	public function insertdatatable($id,$name,$nick,$age,$dob,$country,$city,$gander,$work,$description,$about,$hobbies){
		$query = "insert into details(user_id,name,nick,age,dob,country,city,gander,work,description,about,hobbies) value (".$id.",'".$name."','".$nick."',".$age.",'".$dob."',".$country.",".$city.",'".$gander."','".$work."','".$description."','".$about."','".$hobbies."')";
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}

	public function insertdatatoPI($qualification,$m_status,$nationality,$height,$ethnicity,$bodytype,$trade,$haircolor,$eyecolor,$religion,$smoking,$start_sigh,$drinking){
		$query = "update personal_details set height='".$height."', `bodytype`='".$bodytype."', `haircolor`='".$haircolor."', `eyecolor`='".$eyecolor."', `qualification`= '".$qualification."', `m_status`= '".$m_status."', `nationality`= '".$nationality."', `ethnicity`= '".$ethnicity."', `religion`= '".$religion."', `smoking`= '".$smoking."', `drinking`= '".$drinking."', `star_sigh`= '".$start_sigh."', `tradecity`= '".$trade."' where use_id=".$_SESSION['id']."";
		echo $query;
		$connection = new Connection();
		$result = $connection->execute($query);
		return $result;
	}

	public function insertdatatoUI(){

	}
}