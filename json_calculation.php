<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON Decoder</title>
</head>
<body>

<!-- PHP Code Solution Here -->

<?php
    // Json object hardcoded
    $json_obj = '[
        {"name": "Jenny", "phone": "416 555-8181", "startTime": 1664481600, "endTime": 1664483399},
        {"name": "Robert", "phone": "416 472-2542", "startTime": 1664487000, "endTime": 1664488799},
        {"name": "Steve", "phone": "416 715-1933", "startTime": 1664469000, "endTime": 1664470799},
        {"name": "Boris", "phone": "416 565-6267", "startTime": 1664469000, "endTime": 1664470799},
        {"name": "Cory", "phone": "416 555-1044", "startTime": 1664476200, "endTime": 1664477999},
        {"name": "Jeff", "phone": "416 555-9211", "startTime": 1664487000, "endTime": 1664488799},
        {"name": "Penny", "phone": "416 555-6807", "startTime": 1664470800, "endTime": 1664472599},
        {"name": "Nathan", "phone": "416 555-3215", "startTime": 1664490600, "endTime": 1664492399},
        {"name": "Daniel", "phone": "416 555-8311", "startTime": 1664481600, "endTime": 1664483399},
        {"name": "Karen", "phone": "416 555-3215", "startTime": 1664451000, "endTime": 1664452799}
    ]';

    // Json object decodeing step
    $arr = json_decode($json_obj,true); // converting object into array
    $ac_record = [];
    $rj_record = [];
    $schedule = [];
    $final_list = [];
    $response = '';

    // Looping through each object row
    foreach($arr as $key => $value)
    {
        // Looping through each row element
        foreach( $value as $key1 => $val)
        {
            // Check for startTime value in each row
            if($key1 == "startTime")
            {
                if(!array_search($val,$schedule))
                { 
                    $response = 'accepted';
                    array_push($schedule,$val);
                }
                else
                {
                    $response = 'rejected';
                }
            }
        }

        // Putting schedule details in appropriate array according to response from check
        if($response == 'accepted')
            array_push($ac_record,$value,$response);
        else
            array_push($rj_record,$value,$response);
    }

    // print_r($ac_record); echo "<br>";

    // print_r($rj_record); echo "<br>";

    // Merging both records to produce output as per question bonus
    $final_list = array_merge($ac_record,$rj_record);

    // print_r($final_list); 

    $count = 1;
    echo "<br>";
    foreach($final_list as $key => $value)
    {
        // The responses are appended next to each entry so the second
        // entry just contains the response to the previous schedule
        if($count%2 == 0)
        {
            echo $value."<br><br>";
        }
        else
        {
            foreach( $value as $key1 => $val)
            {
                if($key1 == "startTime")
                {
                   echo date("h:i a", intval($val))." - ";
                }
                else if($key1 == "endTime")
                {
                    echo date("h:i a", intval($val)+1).", ";
                }
                else
                    echo $val.", ";
            }
            // echo "<br>";
        }
        $count++;
    }
?>


</body>
</html>
