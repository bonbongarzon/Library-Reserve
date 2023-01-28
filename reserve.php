<?php

session_start();
include("includes/connection.php");
if (!isset($_SESSION['ticket_id'])) {

    header("Location:seatPanel.php");
}
 $ticket = $_SESSION['ticket_id'];

$sql = "SELECT * FROM `reservations` WHERE `ticket_id` LIKE '$ticket'";
$result = mysqli_query($conn, $sql);
include('includes/functions.php');
if ($row = mysqli_fetch_assoc($result)) {

    $db_Ticket = $row['ticket_id'];
    $db_SeatID = $row['seat_id'];
    $newSeat = findSeatFromSeats($db_SeatID);
    $db_date = $row['date'];
    $new_date = date("M j, Y", strtotime($db_date));
    $db_TimeIn = $row['start_time'];
    $newTimeIn = trans($db_TimeIn);
    $db_TimeOut = $row['end_time'];
    $newTimeOut = trans($db_TimeOut);
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
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/desig.nav.css">

    <link rel="stylesheet" href="css/reserve.css">
    <script src='scripts/main.js' defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
</head>
<nav>
    <div>

        <img src="assets/seatx.svg" alt="" class="seatX">
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

<body onload="autoClick()">
    <section class="hero-one">
        <div class="reserve-wrap">
            <div>
                <h1>Your reservation was successful! </h1>
                <h4>Please read the information below to know more about your reservation.</h4>
                <a href="seatPanel.php">Know how to claim the reservation</a>
            </div>
            <div>
                <div class="ticket" id="ticket">

                    <h1>Library Reserve</h1>

                    <p>Please save or take a screenshot of this information as you will need it later</p>
                    <p>TICKET ID</p>
                    <p><?php echo $db_Ticket; ?></p>
                    <p>Date: </p>
                    <p><?php echo $new_date; ?></p>
                    <p>Seat/Table:</p>
                    <p><?php echo $newSeat; ?></p>
                    <p>Time In</p>

                    <p><?php echo $newTimeIn; ?></p>
                    <p>Time Out</p>
                    <p><?php echo $newTimeOut; ?></p>
                    <a href="#" id="download">Download this</a>

                    <script type="text/javascript">

                        function autoClick(){
                            $("#download").click();
                        }                        

                        $(document).ready(function(){

                            var element =$("#ticket");

                            $("#download").on('click',function(){

                                html2canvas(element,{
                                    onrendered: function(canvas){
                                        var imageData = canvas.toDataURL("image/jpg");
                                        var newData = imageData.replace(/^data:image\/jpg/,"data:application/octet-stream");
                                        $("#download").attr("download","image.jpg").attr("href",newData);
                                    }

                                });
                            });
                        });

                    </script>
                </div>
            </div>
        </div>
    </section>

    <script src="" async defer></script>
</body>

</html>