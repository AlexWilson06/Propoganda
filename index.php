<?php 
    session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header('Location: login.php'); // Redirect to login page
        exit;
    }
    include ('NavBar.php'); 
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
<body>
    <div class="MainCollumn">
        <div class="Section2">
            <div class="clickerbar">
                <p>Communist republic of<br><span id="name"></span></p>
                <p>Rebirths:<br><span id="rebirths">nil</span></p>
                <p>Money:<br><span id="score">0</span></p>
                <div class="clicker-container">
                    <button id="clicker" class="circle-button"></button>
                </div>
            </div>
            <img id="countryImage" src="media/BaseCountry.png" alt="Country Image" class="rotated-image">
        </div>
        <form action="userstats.php" method="POST" onsubmit="populateHiddenFields()">
        <script>
    rebirth = 2;
    sessionStorage.setItem('rebirth', rebirth);
    sessionStorage.setItem('clickcount', clickcount);
    </script>
    <input type="hidden" name="hiddenScore" id="hiddenScore">
    <input type="hidden" name="hiddenRebirths" id="hiddenRebirths">
    <div class="SaveIndex">
        <input type="submit" value="Save">
    </div>
</form>
        <div class="Leaderboard">
            <a href="Leaderboard.php?id=1">Leaderboard</a>
        </div>
        <div class="purchasebar">
            <div class="Cost">
                <button class="btn">15</button>
                <button class="btn">100</button>
                <button class="btn">1,100</button>
                <button class="btn">12,000</button>
                <button class="btn">130,000</button>
            </div>
            <div class="Upgrade">
        <button id="upgrade1" class="btnup" type="button">Patriotism Levels</button>
        <button id="upgrade2" class="btnup" type="button">Increase Workers</button>
        <button id="upgrade3" class="btnup" type="button">Corruption Levels</button>
        <button id="upgrade4" class="btnup" type="button">Suppress Media</button>
        <button id="upgrade5" class="btnup" type="button">Reduce Rights</button>
    </div>
            <div class="Infobutton">
                <button class="btn">+0.1/PPC +0.5/sec</button>
                <button class="btn">+1/PPC +4/sec</button>
                <button class="btn">+8/PPC +35/sec</button>
                <button class="btn">+47/PPC +200/sec</button>
                <button class="btn">+260/PPC +1000/sec</button>
</div>
<div class="Cost">
                <button class="btn">1.4M</button>
                <button class="btn">20M</button>
                <button class="btn">330M</button>
                <button class="btn">5.1B</button>
                <button class="btn">75B</button>
            </div>
    <div class="Upgrade">
        <button id="upgrade6" class="btnup" type="button">Child Labour</button>
        <button id="upgrade7" class="btnup" type="button">Surveillance</button>
        <button id="upgrade8" class="btnup" type="button">Monopolise Industry</button>
        <button id="upgrade9" class="btnup" type="button">Re-Education Camps</button>
        <button id="upgrade10" class="btnup" type="button">Complete Domination</button>
    </div>
            <div class="Infobutton">
                <button class="btn">+1,400/PPC +7,500/sec</button>
                <button class="btn">+7,800/PPC +35,000/sec</button>
                <button class="btn">+44,000/PPC 200,000/sec</button>
                <button class="btn">+260,000/PPC +1.25M/sec</button>
                <button class="btn">+1.6M/PPC +8M/sec</button>
</div>
</div>
            <div class="Upgradetext">
                <p>Improve Leadership</p>
                <button id="rebirthButton" class="Rebirth" type="button">Cost: 1,000,000</button>
            </div>
    <script>
let clickcount = 0;
let score = 0;
let moneyPerClick = 1;
let passiveIncome = 0; // Track passive income
let rebirths = 0;
let rebirthCost = 1000000; // Initial rebirth cost
const rebirthsElement = document.getElementById('rebirths');
const scoreElement = document.getElementById('score');
const countryImage = document.getElementById('countryImage');
const clickerButton = document.getElementById('clicker');
const rebirthButton = document.getElementById('rebirthButton');
function populateHiddenFields() {
    // Get the dynamic values from the visible elements
    const displayedScore = document.getElementById('score').innerText; // Assuming <span id="score">
    const displayedRebirths = document.getElementById('rebirths').innerText; // Assuming <span id="rebirths">

    // Populate the hidden fields with the dynamic values
    document.getElementById('hiddenScore').value = displayedScore;
    document.getElementById('hiddenRebirths').value = displayedRebirths;

    console.log("Hidden fields populated:", displayedScore, displayedRebirths);
}
// Function to update the country image based on the score
function updateCountryImage() {
    if (passiveIncome >= 100000000) {
        countryImage.src = 'media/CountryStage10.png';
    } else if (passiveIncome >= 10000000) {
        countryImage.src = 'media/CountryStage9.png';
    } else if (passiveIncome >= 1000000) {
        countryImage.src = 'media/CountryStage8.png';
    } else if (passiveIncome >= 100000) {
        countryImage.src = 'media/CountryStage7.png';
    } else if (passiveIncome >= 10000) {
        countryImage.src = 'media/CountryStage6.png';
    } else if (passiveIncome >= 1000) {
        countryImage.src = 'media/CountryStage5.png';
    } else if (passiveIncome >= 100) {
        countryImage.src = 'media/CountryStage4.png';
    } else if (passiveIncome >= 50) {
        countryImage.src = 'media/CountryStage3.png';
    } else if (passiveIncome >= 25) {
        countryImage.src = 'media/CountryStage2.png';
    } else if (passiveIncome >= 5) {
        countryImage.src = 'media/CountryStage1.png';
    } else {
        countryImage.src = 'media/BaseCountry.png';
    }
}
function updatename() {
    let nameElement = document.getElementById('name'); // Get the DOM element

    if (rebirths >= 10) {
        name = 'Karl Marx';
    } else if (rebirths === 9) {
        name = 'Vladimir Lenin';
    } else if (rebirths === 8) {
        name = 'Mao Zedong';
    } else if (rebirths === 7) {
        name = 'Che Guevara';
    } else if (rebirths === 6) {
        name = 'Joseph Stalin';
    } else if (rebirths === 5) {
        name = 'Fidel Castro';
    } else if (rebirths === 4) {
        name = 'Ho Chi Minh';
    } else if (rebirths === 3) {
        name = 'Leon Trotsky';
    } else if (rebirths === 2) {
        name = 'Nikita Khrushchev';
    } else if (rebirths === 1) {
        name = 'the northern end';
    } else if (rebirths === 0) {
        name = 'Nobody';
    }

    nameElement.innerText = name; // Update the name in the DOM
}

// Function to handle the rebirth action
function handleRebirth() {
    if (score >= rebirthCost) {
        rebirths += 1;
        score = 0; // Reset score
        moneyPerClick = 1 * Math.pow(5, rebirths); // Reset money per click
        passiveIncome = 0 * Math.pow(5, rebirths); // Reset passive income
        rebirthCost *= 10; // Double the rebirth cost
        updateScore(score); // Update the score display
        updaterebirths(rebirths); // Update the rebirths display
        rebirthButton.innerText = `Cost: ${rebirthCost.toLocaleString()}`; // Update the rebirth button text
        console.log("Country upgraded and score reset to 0");
        updateCountryImage(); // Update the image after resetting the score
        updatename();
    } else {
        console.log("Not enough money to upgrade the country");
    }
}

function updaterebirths(newrebirths) {
    rebirths = newrebirths;
    rebirthsElement.innerText = rebirths.toFixed(0); // Update rebirths display
}

// Function to update the score
function updateScore(newScore) {
    score = newScore;
    sessionStorage.setItem('score', score);
    scoreElement.innerText = score.toFixed(0); // Round score to 1 decimal place
    updateCountryImage(); // Update the image whenever the score changes
}

// Function to handle upgrade purchase for upgrade1
function handleUpgrade1() {
    if (score >= 15) {
        moneyPerClick += 0.1 * Math.pow(5, rebirths);
        passiveIncome += 0.5 * Math.pow(5, rebirths); // Increase passive income
        score -= 15; // Deduct 50 money
        updateScore(score); // Update the score display
        console.log("Upgrade aspurchased: Passive income increased");
    } else {
        console.log("Not enough money to purchase upgrade");
    }
}

// Function to handle upgrade purchase for upgrade2
function handleUpgrade2() {
    if (score >= 100) {
        moneyPerClick += 1 * Math.pow(5, rebirths);
        passiveIncome += 4 * Math.pow(5, rebirths); // Increase the money per click
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
        moneyPerClick += 8 * Math.pow(5, rebirths);
        passiveIncome += 35 * Math.pow(5, rebirths);  // Increase the money per click
        score -= 1100; // Deduct 500 money
        updateScore(score); // Update the score display
        console.log("Upgrade purchased: Money per click increased significantly");
    } else {
        console.log("Not enough money to purchase upgrade");
    }
}

function handleUpgrade4() {
    if (score >= 12000) {
        moneyPerClick += 25 * Math.pow(5, rebirths);
        passiveIncome += 100 * Math.pow(5, rebirths);  // Increase the money per click
        score -= 12000; // Deduct 500 money
        updateScore(score); // Update the score display
        console.log("Upgrade purchased: Money per click increased significantly");
    } else {
        console.log("Not enough money to purchase upgrade");
    }
}

function handleUpgrade5() {
    if (score >= 130000) {
        moneyPerClick += 100 * Math.pow(5, rebirths);
        passiveIncome += 300 * Math.pow(5, rebirths);  // Increase the money per click
        score -= 130000; // Deduct 500 money
        updateScore(score); // Update the score display
        console.log("Upgrade purchased: Money per click increased significantly");
    } else {
        console.log("Not enough money to purchase upgrade");
    }
}

function handleUpgrade6() {
    if (score >= 1400000) {
        moneyPerClick += 1000 * Math.pow(5, rebirths);
        passiveIncome += 5000 * Math.pow(5, rebirths);  // Increase the money per click
        score -= 1400000; // Deduct 500 money
        updateScore(score); // Update the score display
        console.log("Upgrade purchased: Money per click increased significantly");
    } else {
        console.log("Not enough money to purchase upgrade");
    }
}

function handleUpgrade7() {
    if (score >= 20000000) {
        moneyPerClick += 10000 * Math.pow(5, rebirths);
        passiveIncome += 60000 * Math.pow(5, rebirths);  // Increase the money per click
        score -= 20000000; // Deduct 500 money
        updateScore(score); // Update the score display
        console.log("Upgrade purchased: Money per click increased significantly");
    } else {
        console.log("Not enough money to purchase upgrade");
    }
}

function handleUpgrade8() {
    if (score >= 330000000) {
        moneyPerClick += 150000 * Math.pow(5, rebirths);
        passiveIncome += 1000000 * Math.pow(5, rebirths);  // Increase the money per click
        score -= 330000000; // Deduct 500 money
        updateScore(score); // Update the score display
        console.log("Upgrade purchased: Money per click increased significantly");
    } else {
        console.log("Not enough money to purchase upgrade");
    }
}

function handleUpgrade9() {
    if (score >= 5100000000) {
        moneyPerClick += 1000000 * Math.pow(5, rebirths);
        passiveIncome += 7500000 * Math.pow(5, rebirths);
        score -= 5100000000;
        updateScore(score);
        console.log("Upgrade purchased: Money per click increased significantly");
    } else {
        console.log("Not enough money to purchase upgrade");
    }
}

function handleUpgrade10() {
    if (score >= 75000000000) {
        moneyPerClick += 1000000000 * Math.pow(5, rebirths);
        passiveIncome += 10000000000 * Math.pow(5, rebirths);
        score -= 75000000000;
        updateScore(score);
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
    score += moneyPerClick;
    clickcount += 1
    updateScore(score);
    updateclickcount(clickcount);
});

// Add event listener for the rebirth button
rebirthButton.addEventListener('click', handleRebirth);

// Call the increaseMoneyPassively function every second (1000 milliseconds)
setInterval(increaseMoneyPassively, 1000);

// Attach event listeners to upgrade buttons
document.getElementById("upgrade1").addEventListener("click", handleUpgrade1);
document.getElementById("upgrade2").addEventListener("click", handleUpgrade2);
document.getElementById("upgrade3").addEventListener("click", handleUpgrade3);
document.getElementById("upgrade4").addEventListener("click", handleUpgrade4);
document.getElementById("upgrade5").addEventListener("click", handleUpgrade5);
document.getElementById("upgrade6").addEventListener("click", handleUpgrade6);
document.getElementById("upgrade7").addEventListener("click", handleUpgrade7);
document.getElementById("upgrade8").addEventListener("click", handleUpgrade8);
document.getElementById("upgrade9").addEventListener("click", handleUpgrade9);
document.getElementById("upgrade10").addEventListener("click", handleUpgrade10);
    </script>
</body>
</html>
