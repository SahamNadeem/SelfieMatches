<?php
/**
* 
*/
include 'Models/Like.php';

class LikeController
{	

	function __construct()
	{
		
	}	

	public function likeuser($id,$uid){
		$like =  new Like();
		$k = $like->likeme($id,$uid);
		return $k;
	}

	public function check($id){
		$like =  new Like();
		$k = $like->checklike();
		if (mysqli_num_rows($k)>0) {
			while ($row = mysqli_fetch_array($k)) {
				if ($row["his_id"] == $id) {
					return true;
				}
			}
		}
		return false;
	}

	public function dislikeuser($id,$uid){
		$like =  new Like();
		$k = $like->dislikeme($id,$uid);
		return $k;
	}

	public function getlikes($id){
		$likej = new Like();
		$resultj = $likej->mylikes($id);
		if (mysqli_num_rows($resultj)>0) {
			return $resultj;
		}else{
            return null;
        }
	}

	public function when($inputSeconds) {
    $secondsInAMinute = 60;
    $secondsInAnHour  = 60 * $secondsInAMinute;
    $secondsInADay    = 24 * $secondsInAnHour;
    $secondsInAMonth = 30 * $secondsInADay;
    $secondsInAYear = 12 * $secondsInAMonth;

    $years = floor($inputSeconds / $secondsInAYear);

    $monthSeconds = $inputSeconds % $secondsInAYear;
    $months = floor($monthSeconds / $secondsInAMonth);

    $daySeconds = $monthSeconds % $secondsInAMonth;
    $days = floor($daySeconds / $secondsInADay);

    $hourSeconds = $daySeconds % $secondsInADay;
    $hours = floor($hourSeconds / $secondsInAnHour);

    $minuteSeconds = $hourSeconds % $secondsInAnHour;
    $minutes = floor($minuteSeconds / $secondsInAMinute);

    $remainingSeconds = $minuteSeconds % $secondsInAMinute;
    $seconds = ceil($remainingSeconds);

    $obj = array(
        'years' => (int) $years,
        'months' => (int) $months,
        'days' => (int) $days,
        'hours' => (int) $hours,
        'minutes' => (int) $minutes,
        'seconds' => (int) $seconds
    );
    print_r($obj);
}

		public function time_elapsed_string($datetime, $full = false) {
		    $now = new DateTime('now');
		    $ago = new DateTime($datetime);
		    $diff = $now->diff($ago);

		    $diff->w = floor($diff->d / 7);
		    $diff->d -= $diff->w * 7;

		    $string = array(
		        'y' => 'year',
		        'm' => 'month',
		        'w' => 'week',
		        'd' => 'day',
		        'h' => 'hour',
		        'i' => 'minute',
		        's' => 'second',
		    );
		    foreach ($string as $k => &$v) {
		        if ($diff->$k) {
		            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
		        } else {
		            unset($string[$k]);
		        }
		    }

		    if (!$full) $string = array_slice($string, 0, 1);
		    echo $string ? implode(', ', $string) . ' ago' : 'just now';
		}

		function timeAgo($time_ago)
{
    $time_ago = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60){
        return "just now";
    }
    //Minutes
    else if($minutes <=60){
        if($minutes==1){
            return "one minute ago";
        }
        else{
            return "$minutes minutes ago";
        }
    }
    //Hours
    else if($hours <=24){
        if($hours==1){
            return "an hour ago";
        }else{
            return "$hours hrs ago";
        }
    }
    //Days
    else if($days <= 7){
        if($days==1){
            return "yesterday";
        }else{
            return "$days days ago";
        }
    }
    //Weeks
    else if($weeks <= 4.3){
        if($weeks==1){
            return "a week ago";
        }else{
            return "$weeks weeks ago";
        }
    }
    //Months
    else if($months <=12){
        if($months==1){
            return "a month ago";
        }else{
            return "$months months ago";
        }
    }
    //Years
    else{
        if($years==1){
            return "one year ago";
        }else{
            return "$years years ago";
        }
    }
}
}
?>









