<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("location: ./login.php");
}
require 'Controllers/LikeController.php';
require 'Controllers/UserController.php';
include 'Models/User.php';

include("./layout/nav.php");
?>
<style type="text/css">
    img#img{
  margin:0;
  width:100px;
  height:100px;
}

div.card{
  margin:20px;
}

i#like.fa.fa-heart{
  color:rgb(179,5,5);
  margin-left:220px;
  font-size:30px;
  margin-top:35px;
}

div#left{
  margin-left:-10px;
}

div#myrow.row{
  margin:0;
}

div#mycol.col-md-5{
  margin-left:-100px;
}
div.mycard{

}

</style>
 <div class="row">
    <div class="col-md-8" id="yourcol">
        <div class="row" id="myrow">
            <div class="col-md-12">
                <div class="mycard">
                    <?php
                        $like = new LikeController();
                        $result = $like->getlikes($_SESSION["id"]);
                        if ($result == null) {
                          echo '<h3>No one Liked yout yet</h3>';
                        }else{
                          while ($row=mysqli_fetch_array($result)) {
                            $userc = new UserController();
                            $usercc = $userc->singleuser($row["my_id"]);
                            $rp =$like->timeAgo($row["time"]);
                            echo '<div class="row">
                                  <div class="col-md-4"><img id="img" src="'.$usercc["image"].'" /></div>
                                  <div class="col-md-5" id="mycol">
                                      <h3>'.$usercc["Name"].'</h3>
                                      <p>Liked You   '.$rp.'</p>
                                  </div>
                                  <div class="col-md-3"><i class="fa fa-heart" id="like"></i></div>
                              </div>
                              <hr/>';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("./layout/footer.php");
?>
