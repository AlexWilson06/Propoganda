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
<body>
    <?php include ('NavBar.php'); ?>
    <div class="MainCollumn">
        <div class="Section2">
            <div class="clickerbar">
                <p>Name:<br>(placeholder)<br>Money:<br><span id="score">0</span></p>
                <div class="clicker-container">
                    <button id="clicker" class="circle-button"></button>
                </div>
            </div>
            <img src="media/BaseCountry.png" alt="Base Country" class="rotated-image">
        </div>
        <div class="Leaderboard">
            <a href="Leaderboard.php">Leaderboard</a>
        </div>
        <div class="purchasebar">
            <div class="Cost">
                <button class="btn">cost</button>
                <button class="btn">cost</button>
                <button class="btn">cost</button>
            </div>
            <div class="Upgrade">
                <button class="btn">patriotism levels</button>
                <button class="btn">Increase worker</button>
                <button class="btn">corruption levels</button>
            </div>
            <div class="Infobutton">
                <button class="btn">I</button>
                <button class="btn">I</button>
                <button class="btn">I</button>
            </div>
            <div class="Upgradetext">
                <p>Upgrade Country</p>
                <div class="Rebirth"></div>
            </div>
        </div>
    </div>
    <script>
  let score = 0;
  const scoreElement = document.getElementById('score');
  const clickerButton = document.getElementById('clicker');
  clickerButton.addEventListener('click', () => {
    score++;
    scoreElement.innerText = score;
    fetch('update_score.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ score: score })
    });
  });
  // Fetch the current score when the page loads
  fetch('get_score.php')
    .then(response => response.json())
    .then(data => {
      score = data.score;
      scoreElement.innerText = score;
    });
</script>
<script>
    // Toggle mobile menu
    document.getElementById('burgerMenu').addEventListener('click', () => {
        const navLinks = document.getElementById('navLinks');
        navLinks.style.display = navLinks.style.display === 'block' ? 'none' : 'block';
    });
</script>
</body>
</html>