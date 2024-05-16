<?php
include "ConnectDb.php";
$conn = new ConnectDb();
$conn->connection();
$limit = 2;
if (isset($_POST['page_no'])) {
  $page =$_POST['page_no'];
}
else {
  $page = 0;
}

$sql = "SELECT * FROM info LIMIT '$page', '$limit'";
$output = $conn->fetchLimitData($sql);

if (sizeof($output) > 0) {
  $res="";
  $res.="<tbody>";
  for ($i=0; $i<sizeof($output); $i++) {
    $res.="<tr><td align='centre'>{$output[$i]["bookId"]}</td><td>{$output[$i]["bookTitle"]}</td><td>{$output[$i]["authorName"]}</td></tr>";
  }
  $res.="</tbody>
          <tbody id='pagination'>
          <tr>
          <td colspan='2'>
          <button id='ajaxbtn' data-id=''>Load More </button>
          </td>
          </tr>
          </tbody>";
  echo $res;
}
