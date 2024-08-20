<?php
session_start();
include 'php_backend/products_backend.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <title>Shop</title>
</head>
<style>
    .btn-logout{
        background-color:#403e92;
        border-color: #403e92;
    }
    
    .pill-color{
        background-color: #403e92;
        color: white;
    }
    .cart-button{
        background-color: #403e92;
        color: white;
        border-color: #403e92;
    }
    .cart-button:hover{
        background-color: black;
        color: white;
        border-color: black;
    }
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="assets/images/logo.svg" class="me-2" alt="logo" height="80px" width="180px"/>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Admin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="checkout.php">
                    <span class="badge badge-pill pill-color">
                        <!--Whenever we click on this button it open the cart if the cart is not empty -->
                        <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>
                    </span>
                </a>
            </li>
            <button class="btn btn-danger btn-logout">Logout</button>
        </ul>
    </div>
</nav>

<div style="display: flex; flex-wrap: wrap; margin: 100px; gap: 20px;" class="justify-content-center">
<!-- Usinf  a while loop we display all the products present in our datatbase untill we find all the products-->
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="height d-flex justify-content-center align-items-center" style="width: 30%;">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div class="mt-2">
                    <!-- Here we are displaying the name of the products-->
                    <h4 class="text-uppercase"><?php echo $row["name"]; ?></h4>
                    <!-- Displaying the images by fetchin their paths in the database -->
                    <img src="<?php echo $row['image_paths']; ?>" alt="<?php echo $row['name']; ?>" style="width:100%; height:200px; margin-top:10px;">
                    <div class="mt-5">
                        <span class="text-uppercase mb-0"> Category: <?php echo $row["category"]; ?></span>
                        <div class="d-flex flex-row user-ratings">
                            <div class="ratings">
                                <span>Price: $<?php echo $row["price"]; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-2 mb-2">
                <span>Stock: <?php echo $row["stock"]; ?></span>
            </div>
              <!-- Whenever the add to cart button is click the data gets sent to the add_to_cart.php page as post request and the things are added to the cart-->
            <p><?php echo $row["description"]; ?></p>
            <form method="post" action="add_to_cart.php">
                <input type="hidden" name="productimage" value="<?php echo $row['image_paths'] ?>"> 
                <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
                <button type="submit" class="btn btn-danger cart-button">Add to cart</button>
            </form>
    </div>
    </div>
    <?php } ?>
</div>
</body>
</html>
