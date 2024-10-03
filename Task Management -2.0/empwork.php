<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        .header {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            font-size: 24px;
            width: 100%;
            box-sizing: border-box;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            margin-top: 20px;
        }

        .user-details {
            margin-bottom: 20px;
        }

        .user-details p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="header">
        Welcome, <?php echo $loggedInEmployee; ?>
    </div>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Sno</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Deadline</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Retrieve all tasks from the taskass table
                $sql_tasks = "SELECT * FROM taskass";
                $result_tasks = mysqli_query($conn, $sql_tasks);
                $serialNumber = 1;
                while ($row_task = mysqli_fetch_assoc($result_tasks)) {
                    // Output the data from each row
                    echo "<tr>";
                    echo "<td>" . $serialNumber . "</td>";
                    echo "<td>" . $row_task['taskname'] . "</td>"; // Change to the correct column name
                    echo "<td>" . $row_task['taskdescription'] . "</td>"; // Change to the correct column name
                    echo "<td>" . $row_task['deadline'] . "</td>"; // Change to the correct column name
                    echo "<td>" . $row_task['status'] . "</td>"; // Change to the correct column name
                    echo "<td class='action-links'>
                            <a href='update_status.php? taskname=" . $row_task['taskname'] ."'>Update Status</a>
                        </td>";
                    echo "</tr>";
                    $serialNumber++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
