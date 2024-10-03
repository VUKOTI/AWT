<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <style>
     body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.header h2 {
    margin: 0;
    font-size: 24px;
    color: #333;
}

.logout-btn {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.logout-btn:hover {
    background-color: #0056b3;
}

.create-task-btn {
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.create-task-btn:hover {
    background-color: #218838;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    color: #333;
}

td {
    font-size: 14px;
    color: #666;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Admin Dashboard</h2>
            <button class="logout-btn" onclick="logout()">Logout</button>
        </div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <button  formaction="Createtask.php" class="btn">Create Task </button>
        </form>
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

    <script>
        function logout() {
            window.location.href = "logout.php";
        }
    </script>
</body>
</html>
