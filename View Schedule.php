<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Schedules</title>
    <!-- jquery and ajax import -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap import -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Css Style for view schedule -->
    <link rel="stylesheet" href="style.css">
</head>
<br><br>

<div class="caseheading h5">Active Cases</div><br>
<div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Sl. No.</th>
          <th scope="col">Name </th>
          <th scope="col">Phone Number</th>
          <th scope="col">Start Time</th>
          <th scope="col">End Time</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
         session_start();
         //DB conncetion
         include_once('config.php');
        
        //  get all the schedules
        $query = "SELECT * FROM schedule";
        $result = mysqli_query($con, $query);
        $cnt=1;
        while($row = $result->fetch_assoc())
        {
        $start_time = date("h:i a", intval($row["unixtimestamp_s"]));
        $end_time = date("h:i a", intval($row["unixtimestamp_e"]+1));
        echo "<tr>
             <th scope='row' id='keyid'>".$cnt."</th>
             <td>".$row["name"]."</td>
             <td>".$row["phone"]."</td>
             <td>".$start_time."</td>
             <td>".$end_time."</td>
             <td><a href='remove_schedule.php?id=".$row['id']."' class='btn btn-secondary'>Remove Schedule</button></td>
             </tr>";
             $cnt++;
        }
        ?>
      </tbody>
    </table>
</div>

    <script>
        // Event Listener for action button
        document.getElementById("clkbtn").addEventListener("click", action);

        // send message function
        function action() {
            


        }
    </script>
        

</body>
</html>