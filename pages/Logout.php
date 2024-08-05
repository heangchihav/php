<?php
// Logout.php
session_start();
session_destroy();
header("Location: /001/pages/Home.php"); // Redirect to home page after logout
exit();
?>
