<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("location: ./login.php");
}
require 'Controllers/BlockController.php';
require 'Controllers/UserController.php';
include 'Models/User.php';

include("./layout/nav.php");
?>
<script type="text/javascript">
  function unblockpg(id){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      alert("user Unblocked");
    }
  };
  xhttp.open("GET", "block.php?did="+id+"", true);
  xhttp.send();
  document.location.reload(true)
}
</script>
<style type="text/css">
    img#img{
  margin:0;
  width:100px;
  height:100px;
}

div.card{
  margin:20px;
}

#like{
  color:rgb(179,5,5);
  margin-left:150px;
  margin-top:35px;
  color: white;
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
                        $like = new BlockController();
                        $result = $like->myblocks();
                        if ($result == null) {
                          echo "<h3>You haven't blocked anyone yet...!!</h3>";
                        }else{
                          while ($row=mysqli_fetch_array($result)) {
                            $userc = new UserController();
                            $usercc = $userc->singleuser($row["his_id"]);
                            echo '<div class="row">
                                  <div class="col-md-4"><img id="img" src="'.$usercc["image"].'" /></div>
                                  <div class="col-md-5" id="mycol">
                                      <h3>'.$usercc["Name"].'</h3>
                                  </div>
                                  <div class="col-md-3"><button id="like" class="btn btn-danger" onclick="javascript:unblockpg('.$row["his_id"].');">Unblock</button></div>
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