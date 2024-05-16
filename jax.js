$(document).ready(function(){
  function loadTable(page) {
    $.ajax({
      url:"pagination.php",
      type:"POST",
      data:{page_no : page},
      success: function(data){
        if (data){
          $("#pagination").remove();
          $("#loadData").append(data);
        }
        else {
          $("#pagination").remove();
        }
      }
    })
  }
  $(document).on("click","#ajax-btn", function(){
   var pid = $(this).data("id");
   loadTable(pid);
  })
  loadTable();
});
