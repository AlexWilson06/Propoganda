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
                <p>Money:<br><span id="score">0.0</span></p>
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
                <button class="btn">cost: 15</button>
                <button class="btn">cost: 100</button>
                <button class="btn">cost: 1,100</button>
            </div>
            <div class="Upgrade">
                <button id="upgrade1" class="btn">patriotism levels</button>
                <button id="upgrade2" class="btn">Increase worker</button>
                <button id="upgrade3" class="btn">corruption levels</button>
            </div>
            <div class="Infobutton">
                <button class="btn">+0.1/click +0.5/sec</button>
                <button class="btn">+1/click +5/sec</button>
                <button class="btn">+8/click +40/sec</button>
            </div>
            <div class="Upgradetext">
                <p>Upgrade Country</p>
                <button id="rebirthButton" class="Rebirth">Cost: 10,000</button>
            </div>
        </div>
    </div>
    <script>
        let score = 0;
        let moneyPerClick = 1;
        let passiveIncome = 0; // Track passive income
        const scoreElement = document.getElementById('score');
        const countryImage = document.getElementById('countryImage');
        const clickerButton = document.getElementById('clicker');

        // Function to update the country image based on the score
        function updateCountryImage() {
            if (moneyPerClick >= 100) {
                countryImage.src = 'media/CountryStage5.png';
            } else if (moneyPerClick >= 50) {
                countryImage.src = 'media/CountryStage4.png';
            } else if (moneyPerClick >= 25) {
                countryImage.src = 'media/CountryStage3.png';
            } else if (moneyPerClick >= 5) {
                countryImage.src = 'media/CountryStage2.png';
            } else if (moneyPerClick >= 1.5) {
                countryImage.src = 'media/CountryStage1.png';
            } else {
                countryImage.src = 'media/BaseCountry.png';
            }
        }

        // Function to handle the rebirth action
        function handleRebirth() {
            if (score >= 10000) {
                score = 0; // Reset score
                moneyPerClick = 1; // Reset money per click
                passiveIncome = 0; // Reset passive income
                updateScore(score); // Update the score display
                console.log("Country upgraded and score reset to 0");
                updateCountryImage(); // Update the image after resetting the score
            } else {
                console.log("Not enough money to upgrade the country");
            }
        }

        // Function to update the score and country image
        function updateScore(newScore) {
            score = newScore;
            scoreElement.innerText = score.toFixed(0); // Round score to 1 decimal place
            updateCountryImage(); // Update the image whenever the score changes
        }

        // Function to handle upgrade purchase for upgrade1
        function handleUpgrade1() {
            if (score >= 15) {
                moneyPerClick += 0.1;
                passiveIncome += 0.5; // Increase passive income by 0.1 per second
                score -= 15; // Deduct 50 money
                updateScore(score); // Update the score display
                console.log("Upgrade purchased: Passive income increased by 0.1 per second");
            } else {
                console.log("Not enough money to purchase upgrade");
            }
        }

        // Function to handle upgrade purchase for upgrade2
        function handleUpgrade2() {
            if (score >= 100) {
                moneyPerClick += 1;
                passiveIncome += 5; // Increase the money per click
                score -= 100; // Deduct 100 money
                updateScore(score); // Update the score display
                console.log("Upgrade purchased: Money per click increased");
            } else {
                console.log("Not enough money to purchase upgrade");
            }
        }

        // Function to handle upgrade purchase for upgrade3
        function handleUpgrade3() {
            if (score >= 1100) {
                moneyPerClick += 8;
                passiveIncome += 40;  // Increase the money per click
                score -= 1100; // Deduct 500 money
                updateScore(score); // Update the score display
                console.log("Upgrade purchased: Money per click increased significantly");
            } else {
                console.log("Not enough money to purchase upgrade");
            }
        }

        // Function to increase money passively over time
        function increaseMoneyPassively() {
            score += passiveIncome; // Add passive income to the score
            updateScore(score);
        }

        // Add event listener for the clicker button
        clickerButton.addEventListener('click', () => {
            score += moneyPerClick; // Increase score by the current money per click
            updateScore(score); // Update the score display
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

        // Attach event listeners to upgrade buttons
        document.getElementById("upgrade1").addEventListener("click", handleUpgrade1);
        document.getElementById("upgrade2").addEventListener("click", handleUpgrade2);
        document.getElementById("upgrade3").addEventListener("click", handleUpgrade3);

        // Fetch the current score when the page loads
        fetch('get_score.php')
            .then(response => response.json())
            .then(data => {
                score = data.score;
                updateScore(score); // Use updateScore to apply rounding
            });

        // Set interval for passive income
        setInterval(increaseMoneyPassively, 1000); // Increase money every second

    </script>
</body>
</html>
