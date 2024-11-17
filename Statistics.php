<?php
session_start();

include('setup.php'); 
include('NavBar.php');

if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];

    $sql = "SELECT TopClicks, TopRebirths, TopScore FROM trackeduserinformation WHERE userid = ?";
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
            <a>You have currently taken over the country <?= htmlspecialchars($userData['TopRebirths']) ?> times. The nation is 50,000 square meters, meaning that with this amount, you own as much as <?= round(($userData['TopRebirths'] * 50000) / 510100000, 2) ?>x the landmass available on Earth!</a><br>
            <a>On your best run, you reached a max money of <?= number_format(htmlspecialchars($userData['TopScore'])) ?> and had <?= number_format(htmlspecialchars($userData['TopClicks'] * 10)) ?> people in your mighty nation!</a><br>
        <?php else: ?>
            <a>No statistics found for your account. Play to generate data!</a>
        <?php endif; ?>
    </div>
</body>
</html>
