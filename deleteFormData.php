<?php
include 'ConnectDb.php';
$conn = new ConnectDb();
$conn->connection();
$bookTitle = $_POST["book_title"];

$sql = "DELETE FROM info where bookTitle = '$bookTitle'";
$output = $conn->deleteData($sql);
echo $output;
