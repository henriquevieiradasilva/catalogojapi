<?php
    include "../db.php";

    $pesquisa = "SELECT * FROM posts WHERE 1";

    //Meus posts (Pra ver os registros editáveis)
    if (isset($_POST["M"])) {
        session_start();
        $UserID = $_SESSION["userid"]; 
        $pesquisa = substr($pesquisa, 0, -1)."UserID='$UserID' AND 1";
    }

    //Pesquisa por nome científico
    if (isset($_POST["pesquisa"])&&!empty($_POST["pesquisa"])) {
        $Species=$_POST["pesquisa"];
        $pesquisa = substr($pesquisa, 0, -1)."Species LIKE '%$Species%' AND 1";
    }

    //Status de verificação
    $CountVer=false;
    if (isset($_POST["ExpertVerified"])) {
        $pesquisa = substr($pesquisa, 0, -1)."VerificationStatus='ExpertVerified' AND 1";
        $CountVer=true;
    }
    if (isset($_POST["CommunityVerified"])) {
        if($CountVer){
            $pesquisa = substr($pesquisa, 0, -5)."OR VerificationStatus='CommunityVerified' AND 1";
        }else{
            $pesquisa = substr($pesquisa, 0, -1)."VerificationStatus='CommunityVerified' AND 1";
            $CountVer=true;
        }
    }
    if (isset($_POST["Unidentified"])) {
        if($CountVer){
            $pesquisa = substr($pesquisa, 0, -5)."OR VerificationStatus='Unidentified' AND 1";
        }else{
            $pesquisa = substr($pesquisa, 0, -1)."VerificationStatus='Unidentified' AND 1";
        }
    }

    //Classificação popular
    $CountClass=false;
    if (isset($_POST["UndeterminedClass"])||isset($_GET["UndeterminedClass"])) {
        $pesquisa = substr($pesquisa, 0, -1)."Classification='Undetermined' AND 1";
        $CountClass=true;
    }

    //Fauna
    if (isset($_POST["Mammals"])||isset($_GET["Mammals"])) {
        if($CountClass){
            $pesquisa = substr($pesquisa, 0, -5)."OR Classification='Mammals' AND 1";
        }else{
            $pesquisa = substr($pesquisa, 0, -1)."Classification='Mammals' AND 1";
            $CountClass=true;
        }
    }
    if (isset($_POST["Birds"])||isset($_GET["Birds"])) {
        if($CountClass){
            $pesquisa = substr($pesquisa, 0, -5)."OR Classification='Birds' AND 1";
        }else{
            $pesquisa = substr($pesquisa, 0, -1)."Classification='Birds' AND 1";
            $CountClass=true;
        }
    }
    if (isset($_POST["Reptiles"])||isset($_GET["Reptiles"])) {
        if($CountClass){
            $pesquisa = substr($pesquisa, 0, -5)."OR Classification='Reptiles' AND 1";
        }else{
            $pesquisa = substr($pesquisa, 0, -1)."Classification='Reptiles' AND 1";
            $CountClass=true;
        }
    }
    if (isset($_POST["Amphibians"])||isset($_GET["Amphibians"])) {
        if($CountClass){
            $pesquisa = substr($pesquisa, 0, -5)."OR Classification='Amphibians' AND 1";
        }else{
            $pesquisa = substr($pesquisa, 0, -1)."Classification='Amphibians' AND 1";
            $CountClass=true;
        }
    }
    if (isset($_POST["Fish"])||isset($_GET["Fish"])) {
        if($CountClass){
            $pesquisa = substr($pesquisa, 0, -5)."OR Classification='Fish' AND 1";
        }else{
            $pesquisa = substr($pesquisa, 0, -1)."Classification='Fish' AND 1";
            $CountClass=true;
        }
    }
    if (isset($_POST["Invertebrates"])||isset($_GET["Invertebrates"])) {
        if($CountClass){
            $pesquisa = substr($pesquisa, 0, -5)."OR Classification='Invertebrates' AND 1";
        }else{
            $pesquisa = substr($pesquisa, 0, -1)."Classification='Invertebrates' AND 1";
            $CountClass=true;
        }
    }
    
    //Flora
    if (isset($_POST["Angiosperms"])||isset($_GET["Angiosperms"])) {
        if($CountClass){
            $pesquisa = substr($pesquisa, 0, -5)."OR Classification='Angiosperms' AND 1";
        }else{
            $pesquisa = substr($pesquisa, 0, -1)."Classification='Angiosperms' AND 1";
            $CountClass=true;
        }
    }
    if (isset($_POST["Gymnosperms"])||isset($_GET["Gymnosperms"])) {
        if($CountClass){
            $pesquisa = substr($pesquisa, 0, -5)."OR Classification='Gymnosperms' AND 1";
        }else{
            $pesquisa = substr($pesquisa, 0, -1)."Classification='Gymnosperms' AND 1";
            $CountClass=true;
        }
    }
    if (isset($_POST["Ferns"])||isset($_GET["Ferns"])) {
        if($CountClass){
            $pesquisa = substr($pesquisa, 0, -5)."OR Classification='Ferns' AND 1";
        }else{
            $pesquisa = substr($pesquisa, 0, -1)."Classification='Ferns' AND 1";
            $CountClass=true;
        }
    }
    if (isset($_POST["Lycophytes"])||isset($_GET["Lycophytes"])) {
        if($CountClass){
            $pesquisa = substr($pesquisa, 0, -5)."OR Classification='Lycophytes' AND 1";
        }else{
            $pesquisa = substr($pesquisa, 0, -1)."Classification='Lycophytes' AND 1";
            $CountClass=true;
        }
    }
    if (isset($_POST["Bryophytes"])||isset($_GET["Bryophytes"])) {
        if($CountClass){
            $pesquisa = substr($pesquisa, 0, -5)."OR Classification='Bryophytes' AND 1";
        }else{
            $pesquisa = substr($pesquisa, 0, -1)."Classification='Bryophytes' AND 1";
            $CountClass=true;
        }
    }
    if (isset($_POST["Algae"])||isset($_GET["Algae"])) {
        if($CountClass){
            $pesquisa = substr($pesquisa, 0, -5)."OR Classification='Algae' AND 1";
        }else{
            $pesquisa = substr($pesquisa, 0, -1)."Classification='Algae' AND 1";
            $CountClass=true;
        }
    }

    //Sexokkk
    $CountSex=false;
    if (isset($_POST["UndeterminedSex"])) {
        $pesquisa = substr($pesquisa, 0, -1)."Sex='Undetermined' AND 1";
        $CountSex=true;
    }
    if (isset($_POST["Male"])) {
        if($CountSex){
            $pesquisa = substr($pesquisa, 0, -5)."OR Sex='Male' AND 1";
        }else{
            $pesquisa = substr($pesquisa, 0, -1)."Sex='Male' AND 1";
            $CountSex=true;
        }
    }
    if (isset($_POST["Female"])) {
        if($CountSex){
            $pesquisa = substr($pesquisa, 0, -5)."OR Sex='Female' AND 1";
        }else{
            $pesquisa = substr($pesquisa, 0, -1)."Sex='Female' AND 1";
            $CountSex=true;
        }
    }

    //Idade
    $CountAge=false;
    if (isset($_POST["UndeterminedAge"])) {
        $pesquisa = substr($pesquisa, 0, -1)."Age='Undetermined' AND 1";
        $CountAge=true;
    }
    if (isset($_POST["Adult"])) {
        if($CountAge){
            $pesquisa = substr($pesquisa, 0, -5)."OR Age='Adult' AND 1";
        }else{
            $pesquisa = substr($pesquisa, 0, -1)."Age='Adult' AND 1";
            $CountAge=true;
        }
    }
    if (isset($_POST["Young"])) {
        if($CountAge){
            $pesquisa = substr($pesquisa, 0, -5)."OR Age='Young' AND 1";
        }else{
            $pesquisa = substr($pesquisa, 0, -1)."Age='Young' AND 1";
            $CountAge=true;
        }
    }
    if (isset($_POST["Cub"])) {
        if($CountAge){
            $pesquisa = substr($pesquisa, 0, -5)."OR Age='Cub' AND 1";
        }else{
            $pesquisa = substr($pesquisa, 0, -1)."Age='Cub' AND 1";
            $CountAge=true;
        }
    }

    //Data do registro
    if (isset($_POST["RecordDate"])&&!empty($_POST["RecordDate"])) {
        $RecordDate=$_POST["RecordDate"];
        $pesquisa = substr($pesquisa, 0, -1)."RecordDate='$RecordDate' AND 1";
    }

    //Data do postagem
    if (isset($_POST["PublishDate"])&&!empty($_POST["PublishDate"])) {
        $PublishDate=$_POST["PublishDate"];
        $pesquisa = substr($pesquisa, 0, -1)."PublishDate='$PublishDate' AND 1";
    }

    //echo $pesquisa;
?>
<form id="formulario" action="../../../pages/posts.php" method="POST">
    <input type="hidden" name="pesquisa" value="<?php echo htmlspecialchars($pesquisa); ?>">
</form>

<script>
    document.getElementById("formulario").submit();
</script>