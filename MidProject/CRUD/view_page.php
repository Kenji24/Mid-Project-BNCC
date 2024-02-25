<?php
    require_once "../database/database.php";
    $user = getUserById($_GET);

    if(empty($user["bio"])){
        $user["bio"] = "-";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi | View</title>
    <link rel="stylesheet" href="view_style.css">
</head>
<body>
    <div class="wrapper">
       <div class="profile-card">
           <img src="../images/holo_advent_john_kafka.jpg" class="cover-pic">
            <div class="profile-picture">
                <img src="<?= '../images/' . $user["photo"]?>" alt="profile-cover" class="profile-pic">
            </div>
           <div class="card-content">
               <h1><?= $user["firstName"] . ' ' . $user["lastName"]; ?></h1>
               <p class="profile-email"><?= $user["email"]; ?></p>
               <hr>
               <h2 class="about">Bio</h2>
               <p class="profile-bio"><?= $user["bio"]; ?></p>
            </div>
            <div class="back">
                    <a href="../dashboard_page.php"><button class="back-button">Back</button></a>
            </div>
        </div>
    </div>
</body>
</html>