<?php

session_start();

if(isset($_SESSION['seat']) && isset($_SESSION['ticketID'])){
    unset($_SESSION['seat']);
    unset($_SESSION['ticketID']);
}


$seatID = $_GET['id'];

include('includes/connection.php');
include('includes/functions.php');

// date_default_timezone_set('Asia/Manila');
// $today = date("Y-m-d");

// $t = date(' H');

// $sql = "SELECT * FROM `seats` WHERE `seatCode` LIKE '$seatID'";
// $result = mysqli_query($conn, $sql);
// if ($row = mysqli_fetch_assoc($result)){
//     echo $seatName = $row['seatName'];
//     echo $id = $row['seatCode'];

//     $getStatus = "SELECT * FROM `reservations` WHERE`seat_id` = '$id' AND `date` = '$today' AND `start_time` <= '$t' AND `end_time` > '$t'";
//     $j = mysqli_query($conn, $getStatus);
//     if ($o = mysqli_fetch_assoc($j)) {
//         $status = $o['status'];
//         $timeIn = $o['start_time'];
//         $timeOut = $o['end_time'];
//         $timeIn = trans($timeIn);
//         $timeOut = trans($timeOut);
//     } else {
//         echo "no data";
//     }
// } else {
//     echo "no Seat ID";
// }
date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d");

$test = ' 15';
$t = date(' H');
$t;

$sql = "SELECT * FROM `seats` WHERE `seatCode` LIKE '$seatID'";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    $seatName = $row['seatName'];
    $id = $row['seatCode'];

    $sql = "";
    $sql = "SELECT * FROM `reservations` WHERE`seat_id` = '$id' AND `date` = '$today' AND `start_time` <= '$t' AND `end_time` > '$t'";
    $j = mysqli_query($conn, $sql);


    if ($o = mysqli_fetch_assoc($j)) {
        $seat_id = $o['seat_id'];
        $status = $o['status'];
        $timeIn = $o['start_time'];
        $timeOut = $o['end_time'];
        $timeIn = trans($timeIn);
        $timeOut = trans($timeOut);
    } else {
        $status = "VACANT";
        echo $today;
    }
} else {
    echo "ERROR";
}


?>






<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Get your seat</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/phone.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>

<nav>
    <div>
        <div><img src="assets/seatx.svg" alt="" class="seatX"></div>

        <div><a href="">Home</a>
            <a href="">Services</a>
            <a href="">Find Seat</a>
            <div>
                <a href=""><img src="" alt=""><img src="assets/icons/Group 10-icons.svg" alt=""></a>
                <a href=""><img src="" alt=""><img src="assets/icons/Group 11-icons.svg" alt=""></a>
                <a href=""><img src="" alt=""><img src="assets/icons/Group 12-icons.svg" alt=""></a>
            </div>
        </div>

    </div>
</nav>

<body>
    <section class="content">
        <div>
            <div>
                <p>Welcome in</p>
                <h1>Library Reserve</h1>
                <p>This page shows the information of every seat.</p>
            </div>
            <div>

                <img src="assets/seatx.svg">

                <p>This seat is </p>

                <p><?php echo $seatName ?></p>

                <p><?php echo $status ?></p>
                <?php
                if ($status != "VACANT") {
                ?>
                    <p>From: <?php echo $timeIn . " - " . $timeOut ?></p>

                    <?php
                    $slots = array("VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT");

                    $dummy = $seat_id;
                    $sql = "SELECT * FROM `reservations` WHERE `seat_id` LIKE '$dummy' AND `date` LIKE '$today'";
                    $result = mysqli_query($conn, $sql);
                    if ($row = mysqli_fetch_assoc($result)) {

                        $in = $row['start_time'];
                        $out = $row['end_time'];

                        $in = inTimeToIndex($in);
                        $out = outTimeToIndex($out);

                        for ($i = $in; $i <= $out; $i++) {
                            $slots[$i] = "RESERVED";
                        }
                    } else {
                        echo "no entry";
                    }

                    echo "08:00 - 09:00 AM : " . $slots[0] . "<br> ";
                    echo "09:00 - 10:00 AM :" . $slots[1] . "<br> ";
                    echo "10:00 - 11:00 AM : " . $slots[2] . "<br> ";
                    echo "11:00 - 12:00 AM : " . $slots[3] . "<br> ";
                    echo "12:00 - 01:00 PM : " . $slots[4] . "<br> ";
                    echo "01:00 - 02:00 PM : " . $slots[5] . "<br> ";
                    echo "02:00 - 03:00 PM : " . $slots[6] . "<br> ";
                    echo "03:00 - 04:00 PM : " . $slots[7] . "<br> ";
                    echo "04:00 - 05:00 PM : " . $slots[8] . "<br> ";
                    echo "05:00 - 06:00 PM : " . $slots[9] . "<br> ";
                    echo "06:00 - 07:00 PM : " . $slots[10] . "<br> ";

                    ?>
                <?php
                } else {
                    $slots = array("VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT");

                    $dummy = $seat_id;
                    $sql = "SELECT * FROM `reservations` WHERE `seat_id` LIKE '$dummy' AND `date` LIKE '$today'";
                    $result = mysqli_query($conn, $sql);
                    if ($row = mysqli_fetch_assoc($result)) {

                        $in = $row['start_time'];
                        $out = $row['end_time'];

                        $in = inTimeToIndex($in);
                        $out = outTimeToIndex($out);

                        for ($i = $in; $i <= $out; $i++) {
                            $slots[$i] = "RESERVED";
                        }
                    } else {
                        echo "no entry";
                    }

                    echo "08:00 - 09:00 AM : " . $slots[0] . "<br> ";
                    echo "09:00 - 10:00 AM :" . $slots[1] . "<br> ";
                    echo "10:00 - 11:00 AM : " . $slots[2] . "<br> ";
                    echo "11:00 - 12:00 AM : " . $slots[3] . "<br> ";
                    echo "12:00 - 01:00 PM : " . $slots[4] . "<br> ";
                    echo "01:00 - 02:00 PM : " . $slots[5] . "<br> ";
                    echo "02:00 - 03:00 PM : " . $slots[6] . "<br> ";
                    echo "03:00 - 04:00 PM : " . $slots[7] . "<br> ";
                    echo "04:00 - 05:00 PM : " . $slots[8] . "<br> ";
                    echo "05:00 - 06:00 PM : " . $slots[9] . "<br> ";
                    echo "06:00 - 07:00 PM : " . $slots[10] . "<br> ";
                }






                //  nowSlot($t,$slots[0]);
                //  nowSlot($t,$slots[1]);
                //  nowSlot($t,$slots[2]);
                //  nowSlot($t,$slots[3]);
                //  nowSlot($t,$slots[4]);
                //  nowSlot($t,$slots[5]);
                //  nowSlot($t,$slots[6]);
                //  nowSlot($t,$slots[7]);
                //  nowSlot($t,$slots[8]);
                // nowSlot($t, $slots[9]);
                // nowSlot($t, $slots[10]);
                ?>

                <?php if ($status == "RESERVED") {
                ?> <form action="includes/kimmy.php" method="post">
                        <p>Claim a reservation?</p>
                        <input type="hidden" name="seatCode" id="" value="<?php echo $id ?>">
                        <input type="text" name="ticket" id="input" onkeyup="convertToUpperCase()" placeholder="Insert your ticket ID here">

                        <button type="submit" name="getReservation">Get my reservation</button>
                    </form>
                    <script>
                        function convertToUpperCase() {
                            var input = document.getElementById("input");
                            input.value = input.value.toUpperCase();
                        }
                    </script>

                <?php
                } else {
                    $tomorrow = date("Y-m-d", strtotime("+1 day"));
                    echo ' <form action="includes/kimmy.php" method="POST">
                    <input type="hidden" name="seat_code" id="" value="' ?> <?php echo $id . '">
                    <input type="hidden" name="date" id="" value="' ?> <?php echo $tomorrow . ' ">

                    <button type="submit" name="backReserve" >Reserve this Seat</button>
                </form>';
                                                                    } ?>


            </div>
        </div>
        </div>
    </section>

</body>


</html>