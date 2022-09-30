<?php

$task_id = $_POST["id"];

$conn = mysqli_connect("localhost","root","","todolist") or die("Connection Failed");

$sql = "SELECT * FROM task WHERE task_id = {$task_id}";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";

if(mysqli_num_rows($result) > 0 )
{

  while($row = mysqli_fetch_assoc($result)){

    $output .= "<div class='task-name'>Task Name: <input type='text' id='edit-task-name' value='{$row["task_name"]}'></div>
                <div class='task-detail'>Task Details: <input type='text' id='edit-task-detail' value='{$row["task_details"]}'></div>
                <div class='temp'><input type='text' id='edit-id' value='{$row["task_id"]}' hidden></div>
                <div class='submit'><input type='submit' id='edit-submit' value='Save Changes'></div>";
    }

    mysqli_close($conn);
    echo $output;
}
else
{
    echo "<h2>No Record Found.</h2>";
}

?>