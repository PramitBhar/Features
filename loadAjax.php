<?php
 include 'ConnectDb.php';

 $conn = new ConnectDb();
 $conn->connection();
 $result = $conn->fetchData();
if (sizeof($result)>0) {

  $output ='<table border="1" width="100%" cellspacing="0" cellpadding="10px"
  <tr>
  <th>Title</th>
  <th>Author Name </th>
  <th>Edit</th>
  <th>Delete</th>
  </tr>';
  for ($i = 0; $i < sizeof($result); $i++) {
    $output.= "<tr><td>{$result[$i]["bookTitle"]}</td><td>{$result[$i]["authorName"]}</td><td><button class='edit-btn' data-title='{$result[$i]["bookTitle"]}' data-auth='{$result[$i]["authorName"]}'>Edit</button></td><td><button class='delete-btn' data-title='{$result[$i]["bookTitle"]}'>Delete</button></td></tr>";
  }
  $output.="</table>";
  echo $output;
}
else {
  echo "<h2>No records found!</h2>";
}
