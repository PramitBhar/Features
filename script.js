$(document).ready(function(){
  // $("#load-button").on("click", function(e){

  // })
  function loadTable() {
    $.ajax({
      url : "loadAjax.php",
      type:"POST",
      success:function(data) {
        $("#table-data").html(data);
      }
    });
  }
  // function loadTable(page) {
  //   $.ajax({
  //     url: "loadMorePagination.php",
  //     type: "POST",
  //     data: {page_no: page},
  //     success: function(data) {
  //       $("#table-data").append(data);
  //     }
  //   });
  // }
  loadTable();
  $("#save-btn").on("click",function(e){
    e.preventDefault();
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    $.ajax({
      url: "insertFormData.php",
      type: "POST",
      data:{first_name: fname, last_name: lname},
      success: function(data) {
        if(data == "TRUE") {
          loadTable();
        }
        else {
          alert("Can't Save the data");
        }
      }

    });

  });
  $(document).on("click", ".delete-btn", function(){
    var bookTitle = $(this).data("title");
    $.ajax({
      url: "deleteFormData.php",
      type:"POST",
      data: {book_title: bookTitle},
      success: function(data) {
        if (data=="TRUE") {
          // alert($(this).closest("tr"));
          loadTable();
        }
      }
    });
  });
  $(document).on("click", ".edit-btn", function () {
    $("#modal").show();
    var bookId = $(this).data("title");
    var authorName = $(this).data("auth");
    $("#edit-hidden").val(bookId);
    $("#edit-title").val(bookId);
    $("#edit-authName").val(authorName);
  });
  $("#edit-submit").on("click", function(e) {
    var bookId = $("#edit-hidden").val();
    var bookTitle = $("#edit-title").val();
    var authorName = $("#edit-authName").val();
    $.ajax({
      url: "updateFormData.php",
      type: "POST",
      data: {book_id:bookId ,book_title: bookTitle, author_name: authorName },
      success: function (data) {
        if (data == "TRUE") {
          $("#modal").hide();
          loadTable();
        }
        else {
          alert("Data Updation is unsuccessful");
        }
      }
    });
  });

  $("#close-btn").on("click", function (e) {
    $("#modal").hide();
  });

});
