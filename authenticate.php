<?php
session_start();
include 'setup.php';
print_r($_POST); print_r($_SESSION);//die();
if (!isset($_POST['username'], $_POST['password'])) {
    exit('Please fill both the username and password fields!');
 $message= 'please use username and/or password!';
                 $_SESSION['message'] = $message;
                header('Location: login.php');
}
    if ($stmt = $conn->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
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
                $_SESSION['id'] = $id;
                if($_SESSION['name']=="admin"){header('Location: admin.php');}
                else
                    header('Location: statistics.php');
            } else {
                $message= 'Incorrect username and/or password!';
                 $_SESSION['message'] = $message;
                header('Location: login.php');
            }
        } else {
            echo 'Incorrect username and/or password!';
            header('Location: index.php');
        }
        $stmt->close();
    }
?>