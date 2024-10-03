
<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ page import="java.sql.*" %>
<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "t2";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Set parameters and execute
    $name = $_POST['name'];
    $stu_id = $_POST['stud_id'];
    $email = $_POST['email'];
    $password = password($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

    // Attempt to execute the SQL query
    $sql = "INSERT INTO det (name, stud_id, email, password) VALUES ('$name', '$stu_id', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        // Registration successful
        $_SESSION['success_message'] = 'Registration successful. You can now login.';
        header("Location: login.php");
        exit();
    } else {
        // Registration failed
        $error = "Error: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
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
            background-image: url('https://i0.wp.com/osu-wams-blogs-uploads.s3.amazonaws.com/blogs.dir/2798/files/2016/11/cropped-banner_simple-2.jpg?fit=512%2C512&ssl=1');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .registration-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 250px;
            margin-top: 50px;
            border: 2px solid #007bff;
        }

        .registration-container h2 {
            margin-bottom: 20px;
            color: #007bff;
            text-align: center;
        }

        .registration-container form {
            width: 100%;
        }

        .registration-container form label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        .registration-container form input[type="text"],
        .registration-container form input[type="email"],
        .registration-container form input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .registration-container form input[type="submit"] {
            width: calc(100% - 20px);
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .registration-container form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .login-link {
            margin-top: 20px;
            text-align: center;
        }

        .login-link p {
            color: #333;
        }

        .login-link a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .login-link button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .login-link button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<div class="registration-container">
    <h2>User Registration</h2>
    <?php if(isset($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="stud_id">Student ID:</label>
        <input type="text" id="stud_id" name="stud_id" required>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" name="register" value="Register">
    </form>
    <div class="login-link">
        <p>Already a user? <a href="login.php">Login now</a></p>
        <br><br>
        <button onclick="location.href='index.php';">Go to Home</button>
    </div>
</div>