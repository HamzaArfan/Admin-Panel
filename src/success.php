<?php
session_start();
//Making a db connection with my database
require './../vendor/autoload.php'; 
include ('dbcon.php'); 
$stripe = new \Stripe\StripeClient('sk_test_51O3jNGIbqeLn3gxd7dQxrxbzD8HzFwWEig6d88bKCcWSQLfRXzsx0XQHdWOhaKIuMpvXcJhWwA2lf5LGvqnXwTuk00I6ttWKdo');

if (!isset($_GET['session_id'])) {
    header('Location: products_shop.php');
    exit();
}
//fethching the session data so that we can remove the products bought from the database if the stipe client return status paid 
$session_id = $_GET['session_id'];
$checkout_session = $stripe->checkout->sessions->retrieve($session_id, []);
if ($checkout_session->payment_status == 'paid') {
//for each product id that was bought updating the quantity of it in the database    
    foreach ($_SESSION['cart'] as $item) {
        $product_id = $item['id']; 
        $quantity_purchased = $item['quantity']; 
        $query = "UPDATE products SET stock = stock - $quantity_purchased WHERE product_id = $product_id";
        $conn->query($query);
    }
}
//ending the session after the payment is complete and person is redirected back to products shoping page so that he can buy new stuff
    session_unset();
    session_destroy();
    header('Location: products_shop.php');
    exit();
?>
