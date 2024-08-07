<?php
        include "dbcon.php";
        $result = mysqli_query($conn, "SELECT * FROM `reviews`");
        $result2 = mysqli_query($conn,"SELECT * from users where user_id in(SELECT user_id  from   reviews);");
        $result3 = mysqli_query($conn, "SELECT p1.product_id, p1.name, count(r1.review_id) as counts, avg(r1.rating) as ratin_avg from products p1 join reviews r1 on p1.product_id = r1.product_id group by  p1.product_id, p1.name order by ratin_avg desc;");
?>