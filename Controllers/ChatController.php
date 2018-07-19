<?php
/**
* 
*/
include 'Models/Chat.php';

class ChatController
{	
	private $key = "asjkldji@HH@J#*&TY#Jwedkj?78w78cakhjn";

	function __construct()
	{
		
	}
	
	public function encrypter($plaintext)
	{
	    $plaintext = strtolower($plaintext);
	    $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256,md5($this->key),$plaintext,MCRYPT_MODE_ECB);    
	    return trim(base64_encode($crypttext));
	}

	public function decrypter($crypttext)
	{
	    $crypttext = base64_decode($crypttext);    
	    $plaintext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256,md5($this->key),$crypttext,MCRYPT_MODE_ECB);    
	    return trim($plaintext);
	}

	public function mychatcollector($id)
	{
		$chat =  new Chat();
		$result = $chat->collectall($id);
		$contact = array();
		$x=0;
		if(mysqli_num_rows($result)>0){
			while ($row = mysqli_fetch_array($result)) 
			{
				$sender = $row["sender_id"];
				$receiver = $row["receiver_id"];
				if($sender == $id){
					$contact[$x]=$receiver;
				}elseif($receiver == $id){
					$contact[$x]=$sender;
				}
				$x++;
			}
			$end = sizeof($contact);
			for ($i = 0; $i <$end ; $i++) {
		        for ($j = $i + 1; $j < $end; $j++) {
		            if ($contact[$i] == $contact[$j]) {                  
		                $shiftLeft = $j;
		                for ($k = $j+1; $k < $end; $k++, $shiftLeft++) {
		                    $contact[$shiftLeft] = $contact[$k];
		                }
		                $end--;
		                $j--;
		            }
		        }
		    }
		    $whitelist = array();
		    for($i = 0; $i < $end; $i++){
		        $whitelist[$i] = $contact[$i];
		    }
		    if (!$whitelist) {
		    	return null;
		    }
		    return $whitelist;
		}
	}

	public function conchat($id,$uid){
		$mychat =  new Chat();
		$result = $mychat->getchats($id,$uid);
		if (mysqli_num_rows($result)>0) {
			return $result;
		}else{
			return null;
		}

	}

	public function send($data,$user){
		$mychat =  new Chat();
		$data = $this->encrypter($data);
		$result = $mychat->send($data,$user);
	}	
}
?>








