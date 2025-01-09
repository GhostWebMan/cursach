<?php
session_start();

if (isset($_SESSION['username'])) { 
    header("Location: /front/info.php") ;
}

else { 
    session_destroy();
    echo "This session does not exist.";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
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
        .container {
            text-align: center;
        }
        .container button {
            width: 150px;
            padding: 10px;
            margin: 10px;
            background-color: #4CAF50;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
        }
        .container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <button onclick="location.href='front/register.html'">Register</button>
        <button onclick="location.href='front/login.html'">Login</button>
    </div>
</body>
</html>
