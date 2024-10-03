<?php
// Check if form is submitted and all required fields are filled
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['taskname']) && isset($_POST['taskdescription']) && isset($_POST['employeename']) && isset($_POST['deadline'])) {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = ""; // Assuming no password is set
    $dbname = "t2";

    // Establish database connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check if connection is successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve form data
    $task_name = $_POST['taskname'];
    $task_description = $_POST['taskdescription'];
    $employee_name = $_POST['employeename'];
    $deadline = $_POST['deadline'];

    // Construct the SQL query with quoted form data
    $task_name = "'" . mysqli_real_escape_string($conn, $task_name) . "'";
    $task_description = "'" . mysqli_real_escape_string($conn, $task_description) . "'";
    $employee_name = "'" . mysqli_real_escape_string($conn, $employee_name) . "'";
    $deadline = "'" . mysqli_real_escape_string($conn, $deadline) . "'";

    // Construct the SQL query
    $sql = "INSERT INTO taskass (taskname, taskdescription, employeename, deadline) VALUES ($task_name, $task_description, $employee_name, $deadline)";

    // Execute the statement
    if (mysqli_query($conn, $sql)) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);

    // Redirect to prevent form resubmission
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Assignment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            color: #007bff;
        }

        form {
            margin-top: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: calc(100% - 22px); /* Adjusting for padding and border */
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
            resize: vertical; /* Allowing vertical resizing */
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Task Assignment</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="taskname">Task Name:</label>
            <input type="text" id="taskname" name="taskname" required>

            <label for="taskdescription">Task Description:</label>
            <textarea id="taskdescription" name="taskdescription" rows="4" required></textarea>

            <label for="employeename">Employee Name:</label>
            <input type="text" id="employeename" name="employeename" required>

            <label for="deadline">Deadline:</label>
            <input type="date" id="deadline" name="deadline" required>

            <input type="submit" value="Assign Task">
        </form>
    </div>
</body>
</html>
