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
                <p>Money:<br><span id="score">0</span></p>
                <div class="clicker-container">
                    <button id="clicker" class="circle-button"></button>
                </div>
            </div>
            <img id="countryImage" src="media/BaseCountry.png" alt="Country Image" class="rotated-image">
        </div>
        <div class="Leaderboard">
            <a href="Leaderboard.php?id=1">Leaderboard</a>
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
                <button id="rebirthButton" class="Rebirth"></button>
            </div>
        </div>
    </div>
    <script>
        let score = 0;
        const scoreElement = document.getElementById('score');
        const countryImage = document.getElementById('countryImage');
        const clickerButton = document.getElementById('clicker');

        // Function to update the country image based on the score
        function updateCountryImage() {
            if (score >= 50) {
                countryImage.src = 'media/CountryStage5.png';
            } else if (score >= 40) {
                countryImage.src = 'media/CountryStage4.png';
            } else if (score >= 30) {
                countryImage.src = 'media/CountryStage3.png';
            } else if (score >= 20) {
                countryImage.src = 'media/CountryStage2.png';
            } else if (score >= 10) {
                countryImage.src = 'media/CountryStage1.png';
            } else {
                countryImage.src = 'media/BaseCountry.png';
            }
        }

        // Function to handle the rebirth action
        function handleRebirth() {
            if (score >= 50) {
                score = 0; // Reset score
                scoreElement.innerText = score;
                console.log("Score reset to 0");
                updateCountryImage(); // Update the image after resetting the score
            } else {
                console.log("Score is below 50, no action taken");
            }
        }

        // Function to update the score and country image
        function updateScore(newScore) {
            score = newScore;
            scoreElement.innerText = score;
            updateCountryImage(); // Update the image whenever the score changes
        }

        // Add event listener for the clicker button
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
            updateCountryImage(); // Update the image when the score changes
        });

        // Attach event listener to the rebirth button
        document.getElementById("rebirthButton").addEventListener("click", handleRebirth);

        // Fetch the current score when the page loads
        fetch('get_score.php')
            .then(response => response.json())
            .then(data => {
                score = data.score;
                scoreElement.innerText = score;
                updateCountryImage(); // Ensure the image is correct on page load
            });
    </script>
</body>
</html>