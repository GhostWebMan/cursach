<?php
$servername = "MySQL-8.2";
$username = "root";
$password = "";
$dbname = "loginreg";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT id, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        session_start();
        $_SESSION["user_id"] = $id;
        echo "Login successful!";
        echo $_SESSION["user_id"];
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
}

$conn->close();
?>
