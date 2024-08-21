<?php 
include('dbcon.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ckcontent = $_POST['content'];
    $stmt = $conn->prepare("INSERT INTO ckeditorcontent (content) VALUES (?)");
    $stmt->bind_param("s", $ckcontent);
    $stmt->execute();


    $sql = "SELECT content FROM ckeditorcontent ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $latestContent = $row['content'];
    $file = fopen("display_ck_html.html", "w");
    fwrite($file, $latestContent);
    fclose($file);
}
?>
