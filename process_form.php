<?php
// Include the database connection setup file
include 'setup.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    print_r ($_POST);
    die();
    // Escape user inputs for security
$fname = $conn->real_escape_string($_POST['fname']);
$lname = $conn->real_escape_string($_POST['lname']);
$email = $conn->real_escape_string($_POST['email']);
$message = $conn->real_escape_string($_POST['message']);
// SQL query to insert form data into the contacts table
$sql = "INSERT INTO contacts (first_name, last_name, email, message, created_at)
VALUES ('$first_name', '$last_name', '$email', '$message', NOW())";
// Execute the query and check if it was successful
if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
// Close the database connection
$conn->close();
}
?>