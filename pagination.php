<?php

include 'ConnectDb.php';
$conn = new ConnectDb();
$conn->connection();
$limit = 1;
if (isset($_POST['page_no'])) {
  $page = (int)$_POST['page_no'];
}
else {
  $page = 0;
}
$sql = "SELECT * FROM info LIMIT {$page},$limit";

$result = $conn->fetchLimitData($sql);

if (sizeof($result)>0) {
  $output = "";
  $output .= "<tbody>";
  $last = 0;
  for ($i = 0; $i < sizeof($result); $i++) {
    $output.= "<tr><td>{$result[$i]["bookTitle"]}</td><td>{$result[$i]["authorName"]}</td></tr>";
    $last = $result[$i]["bookID"];
  }
  $output.="</tbody>
  <tbody id='pagination'>
<tr>
  <td colspan='2'>
<button id='ajax-btn' data-id='{$last}'>Load More</button>
  </td>
</tr>
</tbody>";

  echo $output;
}
else {
  echo "";
}
