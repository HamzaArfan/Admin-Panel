<?php
      include "dbcon.php";
      //loading the whole table into result
      $result = mysqli_query($conn, "SELECT * FROM `USERS`");
?>