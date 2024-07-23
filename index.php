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
    <?php
    include ('NavBar.php')
    ?>
    <div class="Section2"></div>
    <div class="clickerbar">
      <p><br><br>Name:<br>(placeholder)<br>Money:<br>(link to money)</p>
      <div class="Clickerbox">
        <!-- Add Clicker Game Elements Here -->
        <div id="score">0</div>
        <button id="clicker">Click!</button>
      </div>
    </div>
    <div class="Leaderboard">
      <a href="Leaderboard.php">Leaderboard</a>
    </div>
    <div class="purchasebar">
      <div class="Cost">
        <div class="Cost1">
          <button class="btn">cost</button>
        </div>
        <div class="Cost2">
          <button class="btn">cost</button>
        </div>
        <div class="Cost3">
          <button class="btn">cost</button>
        </div>
      </div>
      <div class="Upgrade">
        <div class="Upgrade1">
          <button class="btn">patriotism levels</button>
        </div>
        <div class="Upgrade2">
          <button class="btn">Increase worker</button>
        </div>
        <div class="Upgrade3">
          <button class="btn">corruption levels</button>
        </div>
      </div>
      <div class="Infobutton">
        <div class="Infobutton1">
          <button class="btn">I</button>
        </div>
        <div class="Infobutton2">
          <button class="btn">I</button>
        </div>
        <div class="Infobutton3">
          <button class="btn">I</button>
        </div>
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
</body>
</html>