<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<title>Leaderboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
</head>
<?php
// Include the database configuration file
include 'setup.php';
// Check if the ID is set in the URL
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  // Fetch the page details from the database
  $sql = "SELECT * FROM pages WHERE id=$id";
  $result = $conn->query($sql);
  // Check if the page exists
  if ($result->num_rows > 0) {
    $page = $result->fetch_assoc();
    
    // Assign the fields to variables
    $title1 = $page['title1'];
    $text1 = $page['text1'];
    $image1 = $page['image1'];
    $title2 = $page['title2'];
    $text2 = $page['text2'];
    $image2 = $page['image2'];
    $title3 = $page['title3'];
    $text3 = $page['text3'];
    $image3 = $page['image3'];
  } else {
    echo "Page not found.";
    exit;
  }
} else {
  echo "No page ID provided.";
  exit;
}
?>
<body>
  <div>
    <div>
      <h2><?php echo $title1; ?></h2>
      <p><?php echo $text1; ?></p>
      <img src="<?php echo $image1; ?>" alt="">
    </div>
    <div>
      <h2><?php echo $title2; ?></h2>
      <p><?php echo $text2; ?></p>
      <img src="<?php echo $image2; ?>" alt="">
    </div>
    <div>
      <h2><?php echo $title3; ?></h2>
      <p><?php echo $text3; ?></p>
      <img src="<?php echo $image3; ?>" alt="">
    </div>
  </div>
</body>
</html>