<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <style>
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Task</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="task_title">Task Title:</label>
            <input type="text" id="tasktitle" name="tasktitle" required><br><br>
           
            <label for="task_description">Task Description:</label>
            <textarea id="taskdescription" name="taskdescription" required></textarea><br><br>
            
            <label for="employee_name">Employee Name:</label>
            <input type="text" id="employeename" name="employeename" required><br><br>
            
            <label for="deadline">Deadline:</label>
            <input type="date" id="deadline" name="deadline" required><br><br>
            
            <input type="submit" value="Update Task">
        </form>
    </div>

   </body>
</html>
