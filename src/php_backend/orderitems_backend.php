<?php
        include "dbcon.php";
        $result = mysqli_query($conn, "SELECT * FROM `orderitems`");
        $result1 = mysqli_query(
            $conn,
            "SELECT o1.product_id , sum(o1.quantity) as quantitys  from orderitems as o1 join orderitems as o2 ON o1.product_id =o2.product_id group by product_id ;"
        );
?>