<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $productimage = $_POST['productimage']; 

    $product = [
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'quantity' => 1,
        'image' => $productimage,
    ];

    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
        $found = false;
        foreach ($cart as &$item) {
            if ($item['id'] == $product_id) {
                $item['quantity'] += 1;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $_SESSION['cart'][] = $product;
        } else {
            $_SESSION['cart'] = $cart;
        }
    } else {
        $_SESSION['cart'] = [$product];
    }
}
header('location:products_shop.php');
exit();
?>
