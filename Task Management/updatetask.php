<?php
session_start();

// Check if the user is logged in, if not, redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: admin_login.php");
    exit;
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "t2";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['Updatetask'])) {
    // Get form data
    $task_title = $_POST['tasktitle'];
    $task_description = $_POST['taskdescription'];
    $deadline = $_POST['deadline'];
    $assign_to = $_POST['assignto'];
    $status = $_POST['status'];

    // Update task details in the database
    $sql = "UPDATE tlist SET taskdescription='$task_description', deadline='$deadline', assignto='$assign_to', status='$status' WHERE tasktitle='$task_title'";

    if (mysqli_query($conn, $sql)) {
        // Task updated successfully
        echo "<script>alert('Task updated successfully!');
        window.location.href='managetask.php';</script>";
        exit;
    } else {
        // Error updating task
        $_SESSION['error_message'] = "Error updating task: " . mysqli_error($conn);
        header("Location: managetask.php");
        exit;
    }
}

// Close the connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }
        
        h2 {
            margin-bottom: 20px;
        }
        
        label {
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="date"],
        textarea,
        select,
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
<center>
        <h2>Edit Task</h2>
        <form action="update_task.php" method="post">
            <input type="hidden" name="task_title" value="<?php echo htmlspecialchars($task_title); ?>">
            <label for="task_description">Task Description:</label><br>
            <textarea id="task_description" name="task_description" rows="4" required>
            <?php echo htmlspecialchars($task_description); ?></textarea><br>
            <label for="deadline">Deadline:</label><br>
            <input type="date" id="deadline" name="deadline" value="<?php echo htmlspecialchars($deadline); ?>" required><br>
            <label for="assign_to">Assign To:</label><br>
            <select id="assign_to" name="assign_to" required>
                <option value="">Select User</option>
</center>
                <?php
                // Retrieve registered users' usernames from the database and populate the dropdown
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                $sql = "SELECT name FROM users";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($user_row = mysqli_fetch_assoc($result)) {
                        $selected = ($assign_to == $user_row['name']) ? "selected" : "";
                        echo "<option value='" . htmlspecialchars($user_row['name']) . "' $selected>" . htmlspecialchars($user_row['name']) . "</option>";
                    }
                }
                mysqli_close($conn);
                ?>
            </select><br>
            <label for="status">Status:</label><br>
            <select id="status" name="status" required>
                <option value="pending" <?php if ($status == 'pending') echo "selected"; ?>>Pending</option>
                <option value="in_progress" <?php if ($status == 'in_progress') echo "selected"; ?>>In Progress</option>
                <option value="completed" <?php if ($status == 'completed') echo "selected"; ?>>Completed</option>
            </select><br>
            <input type="submit" name="update_task" value="Update">
        </form>
    </div>
</body>
</html>
