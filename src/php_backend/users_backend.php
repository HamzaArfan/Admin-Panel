<?php include 'nav.html'; ?>
        <?php
        include "dbcon.php";
        $result = mysqli_query($conn, "SELECT * FROM `USERS`");
        $result1 = mysqli_query(
            $conn,
            "SELECT user_id ,is_deleted ,name,password, address FROM users WHERE user_id NOT IN ( SELECT user_id FROM orders )"
        );
        $result2 = $conn->query(
            "SELECT u1.user_id, u1.name,is_deleted, MAX(o1.created_at) as datecreated FROM users u1 JOIN orders o1 ON u1.user_id = o1.user_id GROUP BY u1.user_id, u1.name"
        );
        $result3 = $conn->query(
            "SELECT o1.user_id, u1.name , u1.is_deleted from orders o1 join orderitems o2 on o1.order_id = o2.order_id join users u1 on o1.user_id = u1.user_id group by o1.user_id, u1.name having count(distinct o2.product_id) > 1"
        );
?>