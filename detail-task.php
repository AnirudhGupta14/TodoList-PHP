<?php

$task_id = $_POST["id"];

$conn = mysqli_connect("localhost","root","","todolist") or die("Connection Failed");

$sql = "SELECT * FROM task WHERE task_id = {$task_id}";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";

if(mysqli_num_rows($result) > 0 )
{

  while($row = mysqli_fetch_assoc($result)){

    $output .= "<div class='task'>
                  <div class='task-head'>
                    <h3>{$row["task_name"]}</h3>
                    <p>{$row["task_time"]}</p>
                  </div>
                  <p>{$row["task_details"]}</p>
                </div>";
    }

    mysqli_close($conn);
    echo $output;
}
else
{
    echo "<h2>No Record Found.</h2>";
}

?>