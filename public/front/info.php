<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
}
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .info-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .info-container h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .info-container button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
        }
        .info-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="info-container">
        <h2>Welcome, <?php echo $username; ?></h2>
        <p>Email: <?php echo $email; ?></p>
        <p>Password: <?php echo $password; ?></p>
        <button onclick="location.href='../back/logout.php'">Logout</button>
    </div>
</body>
</html>
