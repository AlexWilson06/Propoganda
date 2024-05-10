<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<title>Propoganda Clicker: Feedback Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* adding in font */
.bebas-neue-regular {
  font-family: "Bebas Neue", sans-serif;
  font-weight: 400;
  font-style: normal;
}
/* Making general css rules */
* {
  box-sizing: border-box;
}
/* Style the body */
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  background-color: #00A6ED;
}
/* Style the top navigation bar */
.navbar {
  display: flex;
  background-color: #A23E48;
  border: 2px solid black;
  font-family: "Bebas Neue";
  font-size: 73.975px;
}
/* Style the black sections of the navigation bar */
.navbar2 {
  overflow: hidden;
  background-color: #273E47;
}
/* Style the navigation bar links */
.navbar a {
  display: block;
  border-left: 2px solid black;
  color: black;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
}
/* Change color on hover */
.navbar a:hover {
  background-color: white;
  color: black;
}
/* title of section */
.Title {
  background-color: #F9DB6D;
  border: 2px solid black;
  font-family: "Bebas Neue";
  font-size: 100px;
  width: 90%;
  margin-left: 5%;
  margin-top: 2%;
  text-align: center;
}
/* forms */
.MainFeedbackSection {
  background-color: #F9DB6D;
  border: 2px solid black;
  width: 90%;
  margin-left: 5%;
  margin-top: 2%;
}
/* second section of forms (need to figure out how to make them side by side, can look at w3 schools) */
.Section2 {
  background-color: #F9DB6D;
  border: 2px solid black;
  width: 90%;
  margin-left: 5%;
  margin-top: 2%;
}
</style>
</head>
<body>
<div class="navbar">
  <div class="navbar2">
    <a href="index.php">Clicker</a>
  </div>
  <a href="Feedback.php">Feedback</a>
  <a href="Statistics.php">Statistics</a>
  <a href="settings.php">Settings</a>
  <div class="navbar2">
    <a href="sign in.php">Sign In</a>
  </div>
</div>
<div class="Title">
  <a>Feedback</a>
</div>
<div class="MainFeedbackSection">
  <a>Complaint Form</a>
</div>
<div class="Section2">
  <a>Reveiw Form</a>
</div>
</body>
</html>
