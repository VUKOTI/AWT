<?php
session_start();

if (isset($_SESSION['student_id']) && isset($_POST['taskTitle'])) {
    $student_id = $_SESSION['student_id'];
    $taskTitle = $_POST['taskTitle'];

    // Your database connection code here
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "t2";
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update task status to Completed
    $sql = "UPDATE tasks SET status = 'Completed' WHERE student_id = '$student_id' AND title = '$taskTitle'";
    if ($conn->query($sql) === TRUE) {
        // Redirect back to user dashboard after completing the task
        header("Location: udash.php");
        exit();
    } else {
        echo "Error updating task status: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request!";
}
?>