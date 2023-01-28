<?php
if (isset($_POST['date'])) {
  $date = $_POST['date'];
  $seatCode = $_POST['seat_code'];
  $slots = array("VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT", "VACANT");

  $dummy = $seatCode;
  $sql = "SELECT * FROM `reservations` WHERE `seat_id` LIKE '$dummy' AND `date` LIKE '$date'";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)){

      $in = $row['start_time']; 
      $out = $row['end_time'];

      $in = inTimeToIndex($in);
      $out = outTimeToIndex($out);

      for ($i = $in; $i <= $out; $i++) {
          $slots[$i] = "RESERVED";
      }

  }

  echo "08:00 - 09:00 AM - " . $slots[0] . "<br> ";
  echo "09:00 - 10:00 AM - " . $slots[1] . "<br> ";
  echo "10:00 - 11:00 AM - " . $slots[2] . "<br> ";
  echo "11:00 - 12:00 AM - " . $slots[3] . "<br> ";
  echo "12:00 - 01:00 PM - " . $slots[4] . "<br> ";
  echo "01:00 - 02:00 PM - " . $slots[5] . "<br> ";
  echo "02:00 - 03:00 PM - " . $slots[6] . "<br> ";
  echo "03:00 - 04:00 PM - " . $slots[7] . "<br> ";
  echo "04:00 - 05:00 PM - " . $slots[8]. "<br> ";
  echo "05:00 - 06:00 PM - " . $slots[9] . "<br> ";
  echo "06:00 - 07:00 PM - " . $slots[10] . "<br> ";
}
?>
