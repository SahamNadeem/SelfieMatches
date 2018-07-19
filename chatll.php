<?php
session_start();
include 'Controllers/ChatController.php';
include 'Controllers/UserController.php';
include 'Models/User.php';
if (isset($_GET["chat"])) {
	$chatk = $_GET["chat"];
            $chatsss = new ChatController();
            $array = $chatsss->conchat($_GET["chat"],$_SESSION["id"]);
            if ($array==null) {
              echo '<h1 style="margin-top:100px;"><center>No chat Found Be first To message Him </center></h1>';
            }else{
                while ($row = mysqli_fetch_array($array)) {
                $sender = $row["sender_id"];
                $receiver = $row["receiver_id"];
                $msg = $chatsss->decrypter($row["message_body"]);
                $img = $row["file"];
                $time = $row["time"];
                $user = new UserController();
                    $senderdata = $user->singleuser($sender);
                    $receiverdata = $user->singleuser($receiver);
                if ($sender == $_SESSION["id"]) {
                  echo '<li class="replies">
                      <img src="'.$senderdata["image"].'" style="width: 35px; height: 35px; " alt=""/>
                     <p>'.$msg.'</p>
                    </li>';
                  
                }elseif($sender = $_GET["chat"]){
                  echo '<li class="sent">
                      <img src="'.$senderdata["image"].'" style="width: 35px; height: 35px; " alt="" />
                      <p>'.$msg.'</p>
                    </li>';
                }
              }
            }
}
?>