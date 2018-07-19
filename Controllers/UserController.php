<?php

/**
* 
*/

class UserController
{	
	private $table;
	public function __construct()
	{
		$this->table="user";
	}

	public function login($username,$password)
	{
		$user =  new User();
		$result = $user->checkUser($this->table,$username,$password);
		if(mysqli_num_rows($result)>0){
			while ($row = mysqli_fetch_array($result)) {
				$user->id=$row["id"];
				$user->username=$row["username"];
				$user->password=$row["password"];
				$user->status=$row["status"];
				$user->role=$row["role"];
			}
			return $user;
		}
	}
	public function checkuseremail($username)
	{
		$user =  new User();
		$result = $user->checkusername($username);
		if(mysqli_num_rows($result)>0){
			while ($row = mysqli_fetch_array($result)) {
				$user->id=$row["id"];
				$user->username=$row["username"];
				$user->password=$row["password"];
				$user->status=$row["status"];
				$user->role=$row["role"];

			}
			return $user;
		}
	}

	public function updateusertable($attr,$val,$id){
		$user = new User();
		$g = $user->updateattribute($attr,$val,$id);
	}
	public function uploadimgname($attr,$value,$id){
		$user = new User();
		$o = $user->updatedetailsattribute($attr,$value,$id);
	}

	public function age()
	{
		echo "string";
		for ($i=18; $i <=100 ; $i++) { 
			echo "<option value='".$i."'>".$i."</option>";
		}
	}

	public function updatestatus($id,$status,$value){
		$user =  new User();
		$result = $user->updateuser($id,$status,$value,$this->table);
	}

	public function searchuser($agef,$aget,$gander,$country,$city,$status){
		$user =  new User();
		$result = $user->getUsers($this->table,$agef,$aget,$gander,$country,$city,$status);
		if($result == null){
			return ;
		}elseif(mysqli_num_rows($result)>0){
			return $result;
		}else{
			return ;
		}
	}

	public function checkdata($attr,$id){
		$user = new User();
		$result = $user->checkattr($this->table,$attr,$id);
		if(mysqli_num_rows($result)>0){
			while ($row = mysqli_fetch_array($result)) {
				if($row["status"] == 1){
					return true;
				}else{
					return false;
				}
			}
		}
	}

	public function getallusers(){
		$user = new User();
		$result = $user->fullUsers($this->table);
		if(mysqli_num_rows($result)>0){
			return $result;
		}
	}

	public function newdate($date){
		$date2 = date('y-m-d');

		$diff = abs(strtotime($date2) - strtotime($date));

		$years = floor($diff / (365*60*60*24));
		$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		if ($days>0 && $days<20 && $months==0 && $years==0) {
			return true;
		}else{
			return false;
		}
	}

	public function searchresult($agef,$aget,$gander,$country,$city,$status){
		
		if($agef==0){
    	$agef="x";
	    }
	    if($aget==0){
	    	$aget="x";
	    }
	    if($gander==""){
	    	$gander="x";
	    }
	    if($country==0){
	    	$country="x";
	    }
	    if($city==0){
	    	$city="x";
	    }
	    if($status==0){
	    	$status="x";
	    }
	    echo $agef,$aget,$gander,$country,$city,$status;
	   	header("location: ./result.php?watch=".$agef."/".$aget."/".$gander."/".$country."/".$city."/".$status."");
	}

	public function singleuser($id){
		$user = new User();
		$result = $user->getsingleuser($this->table,$id);
		if(mysqli_num_rows($result)>0){
			while ($row = mysqli_fetch_array($result)) {
				return $row;
			}
		}
	}

	public function saveuser($att,$value){
		$user = new User();
		$result = $user->insertuserstring($att,$value);
		if (!$result) {
			return null;
		}else{
			return true;
		}
	}
	public function saveuserint($att,$value){
		$user = new User();
		$result = $user->insertuserint($att,$value);
		if (!$result) {
			return null;
		}else{
			return true;
		}
	}
	public function saveuserdet($att,$value){
		$user = new User();
		$result = $user->insertdet($att,$value);
		if (!$result) {
			return null;
		}else{
			return true;
		}
	}
	public function saveuserdetint($att,$value){
		$user = new User();
		$result = $user->insertdetint($att,$value);
		if (!$result) {
			return null;
		}else{
			return true;
		}
	}
	public function saveuserpersdet($att,$value){
		$user = new User();
		$result = $user->insertpersdet($att,$value);
		if (!$result) {
			return null;
		}else{
			return true;
		}
	}
	public function saveuserpersdetint($att,$value){
		$user = new User();
		$result = $user->insertpersdetint($att,$value);
		if (!$result) {
			return null;
		}else{
			return true;
		}
	}
	public function checkemail($email){
		$user = new User();
		$result = $user->emailcheck($email);
		if (mysqli_num_rows($result)>0) {
			return true;
		}else{
			return false;
		}
	}

	public function value($id,$name,$nick,$age,$dob,$country,$city,$gander,$work,$description,$about,$hobbies){
		$user = new User();
		$t = $user->insertdatatable($id,$name,$nick,$age,$dob,$country,$city,$gander,$work,$description,$about,$hobbies);
	}
	public function valll($qualification,$m_status,$nationality,$height,$ethnicity,$bodytype,$trade,$haircolor,$eyecolor,$religion,$smoking,$start_sigh,$driniking){
		$user = new User();
		$t = $user->insertdatatoPI($qualification,$m_status,$nationality,$height,$ethnicity,$bodytype,$trade,$haircolor,$eyecolor,$religion,$smoking,$start_sigh,$driniking);
	}
	public function vallll($work,$description,$about,$hobbies){
		$user = new User();
		$t = $user->insertdatatoUI($id,$name,$nick,$age,$dob,$country,$city,$gander,$work,$description,$about,$hobbies);
	}

	public function deleteusersh($id){
		$user =  new User();
		$t  = $user->deleteuser($id);
	}

	public function getemailuser($email)
	{
		$user =  new User();
		$result = $user->getuserbyemail($email);
		if(mysqli_num_rows($result)>0){
			while ($row = mysqli_fetch_array($result)) {
				return $row;
			}
		}
	}
}