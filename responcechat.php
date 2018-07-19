<?php  
session_start();
include 'Controllers/ChatController.php';
include 'Controllers/UserController.php';
include 'Models/User.php';

 $r = new ChatController();
          $arrays = array();
          $arrays = $r->mychatcollector($_SESSION["id"]);
          if ($arrays==null) {
             echo '<h1 style="margin-top:100px;"><center>No chat Found Be first To message Him </center></h1>';
            }else{
              foreach ($arrays as $array) {
            $user = new UserController();
            $result = $user->singleuser($array);
              echo '<li class="contact">
              <a class="a" href="./msg.php?chat='.$array.'" onclick="javascript:loadchat('.$array.');">
                    <div class="wrap">
                      <span class="contact-status online"></span>
                      <img src="'.$result["image"].'" style="width:50px; height:50px;" alt="" />
                      <div class="meta">
                        <p class="name">'.$result["Name"].'</p>
                        <p class="preview">You just got LITT up, Mike.</p>
                      </div>
                    </div>
                   </a>
                  </li>';
          }
            }
          

