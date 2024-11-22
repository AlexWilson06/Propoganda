<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <title>User Stats</title>
</head>
<body>
<?php
session_start();
include('NavBar.php');
include 'setup.php';

// Check if user is logged in
if (!isset($_SESSION['userid'])) {
    echo "<p>Error: User not logged in.</p>";
    exit;
}

$userid = $conn->real_escape_string($_SESSION['userid']);

// Section 1: Fetch Most Recent Stats
$sql_recent = "
    SELECT TopScore, TopRebirths, TopClicks, Date
    FROM trackeduserinformation
    WHERE userid = '$userid'
    ORDER BY Date DESC
    LIMIT 1
";

$result_recent = $conn->query($sql_recent);

echo "<h2>Most Recent Stats</h2>";
if ($result_recent->num_rows > 0) {
    $recent = $result_recent->fetch_assoc();
    echo "<p><strong>Top Score:</strong> " . $recent['TopScore'] . "</p>";
    echo "<p><strong>Top Rebirths:</strong> " . $recent['TopRebirths'] . "</p>";
    echo "<p><strong>Top Clicks:</strong> " . $recent['TopClicks'] . "</p>";
    echo "<p><strong>Date:</strong> " . $recent['Date'] . "</p>";
} else {
    echo "<p>No recent stats available.</p>";
}

// Section 2: Fetch High Score
$sql_high = "
    SELECT MAX(TopScore) AS HighScore
    FROM trackeduserinformation
    WHERE userid = '$userid'
";

$result_high = $conn->query($sql_high);

echo "<h2>All-Time High Score</h2>";
if ($result_high->num_rows > 0) {
    $high = $result_high->fetch_assoc();
    echo "<p><strong>High Score:</strong> " . $high['HighScore'] . "</p>";
} else {
    echo "<p>No high score available.</p>";
}

// Section 3: Display History Table
$sql_history = "
    SELECT TopScore, TopRebirths, TopClicks, Date
    FROM trackeduserinformation
    WHERE userid = '$userid'
    ORDER BY Date DESC
";

$result_history = $conn->query($sql_history);

echo "<h2>Stats History</h2>";
if ($result_history->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Score</th><th>Rebirths</th><th>Clicks</th><th>Date</th></tr>";
    while ($row = $result_history->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['TopScore'] . "</td>";
        echo "<td>" . $row['TopRebirths'] . "</td>";
        echo "<td>" . $row['TopClicks'] . "</td>";
        echo "<td>" . $row['Date'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No stats history available.</p>";
}

// Close the database connection
$conn->close();
?>
</body>
</html>
