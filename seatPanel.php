<?php

session_start();
include('navbar.php');
include('includes/connection.php');
include('includes/functions.php');
if (!isset($_SESSION['seatCode']) && !isset($_SESSION['date'])) {
    echo "BACK TO SeatDETAILS";
} else {
    $slots = "";
    $today = date('Y-m-d');
    $seat = $_SESSION['seatCode'];
    $date = $_SESSION['date'];

    $row = getSeat($seat);

    if ($row == "Empty") {
        echo "BACK TO SEAT DETAILS";
    } else {
        $seatName = $row['seatName'];
        $des = $row['seatDes'];
        $new_date = date("F j, Y", strtotime($date));

        $slots = getSlots($seat, $date);

        echo implode($slots);
    }




    // $sql = "SELECT * FROM `seats` WHERE `seatCode` LIKE '$seat'";
    // $result = mysqli_query($conn, $sql);

    // if ($row = mysqli_fetch_assoc($result)) {


    //     echo "HAS";
    // } else {
    //     echo "EMPTY";
    // }
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
    <link rel="stylesheet" href="css/style.seatPanel.css">
    <link rel="stylesheet" href="css/seatPanel.css">
    <script src='scripts/main.js' defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>









<body>

    <section class="seat-panel-hero-one">
        <div>
            <?php
            if ($date == $today) {
                echo "<div class='alert-semi'>
<div>
<p><b>Please Note:</b> This system doesn't support same-day reservation.<br>
<br> <i> This is to ensure that our librarians have enough time to process and confirm each reservation. To ensure that your desired date and time is available, we recommend making your reservation at least one day in advance. Thank you for your understanding and we look forward to helping you with your reservation needs.</i>

</p>
</div>
</div>";
            }


            ?>
            <div>
                <h1>About the Seat. </h1>
                <p>Get to know more about the selected seat. </p>
            </div>

            <hr>
            <div>
                <div>
                    <h1>
                        <?php echo $seatName ?>
                    </h1>
                    <p>
                        <?php echo $des ?>
                    </p>
                    <br>


                    <!-- <div class="alert-semi">
                        <div>
                            <p><b>Please Note:</b> This system doesn't support same-day reservation.<br>
                                <br> <i> This is to ensure that our librarians have enough time to process and confirm each reservation. To ensure that your desired date and time is available, we recommend making your reservation at least one day in advance. Thank you for your understanding and we look forward to helping you with your reservation needs.</i>

                            </p>
                        </div>
                    </div> -->
                    <form action="includes/kimmy.php" method="POST">
                        <h1>Complete your reservation here.</h1>
                        <input type="hidden" name="seat_code" value="<?php echo $seat;



                                                                        ?>">
                        <input type="hidden" name="date" value="<?php echo $date ?>" placeholder="Date">
                        <p>Reserve this seat on: <?php echo $new_date ?> <a href="seatDetails.php">Change date here</a></p>
                        <p><b>Note: </b><i>Please use your school email if you are a student, and your personal email if you are not affiliated with the school.</i></p>
                        <label>Name: </label>
                        <input type="text" name="name" placeholder="Full Name here">
                        <label>Email: </label>
                        <input type="email" name="email" placeholder="Use your CvSU Email">
                        <label>Time In: </label>
                        <Select name="time-in">
                            <option value="8">08:00 AM</option>
                            <option value="9">09:00 AM</option>
                            <option value="10">10:00 AM</option>
                            <option value="11">11:00 AM</option>
                            <option value="12">12:00 PM</option>
                            <option value="13">01:00 PM</option>
                            <option value="14">02:00 PM</option>
                            <option value="15">03:00 PM</option>
                            <option value="16">04:00 PM</option>
                            <option value="17">05:00 PM</option>
                            <option value="18">06:00 PM</option>
                        </Select>
                        <label for="time-out">Time Out</label>
                        <Select name="time-out">
                            <option value="9">09:00 AM</option>
                            <option value="10">10:00 AM</option>
                            <option value="11">11:00 AM</option>
                            <option value="12">12:00 PM</option>
                            <option value="13">01:00 PM</option>
                            <option value="14">02:00 PM</option>
                            <option value="15">03:00 PM</option>
                            <option value="16">04:00 PM</option>
                            <option value="17">05:00 PM</option>
                            <option value="18">06:00 PM</option>
                            <option value="19">07:00 PM</option>
                        </Select>
                        <button type="submit" name="reserve">Reserve this seat</button>


                    </form>
                    <br>
                </div>
                <img src="assets/hero-img.svg" class="art">
                <div class="slots">
                    <p>Slots for the date: <a href="<?php echo 'claiming.php?id=' . $seat  ?>">Claim my reservation</a><br><b>
                            <?php echo $new_date;


                            ?>
                        </b></p>

                    <table>
                        <tr>
                            <td>08:00 - 09:00 AM</td>
                            <td><?php if ($slots[0] == "RESERVED") {

                                ?> <p class="reserved"><?php echo $slots[0] ?></p>
                                <?php } else {
                                ?> <p class="vacant"><?php echo $slots[0] ?></p>
                                <?php }
                                ?></td>
                        </tr>

                        <tr>
                            <td>09:00 - 10:00 AM</td>
                            <td><?php if ($slots[1] == "RESERVED") {

                                ?> <p class="reserved"><?php echo $slots[1] ?></p>
                                <?php } else {
                                ?> <p class="vacant"><?php echo $slots[1] ?></p>
                                <?php }
                                ?></td>
                        </tr>

                        <tr>
                            <td>10:00 - 11:00 AM</td>
                            <td><?php if ($slots[2] == "RESERVED") {

                                ?> <p class="reserved"><?php echo $slots[2] ?></p>
                                <?php } else {
                                ?> <p class="vacant"><?php echo $slots[2] ?></p>
                                <?php }
                                ?></td>
                        </tr>

                        <tr>
                            <td>11:00 - 12:00 AM</td>
                            <td><?php if ($slots[3] == "RESERVED") {

                                ?> <p class="reserved"><?php echo $slots[3] ?></p>
                                <?php } else {
                                ?> <p class="vacant"><?php echo $slots[3] ?></p>
                                <?php }
                                ?></td>
                        </tr>

                        <tr>
                            <td>12:00 - 01:00 PM </td>
                            <td><?php if ($slots[4] == "RESERVED") {

                                ?> <p class="reserved"><?php echo $slots[4] ?></p>
                                <?php } else {
                                ?> <p class="vacant"><?php echo $slots[4] ?></p>
                                <?php }
                                ?></td>
                        </tr>

                        <tr>
                            <td>01:00 - 02:00 PM</td>
                            <td><?php if ($slots[5] == "RESERVED") {

                                ?> <p class="reserved"><?php echo $slots[5] ?></p>
                                <?php } else {
                                ?> <p class="vacant"><?php echo $slots[5] ?></p>
                                <?php }
                                ?></td>
                        </tr>

                        <tr>
                            <td>02:00 - 03:00 PM</td>
                            <td><?php if ($slots[6] == "RESERVED") {

                                ?> <p class="reserved"><?php echo $slots[6] ?></p>
                                <?php } else {
                                ?> <p class="vacant"><?php echo $slots[6] ?></p>
                                <?php }
                                ?></td>
                        </tr>

                        <tr>
                            <td>03:00 - 04:00 PM</td>
                            <td><?php if ($slots[7] == "RESERVED") {

                                ?> <p class="reserved"><?php echo $slots[7] ?></p>
                                <?php } else {
                                ?> <p class="vacant"><?php echo $slots[7] ?></p>
                                <?php }
                                ?></td>
                        </tr>

                        <tr>
                            <td>04:00 - 05:00 PM</td>
                            <td><?php if ($slots[8] == "RESERVED") {

                                ?> <p class="reserved"><?php echo $slots[8] ?></p>
                                <?php } else {
                                ?> <p class="vacant"><?php echo $slots[8] ?></p>
                                <?php }
                                ?></td>
                        </tr>
                        <tr>
                            <td>05:00 - 06:00 PM</td>
                            <td><?php if ($slots[9] == "RESERVED") {

                                ?> <p class="reserved"><?php echo $slots[9] ?></p>
                                <?php } else {
                                ?> <p class="vacant"><?php echo $slots[9] ?></p>
                                <?php }
                                ?></td>
                        </tr>
                        <tr>
                            <td>06:00 - 07:00 PM</td>
                            <td><?php if ($slots[10] == "RESERVED") {

                                ?> <p class="reserved"><?php echo $slots[10] ?></p>
                                <?php } else {
                                ?> <p class="vacant"><?php echo $slots[10] ?></p>
                                <?php }
                                ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>



    </section>


</body>

</html>