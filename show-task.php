<?php

$conn = mysqli_connect("localhost","root", "", "todolist") or die("Connection Failed");

$sql = "SELECT * FROM task";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        $res_len = strlen($row["task_details"]);
        $res_detail = $row["task_details"];
        if($res_len > 50)
        {
            $res_detail = substr($row["task_details"], 0, 100) . "....";
        }
        $output .= "<div class='task'>
                        <div class='task-head'>
                            <h3>{$row["task_name"]}</h3>
                            <p>{$row["task_time"]}</p>
                        </div>
                        <p>{$res_detail}</p>
                        <span>
                            <button class='edit-btn' data-id='{$row["task_id"]}'>Edit</button>
                            <button class='delete-btn' data-id='{$row["task_id"]}'>Delete</button>
                            <button class='detail-btn' data-id='{$row["task_id"]}'>Details</button>
                        </span>
                    </div>";
    }
    mysqli_close($conn);
    echo $output;
}
else
{
    echo "<h4>No Data Available.....</h4>";
}
?>