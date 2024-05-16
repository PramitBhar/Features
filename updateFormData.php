<?php

include 'ConnectDb.php';
$conn = new ConnectDb();
$conn->connection();
$bookId = $_POST["book_id"];
$bookTitle = $_POST["book_title"];
$authorName = $_POST["author_name"];
$sql = "UPDATE info SET bookTitle='$bookTitle', authorName='$authorName' WHERE bookTitle='$bookId'";

$output = $conn->updateData($sql);
echo $output;
