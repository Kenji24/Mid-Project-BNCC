<?php

session_start();
session_destroy();
session_unset();
setcookie("email", "", time() - 3600);
header("Location: login_page.php");
?>