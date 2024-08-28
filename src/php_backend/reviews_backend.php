<?php
        include "dbcon.php";
        $result = mysqli_query($conn, "SELECT review_id,u1.name,p1.name as pname ,r1.rating,r1.comment,r1.created_at FROM `reviews` as r1 JOIN users as u1 on u1.user_id=r1.user_id JOIN products as p1 on p1.product_id=r1.product_id;");
        $result2 = mysqli_query($conn,"SELECT * from users where user_id in(SELECT user_id  from   reviews);");
        $result3 = mysqli_query($conn, "SELECT p1.product_id, p1.name, count(r1.review_id) as counts, avg(r1.rating) as ratin_avg from products p1 join reviews r1 on p1.product_id = r1.product_id group by  p1.product_id, p1.name order by ratin_avg desc;");
?>