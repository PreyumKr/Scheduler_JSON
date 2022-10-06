<?php
        session_start();
        //DB conncetion
        include_once('config.php');

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $us_timestamp = $_POST['us_timestamp'];
        $ue_timestamp = $_POST['ue_timestamp'];

        // check for overlap in schedules
        $query_for_overlap = mysqli_query($con,"select id from schedule where unixtimestamp_s='$us_timestamp'");
		$count = mysqli_num_rows($query_for_overlap); 

        // If no row with similar data found in database then schedule current time
        if($count == 0)
        {
            $query = "insert into schedule(name,phone,unixtimestamp_s,unixtimestamp_e) values('$name','$phone','$us_timestamp','$ue_timestamp')";
            $result = mysqli_query($con, $query);
            if($result)
            {
                $response = "accepted";
            }
        }
        // If any number of row were found in the database then reject current schedule
        else
        {
            $response = "rejected";
        }

         // Conversion of unixtimestamp into local time
         $start_time = date("g:ia", intval($us_timestamp));
         $end_time = date("g:ia", intval($ue_timestamp+1));
 
         echo "<b>".$name.", ".$phone.", ".$start_time." - ".$end_time.", ".$response."</b>";

        // Some other approach code that took good amount of my time
        // Addition of duration with 24 hr time format 
        // $time_start = $timestamp.":00";
        // if ($duration == "30")
        //     $time_end = "00:".$duration.":00";
        // else if($duration == "60")
        //     $time_end = "01:00:00";
        // $secs = strtotime($time_end)-strtotime("00:00:00");
        // $time_end = date("H:i:s",strtotime($time_start)+$secs);

        // Conversion of 24hr into 12hr time format
        // $start_time = date("g:ia", strtotime($time_start));
        // $end_time = date("g:ia", strtotime($time_end));
?>

