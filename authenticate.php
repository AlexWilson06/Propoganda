<?php
ini_set('session.cookie_path', '/');
session_start();
echo "<pre>";
print_r($_SESSION); // Display all session variables
echo "</pre>";
include 'setup.php';
print_r($_POST); print_r($_SESSION);//die();
if (!isset($_POST['username'], $_POST['password'])) {
    $message = 'Please use username and/or password!';
    $_SESSION['message'] = $message;
    header('Location: login.php');
    exit();
}
    if ($stmt = $conn->prepare('SELECT ID, password FROM accounts WHERE username = ?')) {
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $stmt->store_result();
        // Check if the account exists
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $password);
            $stmt->fetch();
            // Verify password
            if (password_verify($_POST['password'], $password)) {
                // Success! Start the session
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['ID'] = $id;
                if($_SESSION['name']=="admin"){header('Location: admin.php');}
                else
                    header('Location: statistics.php');
            } else {
                $message= 'Incorrect username and/or password! Something went wrong!';
                 $_SESSION['message'] = $message;
                header('Location: login.php');
            }
        } else {
            echo 'Something went wrong!';
            header('Location: login.php');
        }
        $stmt->close();
    }
?>