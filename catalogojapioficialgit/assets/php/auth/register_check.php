<?php
    session_start();
    require '../db.php';

    $userid = $_POST['userid'];
    $useremail = $_POST['useremail'];

    $sql_userid = "SELECT UserID FROM Users WHERE UserID = '$userid'";
    $result_userid = mysqli_query($connection, $sql_userid);
    if (mysqli_num_rows($result_userid) > 0) {
        $_SESSION['register_error'] = "O nome de usuário '$userid' já está em uso.";
        mysqli_free_result($result_userid);
        mysqli_close($connection);
        $_SESSION['form_data'] = [
            'username' => $_POST['username'] ?? '',
            'userid' => $_POST['userid'] ?? '',
            'useremail' => $_POST['useremail'] ?? ''
        ];
        header("Location: ../../../pages/auth.php?case=register");
        exit;
    }
    mysqli_free_result($result_userid);

    $sql_email = "SELECT Email FROM Users WHERE Email = '$useremail'";
    $result_email = mysqli_query($connection, $sql_email);
    if (mysqli_num_rows($result_email) > 0) {
        $_SESSION['register_error'] = "O e-mail '$useremail' já está em uso.";
        mysqli_free_result($result_email);
        mysqli_close($connection);
        $_SESSION['form_data'] = [
            'username' => $_POST['username'] ?? '',
            'userid' => $_POST['userid'] ?? '',
            'useremail' => $_POST['useremail'] ?? ''
        ];
        header("Location: ../../../pages/auth.php?case=register");
        exit;
    }
    mysqli_free_result($result_email);

    if (isset($_FILES['userprofilephoto']) && $_FILES['userprofilephoto']['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['userprofilephoto']['tmp_name'];

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $tmp_name);
        finfo_close($finfo);

        if ($mime === 'image/png') {
            $_SESSION['userphoto_ext'] = 'png';
        } elseif ($mime === 'image/jpeg') {
            $_SESSION['userphoto_ext'] = 'jpg';
        } else {
            $_SESSION['register_error'] = "Formato de imagem não suportado. Envie PNG ou JPG.";
            mysqli_close($connection);
            $_SESSION['form_data'] = [
                'username' => $_POST['username'] ?? '',
                'userid' => $_POST['userid'] ?? '',
                'useremail' => $_POST['useremail'] ?? ''
            ];
            header("Location: ../../../pages/auth.php?case=register");
            exit;
        }
    }

    mysqli_close($connection);
    require 'register.php';
?>