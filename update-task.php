<?php

$task_id = $_POST["task_id"];
$task_name = $_POST["task_name"];
$task_details = $_POST["task_details"];

$conn = mysqli_connect("localhost","root","","todolist") or die("Connection Failed");

$sql = "UPDATE task SET task_name = '{$task_name}',task_details = '{$task_details}' WHERE task_id = '{$task_id}'";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}
?>