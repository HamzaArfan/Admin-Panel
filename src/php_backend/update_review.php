<?php
include 'C:\xampp\htdocs\adminpanel\src\dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reviewId = $_POST['review_id'];
    $userName = $_POST['user_name'];
    $productName = $_POST['product_name'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $getCurrentIdsQuery = "SELECT user_id, product_id FROM reviews WHERE review_id = ?";
    $stmt = $conn->prepare($getCurrentIdsQuery);
    $stmt->bind_param('i', $reviewId);
    $stmt->execute();
    $stmt->bind_result($currentUserId, $currentProductId);
    $stmt->fetch();
    $stmt->close();

    $getUserNameQuery = "SELECT name FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($getUserNameQuery);
    $stmt->bind_param('i', $currentUserId);
    $stmt->execute();
    $stmt->bind_result($currentUserName);
    $stmt->fetch();
    $stmt->close();
    
    $getProductNameQuery = "SELECT name FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($getProductNameQuery);
    $stmt->bind_param('i', $currentProductId);
    $stmt->execute();
    $stmt->bind_result($currentProductName);
    $stmt->fetch();
    $stmt->close();
    
    if ($userName !== $currentUserName) {
        $updateUserNameQuery = "UPDATE users SET name = ? WHERE user_id = ?";
        $stmt = $conn->prepare($updateUserNameQuery);
        $stmt->bind_param('si', $userName, $currentUserId);
        $stmt->execute();
    }

    if ($productName !== $currentProductName) {
        $updateProductNameQuery = "UPDATE products SET name = ? WHERE product_id = ?";
        $stmt = $conn->prepare($updateProductNameQuery);
        $stmt->bind_param('si', $productName, $currentProductId);
        $stmt->execute();
    }

    $userIdQuery = "SELECT user_id FROM users WHERE name = ?";
    $stmt = $conn->prepare($userIdQuery);
    $stmt->bind_param('s', $userName);
    $stmt->execute();
    $stmt->bind_result($userId);
    $stmt->fetch();
    $stmt->close();
    

    $productIdQuery = "SELECT product_id FROM products WHERE name = ?";
    $stmt = $conn->prepare($productIdQuery);
    $stmt->bind_param('s', $productName);
    $stmt->execute();
    $stmt->bind_result($productId);
    $stmt->fetch();
    $stmt->close();



    $updateReviewQuery = "UPDATE reviews 
                          SET user_id = ?, 
                              product_id = ?, 
                              rating = ?, 
                              comment = ? 
                          WHERE review_id = ?";
    $stmt = $conn->prepare($updateReviewQuery);
    $stmt->bind_param('iiisi', $userId, $productId, $rating, $comment, $reviewId);
    $stmt->execute();
    $stmt->close();

    $conn->close();
}
