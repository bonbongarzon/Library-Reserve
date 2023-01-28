<?php



function getSeat($find)
{


    include('includes/connection.php');
    $seat = $find;
    $getSeat = "SELECT * FROM `seats` WHERE `seatCode` LIKE '$seat' ";
    $results = mysqli_query($conn, $getSeat);

    if ($result = mysqli_fetch_assoc($results)) {


        return $result;
    } else {
        return "Empty";
    }
}









function findSeatFromSeats($data)
{
    $test = $data;
    include('connection.php');
    $sql = "SELECT * FROM `seats` WHERE`seatCode` LIKE '$test'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $seatName = $row['seatName'];
        return $seatName;
    } else {
        return "error";
    }
}


function trans($data)
{

    $test = $data;

    if ($test == 8) {
        return "08:00 AM";
    }
    if ($test == 9) {
        return "09:00 AM";
    }
    if ($test == 10) {
        return "10:00 AM";
    }
    if ($test == 11) {
        return "11:00 AM";
    }
    if ($test == 12) {
        return "12:00 PM";
    }
    if ($test == 13) {
        return "01:00 PM";
    }
    if ($test == 14) {
        return "02:00 PM";
    }
    if ($test == 15) {
        return "03:00 PM";
    }
    if ($test == 16) {
        return "04:00 PM";
    }

    if ($test == 17) {
        return "05:00 PM";
    }
    if ($test == 18) {
        return "06:00 PM";
    }

    if ($test == 19) {
        return "07:00 PM";
    }

    if ($test == 20) {
        return "08:00 PM";
    }
    if ($test == 21) {
        return "09:00 PM";
    }
    if ($test == 22) {
        return "10:00 PM";
    }
    if ($test == 23) {
        return "11:00 PM";
    }

    if ($test == 24) {
        return "12:00 AM";
    }
}


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


function nowSlot($time, $slot)
{


    $slot = 'VACANT';

    knowsIfVacant($time, $slot);

    if ($time == 8 and $slot == "RESERVED") {
        echo "<form action='includes/kimmy.php' method='post'>
            <p>Claim a reservation?</p>
            <input type='hidden' name='seatCode' id='' placeholder='Insert your ticket ID here'>
            <input type='text' name='ticket' id='' placeholder='Insert your ticket ID here'>

            <button type='submit' name='getReservation'>Get my reservation</button>
        </form>";
    }
    if ($time == 9 and $slot == "RESERVED") {
        echo "<form action='includes/kimmy.php' method='post'>
            <p>Claim a reservation?</p>
            <input type='hidden' name='seatCode' id='' placeholder='Insert your ticket ID here'>
            <input type='text' name='ticket' id='' placeholder='Insert your ticket ID here'>

            <button type='submit' name='getReservation'>Get my reservation</button>
        </form>";
    }

    if ($time == 10 and $slot == "RESERVED") {
        echo "<form action='includes/kimmy.php' method='post'>
        <p>Claim a reservation?</p>
        <input type='hidden' name='seatCode' id='' placeholder='Insert your ticket ID here'>
        <input type='text' name='ticket' id='' placeholder='Insert your ticket ID here'>

        <button type='submit' name='getReservation'>Get my reservation</button>
    </form>";
    }

    if ($time == 11 and $slot == "RESERVED") {
        echo "<form action='includes/kimmy.php' method='post'>
        <p>Claim a reservation?</p>
        <input type='hidden' name='seatCode' id='' placeholder='Insert your ticket ID here'>
        <input type='text' name='ticket' id='' placeholder='Insert your ticket ID here'>

        <button type='submit' name='getReservation'>Get my reservation</button>
    </form>";
    }

    if ($time == 12 and $slot == "RESERVED") {
        echo "<form action='includes/kimmy.php' method='post'>
        <p>Claim a reservation?</p>
        <input type='hidden' name='seatCode' id='' placeholder='Insert your ticket ID here'>
        <input type='text' name='ticket' id='' placeholder='Insert your ticket ID here'>

        <button type='submit' name='getReservation'>Get my reservation</button>
    </form>";
    }

    if ($time == 13 and $slot == "RESERVED") {
        echo "<form action='includes/kimmy.php' method='post'>
        <p>Claim a reservation?</p>
        <input type='hidden' name='seatCode' id='' placeholder='Insert your ticket ID here'>
        <input type='text' name='ticket' id='' placeholder='Insert your ticket ID here'>

        <button type='submit' name='getReservation'>Get my reservation</button>
    </form>";
    }

    if ($time == 14 and $slot == "RESERVED") {
        echo "<form action='includes/kimmy.php' method='post'>
        <p>Claim a reservation?</p>
        <input type='hidden' name='seatCode' id='' placeholder='Insert your ticket ID here'>
        <input type='text' name='ticket' id='' placeholder='Insert your ticket ID here'>

        <button type='submit' name='getReservation'>Get my reservation</button>
    </form>";
    }

    if ($time == 15 and $slot == "RESERVED") {
        echo "<form action='includes/kimmy.php' method='post'>
        <p>Claim a reservation?</p>
        <input type='hidden' name='seatCode' id='' placeholder='Insert your ticket ID here'>
        <input type='text' name='ticket' id='' placeholder='Insert your ticket ID here'>

        <button type='submit' name='getReservation'>Get my reservation</button>
    </form>";
    }
    if ($time == 16 and $slot == "RESERVED") {
        echo "<form action='includes/kimmy.php' method='post'>
        <p>Claim a reservation?</p>
        <input type='hidden' name='seatCode' id='' placeholder='Insert your ticket ID here'>
        <input type='text' name='ticket' id='' placeholder='Insert your ticket ID here'>

        <button type='submit' name='getReservation'>Get my reservation</button>
    </form>";
    }

    if ($time == 17 and $slot == "RESERVED") {
        echo "<form action='includes/kimmy.php' method='post'>
        <p>Claim a reservation?</p>
        <input type='hidden' name='seatCode' id='' placeholder='Insert your ticket ID here'>
        <input type='text' name='ticket' id='' placeholder='Insert your ticket ID here'>

        <button type='submit' name='getReservation'>Get my reservation</button>
    </form>";
    }

    if ($time == 18 and $slot == "RESERVED") {
        echo "<form action='includes/kimmy.php' method='post'>
        <p>Claim a reservation?</p>
        <input type='hidden' name='seatCode' id='' placeholder='Insert your ticket ID here'>
        <input type='text' name='ticket' id='' placeholder='Insert your ticket ID here'>

        <button type='submit' name='getReservation'>Get my reservation</button>
    </form>";
    }

    if ($time == 19 and $slot == "RESERVED") {
        echo "<form action='includes/kimmy.php' method='post'>
        <p>Claim a reservation?</p>
        <input type='hidden' name='seatCode' id='' placeholder='Insert your ticket ID here'>
        <input type='text' name='ticket' id='' placeholder='Insert your ticket ID here'>

        <button type='submit' name='getReservation'>Get my reservation</button>
    </form>";
    }

    if ($time == 20 and $slot == "RESERVED") {
        echo "<form action='includes/kimmy.php' method='post'>
        <p>Claim a reservation?</p>
        <input type='hidden' name='seatCode' id='' placeholder='Insert your ticket ID here'>
        <input type='text' name='ticket' id='' placeholder='Insert your ticket ID here'>

        <button type='submit' name='getReservation'>Get my reservation</button>
    </form>";
    }
    if ($time == 21 and $slot == "RESERVED") {
        echo "<form action='includes/kimmy.php' method='post'>
        <p>Claim a reservation?</p>
        <input type='hidden' name='seatCode' id='' placeholder='Insert your ticket ID here'>
        <input type='text' name='ticket' id='' placeholder='Insert your ticket ID here'>

        <button type='submit' name='getReservation'>Get my reservation</button>
    </form>";
    }

    if ($time == 22 and $slot == "RESERVED") {
        echo "<form action='includes/kimmy.php' method='post'>
        <p>Claim a reservation?</p>
        <input type='hidden' name='seatCode' id='' placeholder='Insert your ticket ID here'>
        <input type='text' name='ticket' id='' placeholder='Insert your ticket ID here'>

        <button type='submit' name='getReservation'>Get my reservation</button>
    </form>";
    }

    if ($time == 23 and $slot == "RESERVED") {
        echo "<form action='includes/kimmy.php' method='post'>
        <p>Claim a reservation?</p>
        <input type='hidden' name='seatCode' id='' placeholder='Insert your ticket ID here'>
        <input type='text' name='ticket' id='' placeholder='Insert your ticket ID here'>

        <button type='submit' name='getReservation'>Get my reservation</button>
    </form>";
    }

    if ($time == 24 and $slot == "RESERVED") {
        echo "<form action='includes/kimmy.php' method='post'>
        <p>Claim a reservation?</p>
        <input type='hidden' name='seatCode' id='' placeholder='Insert your ticket ID here'>
        <input type='text' name='ticket' id='' placeholder='Insert your ticket ID here'>

        <button type='submit' name='getReservation'>Get my reservation</button>
    </form>";
    }
}


function knowsIfVacant($time, $slot)
{
    $time = 8;
    if ($time == 8 && $slot == "VACANT" || $slot == "OCCUPIED") {
        echo "<a href='../seatDetails.php'>Reserve this seat</a>";
    }
}


function getSlots($seat, $date)
{
    include('connection.php');
    $seat = $seat;
    $date = $date;

    $slots = array("VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT");

    $dummy = $seat;
    $sql = "SELECT * FROM `reservations` WHERE `seat_id` LIKE '$dummy' AND `date` LIKE '$date'";
    $result = mysqli_query($conn, $sql);


    foreach ($result as $row) {

         $in = $row['start_time'];
         $out = $row['end_time'];


        $in = inTimeToIndex($in);
        $out = outTimeToIndex($out);

        for ($i = $in; $i <= $out; $i++) {
            $slots[$i] = "RESERVED";
        }
    }
    // while ($row = mysqli_fetch_assoc($result)) {

    // echo $in = $row['start_time'];
    // echo $out = $row['end_time'];


    // $in = inTimeToIndex($in);
    // $out = outTimeToIndex($out);

    // for ($i = $in; $i <= $out; $i++) {
    //     $slots[$i] = "RESERVED";
    // }
    return $slots;
}
