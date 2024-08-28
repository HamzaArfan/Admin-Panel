<?php 
//Makiing a connection wiith our database
include('dbcon.php');
//Checkiing if the request made to our server was a POST Request
if($_SERVER['REQUEST_METHOD']=='POST')
{
//Fetchng data from post request    
$heading=$_POST['content1'];
$image =$_POST['content2'];
$description=$_POST['content3'];
$price=$_POST['content4'];
$stmt = $conn->prepare("INSERT INTO ckeditorplus (heading,image,description,price) VALUES (?,?,?,?)");
$stmt->bind_param("ssss", $heading,$image,$description,$price);
$stmt->execute();

}
else{
    echo "failed";
}

?>
