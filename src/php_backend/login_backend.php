<?php 
session_start();
include 'C:\xampp\htdocs\adminpanel\src\dbcon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM `adminusers` WHERE username = '$username' AND password = '$password'");

    if ($result && mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        echo json_encode(['status' => 'success', 'username' => $username]);
    } else {
        echo json_encode(['status' => 'failure']);
    }
}
?>
