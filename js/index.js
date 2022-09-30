$(document).ready(function()
{
    function GetTableData()
    {
      $.ajax({
        url : "show-task.php",
        type : "POST",
        success : function(data){
          $("#task-list").html(data);
        }
      });
    }
    GetTableData(); 

    $("#save-button").on("click",function(e)
    {
      e.preventDefault();
      var task_name = $("#task-name").val();
      var task_details = $("#task-detail").val();
      var date = new Date();
	  var current_date = date.getFullYear()+"-"+(date.getMonth()+1)+"-"+ date.getDate();
    
      if(task_name == "")
      {
        $("#error-message").html("Please fill the task details properly.").slideDown();
        $("#success-message").slideUp();
      }
      else if(task_details == "")
      {
        $("#error-message").html("Please fill the task details properly.").slideDown();
        $("#success-message").slideUp();
      }
      else
      {
        $.ajax({
            url: "insert-task.php",
            type : "POST",
            data : {task_name:task_name, task_details:task_details, task_time:current_date},
            success : function(data)
            {
              if(data == 1)
              {
                GetTableData();
                $("#addForm").trigger("reset");
                $("#success-message").html("Task has been inserted successfully.").slideDown();
                $("#error-message").slideUp();
              }
              else
              {
                $("#error-message").html("Can't save this task.").slideDown();
                $("#success-message").slideUp();
              }
            }
          });
      }
    });

    $(document).on("click",".delete-btn", function(){
      if(confirm("Do you really want to delete this task ?")){
        var taskId = $(this).data("id");
        var element = this;

        $.ajax({
          url: "delete-task.php",
          type : "POST",
          data : {id : taskId},
          success : function(data){
              if(data == 1){
                 $("#success-message").html("Task has been deleted successfully.").slideDown();
                    $("#error-message").slideUp();
                    GetTableData();
              }else{
                $("#error-message").html("Can't delete this task.").slideDown();
                $("#success-message").slideUp();
              }
          }
        });
      }
    });

    $(document).on("click",".edit-btn", function(){
      $("#modal").show();
      var task_id = $(this).data("id");

      $.ajax({
        url: "update-task-form.php",
        type: "POST",
        data: {id: task_id },
        success: function(data) {
          $("#edit-form").html(data);
        }
      })
    });

    $(document).on("click",".detail-btn", function(){
      $("#modal").show();
      var task_id = $(this).data("id");

      $.ajax({
        url: "detail-task.php",
        type: "POST",
        data: {id: task_id },
        success: function(data) {
          $("#edit-form").html(data);
        }
      })
    });


    $("#close-btn").on("click",function(){
      $("#modal").hide();
    });

      $(document).on("click","#edit-submit", function(){
        var task_id = $("#edit-id").val();
        var task_name = $("#edit-task-name").val();
        var task_details = $("#edit-task-detail").val();

        $.ajax({
          url: "update-task.php",
          type : "POST",
          data : {task_id: task_id, task_name: task_name, task_details:task_details},
          success: function(data) {
            if(data == 1){
              GetTableData(); 
              $("#modal").hide();
              $("#success-message").html("Task has been updated successfully.").slideDown();
                $("#error-message").slideUp();
              
            }
            else
            {
              $("#modal").hide();
              $("#error-message").html("Can't update this task.").slideDown();
                $("#success-message").slideUp();
            }
          }
        })
      });

   

});