
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