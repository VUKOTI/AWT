<?php
session_start();

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "venky";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to create a new task
function createTask($conn, $title, $student_id, $description, $deadline, $status)
{
    $sql = "INSERT INTO tasks (title, student_id, description, deadline, status) 
            VALUES ('$title', '$student_id', '$description', '$deadline', '$status')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New task created successfully');</script>";
        echo "<script>window.location.href = 'adash.php';</script>"; // Redirect to adash.php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Check if the form is submitted to create a new task
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $student_id = $_POST['student_id'];
    $description = $_POST['description'];
    $deadline = $_POST['deadline'];
    $status = "Pending"; // Set status to "Pending" for new tasks

    createTask($conn, $title, $student_id, $description, $deadline, $status);
}

// Query to fetch all tasks
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
$tasks = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $tasks[] = $row;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
   
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Admin Dashboard</h2>
            <button class="logout-btn" onclick="logout()">Logout</button>
        </div>
        <div class="dashboard-content">
            <button class="create-task-btn" onclick="createTask()">Create Task</button> 
            <h3>Task Details</h3>
            <table>
                <tr>
                    <th>Title</th>
                    <th>Student ID</th>
                    <th>Description</th>
                    <th>Deadline</th>
                    <th>Status</th>
                </tr>
                <?php
                foreach ($tasks as $task) {
                    echo "<tr>";
                    echo "<td>" . $task['title'] . "</td>";
                    echo "<td>" . $task['student_id'] . "</td>"; // Display student_id
                    echo "<td>" . $task['description'] . "</td>";
                    echo "<td>" . $task['deadline'] . "</td>";
                    echo "<td>" . $task['status'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <script>
        function logout() {
            window.location.href = "adlogin.php";
        }

        function createTask() {
            window.location.href = "taskmain.php";   
        }
    </script>
</body>
</html>