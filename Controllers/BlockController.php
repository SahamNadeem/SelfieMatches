<?php
/**
* 
*/
include 'Models/Block.php';

class BlockController
{	

	function __construct()
	{
		
	}	

	public function check($id){
		$block = new Block();
		$r = $block->checkblock($id);
		if (mysqli_num_rows($r)>0) {
			while ($row = mysqli_fetch_array($r)) {
				return true;
			}
		}
		return false;
	}

	public function block($id,$uid){
		$block = new Block();
		$r = $block->blockuser($id,$uid);
	}
	public function unblock($id,$uid){
		$block = new Block();
		$r = $block->unblockuser($id,$uid);
	}
	public function myblocks(){
		$blocker = Block::getblock();
		if (mysqli_num_rows($blocker)>0) {
			return $blocker;
		}else{
			return null;
		}
	}
}
?>








