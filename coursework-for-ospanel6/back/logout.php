<?php
session_start();
echo $_SESSION['email'];
session_unset();
session_destroy();
header("Location: ../front/login.html");
exit();
?>
