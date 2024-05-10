<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<title>Propoganda Clicker: Settings Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.bebas-neue-regular {
  font-family: "Bebas Neue", sans-serif;
  font-weight: 400;
  font-style: normal;
}

* {
  box-sizing: border-box;
}

/* Style the body */
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}
/* Style the top navigation bar */
.navbar {
  display: flex;
  background-color: #A23E48;
  border: 2px solid black;
  font-family: "Bebas Neue";
  font-size: 73.975px;
}
.navbar2 {
  overflow: hidden;
  background-color: #273E47;
}
.navbar3 {
  overflow: hidden;
  background-color: #273E47;
  border: white 10px;
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

/* Column container */
.row {  
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
}

/* Create two unequal columns that sits next to each other */
/* Sidebar/left column */
.side {
  -ms-flex: 30%; /* IE10 */
  flex: 30%;
  background-color: #f1f1f1;
  padding: 20px;
}

/* Main column */
.main {   
  -ms-flex: 70%; /* IE10 */
  flex: 70%;
  background-color: white;
  padding: 20px;
}

/* Fake image, just for this example */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
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
</div>
</div>
</body>
</html>
