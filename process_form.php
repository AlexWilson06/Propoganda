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
include ('NavBar.php');
// Include the database connection setup file
include 'setup.php';
//print_r ($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $lastname = $conn->real_escape_string($_POST['lastname']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);
    // SQL query to insert form data into the contacts table
    $sql = "INSERT INTO contacts (first_name, lastname, email, message, created_at)
        VALUES ('$first_name', '$lastname', '$email', '$message', NOW())";
    
   //print $sql;
    // Execute the query and check if it was successful
        if ($conn->query($sql) === TRUE) {
    echo "Form Sucessfully submitted";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
   
    // Close the database connection
    $conn->close();
}
?>
</body>
</html>