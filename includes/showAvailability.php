<?php

include('connection.php');

function generateChar()
{
    $chr = rand(65, 90);

    return $letter = chr($chr);
}
function generate_code()
{
    $letters = generateChar() . generateChar();
    $number = mt_rand(1000, 9999);
    $final = $letters . '-' . $number;
    return $final;
}


function checkCodeIfAble($conn)
{
    $check_code = generate_code();

    $sql = "SELECT * FROM reservations where ticket_id ='$check_code'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    if ($data > 0) {
        echo "already in the database";
    } else {

        return $check_code;
    }
}

function getCurrentDate()
{
    $current_date = date("Y-m-d");

    return $current_date;
}



function convertInputToTime($entry)
{

    $getTime = intval($entry);

    if ($getTime == 8) {
        return "08:00:00";
    } else

    if ($getTime == 9) {
        return "09:00:00";
    } else

    if ($getTime == 10) {
        return "10:00:00";
    } else

    if ($getTime == 11) {
        return "11:00:00";
    } else

    if ($getTime == 12) {
        return "12:00:00";
    } else

    if ($getTime == 13) {
        return "13:00:00";
    } else

    if ($getTime == 14) {
        return "14:00:00";;
    } else

    if ($getTime == 15) {
        return "15:00:00";
    } else

    if ($getTime == 16) {
        return "16:00:00";
    } else

    if ($getTime == 17) {
        return "17:00:00";
    } else

    if ($getTime == 18) {
        return "18:00:00";
    } else

    if ($getTime == 19) {
        return "19:00:00";
    }
}



function insertReservation($conn)
{
    $ticket =  checkCodeIfAble($conn);

    $userID = $_POST['userID'];
    $seatNo = $_POST['seatNo'];
    $date = $_POST['date'];
    $timein = $_POST['time-in'];
    $timeout = $_POST['time-out'];
    $new_timein = convertInputToTime($timein);
    $new_timeout = convertInputToTime($timeout);

    $sql = "INSERT INTO `reservations`(`ticket_id`, `seat_id`, `user_id`, `date`, `start_time`, `end_time`) 
    VALUES ('$ticket','$seatNo','$userID','$date','$new_timein','$new_timeout')";

    mysqli_query($conn, $sql);
}

if (isset($_POST['try'])) {
    insertReservation($conn);
    header("location:../others/book.php");
    // insertReservation($conn);
    // echo checkCodeIfAble($conn);

    // echo $userID = $_POST['userID'];
    // echo $seatNo = $_POST['seatNo'];
    // echo $date = $_POST['date'];
    // echo $timein = $_POST['time-in'];
    // echo $timeout = $_POST['time-out'];
}
