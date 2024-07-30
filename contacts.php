<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<title>Propoganda Clicker: Feedback</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
    include ('NavBar.php');
    include ('setup.php');
    include ('process_form.php');
    ?>  
<div class="ContactsTitle">
<a>Feedback/Contact form</a>
</div>
<div class="container">
  <form action="process_form.php" method="POST">
    <div class="row">
      <div class="col-25">
        <label for="first_name">First Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="first_name" name="first_name" placeholder="Your name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lastname">Last Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="lastname" name="lastname" placeholder="Your last name..">
      </div>
    </div>
      <div class="row">
      <div class="col-25">
        <label for="email">Email</label>
      </div>
      <div class="col-75">
        <input type="text" id="email" name="email" placeholder="Your email..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="message">Message</label>
      </div>
      <div class="col-75">
        <textarea id="message" name="message" placeholder="Write something.." style="height:100px"></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
</body>
<style>
  input[type=text], select, textarea{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
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