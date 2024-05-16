<?php

include 'ConnectDb.php';

$conn = new ConnectDb();
$conn->connection();

$book_title = $_POST["first_name"];
$author_name = $_POST["last_name"];

$sql = "INSERT INTO info(bookTitle,authorName) values ('$book_title','$author_name')";
$output = $conn->insertData($sql);
echo $output;
