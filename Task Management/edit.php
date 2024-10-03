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

    <?php
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root"; // your MySQL username
    $password = ""; // your MySQL password
    $dbname = "t2";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update task details
    $task_title = $_POST['tasktitle'];
    $task_description = $_POST['taskdescription'];
    $employee_name = isset($_POST['employeename']) ? $_POST['employeename'] : ''; 
    $deadline = $_POST['deadline'];

    // Update the SQL query to use the correct column names
    $sql = "UPDATE taskass SET taskdescription='$task_description', employeename='$employee_name', deadline='$deadline' WHERE tasktitle='$task_title'";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Task updated successfully</p>";
    } else {
        echo "<p>Error updating task: " . $conn->error . "</p>";
    }

    $conn->close();
}
?>
</body>
</html>
