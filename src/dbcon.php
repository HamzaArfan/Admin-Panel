<?php 
           // establishing a connection between phpmyadmin server database
            require __DIR__ . '/../vendor/autoload.php'; 
            $dotenv = Dotenv\Dotenv::createImmutable(__DIR__,'/../vendor/config.env');
            $dotenv->safeLoad();
            $servername ="localhost"; 
            $username = $_ENV['USERNAME'];
            $password = $_ENV['PASSWORD'];
            $database ="adminpanel";
            $conn = mysqli_connect($servername, $username, $password, $database, 8111);
 ?>
