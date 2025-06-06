<?php
session_start();
require '../db.php';

$userid = $_POST["userid"];
$username = $_POST["username"];
$useremail = $_POST["useremail"];
$userpassword_plain = $_POST["userpassword"];
$userpassword = password_hash($userpassword_plain, PASSWORD_DEFAULT);
$userphoto_name = "default.png";

$sql = "INSERT INTO Users (UserID, Name, Email, Password, ProfilePhoto) 
        VALUES ('$userid', '$username', '$useremail', '$userpassword', '$userphoto_name')";
mysqli_query($connection, $sql);

if (isset($_FILES['userprofilephoto']) && $_FILES['userprofilephoto']['error'] === UPLOAD_ERR_OK && isset($_SESSION['userphoto_ext'])) {
    $ext = $_SESSION['userphoto_ext'];
    unset($_SESSION['userphoto_ext']);

    $userphoto_name = $userid . "." . $ext;
    $dest_path = "../../media/profile_photos/" . $userphoto_name;

    if (move_uploaded_file($_FILES['userprofilephoto']['tmp_name'], $dest_path)) {
        $sql_update = "UPDATE Users SET ProfilePhoto = '$userphoto_name' WHERE UserID = '$userid'";
        mysqli_query($connection, $sql_update);
    }
}

mysqli_close($connection);

$_SESSION['auto_login_email'] = $useremail;
$_SESSION['auto_login_password'] = $userpassword_plain;

header("Location: ./login.php");
exit;
