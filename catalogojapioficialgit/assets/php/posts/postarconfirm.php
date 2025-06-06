
<?php
require '../db.php';

session_start();

$Crud = $_GET['Crud'];

date_default_timezone_set('America/Sao_Paulo');
$date = new DateTimeImmutable();

$PublishDate = date_format($date, 'Y-m-d');
$PublishTime = date_format($date, 'H:i');

$Notes = $_POST["Notes"];
$RecordDate = $_POST["RecordDate"];
$RecordTime = $_POST["RecordTime"];
$UserID = $_SESSION["userid"];
$Location = $_POST["Location"];
$Location = substr($Location, 7, -1);

if (isset($_POST["SensitiveContent"])) {
    $SensitiveContent = 1;
} else {
    $SensitiveContent = 0;
}

$Classification = (!empty($_POST["Classification"])) ? $_POST["Classification"] : "Undetermined";

$Species = (!empty($_POST["Species"])) ? $_POST["Species"] : "Indeterminado";

$Sex = (!empty($_POST["Sex"])) ? $_POST["Sex"] : "Undetermined";

$Age = (!empty($_POST["Age"])) ? $_POST["Age"] : "Undetermined";

if (empty(trim($_POST["Species"]))) {
    $VerificationStatus = "Unidentified";
} else if (mysqli_num_rows(mysqli_query($connection, "SELECT * FROM expertspecialization WHERE UserID='$UserID'")) != 0) {
    $VerificationStatus = "ExpertVerified";
} else {
    $VerificationStatus = "CommunityVerified";
}

$valorNotes = ($Notes === NULL) ? "NULL" : "'$Notes'"; //ISSO PQ ELE PODE SER NULL! NAS INSERÇOES EM SQL, USAR VALORNOTES SEM ASPAS

if ($Crud == "I") {
    mysqli_query($connection, "INSERT INTO posts (UserID, Classification, Species, VerificationStatus, Sex, Age, SensitiveContent, Notes, RecordDate, RecordTime, PublishDate, 
        PublishTime, Location) 
        VALUES ('$UserID', '$Classification', '$Species', '$VerificationStatus', '$Sex', '$Age', '$SensitiveContent', $valorNotes, '$RecordDate', '$RecordTime', '$PublishDate', 
        '$PublishTime','$Location')");

    $ultimoID = mysqli_insert_id($connection);

    if (isset($_FILES["imagens"])) {
        $arquivos = $_FILES["imagens"];

        for ($i = 0; $i < count($arquivos["name"]); $i++) {
            if ($arquivos["error"][$i] === UPLOAD_ERR_OK) {
                $tmpName = $arquivos["tmp_name"][$i];
                $ImageName = uniqid("Post_" . $ultimoID . "_", true) . "." . pathinfo($arquivos["name"][$i], PATHINFO_EXTENSION);
                move_uploaded_file($tmpName, "../assets/media/post_photos/" . $ImageName);
                mysqli_query($connection, "INSERT INTO photos (PostID, ImageName) VALUES ('$ultimoID', '$ImageName')");
            }
        }
    }

    if (isset($_FILES["videos"])) {
        $arquivos = $_FILES["videos"];

        for ($i = 0; $i < count($arquivos["name"]); $i++) {
            if ($arquivos["error"][$i] === UPLOAD_ERR_OK) {
                $tmpName = $arquivos["tmp_name"][$i];
                $VideoName = uniqid("Post_" . $ultimoID . "_", true) . "." . pathinfo($arquivos["name"][$i], PATHINFO_EXTENSION);
                move_uploaded_file($tmpName, "../assets/media/post_videos/" . $VideoName);
                mysqli_query($connection, "INSERT INTO videos (PostID, VideoName) VALUES ('$ultimoID', '$VideoName')");
            }
        }
    }
} else if ($Crud == "E") {
    $PostID = $_GET['PostID'];
    mysqli_query($connection, "UPDATE posts SET 
        UserID='$UserID', Classification='$Classification', Species='$Species', VerificationStatus= '$VerificationStatus', Sex= '$Sex', Age='$Age', SensitiveContent= '$SensitiveContent', 
        Notes=$valorNotes, RecordDate= '$RecordDate', RecordTime='$RecordTime', PublishDate= '$PublishDate', PublishTime='$PublishTime', Location='$Location' WHERE PostID=$PostID");

    $ultimoID = $_GET["PostID"];

    if (isset($_FILES["imagens"])) {
        $arquivos = $_FILES["imagens"];

        for ($i = 0; $i < count($arquivos["name"]); $i++) {
            if ($arquivos["error"][$i] === UPLOAD_ERR_OK) {
                $tmpName = $arquivos["tmp_name"][$i];
                $ImageName = uniqid("Post_" . $ultimoID . "_", true) . "." . pathinfo($arquivos["name"][$i], PATHINFO_EXTENSION);
                move_uploaded_file($tmpName, "../assets/media/post_photos/" . $ImageName);
                mysqli_query($connection, "INSERT INTO photos (PostID, ImageName) VALUES ('$ultimoID', '$ImageName')");
            }
        }
    }

    if (isset($_FILES["videos"])) {
        $arquivos = $_FILES["videos"];

        for ($i = 0; $i < count($arquivos["name"]); $i++) {
            if ($arquivos["error"][$i] === UPLOAD_ERR_OK) {
                $tmpName = $arquivos["tmp_name"][$i];
                $VideoName = uniqid("Post_" . $ultimoID . "_", true) . "." . pathinfo($arquivos["name"][$i], PATHINFO_EXTENSION);
                move_uploaded_file($tmpName, "../assets/media/post_videos/" . $VideoName);
                mysqli_query($connection, "INSERT INTO videos (PostID, VideoName) VALUES ('$ultimoID', '$VideoName')");
            }
        }
    }

    $tabelaimagem = mysqli_query($connection, "SELECT * FROM photos WHERE PostID=$PostID");
    if (mysqli_num_rows($tabelaimagem) > 0) {
        while ($imagem = mysqli_fetch_array($tabelaimagem)) {
            $nome = $imagem['ImageName'];
            if (isset($_POST["imagensParaDeletar"])) {
                foreach ($_POST["imagensParaDeletar"] as $nome) {
                    mysqli_query($connection, "DELETE FROM photos WHERE ImageName = '$nome'");
                    $caminho = "../assets/media/post_photos/$nome";
                    if (file_exists($caminho)) {
                        unlink($caminho);
                    }
                }
            }
        }
    }

    $tabelavideo = mysqli_query($connection, "SELECT * FROM videos WHERE PostID=$PostID");
    if (mysqli_num_rows($tabelavideo) > 0) {
        while ($videos = mysqli_fetch_array($tabelavideo)) {
            $nome = $video['VideoName'];
            if (isset($_POST["videosParaDeletar"])) {
                foreach ($_POST["videosParaDeletar"] as $nome) {
                    mysqli_query($connection, "DELETE FROM videos WHERE VideoName = '$nome'");
                    $caminho = "../assets/media/post_videos/$nome";
                    if (file_exists($caminho)) {
                        unlink($caminho);
                    }
                }
            }
        }
    }
}

header("Location: ./filters.php");
?>