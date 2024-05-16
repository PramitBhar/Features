
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Load Data</title>
  <style>
    <?php include 'styles.css'; ?>
  </style>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script src="script.js"></script>
</head>
<body>
  <div class="container">
    <table class="main" border="0" cellspacing="0">
      <tr>
        <td id="header">
          <h1>PHP with Ajax</h1>
        </td>
      </tr>
      <tr>
        <td id="table-input">
          Book Title:<input type="text" id="fname">&nbsp;&nbsp;&nbsp;&nbsp;
          Author Name:<input type="text" id="lname">
          <input type="submit" id="save-btn" value="Save">
        </td>
      </tr>
      <tr>
        <td id="table-load">
        </td>
      </tr>
<tr>
  <table id="table-data" border="1" width="100%" cellspacing="0">
  <tr>
  <th>Book Id</th>
  <th>Title</th>
  <th>Author Name </th>
  </tr>
  </table>
</tr>
    </table>
    <div id="modal">
      <div id="modal-form">
        <h2>Edit Form</h2>
        <table class="edit-table" cellpadding="10px">
          <tr>
            <td>First Name</td>
            <td><input type="text" id="edit-title"></td>
          </tr>
          <tr>
            <td>Last Name</td>
            <td><input type="text" id="edit-authName"></td>
          </tr>
          <tr>
            <td><input type="hidden" id="edit-hidden" value=""></td>
          </tr>
          <tr>
          <tr>
            <td></td>
            <td><input type="submit" id="edit-submit" value="Update"></td>
          </tr>
        </table>
        <div id="close-btn">X</div>
      </div>
    </div>
  </div>
  </body>
  </html>
