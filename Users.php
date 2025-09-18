<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username   = "root";
$password   = "MariaDB";
$dbname     = "taskapp";

// connect to DB
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("DB connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, email FROM users ORDER BY name ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Registered Users</h2>";
    echo "<ol>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . htmlspecialchars($row['name']) . " — " . htmlspecialchars($row['email']) . "</li>";
    }
    echo "</ol>";
} else {
    echo "No users found.";
}

$conn->close();
?>
