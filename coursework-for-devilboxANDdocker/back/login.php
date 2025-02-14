<?php
session_start();

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "loginreg";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $stmt = $conn->prepare("SELECT id, username, password, email FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && $password == $user['password']) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['password'] = $user['password'];
            header("Location: ../front/info.php");
        } else {
            echo "Invalid username or password.";
        }
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
