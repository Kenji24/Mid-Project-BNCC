<?php
    require_once "../database/database.php";
    $user = getUserById($_GET);

    if(isset($_POST["updateBtn"])){
        $_POST["id"] = $_GET["id"];

        $emailExist = checkEmail($_POST);

        if($_POST["email"] !== $user["email"] && $emailExist){
            echo "
    
                <script>

                    window.onload = function(){
                        if(". (checkEmail($_POST) ? "true" : "false") ."){
                            showPopupRed('Email already exist');  
                        }
                    }

                </script>
    
                ";
            
        }
        else{
            $firstName = isset($_POST["firstName"]) ? $_POST["firstName"] : "";
            $lastName = isset($_POST["lastName"]) ? $_POST["lastName"] : "";
            $email = isset($_POST["email"]) ? $_POST["email"] : "";

            if (empty($firstName) || empty($lastName) || empty($email)) {
                echo "
        
                <script>
                    window.onload = function(){
                        showPopupRed();
                    }
                </script>
        
                ";
            }
            else{
                updateUser($_POST, $_FILES["photo"]);

                echo "
        
                <script>
                    window.onload = function(){
                        showPopupGreen();
                    }
                </script>
        
                ";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User | Attendance System</title>
    <link rel="stylesheet" href="update_style.css">
    <script src="popup.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #1D5B79;
            /* background: linear-gradient(to left, #1D5B79, #468B97); */
        }
    </style>
</head>
<body>  
    <div class="konter" id="container">
        <div class="judul">
            <h2>Update User</h2>
        </div>

        <div class="image-preview">
            <img src="" alt="profile-pic-new" id="preview" class="newImg">
            <img src="<?= '../images/' . $user["photo"]; ?>" alt="profile-pic-new">
        </div>

        <div class="from">
            <form action="" method="POST" enctype="multipart/form-data" id="userForm">
                <div class="form-content">
                    <div class="form-photo">
                        <input type="file" accept="img/*" name="photo" id="imgUpload">
                    </div>
                    <div class="form-name">
                        <input type="text" placeholder="First Name" name="firstName" value="<?= $user["firstName"]; ?>" >
                        <input type="text" placeholder="Last Name" name="lastName" value="<?= $user["lastName"]; ?>">
                    </div>
                    <div class="form-email">
                        <input type="email" placeholder="Email" name="email" value="<?= $user["email"]; ?>">
                    </div>
                    <div class="form-bio">
                        <textarea type="text" placeholder="Bio" name="bio"><?= $user["bio"]; ?></textarea>
                    </div>
                </div>

                <div class="button">
                    <button type="submit" name="updateBtn">Update User</button>
                    <a href="../dashboard_page.php"><button type="button">Cancel</button></a>
                </div>
            </form>
        </div>    
    </div>

    <div class="center" id="popupCenterGreen">
        <div class="content" id="popupContentGreen">
            <div class="checkBox-header">
                <h2>Action Successful</h2>
            </div>
            <div class="untukiconbermasalah">
                <label><i class="bi bi-check"></i></label>
            </div>
            <p class="mbr">Your information is successfully updated</p>
            <hr class="line">
            <button type="button" class="close-button" onclick="closePopupGreen()" name="processBtn">Close</button>
        </div>
    </div>

    <div class="center" id="popupCenterRed">
        <div class="content" id="popupContentRed">
            <div class="checkBox-header-red">
                <h2>Action Failed</h2>
            </div>
            <div class="untukiconbermasalah">
                <label><i class="bi bi-x"></i></label>
            </div>
            <p class="mbr" id="popupTextRed">Make Sure Your information is Added Properly</p>
            <hr class="line">
            <label><button class="close-button-red" onclick="closePopupRed()" name="closeBtn">Close</button></label>
        </div>
    </div>

    <script>

        const imagePreview = document.querySelector("#preview");
        const imageUpload = document.querySelector("#imgUpload");

        imageUpload.addEventListener('change', () => {
            const files = imageUpload.files[0];

            if(files){
                imagePreview.src = URL.createObjectURL(files);
                imagePreview.style.display = "block";
            }
        })

    </script>

</body>
</html>
