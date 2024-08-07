<?php 
//establishing a database connection
include('dbcon.php'); 
?> 
<?php 
// setting is_deleted to 1 so delete the user 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "UPDATE `USERS` SET is_deleted = 1 WHERE user_id = '$id'";
    if(mysqli_query($conn, $sql)) {
        header('location:delete.php?delete_msg=Record Deleted Succesfully');
    } else {
        echo "Error marking user as deleted: " . mysqli_error($conn);
    }
} else {
    echo "No user ID specified.";
}
?>
