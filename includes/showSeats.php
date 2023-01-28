<?php

include('includes/connection.php');


$sql = "SELECT * FROM seats";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);


foreach ($rows as $row) { ?>
    <div class="seat-cont">
        <!-- <div class="close"> -->
        <button class="accordion"><?php echo $row['seatName'] ?></button>

        <!-- </div> -->
        <div class="panel">
            <div class="wrap">
                <div>
                    <p><span>Seat Code: </span><?php echo strtoupper($row['seatCode']) ?></p>
                    <p><span>Description: </span><?php echo $row['seatDes'] ?></p>
                </div>
                <form action="includes/checkSeatSchedule.php" method="POST">
                    <?php $code =  $row['seatCode'] ?>
                    <input type="hidden" name="seat_code" value="<?php echo $code; ?>">
                    <input type="date" name="date" value="" placeholder="Date">
                    <label for="time-in">Time in</label>
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
                    </Select>

                    <button class="tab-btn" name="checkAvailable">Check Availability</button>
                    <button class="tab-btn" name="add">Add</button>
                </form>
            </div>
        </div>
    </div>
<?php }
?>