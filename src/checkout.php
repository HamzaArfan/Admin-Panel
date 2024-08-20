<?php
session_start();
require './../vendor/autoload.php'; 

$stripe = new \Stripe\StripeClient('sk_test_51O3jNGIbqeLn3gxd7dQxrxbzD8HzFwWEig6d88bKCcWSQLfRXzsx0XQHdWOhaKIuMpvXcJhWwA2lf5LGvqnXwTuk00I6ttWKdo');

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header('Location: products_shop.php');
    exit();
}
$line_items = [];
foreach ($_SESSION['cart'] as $item) {
    $line_items[] = [
        'price_data' => [
            'currency' => 'usd',
            'product_data' => [
                'name' => $item['name'],
                'images' =>['https://picsum.photos/280/320?random=4']
            ],
            'unit_amount' => $item['price'] * 100, 
        ],
        'quantity' => $item['quantity'],
    ];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $checkout_session = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => 'http://localhost/adminpanel/src/success.php?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => 'https://example.com/cancel.php',
        ]);
        header("Location: " . $checkout_session->url);
        exit();

    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Checkout</title>
</head>
<body>
<div class="container mt-5">
    <h2>Checkout</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            foreach ($_SESSION['cart'] as $item) {
                $item_total = $item['price'] * $item['quantity'];
                $total += $item_total;
                ?>
                <tr>
                    <td><img src="<?php echo htmlspecialchars($item['image']); ?>" height="70px" width="70px" alt=""></td>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td>$<?php echo number_format($item['price'], 2); ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td>$<?php echo number_format($item_total, 2); ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="4" class="text-right"><strong>Grand Total:</strong></td>
                <td><strong>$<?php echo number_format($total, 2); ?></strong></td>
            </tr>
        </tbody>
    </table>
    <h4>Enter Your Details</h4>
    <form method="post" action="">
        <div class="form-group">
            <label for="customer_name">Name:</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" required>
        </div>
        <div class="form-group">
            <label for="customer_email">Email:</label>
            <input type="email" class="form-control" id="customer_email" name="customer_email" required>
        </div>
        <div class="form-group">
            <label for="customer_address">Address:</label>
            <textarea class="form-control" id="customer_address" name="customer_address" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Proceed to Payment</button>
    </form>
</div>
</body>
</html>
