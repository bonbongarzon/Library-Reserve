<?php

if(isset($_GET['findSeat'])){
    $find = $_GET['findSeat'];
} else {
    $find = "seats";
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

    <script src='scripts/main.js' defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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

<body>

    <section class="hero-one">
        <div>
            <div>
                <h1>Library Reserve</h1>
                <h4>Maximize your productivity with a reserved seat at the library - reserve your seat today!</h4>
                <div>
                    <a href="#<?php echo $find?>"> <span><img src="assets/icons/search.svg" alt=""></span> Find a seat</a>
                    <a href=""> Student Login</a>
                </div>
                <p>Know more about the OSRS. </p>
            </div>

            <img src="assets/hero-img.svg" alt="">
        </div>

    </section>

    <section class="sect_two">
        <div>
            <span><b>Cavite State University <br>
                    - Silang Campus</b> <i> Library Services Management</i></span>
            <br><br>
            <p>To ensure that everyone has a chance to find a comfortable and quiet place to study or work, we now offer
                seat reservations. By reserving a seat, you can guarantee that you'll have a spot when you arrive at the
                library. Plus, you'll be able to customize your seat to fit your needs - choose a quiet corner, a table
                with outlets, or a spot near a window.</p>


            <div>
                <span><b>Find a seat | </b> Read the guidelines here.</span>
            </div>
            <?php

            include('includes/connection.php');
            date_default_timezone_set('Asia/Manila');
            $today = date('Y-m-d');

            $sql = "SELECT * FROM seats";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);


            foreach ($rows as $row) { ?>
                <div class="seat-cont" id="seats"
>
                    <!-- <div class="close"> -->
                    <button class="accordion" ><?php echo $row['seatName'] ?></button>

                    <!-- </div> -->
                    <div class="panel">
                        <div class="wrap">
                            <div class="preview"> <?php

                                                    if (!empty($row['seatPic'])) {
                                                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['seatPic']) . '"/>';
                                                    } else {
                                                        echo '<img src="assets/defaultSeat.svg">';
                                                    }; ?></div>
                            <div>
                                <p><span>Seat Code: </span><?php echo strtoupper($row['seatCode']) ?></p>
                                <p><span>Description: </span><?php echo $row['seatDes'] ?></p>
                                <br>
                                <form action=" includes/kimmy.php" method="POST">
                                    <?php $code =  $row['seatCode'] ?>
                                    <input type="hidden" name="seat_code" value="<?php echo $code; ?>">
                                    <label for="date">Choose a date:</label><br>
                                    <?php
                                    date_default_timezone_set('Asia/Manila');
                                    $date = date('Y-m-d');
                                    echo "<input type='date' name='date' value='$date'>";
                                    ?>
                                    <br>
                                    <button class="tab-btn" name="backReserve">Check Availability</button>
                            </div>





                            <!-- <label for="time-in">Time in</label>
                                <Select name="time-in">
                                    <option value="8">08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">01</option>
                                    <option value="14">02</option>
                                    <option value="15">03</option>
                                    <option value="16">04</option>
                                    <option value="17">05</option>
                                    <option value="18">06</option>
                                </Select>
                                <label for="time-out">Time in</label>
                                <Select name="time-out">
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">01</option>
                                    <option value="14">02</option>
                                    <option value="15">03</option>
                                    <option value="16">04</option>
                                    <option value="17">05</option>
                                    <option value="18">06</option>
                                    <option value="19">07</option>
                                </Select> -->



                            <?php
                            include("includes/inc.seatData.php");
                            ?>
                            </form>
                        </div>
                    </div>
                </div>
            <?php }
            ?>

        </div>
    </section>

    <script src="" async defer></script>
</body>

</html>