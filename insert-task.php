<?php

$task_name = $_POST["task_name"];
$task_details = $_POST["task_details"];
$task_time = $_POST["task_time"];

$conn = mysqli_connect("localhost","root","","todolist") or die("Connection Failed");

$sql = "INSERT INTO task(task_name, task_details, task_time) VALUES ('{$task_name}','{$task_details}', '{$task_time}')";

if(mysqli_query($conn, $sql))
{
  echo 1;
}
else
{
  echo 0;
}
?>