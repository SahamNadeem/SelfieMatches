<?php
    $agef=$_POST["agef"];
    $aget=$_POST["aget"];
    $gander=$_POST["gander"];
    $country=$_POST["country"];
    $city=$_POST["city"];
    $status=$_POST["state"];
    $seruser =  new UserController();
    if ($aget==null && $gander==null && $country==null && $city==null && $status==null) 
    {
    	echo '<div class="col-md-6 col-lg-offset-3" style="margin-top: 30px; border-radius: 10px;">
    <div class="card">
        <div class="card-content" style="color: #df080f;">
            <h1><center>No Data Found.....</center></h1>
        </div>
        </div>
    </div>';
    }else{

    	$rows  = $seruser->searchuser($agef,$aget,$gander,$country,$city,$status);
    	if ($rows!=false) {
    		while ($row = mysqli_fetch_array($rows)) {
			if ($row["id"]!=null) {
			$x=0;
			echo '<a href="./profiles.php?profile='.$row["id"].'"><div id="id" style="background-image : url('.$row["image"].')">';
			$check = new UserController();
			$fn =  $check->new($row["created_at"]);
			if ($fn == true) {
				echo '<span class="label label-default" id="pera">New </span>';
				$x=$x+1;
			}
			if ($row["status"]==1) {
				echo '<span class="label label-default" id="pera">Online </span>';
				$x=$x+1;
			}
			if ($x<1) {
				echo '<span class="label label-default" id="pera">Online 5 mins ago </span>';
			}
			echo '<label id="lable">'.$row["nick"].'</label>
			</div></a>';
		}
			}
    	}else{
    		echo '<div class="col-md-6 col-lg-offset-3" style="margin-top: 30px; border-radius: 10px;">
		    <div class="card">
		        <div class="card-content" style="color: #df080f;">
		            <h1><center>No Data Found.....</center></h1>
		        </div>
		        </div>
		    </div>';
    	}
    }

?>