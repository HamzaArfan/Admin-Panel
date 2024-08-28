<?php
// We are making a connection with our database 
include('dbcon.php');
// We are here to get the recently added item in our database and we are displaying it on the screen.
$query = "SELECT * FROM ckeditorplus ORDER BY id DESC LIMIT 1";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latest Item</title>
    <!-- Adding CSS for card to display properly -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap');

        body {
            font-family: 'Lato', sans-serif;
            background-color: #f7f7f7;
            padding: 20px;
        }

        .container {
            max-width: 560px;
            margin: 0 auto;
            background: #fff;
            padding: 15px; 
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .item-card {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            width: 600px;
        }

        .item-details {
            flex: 1;
        }

        .item-card h1 {
            font-size: 22px; 
            color: #333;
            margin-bottom: 8px;
        }

        .item-card p {
            font-size: 15px; 
            color: #555;
            margin: 0;
        }

        .item-card .price {
            font-size: 18px; 
            color: black;
            font-weight: bold;
            margin-top: 8px;
        }

        .item-card .description {
            margin-top: 8px;
            line-height: 1.5;
            color: black;
        }

        .item-card img {
            max-width: 250px; 
            height: auto;
            border-radius: 8px;
            object-fit: cover;
        }
        .spanprice{
            color: black !important; 
            font-weight: normal  !important;
            font-size:medium;

        }
    </style>
</head>
<body>

<div class="container">
    <?php
    if ($result->num_rows > 0) {
        // Fetching the details in row which was extracted from the database.
        $row = $result->fetch_assoc();
        // We are stripping the tags of the HTML so we can add our tags with our own CSS.
        $heading = strip_tags($row['heading']);
        $image = $row['image'];
        $description = strip_tags($row['description']);
        $price = strip_tags($row['price']);
        // Displaying the data with the newly added CSS
        echo '<div class="item-card">';
        echo '<div class="item-details">';
        echo '<h1>' . ($heading) . '</h1>';
        echo '<p class="price">Price: <span class="spanprice"> $' . ($price) . ' </span></p>';
        echo '<p class="price">Description: <span class="spanprice"> ' . ($description) . ' </span></p>';
        echo '</div>';
        echo  ($image) ;
        echo '</div>';
    }
    ?>
</div>

</body>
</html>
