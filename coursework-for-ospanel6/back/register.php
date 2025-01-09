<?php
session_start();
$servername = "MySQL-8.2";
$username = "root";
$password = "";
$dbname = "loginreg";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];

        $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        $stmt->execute([$username, $password, $email]);

        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['email'] = $email;

        header("Location: ../front/info.php");
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
