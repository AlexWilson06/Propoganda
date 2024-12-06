<?php
ini_set('session.cookie_path', '/');
session_start();
include('setup.php'); 
include('NavBar.php');
if (isset($_SESSION['ID'])) {
    $userid = $_SESSION['ID'];
    $sql = "SELECT Date, ID, userid, TopClicks, TopRebirths, TopScore FROM trackeduserinformation WHERE userid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userid);
    $stmt->execute();
    $result = $stmt->get_result();

    $userData = $result->fetch_assoc();
} else {
    $userData = null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>Propaganda Clicker: Statistics</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .StatisticsBody {
            font-size: 18px;
            margin: auto;
            text-align: center;
            width: 70%;
        }
        a {
            display: block;
            margin: 10px 0;
        }
    </style>
</head>
<body>
  
    <h1 style="text-align: center;">Your Statistics</h1>
    <div class="StatisticsBody">
        <?php if ($userData): ?>
            <a>You have clicked <?= htmlspecialchars($userData['TopClicks']) ?> times, putting you in the top <?= round(($userData['TopClicks'] / 100000) * 100, 2) ?>% of players.</a><br>
            <a>You have currently taken over the country <?= htmlspecialchars($userData['TopRebirths']) ?> times. The nation is 500,000 square meters, meaning that with this amount, you own as much as <?= round(($userData['TopRebirths'] * 500000) / 149000000, 2) ?>x the landmass available on Earth!</a><br>
            <a>On your best run, you reached a max money of <?= number_format(htmlspecialchars($userData['TopScore'])) ?> and had <?= number_format(htmlspecialchars($userData['TopClicks'] * 7)) ?> people in your mighty nation!</a><br>
        <?php else: ?>
            <a>No statistics found for your account. Play to generate data!</a>
        <?php endif; ?>
            <table>
        <tr>
            <th>Username</th>
            <th>Top Score</th>
            <th>Top Rebirths</th>
            <th>Top Clicks</th>
            <th>Date</th>
        </tr>
        <?php
            $userid = $_SESSION['ID'];
            $sql = "SELECT username, Date, userid, TopClicks, TopRebirths, TopScore FROM trackeduserinformation 
            LEFT JOIN accounts 
            ON trackeduserinformation.userid = accounts.id
            where userid=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $userid);
            $stmt->execute();
            $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
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
    </div>
</body>
</html>
