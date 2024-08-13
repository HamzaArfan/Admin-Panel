<?php
        include "dbcon.php";
        $result = mysqli_query($conn, "SELECT * FROM `products`");
        $result2 = mysqli_query($conn,"SELECT * FROM products WHERE product_id IN (SELECT r1.product_id FROM reviews AS r1 JOIN reviews AS r2 ON r1.product_id = r2.product_id GROUP BY r1.product_id HAVING AVG(r2.rating) > 4)");
        $result3 = mysqli_query($conn,"SELECT p1.category, sum(o2.total) as totalsum from  products p1 join orderitems o1 on p1.product_id = o1.product_id join  orders o2 on o1.order_id = o2.order_id group by  p1.category" );
?>