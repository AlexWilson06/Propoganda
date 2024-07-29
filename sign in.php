<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<title>Propoganda Clicker: Sign In</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
</head>
<title></title>
<body>
<?php
    include ('NavBar.php');
    include ('setup.php');
    ?>
<div class="SignInTitle">
  <p>Log In/Sign Up</p>
</div>
  <div class="SignIn">
  <form action="process_form.php" method="POST">
    <div class="row">
      <div class="bar">
        <input type="text" id="first_name" name="first_name" placeholder="Your name..">
      </div>
    </div>
    <div class="row">
      <div class="bar">
        <input type="text" id="lastname" name="lastname" placeholder="Your last name..">
      </div>
    </div>
      <div class="row">
      <div class="bar">
        <input type="text" id="email" name="email" placeholder="Your email..">
      </div>
    </div>
    <div class="row">
      <div class="bar">
        <select id="country" name="country">
            <option value="New Zealand">New Zealand</option>
            <option value="australia">Australia</option>
            <option value="usa">USA</option>
        </select>
      </div>
    </div>
    <div class="SignLogRow">
      <input type="submit" value="Submit">
    </div>
</div>
</body>
<style>
  input[type=text], select, textarea{
  width: 100%;
  padding: 12px;
  border: 5px solid #005578;
  color: white;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
  background-color: #0274a9;
}
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}
input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}
</style>
</html>