<?php
//establishing a connection with database
include('dbcon.php');
// taking the input from the form and then adding the user into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name =  $_POST['userName'];
    $email = $_POST['userEmail'];
    $password = $_POST['userPassword'];
    $phone = $_POST['userPhone'];
    $address = $_POST['userAddress'];
    $city = $_POST['userCity'];
    $state =$_POST['userState'];
    $zip = $_POST['userZip'];
    echo $name , $email , $password , $phone, $address;
    $sql = "INSERT INTO Users (name, email, password, phone, address, city, state, zip, is_deleted) VALUES ('$name', '$email', '$password', '$phone', '$address', '$city', '$state', '$zip', 0)";
    if (mysqli_query($conn, $sql)) {
        echo "New user added successfully!";
        header('location:users.php?');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    exit();
}
?>
