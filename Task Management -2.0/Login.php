<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="style1.css">
  <style>
    * {
      margin: 0;
      padding: 0; 
      box-sizing: border-box;
    }
    
    body {
      min-height: 100vh;
      background: #373d45;
      display: flex;
      justify-content: center; /* Center horizontally */
      align-items: center; /* Center vertically */
    }
    
    .login-container {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    .login-container h2 {
      text-align: center;
    }
    
    .login-container form {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    
    .login-container label {
      margin-bottom: 5px;
    }
    
    .login-container input {
      margin-bottom: 10px;
      padding: 8px;
      width: 200px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }
    
    .login-container input[type="submit"] {
      background: #007bff;
      color: #fff;
      cursor: pointer;
    }
    
    .login-container .error {
      color: red;
      text-align: center;
      margin-bottom: 10px;
    }
  </style>
</head> 
<body>

<div class="login-container">
    <h2>Login</h2>
    <?php if(isset($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>
    <form action="empwork.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" name="login" value="Login">
    </form>
</div>

<div class="container">
  <div class="bubbles">
    <span style="--i:11;"></span>
    <span style="--i:12; "></span>
    <span style="--i:24; "></span>
    <span style="--i:10; "></span>
    <span style="--i:14; "></span>
    <span style="--i:23;"></span>
    <span style="--i:18;"></span>
    <span style="--i: 16;"></span>
    <span style="--i:19;"></span>
    <span style="--i: 20;"></span>
    <span style="--i:22; "></span>
    <span style="--i:25;"></span>
    <span style="--i:18;"></span>
    <span style="--i:21;"></span>
    <span style="--i:15;"></span>
    <span style="--i:13;"></span>
    <span style="--i:26;"></span>
    <span style="--i:17; "></span>
    <span style="--i:13;"></span>
    <span style="--i:28;"></span>
    <span style="--i:11;"></span>
    <span style="--i:12; "></span>
    <span style="--i:24; "></span>
    <span style="--i:10;"></span>
    <span style="--i:14; "></span>
    <span style="--i:23;"></span>
    <span style="--i:18;"></span>
    <span style="--i:16;"></span>
    <span style="--i:19;"></span>
    <span style="--i:20;"></span>
    <span style="--i:22; "></span>
    <span style="--i:25;"></span>
    <span style="--i:18;"></span>
    <span style="--i:21;"></span>
    <span style="--i:15;"></span>
    <span style="--i:13;"></span>
    <span style="--i:26;"></span>
    <span style="--i:17; "></span>
    <span style="--i:13;"></span>
    <span style="--i:28;"></span>
  </div>
</div>

</body>
</html>
