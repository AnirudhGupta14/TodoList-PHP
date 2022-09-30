<?php

$task_id = $_POST["id"];

$conn = mysqli_connect("localhost","root","","todolist") or die("Connection Failed");

$sql = "DELETE FROM task WHERE task_id = {$task_id}";

if(mysqli_query($conn, $sql))
{
  echo 1;
}
else
{
  echo 0;
}

?>