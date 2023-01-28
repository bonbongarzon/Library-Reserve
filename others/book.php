<?php

include('../includes/showAvailability.php');

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
    <title>Book Sample</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>


    <form method="POST" action="../includes/showAvailability.php">
        <input type="text" name="userID" value="" placeholder="User ID">
        <input type="text" name="seatNo" value="" placeholder="Seat No.">
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
        <button type="submit" name="try">Book</button>
        <button type="submit" name="try">Book</button>

    </form>

    <div>
        <?php include('../includes/showAvail.php') ?>
    </div>


    <script src="" async defer></script>
</body>

</html>