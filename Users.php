<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
