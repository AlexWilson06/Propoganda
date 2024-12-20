<?php 
    ini_set('session.cookie_path', '/');
    session_start();
    include ('NavBar.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>Propaganda Clicker: Log In</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login">
        <h1>Login</h1>
        <form action="authenticate.php" method="post">
            <label for="username"><i class="fas fa-user"></i></label>
            <input type="text" name="username" placeholder="Username" id="username" required>
            <label for="password"><i class="fas fa-lock"></i></label>
            <input type="password" name="password" placeholder="Password" id="password" required>
            <input type="submit" value="Login">
        </form>
    </div>
    <div class="signupbutton">
        <button action="register.html" method="post">
            <a href="Register.html">new around here? click here to sign up</a>
        </button>
    </div>
</body>
</html>