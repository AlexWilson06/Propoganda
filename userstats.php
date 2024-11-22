<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>Propaganda Clicker: Process Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
session_start();
include('NavBar.php');
include 'setup.php';
echo '<pre>';
print_r($_SESSION);
print_r($_POST);
echo '</pre>';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs
    $TopScore = isset($_SESSION['score']) ? $conn->real_escape_string($_SESSION['score']) : null;
    $TopRebirths = isset($_POST['rebirths']) ? $conn->real_escape_string($_POST['rebirths']) : null;
    $TopClicks = isset($_POST['clickcount']) ? $conn->real_escape_string($_POST['clickcount']) : null;

    // Check for required fields
    if ($TopScore !== null && $TopRebirths !== null && $TopClicks !== null) {
        // SQL query to insert or update data
        $sql = "
            INSERT INTO trackeduserinformation (score, rebirths, clickcount, Date)
            VALUES ('$TopScore', '$TopRebirths', '$TopClicks', NOW())
        ";

        // Execute the query and check if it was successful
        if ($conn->query($sql) === TRUE) {
            echo "<p>Form successfully submitted!</p>";
        } else {
            echo "<p>Error: " . $conn->error . "</p>";
        }
    } else {
        echo "<p>Error: Missing required data.</p>";
    }

    // Close the database connection
    $conn->close();
} else {
    echo "<p>Error: Invalid request method.</p>";
}
?>
</body>
</html>