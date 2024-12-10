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
    header('Location: index.php');
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
            <a href="index.php"><i class="fas fa-user-circle"></i>Home page</a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
    </nav>
    <div class="content">
        <p>Welcome back, <?= htmlspecialchars($_SESSION['name'], ENT_QUOTES) ?>!</p>
    </div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <h1>Admin Panel</h1>
  <a href="add_page.php">Add New Page</a>
  <?php while ($row = $result->fetch_assoc()): ?>
      <li>
        <h3><?php echo $row['title1']; ?></h3>
        <a href="edit_page.php?id=<?php echo $row['id']; ?>">Edit</a>
        <a href="delete_page.php?id=<?php echo $row['id']; ?>">Delete</a>
      </li>
    <?php endwhile; ?>
  </ul>
  <ul>
  <?php
$sql = "SELECT 
            trackeduserinformation.ID, 
            accounts.username, 
            trackeduserinformation.TopScore, 
            trackeduserinformation.TopRebirths, 
            trackeduserinformation.TopClicks, 
            trackeduserinformation.Date 
        FROM trackeduserinformation 
        LEFT JOIN accounts 
        ON trackeduserinformation.userid = accounts.id
        ORDER BY TopScore DESC";
$result = $conn->query($sql);
?>
<html>
    <style>
        table {
            margin: auto;
            font-size: 18px;
            text-align: center;
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid black;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Top Score</th>
            <th>Top Rebirths</th>
            <th>Top Clicks</th>
            <th>Date</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['ID']) . "</td>";
                echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                echo "<td>" . htmlspecialchars($row['TopScore']) . "</td>";
                echo "<td>" . htmlspecialchars($row['TopRebirths']) . "</td>";
                echo "<td>" . htmlspecialchars($row['TopClicks']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Date']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
</body>
</html>