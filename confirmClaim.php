<?php
session_start();
include('includes/connection.php');
include('includes/functions.php');
// $_SESSION['ticketID'] = "SI-1522";
// $_SESSION['seat'] = "seat01A";
if (!isset($_SESSION['ticketID']) or !isset($_SESSION['seat'])) {
    // echo "<script>window.history.go(-1);</script>";
    header('Location: ../claiming.php');
} else {
    $seat = $_SESSION['seat'];
    $ticketID = $_SESSION['ticketID'];


    $row = findSeatInfo($seat);

    if ($row == "error") {
        echo "<script>
        alert('Can't find seat information from the database')
        window.location.href = '../claiming.php'</script>";
    } else {


        $seat = $row['seatCode'];
        $seatName = $row['seatName'];





        $ticketData = findTicket($seat, $ticketID, $conn);


        if ($ticketData == "No Ticket") {
            echo "<script>
            alert('Can't find ticket information from the database')
            window.location.href = '../claiming.php'</script>";
        }


        // echo implode($ticketData);

        $t = date(' H');
        $test = "11";
        $timeIn = $ticketData['start_time'];
        $timeOut = $ticketData['end_time'];
        $author = $ticketData['name'];

        if($ticketData['name']){
            $author = 'How are you, '.$ticketData['name'] ."?";
        } else {
            $author = "Welcome to the Library";
        }


        if ($timeIn > $t or $timeOut < $t) {
            echo "<script>
            alert('Your reservation is set from" . trans($timeIn) .  " to " . trans($timeOut)  . "')
            window.location.href = '../claiming.php'</script>";
        }









        // date_default_timezone_set('Asia/Manila');
        // $today = date("Y-m-d");

        // $test = "11";
        // $t = date(' H');
        // $t;

        // $sql = "SELECT * FROM `reservations` WHERE`seat_id` = '$seat' AND `date` = '$today' AND `ticket_id` LIKE '$ticketID'";
        // $j = mysqli_query($conn, $sql);


        // if ($o = mysqli_fetch_assoc($j)) {

        //     if ($o['name']) {
        //         $author = "Hello, " . $o['name'];
        //     } else {
        //         $author = "Hello, How are you? ";
        //     }





        //     $seat_id = $o['seat_id'];
        //     $status = $o['status'];
        //     $timeIn = $o['start_time'];
        //     $timeOut = $o['end_time'];

        //     $test;
        //     if ($timeIn > $test or $timeOut < $test) {
        // echo "<script>
        // alert('Your reservation is set from" . trans($timeIn) .  " to " . trans($timeOut)  . "')
        // window.location.href = '../claiming.php'</script>";
        //     } else {
        //         $timeIn = trans($timeIn);
        //         $timeOut = trans($timeOut);
        //     }
        //     $timeIn = trans($timeIn);
        //     $timeOut = trans($timeOut);
        // } else {
        //     $status = "VACANT";


        // }
        // $timeIn = trans($timeIn);
        // $timeOut = trans($timeOut);
    }
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
                <p>Library Reserve</p>
                <h1 style="text-decoration:none">You are about to claim a reservation</h1>
                <p>To confirm your booking, we need some additional information from you. Please fill in the fields below to complete your claim process.

                </p>
            </div>
            <div>

                <img src="assets/seatx.svg">

                <p>Seat : <?php echo $seatName ?></p>

                <p><?php echo $ticketID ?></p>


                <span>From:<?php echo trans($timeIn) ?> - <?php echo trans($timeOut) ?></span>
                <span class="greeting"><?php echo $author ?></span>
                <form action="includes/kimmy.php" method="post">
                    <p><i>Please fill-in the necessary fields</i></p>
                    <input type="hidden" name="seat" id="" value="<?php echo $seat ?>">
                    <input type="hidden" name="ticket" id="" value="<?php echo $ticketID ?>">
                    <input type="email" name="email" id="" placeholder="Insert your email here">
                    <input type="text" name="name" id="" placeholder="Full Name">
                    <input type="text" name="address" id="" placeholder="Address">
                    <input type="text" name="contact" id="" placeholder="Contact No.">

                    <button type="submit" name="checkIn">Claim my reservation</button>
                </form>

            </div>
        </div>
        </div>
    </section>

</body>

</html>