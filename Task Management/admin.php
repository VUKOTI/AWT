<?php
session_start();

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


if(isset($_POST['login'])) { 
    $username = $_POST['username'];
    $password = $_POST['password'];

 
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        echo "<script>alert('Request Granted');</script>";
        echo "<script>window.location.assign('Adminwork.php');</script>";
        exit;
    } else {
        $error = "Invalid username or password";
        echo "<script>window.location.assign('admin.php');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f7f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('https://i0.wp.com/osu-wams-blogs-uploads.s3.amazonaws.com/blogs.dir/2798/files/2016/11/cropped-banner_simple-2.jpg?fit=512%2C512&ssl=1');
            height: 100vh;
        }

        .login-container {
            background-color: #f8f7f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            color: #007bff;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
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
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            margin-top: 10px;
            text-align: center;
        }

        /* Styling for "Go to Home" button */
        .go-home-btn {
            margin-top: 20px;
            text-align: center;
        }

        .go-home-btn button {
            background-color: #d9534f;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .go-home-btn button:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <?php if(isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
        <form method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" name="login" value="Login">
        </form>
        <div class="go-home-btn">
            <button onclick="location.href='index.php';">Go to Home</button>
        </div>
    </div>
</body>
</html>
