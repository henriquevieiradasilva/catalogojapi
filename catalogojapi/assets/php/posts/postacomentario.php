<?php
    require '../db.php';
    require '../auth/login_check_true.php';

    date_default_timezone_set('America/Sao_Paulo');
    $date = new DateTimeImmutable();

    $CommentDate = date_format($date, 'Y-m-d');
    $CommentTime = date_format($date, 'H:i');

    if(isset($_POST["Species"])&&!empty($_POST["Species"])){
        $Species=$_POST["Species"];
    } else{
        $Species=NULL;
    }

    if(isset($_POST["Age"])&&!empty($_POST["Age"])){
        $Age=$_POST["Age"];
    } else{
        $Age=NULL;
    }

    if(isset($_POST["Sex"])&&!empty($_POST["Sex"])){
        $Sex=$_POST["Sex"];
    } else{
        $Sex=NULL;
    }

    if(isset($_POST["Classification"])&&!empty($_POST["Classification"])){
        $Classification=$_POST["Classification"];
    } else{
        $Classification=NULL;
    }

    if(isset($_POST["ParentCommentID"])&&!empty($_POST["ParentCommentID"])){
        $ParentCommentID=$_POST["ParentCommentID"];
    } else{
        $ParentCommentID=NULL;
        echo "parent null";
    }

    $PostID=$_POST["PostID"];

    $Notes=$_POST["Notes"];

    $UserID=$_SESSION["UserID"];

    $valorSpecies = ($Species === NULL) ? "NULL" : "'$Species'";
    $valorClassification = ($Classification === NULL) ? "NULL" : "'$Classification'";
    $valorSex = ($Sex === NULL) ? "NULL" : "'$Sex'";
    $valorAge = ($Age === NULL) ? "NULL" : "'$Age'";
    $valorNotes = ($Notes === NULL) ? "NULL" : "'$Notes'";
    $valorParentCommentID = ($ParentCommentID === NULL) ? "NULL" : "'$ParentCommentID'";
    $valorUserID = ($UserID === NULL) ? "NULL" : "'$UserID'";
    //Todo esse bloco acima é pq esses valores podem ser NULL, referenciar eles no SQL sem aspas.

    $valorCommentDate = "'$CommentDate'";
    $valorCommentTime = "'$CommentTime'";
    $valorPostID = "'$PostID'";

    $sql = "INSERT INTO comments (
        PostID, Species, Classification, Sex, Age, Notes, CommentDate, CommentTime, ParentCommentID, UserID
    ) VALUES (
        $valorPostID, $valorSpecies, $valorClassification, $valorSex, $valorAge,
        $valorNotes, $valorCommentDate, $valorCommentTime, $valorParentCommentID, $valorUserID
    )";

    mysqli_query($conexao, $sql);

    header("Location: ./post.php?PostID=$PostID");
?>