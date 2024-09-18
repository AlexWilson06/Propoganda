<?php
// Include the database configuration file
include 'setup.php';

// Fetch all pages from the database
$sql = "SELECT * FROM pages";
$result = $conn->query($sql);
?>
<?php
session_start();
// Redirect to login page if user is not logged in
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>Propaganda Clicker: Home Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="loggedin">
    <nav class="navtop">
        <div>
            <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
    </nav>
    <div class="content">
        <h2>Admin Page</h2>
        <p>Welcome back, <?= htmlspecialchars($_SESSION['name'], ENT_QUOTES) ?>!</p>
    </div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel</title>
</head>
<body>
  <h1>Admin Panel</h1>
  <a href="add_page.php">Add New Page</a>
  <h2>Pages</h2>
  <ul>
    <?php while ($row = $result->fetch_assoc()): ?>
      <li>
        <h3><?php echo $row['title1']; ?></h3>
        <a href="edit_page.php?id=<?php echo $row['id']; ?>">Edit</a>
        <a href="delete_page.php?id=<?php echo $row['id']; ?>">Delete</a>
      </li>
    <?php endwhile; ?>
  </ul>
</body>
</html>