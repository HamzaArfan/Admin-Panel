<?php
    include "dbcon.php";
    $sql = "SELECT * FROM `orders`";
    $result = mysqli_query($conn, $sql);
    $sql1 =
        "SELECT u1.user_id, u1.name, u1.email, COUNT(o1.order_id) as ordercount, SUM(o1.total) as ordersum FROM users AS u1 JOIN orders AS o1 ON u1.user_id = o1.user_id GROUP BY u1.user_id, u1.name, u1.email";
    $result1 = mysqli_query($conn, $sql1);
    $sql3 =
        "SELECT u1.user_id, u1.name, avg(o1.total) as totals from users u1 join orders o1 on u1.user_id = o1.user_id group by u1.user_id, u1.name";
    $result2 = mysqli_query($conn, $sql3);
?> 