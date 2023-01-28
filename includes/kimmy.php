<?php



include("connection.php");
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

    if ($date > $today) {
        if ($ticket = 0) {
            echo "Error: Ticket Exists";
        } else {
            $ticket =  generate_code($conn);

            $sql = "SELECT * FROM `reservations` WHERE `seat_id` LIKE '$seat_code' AND `date` LIKE '$date' AND `start_time` >= '$in' AND `end_time` <= '$out'";
            $result = mysqli_query($conn, $sql);

            if ($row = mysqli_fetch_assoc($result)) {
                echo "<script>
alert('Your selected date & time is already reserved. Pick other seats or time');
window.history.go(-1);
</script>";
            } else {
                // $sql = "INSERT INTO `reservations`(`ticket_id`, `seat_id`, `name`,`email`,`date`, `start_time`, `end_time`) VALUES ('$ticket','$seat_code','$name','$email','$date','$in','$out')";
                // mysqli_query($conn, $sql);
                session_start();
                $_SESSION['ticket_id'] = $ticket;
                header("Location:../reserve.php");
            }
        }
    } else {
        echo "<script>
        alert('This system don't support same-day reservation.');
        </script>";
        //         echo "<script>
        // alert('This system doesn't support same-day reservation.');
        // window.location.href='../seatPanel.php';
        // </script>";
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
        echo "Input is not in the correct format";
    }
}



if (isset($_POST['checkIn'])) {

    $seat = $_POST['seat'];
    $ticket = $_POST['ticket'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];


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

    $seatCode = $_POST['seat_code'];
    $date = $_POST['date'];

    session_start();
    $_SESSION['seatCode'] = $seatCode;
    $_SESSION['date'] = $date;

    header('location:../seatPanel.php');
}
