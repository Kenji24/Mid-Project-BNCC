<?php
    require_once "database/database.php";

    $userId = 'UD01';
    $profileData = getprofile($userId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi | Profile</title>
    <link rel="stylesheet" href="profile_style.css">
</head>
<body>
    <div class="wrapper">
       <div class="profile-card">
           <img src="images/holo_advent_john_kafka.jpg" class="cover-pic">
           <img img src="<?= 'images/' . $profileData["photo"]?>" alt="profile-cover" class="profile-pic">
           <div class="card-content">
               <h1><?= $profileData["firstName"] . ' ' . $profileData["lastName"]; ?></h1>
               <a href="logout.php"><button class="exit-button">Logout</button></a>
               <p class="profile-email"><?= $profileData["email"]; ?></p>
               <hr>
               <h2 class="about">Bio</h2>
               <p class="profile-bio"><?= $profileData["bio"]; ?></p>
               <div class="back">
                    <a href="dashboard_page.php"><button class="back-button">back</button></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>