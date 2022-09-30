<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Operations</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="box">

        <div class="heading">
            <h1>Task List</h1>
        </div>

        <div class="add-task">
            <form id="addForm">
                <div class="task-name">Task Name: <input type="text" id="task-name" placeholder="Enter your task name" required></div>
                <div class="task-detail">Task Details: <input type="text" id="task-detail" placeholder="Enter your task details" required></div>
                <div class="submit"><input type="submit" id="save-button" value="Save" required></div> 
            </form>
        </div>

        <div class="task-list" id="task-list"></div>

        <div id="error-message"></div>
        <div id="success-message"></div>

    </div>
    
    <div id="modal">
        <div id="modal-form">
            <div id="edit-form"></div>
            <div id="close-btn">X</div>
        </div>
    </div> 

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
</body>
</html>