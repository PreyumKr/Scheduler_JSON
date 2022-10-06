<?php
        session_start();
        //DB conncetion
        include_once('config.php');
        
        // Get to get data from the url
        $id = $_GET['id'];
        $query = "DELETE from schedule WHERE id=$id";
        $result = mysqli_query($con, $query);
        if($result)
        {
            // To delete the line and get back to the calling page
            echo "<script>alert('Schedule Deleted!');</script>";
            echo "<script>window.location.href='View Schedule.php'</script>";
        }
        else
        {
            // To delete the line and get back to the calling page
            echo "<script>alert('There was a Problem!');</script>";
            echo "<script>window.location.href='View Schedule.php'</script>";
        }
?>