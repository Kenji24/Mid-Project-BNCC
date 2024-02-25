<?php

session_start();

$conn = "";
$stmt = "";

function connectToDB(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "attendance_system";
    $dataSourceName = "mysql:host=" . $servername . ";dbname=" . $dbName;
    try{
        $conn = new PDO($dataSourceName, $username, $password);
        return $conn;
    }
    catch(PDOException $e){
        echo $e->getMessage();
        return null;
    }
}

function closeConnection(){
    // global $conn, $stmt;
    $conn = null;
    $stmt = null;
}

connectToDB();

function login($data){

    $conn = connectToDB();
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");

    $stmt->execute([
        $data["email"]
    ]);

    $user = $stmt->fetch();

    if($user){
        $hashUser = md5($data["password"]);

        if($hashUser === $user["password"] && $user["email"] === 'admin@gmail.com'){

            $_SESSION["login"] = true;
    
            if(isset($data["checkbox"])){
                setcookie("email", $data["email"], time() + 3600);
                echo "save";
            }
            header("Location: dashboard_page.php");
        }
        else{
            echo "

            <script>
                window.onload = function(){
                    errorUserMsg();
                }
            </script>

            ";
        }

    }
    else{
        echo "

            <script>
            errorUserMsg();
            </script>

            ";
    }
    
    closeConnection();
}

function getAllLists(){

    $conn = connectToDB();

    $stmt = $conn->query("SELECT * FROM users WHERE NOT id = 'UD01'");
    $users = [];
    
    if(isset($_GET["search"])){
        $search = $_GET["search"];
        $stmt = $conn->prepare("SELECT * FROM users WHERE NOT id = 'UD01' AND (firstName LIKE ? OR lastName LIKE ? OR email LIKE ?) ");
        
        $stmt->execute([
            "%$search%",
            "%$search%",
            "%$search%",
        ]);
    }

    while($user = $stmt->fetch(PDO::FETCH_ASSOC)){
        array_push($users, $user);
    }

    
    return $users;
    closeConnection();
}

function getUserById($data){
    $conn = connectToDB();
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");

    $stmt->execute([
        $data["id"]
    ]);

    $user = $stmt->fetch();
    return $user;

    closeConnection();
}

function checkEmail($data){
    $conn = connectToDB();

    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");

    $stmt->execute([
        $data["email"]
    ]);

    $emailExist = (bool)$stmt->fetchColumn();

    closeConnection();

    return $emailExist;
}

function createUser($data, $img){
    $conn = connectToDB();

    $password = $data["firstName"] . "123";

    $hashedpassword = md5($password);

    move_uploaded_file($img["tmp_name"], "../images/" . $img["name"]);
    $stmt = $conn->prepare("INSERT INTO users (photo, firstName, lastName, email, bio, password) VALUES (?, ?, ?, ?, ?, ?)");

    $stmt->execute([
        $img["name"],
        $data["firstName"],
        $data["lastName"],
        $data["email"],
        $data["bio"],
        $hashedpassword,
    ]);

    closeConnection();
}

function updateUser($data, $img){
    $conn = connectToDB();
    
    if(!empty($img["name"])){
        move_uploaded_file($img["tmp_name"], "../images/" . $img["name"]);
        $photo = $img["name"];        
    }
    else{
        $stmt = $conn->prepare("SELECT photo FROM users WHERE id = ?");
        $stmt->execute([
            $data["id"]
        ]);

        $row = $stmt->fetch();
        $photo = $row["photo"];
    }

    $stmt = $conn->prepare("UPDATE users SET photo = ?, firstName = ?, lastName = ?, email = ?, bio = ? WHERE id = ?");

    $stmt->execute([
        $photo,
        $data["firstName"],
        $data["lastName"],
        $data["email"],
        $data["bio"],
        $data["id"],
    ]);

    closeConnection();
}

function getprofile($userId){
    $conn = connectToDB();

    $stmt = $conn->prepare("SELECT * FROM users WHERE id = :user_id");
    
    $stmt->bindParam(':user_id', $userId);
    $stmt->execute();

    $profileData = $stmt->fetch(PDO::FETCH_ASSOC);
    
    closeConnection();
    return $profileData;
}

function deleteUser($data){
    $conn = connectToDB();
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");

    $stmt->execute([
        $data["id"]
    ]);

    closeConnection();
}

?>