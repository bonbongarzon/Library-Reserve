<?php

function timeToInt($time)
{

    $getTime = intval($time);

    if ($getTime == 8) {
        return 8;
    } else

    if ($getTime == 9) {
        return 9;
    } else

    if ($getTime == 10) {
        return 10;
    } else

    if ($getTime == 11) {
        return 11;
    } else

    if ($getTime == 12) {
        return 12;
    } else

    if ($getTime == 13) {
        return 13;
    } else

    if ($getTime == 14) {
        return 14;
    } else

    if ($getTime == 15) {
        return 15;
    } else

    if ($getTime == 16) {
        return 16;
    } else

    if ($getTime == 17) {
        return 17;
    } else

    if ($getTime == 18) {
        return 18;
    } else

    if ($getTime == 19) {
        return 19;
    }
}

function setToIndex($entry)
{

    $getTime = intval($entry);
    if ($getTime == 8) {
        return 0;
    } else

    if ($getTime == 9) {
        return 1;
    } else

    if ($getTime == 10) {
        return 2;
    } else

    if ($getTime == 11) {
        return 2;
    } else

    if ($getTime == 12) {
        return 4;
    } else

    if ($getTime == 13) {
        return 5;
    } else

    if ($getTime == 14) {
        return 6;
    } else

    if ($getTime == 15) {
        return 7;
    } else

    if ($getTime == 16) {
        return 8;
    } else

    if ($getTime == 17) {
        return 9;
    } else

    if ($getTime == 18) {
        return 10;
    } else

    if ($getTime == 19) {
        return 11;
    }
}




date_default_timezone_set("Asia/Manila");






// $query = "SELECT 'start_time','end_time' FROM reservations WHERE seat_id = '$seat_name'";
// $query = "SELECT start_time, end_time FROM reservations WHERE seat_id = '$seat_name' AND start_time BETWEEN '07:59:00:000000' AND '19:00:00:000000';";

// $result = mysqli_query($conn, $query);

// $reservations = array();

// while ($row = mysqli_fetch_assoc($result)) {
//     $reservations[] = array(
//         $row["start_time"],
//         $row["end_time"],
//     );
// }

// usort($reservations, function ($a, $b) {
//     return strcmp($a["start_time"], $b["start_time"]);
// });

// echo count($reservations);

// foreach ($reservations as $time_slot) {
//     echo $time_slot . "<br>";
// }

// var_dump($reservations);
// echo "<br>Available: <br>";
// var_dump($vacant_periods);



// $today = getCurrentDate();
// $tomorrow = date("Y-m-d", strtotime("+1 day"));


// $sql = "SELECT * FROM `reservations` WHERE `date` LIKE '$tomorrow'";
// $result = mysqli_query($conn, $sql);

// while ($row = mysqli_fetch_assoc($result)) {
//     $ticket_id = $row['ticket_id'];
//     $seat_id = $row['seat_id'];
//     $timeIn = $row['start_time'];
//     $timeOut = $row['end_time'];
//     $timeIn = convertTime($timeIn);
//     $timeOut = convertTime($timeOut);
//     // echo convertTime($timeOut). "<br>";
//     // $timeIn = convertTime($timeIn);
//     // $timeOut = convertTime($timeOut);

//     // echo "Ticket No: " . $ticket_id . " From: " . $timeIn . " - " . $timeOut . "<br>";
//     echo "Seat: " . $seat_id . " |  From: " . $timeIn . " - " . $timeOut . "<br>";
// }

// traversing($conn);
// disableTimeSlot(11, 13);


function traversing($conn,$seatCode)
{
    // $today = getCurrentDate();
    $tomorrow = date("Y-m-d", strtotime("+1 day"));


    $sql = "SELECT * FROM `reservations` WHERE `date` LIKE '$tomorrow' AND `seat_id` LIKE '$seatCode'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {

        // $ticket_id = $row['ticket_id'];
        echo "Seat No: " . $seat_id = $row['seat_id'] . "<br>";

        // RETRIEVE FROM DATABASE
        $timeIn = $row['start_time'];
        $timeOut = $row['end_time'];
        // SET IT INTO INTEGER
        $timeIn = timeToInt($timeIn);
        $timeOut = timeToInt($timeOut);

        // echo "Time In :" . $timeIn;
        // echo " Time Out :" . $timeOut . "<br>";
        // SET TO INDEX
        $timeIn = setToIndex($timeIn);
        $timeOut = setToIndex($timeOut);

        // echo "Index In:" . $timeIn;
        // echo " Index Out:" . $timeOut . "<br>";

        // Pass to Function

        showFree($conn, $timeIn, $timeOut);
        // echo $timeIn = convertTime($timeIn);
        // echo  $timeOut = convertTime($timeOut);

        // echo "Seat: " . $seat_id . " |  From: " . $timeIn . " - " . $timeOut . "<br>";
    }
}




function getReserved($conn, $in, $out)
{
    // echo  $interval = $out - $in;
    // a = 8
    // b = 9
    // c = 10
    // d = 11
    // e = 12
    // f = 13 | 1pm
    // g = 14 | 2pm
    // h = 15 | 3pm
    // i = 16 | 4pm
    // j = 17 | 5pm
    // k = 18 | 6pm
    // l = 19 | 7pm
    $timetable = array(false, false, false, false, false,  false, false, false,  false,  false,  false, false);

    for ($z = $in; $z <= $out; $z++) {
        $timetable[$z] = true;
    }

    return $timetable;
}



function showFree($conn, $in, $out)
{
    $a = $in;
    $b = $out;
    echo "Available Time: <br>";
    $new_arr = getReserved($conn, $a, $b);
    // echo "ARRAY: " . implode(", ", $new_arr) . "<br>";

    foreach ($new_arr as $index => $value) {

        if ($value === false) {
            // echo $index.", ";
            $test = convertFalseTimeTable($index);
            echo $test = convertToReadable($test) . "<br>";

            // for ($i = 1; $i <= $test; $i++) {
            //     if ($i % 2 == 0) {
            //         continue;
            //     }
            //     echo $i . " ";
            // }
        }
    }
    // echo implode(", ", $countAvail);
}



function convertFalseTimeTable($checkTime)
{
    $checkTime = $checkTime;

    if ($checkTime == 0) {
        return 8;
    }
    if ($checkTime == 1) {
        return 9;
    }
    if ($checkTime == 2) {
        return 10;
    }
    if ($checkTime == 3) {
        return 11;
    }
    if ($checkTime == 4) {
        return 12;
    }
    if ($checkTime == 5) {
        return 13;
    }
    if ($checkTime == 6) {
        return 14;
    }
    if ($checkTime == 7) {
        return 15;
    }
    if ($checkTime == 8) {
        return 16;
    }
    if ($checkTime == 9) {
        return 17;
    }
    if ($checkTime == 10) {
        return 18;
    }
    if ($checkTime == 11) {
        return 19;
    }
}


function convertToReadable($entry)
{
    $getTime = intval($entry);

    if ($getTime == 8) {
        return "08:00 AM - 09:00 AM";
    } else

    if ($getTime == 9) {
        return "09:00 AM - 10:00 AM";
    } else

    if ($getTime == 10) {
        return "10:00 AM - 11:00 AM";
    } else

    if ($getTime == 11) {
        return "11:00 AM - 12:00 PM";
    } else

    if ($getTime == 12) {
        return "12:00 PM - 01:00 PM";
    } else

    if ($getTime == 13) {
        return "01:00 PM - 02:00 PM";
    } else

    if ($getTime == 14) {
        return "02:00 PM - 03:00 PM";;
    } else

    if ($getTime == 15) {
        return "03:00 PM - 04:00 PM";
    } else

    if ($getTime == 16) {
        return "04:00 PM - 05:00 PM";
    } else

    if ($getTime == 17) {
        return "05:00 PM - 06:00 PM";
    } else

    if ($getTime == 18) {
        return "06:00 PM - 07:00 PM";
    } else

    if ($getTime == 19) {
        return "07:00 PM - 08:00 PM";
    }
}
