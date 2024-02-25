<?php
    require_once "database/database.php";
    $users = getAllLists();

    if(isset($_POST["id"])){
        deleteUser($_POST);
        header("Location: dashboard_page.php");
    }

    $imge = getprofile('UD01');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi | Dashboard</title>
    <link rel="stylesheet" href="dashboard_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <style>
        body {
            display: flex;
            background-color: #C9D7DD;
            /* background: linear-gradient(to left, #1D5B79, #468B97); */
        }
    </style>

    <script>

        function showDelete(button) {
            console.log('Delete button clicked');
            
            var userId = button.dataset.userid;
            console.log('User ID:', userId);

            var popupCenterD = document.getElementById('popupCenterD');
            var popupContentD = document.getElementById('popupContentD');
            
            popupCenterD.style.display = 'block';
            popupContentD.style.opacity = '1';
            popupContentD.style.visibility = 'visible';
            
            document.getElementById('deleteUserId').value = userId;
        }  

        function closeDelete(){
            var popupCenterD = document.getElementById('popupCenterD');
            var popupContentD = document.getElementById('popupContentD');
            
            popupCenterD.style.display = 'none';
            popupContentD.style.opacity = '0';
            popupContentD.style.visibility = 'hidden';
        }

        function confirmDelete(){
            console.log('Delete button clicked');
            console.log('User ID:', userId);
        }
    </script>
</head>

<body>
    <div class="wrapper">
        <header class="head">
            <nav class="bar">
                <a class="logo"><img src="images/calendar2.png" alt="calendar" width="45px" height="45px"></a>
                <a href="dashboard_page.php">Dashboard</a>
            </nav>

            <a class="main-title">Attendance System</a>
            
            <nav class="bar">
                <a href="profile_page.php">Profile</a>
                <div class="prof">
                    <a href="profile_page.php"><img src="<?= 'images/' . $imge["photo"]; ?>" alt="profile" class="prof-img"><a>
                </div>
            </nav>
        </header>

        <div class="search">
            <form action="" method="GET" class="search-form">
                <input type="text" placeholder="Search" name="search" class="search-bar">
                <button type="submit">Search</button>
            </form>
        </div>

        <div class="nyobol">
            <div class="table-box">
                <div class="table-header">
                    <h2>User List</h2>
                </div>

                <div class="center" id="popupCenterD">
                    <div class="content" id="popupContentD">
                        <div class="popup-header-red">
                            <h2>Delete User</h2>
                        </div>
                        <div class="untukiconbermasalah">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                        </div>
                        <p class="mbr">Do You Want To Delete This User?</p>
                        <hr class="line">
                        <button class="button-red" type="submit" form="deleteForm" name="yesBtn" onclick="confirmDelete()" >Yes</button>
                        <button class="button-grey" name="noBtn" onclick="closeDelete()" >Cancel</button>
                    </div>
                </div>

                <form id="deleteForm" action="" method="POST">
                    <input type="hidden" name="id" id="deleteUserId" value="">
                </form>
                
                <div class="table-body">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Photo</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $num = 1; ?>
                            <?php foreach($users as $user): ?>
                            <tr style="height: 100px;">
                                <td><?= $num++ ?></td>
                                <td>
                                    <div class="img-box">
                                        <img src="<?= 'images/' . $user["photo"]?>" alt="profile-cover" class="profile-picture">   
                                    </div>
                                </td>
                                <td><?= $user["firstName"] . ' ' . $user["lastName"]; ?></td>
                                <td><?= $user["email"]; ?></td>
                                <td class="button-column">
                                    <div class="button-controller">
                                        <a href="CRUD/view_page.php?id=<?= $user["id"] ?>" ><button class="view-button">View</button></a>
                                        <a href="CRUD/update_page.php?id=<?= $user["id"] ?>"><button class="edit-button">Edit</button></a>

                                        <input type="hidden" class="hiddenID" value="<?= $user["id"] ?>">
                                        <a><button class="delete-button" data-userid="<?= $user['id'] ?>" onclick="showDelete(this)">Delete</button></a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="add-button">
                    <a href="CRUD/create_page.php"><button class="add">Add User</button></a>
                </div>
            </div>
        </div>

        <footer>
            <div class="footer-content">
                <p>Made By: kenji</p>
            </div>
        </footer>
    </div>
</body>
</html>