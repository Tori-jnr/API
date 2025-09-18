<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
    <title>TaskApp Signup</title>
</head>
<body>
    <h2>Signup Form</h2>
    <form method="POST" action="mail.php">
        <label>Name:</label>
        <input type="text" name="name" required><br><br>
        
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        
        <button type="submit">Sign Up</button>
    </form>
</body>
</html>

