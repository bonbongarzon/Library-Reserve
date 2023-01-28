<?php
include('connection.php');


//  $timeIn = $_POST['time-in'];
//  $timeOut = $_POST['time-out'];



function inTimeToIndex($test)
{

    if ($test == 8) {
        // 8
        return 0;
    }

    if ($test == 9) {
        // 9
        return 1;
    }

    if ($test == 10) {
        // 10
        return 2;
    }

    if ($test == 11) {
        // 11
        return 3;
    }

    if ($test == 12) {
        // 12
        return 4;
    }

    if ($test == 13) {
        // 1
        return 5;
    }

    if ($test == 14) {
        // 2
        return 6;
    }

    if ($test == 15) {
        // 3
        return 7;
    }

    if ($test == 16) {
        // 4
        return 8;
    }

    if ($test == 17) {
        // 5
        return 9;
    }

    if ($test == 18) {
        // 6
        return 10;
    }
}


function outTimeToIndex($test)
{

    if ($test == 9) {
        // 8
        return 0;
    }

    if ($test == 10) {
        // 9
        return 1;
    }

    if ($test == 11) {
        // 10
        return 2;
    }

    if ($test == 12) {
        // 11
        return 3;
    }

    if ($test == 13) {
        // 12
        return 4;
    }

    if ($test == 14) {
        // 1
        return 5;
    }

    if ($test == 15) {
        // 2
        return 6;
    }

    if ($test == 16) {
        // 3
        return 7;
    }

    if ($test == 17) {
        // 4
        return 8;
    }

    if ($test == 18) {
        // 5
        return 9;
    }

    if ($test == 19) {
        // 6
        return 10;
    }
}

if (isset($_POST['date']) && isset($_POST['seat_code'])) {

    $date = $_POST['date'];
    $seatCode = $_POST['seat_code'];
    //$dummy_slots = 8,9,10,11,12,13,14,15,16,17,18,19
    $slots = array("VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT");

    $dummy = $seatCode;
    $sql = "SELECT * FROM `reservations` WHERE `seat_id` LIKE '$dummy' AND `date` LIKE '$date'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {

        $in = $row['start_time'];
        $out = $row['end_time'];

        $in = inTimeToIndex($in);
        $out = outTimeToIndex($out);

        for ($i = $in; $i <= $out; $i++) {
            $slots[$i] = "RESERVED";
        }
    }

    // echo "08:00 - 09:00 AM - " . $slots[0] . "<br> ";
    // echo "09:00 - 10:00 AM - " . $slots[1] . "<br> ";
    // echo "10:00 - 11:00 AM - " . $slots[2] . "<br> ";
    // echo "11:00 - 12:00 AM - " . $slots[3] . "<br> ";
    // echo "12:00 - 01:00 PM - " . $slots[4] . "<br> ";
    // echo "01:00 - 02:00 PM - " . $slots[5] . "<br> ";
    // echo "02:00 - 03:00 PM - " . $slots[6] . "<br> ";
    // echo "03:00 - 04:00 PM - " . $slots[7] . "<br> ";
    // echo "04:00 - 05:00 PM - " . $slots[8] . "<br> ";
    // echo "05:00 - 06:00 PM - " . $slots[9] . "<br> ";
    // echo "06:00 - 07:00 PM - " . $slots[10] . "<br> ";
}
