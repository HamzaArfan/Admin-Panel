<?php 
                                include('dbcon.php'); 
                                if (isset($_GET['id'])) {
                                    $user_id = $_GET['id'];
                                    $result = mysqli_query($conn,"SELECT * FROM `USERS` WHERE `user_id` = $user_id");
                                    $user = mysqli_fetch_assoc($result);
                                } 
                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                    $name = $_POST['userName'];
                                    $email = $_POST['userEmail'];
                                    $password = $_POST['userPassword'];
                                    $phone = $_POST['userPhone'];
                                    $address = $_POST['userAddress'];
                                    $city = $_POST['userCity'];
                                    $state = $_POST['userState'];
                                    $zip = $_POST['userZip'];
                                    if (mysqli_query($conn, "UPDATE `USERS` SET `name`='$name', `email`='$email', `password`='$password', 
                                                   `phone`='$phone', `address`='$address', `city`='$city', `state`='$state', `zip`='$zip' 
                                                   WHERE `user_id`=$user_id")) {
                                        header("Location: users.php"); 
                                        exit;
                                    } else {
                                        echo "Error updating record: " . mysqli_error($conn);
                                    }
                                }
                                ?>