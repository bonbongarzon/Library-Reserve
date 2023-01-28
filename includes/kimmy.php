<?php



include("connection.php");
include("functions.php");
function generateChar()
{
    $chr = rand(65, 90);

    return $letter = chr($chr);
}
function generate_code($conn)
{
    $letters = generateChar() . generateChar();
    $number = mt_rand(1000, 9999);
    $final = $letters . '-' . $number;

    $sql = "SELECT * FROM `reservations` WHERE `ticket_id` LIKE '$final'";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {

        echo "Error: Ticket Exists";
        return false;
    } else {
        return $final;
    }
}
if (isset($_POST['reserve'])) {
    date_default_timezone_set('Asia/Manila');
    $today = date("Y-m-d");

    $date = $_POST['date'];
    $seat_code = $_POST['seat_code'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $in = $_POST['time-in'];
    $out = $_POST['time-out'];

    $checkDate = strtotime($date);

    if ($date < $today) {
        echo "Invalid Date";
    } else if ($in > $out) {
        echo "Invalid Time";
    } else {

        echo $date;
        echo $seat_code;
        echo $in;
        echo $out;

        $ticket = generateUniqueCode($conn);
        $sql = "SELECT * FROM `reservations` WHERE `seat_id` LIKE '$seat_code' AND `date` LIKE '$date' AND `start_time` <= '$in' AND `end_time` > '$in'";
        $result = mysqli_query($conn, $sql);

        if ($row = mysqli_fetch_assoc($result)) {
            echo "MISTAKE : SLOT ALREADY RESERVED";
        } else {

            $sql = "INSERT INTO `reservations`(`ticket_id`, `seat_id`, `name`,`email`,`date`, `start_time`, `end_time`,`status`) VALUES ('$ticket','$seat_code','$name','$email','$date','$in','$out','RESERVED')";
            mysqli_query($conn, $sql);
            session_start();
            $_SESSION['ticket_id'] = $ticket;
            header("Location:../reserve.php");
        }
    }
}










if (isset($_POST['getReservation'])) {
    echo $seat = $_POST['seatCode'];
    echo $ticketID = $_POST['ticket'];
    if (preg_match("/^[A-Z]{2}-[0-9]{4}$/", $ticketID)) {

        session_start();

        $_SESSION['seat'] = $seat;
        $_SESSION['ticketID'] = $ticketID;

        header('location:../confirmClaim.php');
    } else {
        echo "<script>alert('Ticket ID Invalid!');
        window.location.href = '../claiming.php?id=' + '$seat';</script>";
    }
}



if (isset($_POST['checkIn'])) {

    $seat = $_POST['seat'];
    $ticket = $_POST['ticket'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    $emailCheck = "SELECT * FROM `reservations` WHERE`ticket_id`";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        echo "Has";
    } else {
        echo "<script>alert('Ticket ID Invalid!');
        window.location.href = '../claiming.php?id=' + '$seat';</script>";
    }



    $sql = "INSERT INTO `logs`(  `seat`, `ticket`, `name`, `email`, `address`, `contact`) 
    VALUES ('$seat','$ticket','$email','$name ','$address','$contact')";

    if (mysqli_query($conn, $sql)) {

        $changeStatus = "UPDATE `reservations` SET `status`='OCCUPIED' WHERE `ticket_id` LIKE '$ticket'";
        if (mysqli_query($conn, $changeStatus)) {
            echo "<script>alert('You are checked-in successfully. Enjoy!');
        window.location.href = '../claiming.php?id=' + '$seat';</script>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
if (isset($_POST['backReserve'])) {

    echo $seatCode = $_POST['seat_code'];
    echo $date = $_POST['date'];

    session_start();
    $_SESSION['seatCode'] = $seatCode;
    $_SESSION['date'] = $date;

    // header('location:../seatPanel.php');
}




function generateUniqueCode($conn)
{

    $code = generateCode();
    $query = "SELECT * FROM `reservations` WHERE `ticket_id` = '$code'";
    $result = mysqli_query($conn, $query);
    while (mysqli_num_rows($result) > 0) {
        $code = generateCode();
        $query = "SELECT * FROM codes WHERE code = '$code'";
        $result = mysqli_query($conn, $query);
    }
    return $code;
}

function generateCode()
{
    $letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $numbers = "0123456789";
    $code = "";
    for ($i = 0; $i < 2; $i++) {
        $code .= $letters[rand(0, strlen($letters) - 1)];
    }
    $code .= "-";
    for ($i = 0; $i < 4; $i++) {
        $code .= $numbers[rand(0, strlen($numbers) - 1)];
    }
    return $code;
}
