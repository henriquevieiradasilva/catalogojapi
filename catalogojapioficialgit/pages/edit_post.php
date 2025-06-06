<?php require '../assets/php/auth/login_check_true.php'; ?>

<?php
require '../assets/php/db.php';
require '../assets/php/VerificaLogin.php';
$PostID = $_GET["PostID"];
$tabela = mysqli_query($conexao, "SELECT * FROM posts WHERE PostID='$PostID'");
$linha = mysqli_fetch_array($tabela);
if ($_SESSION["UserID"] !== $linha['UserID']) {
    header('Location: ./post.php?PostID=' . $PostID);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Postar registro</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">

    <link href="../assets/css/template/bootstrap.min.css" rel="stylesheet">

    <link href="../assets/css/template/bootstrap-icons.css" rel="stylesheet">

    <link href="../assets/css/template/templatemo-topic-listing.css" rel="stylesheet">

    <style>
        .map-wrapper {
            width: 100%;
            height: 500px;
            /* altura fixa — pode ajustar */
            position: relative;
        }

        #map {
            width: 100%;
            height: 100%;
            position: relative;
            /* troque de absolute para relative */
            z-index: 1;
            border-radius: 10px;
            /* opcional */
        }
    </style>


    <!--

TemplateMo 590 topic listing

https://templatemo.com/tm-590-topic-listing

-->
</head>

<body>
    <main>

        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg" style="background-color: #80d0c7;">
            <div class="container">
                <a class="navbar-brand" href="../">
                    <span>Catálogo - JAPÍ</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="">categorias</a> <!-- TASK -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="">todos os registros</a> <!-- TASK -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="">sobre a serra</a> <!-- TASK -->
                        </li>
                    </ul>

                    <div class="d-none d-lg-block">
                        <a href="./account.php" class="navbar-icon bi-person smoothscroll"></a>
                    </div>
                </div>
            </div>
        </nav>

        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../menu.php">Menu</a></li>
                                <li class="breadcrumb-item"><a href="./filtros.php">Catálogo</a></li>
                                <li class="breadcrumb-item"><a href="./post.php?PostID=<?php echo $PostID; ?>">Registro <?php echo $PostID; ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Editar registro</li>
                            </ol>
                        </nav>

                        <h2 class="text-white">Postar Registro</h2>
                    </div>
                </div>
            </div>
        </header>
        <section class="section-padding section-bg">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <h3 class="mb-4 pb-2">Atualize as informações do seu registro</h3>
                    </div>

                    <form action="./postarconfirm.php?Crud=E&PostID=<?php echo "$PostID"; ?>" method="post" enctype="multipart/form-data" class="custom-form contact-form" role="form">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-floating">
                                    <select name="Classification" id="Classification" class="form-control">
                                        <option value="Undetermined" <?php if ($linha['Classification'] == 'Undetermined') {
                                                                            echo "selected";
                                                                        } ?>>Indeterminado</option>
                                        <option value="Birds" <?php if ($linha['Classification'] == 'Birds') {
                                                                            echo "selected";
                                                                        } ?>>Pássaro</option>
                                        <option value="Reptiles" <?php if ($linha['Classification'] == 'Reptiles') {
                                                                            echo "selected";
                                                                        } ?>>Réptil</option>
                                        <option value="Fish" <?php if ($linha['Classification'] == 'Fish') {
                                                                            echo "selected";
                                                                        } ?>>Peixe</option>
                                        <option value="Amphibians" <?php if ($linha['Classification'] == 'Amphibians') {
                                                                            echo "selected";
                                                                        } ?>>Anfíbio</option>
                                        <option value="Invertebrates" <?php if ($linha['Classification'] == 'Invertebrates') {
                                                                            echo "selected";
                                                                        } ?>>Invertebrados</option>
                                        <option value="Angiosperms" <?php if ($linha['Classification'] == 'Angiosperms') {
                                                                            echo "selected";
                                                                        } ?>>Gimnosperma</option>
                                        <option value="Gymnosperms" <?php if ($linha['Classification'] == 'Gymnosperms') {
                                                                            echo "selected";
                                                                        } ?>>Gimnosperma</option>
                                        <option value="Ferns" <?php if ($linha['Classification'] == 'Ferns') {
                                                                            echo "selected";
                                                                        } ?>>Samambaia</option>
                                        <option value="Lycophytes" <?php if ($linha['Classification'] == 'Lycophytes') {
                                                                            echo "selected";
                                                                        } ?>>Licófita</option>
                                        <option value="Bryophytes" <?php if ($linha['Classification'] == 'Bryophytes') {
                                                                            echo "selected";
                                                                        } ?>>BRiófita</option>
                                        <option value="Algae" <?php if ($linha['Classification'] == 'Algae') {
                                                                            echo "selected";
                                                                        } ?>>Alga</option>
                                    </select>

                                    <label for="floatingInput">Classificação</label>
                                </div>
                                <div class="form-floating">
                                    <select name="Sex" id="Sex" class="form-control">
                                        <option value="Undetermined" <?php if ($linha['Sex'] == 'Undetermined') {
                                                                            echo "selected";
                                                                        } ?>>Indeterminado</option>
                                        <option value="Female" <?php if ($linha['Sex'] == 'Female') {
                                                                    echo "selected";
                                                                } ?>>Feminino</option>
                                        <option value="Male" <?php if ($linha['Sex'] == 'Male') {
                                                                    echo "selected";
                                                                } ?>>Masculino</option>
                                    </select>

                                    <label for="floatingInput">Sexo</label>
                                </div>

                                <div class="form-floating">
                                    <input type="date" id="RecordDate" name="RecordDate" class="form-control" value="<?php echo $linha['RecordDate']; ?>" required />
                                    <label for="floatingInput">Dia do registro</label>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-floating">
                                    <input type="text" name="Species" id="Species" class="form-control" Value="<?php echo $linha['Species']; ?>">

                                    <label for="floatingInput">Nome científico</label>
                                </div>
                                <div class="form-floating">
                                    <select name="Age" id="Age" class="form-control">
                                        <option value="Undetermined" <?php if ($linha['Age'] == 'Undetermined') {
                                                                            echo "selected";
                                                                        } ?>>Indeterminado</option>
                                        <option value="Cub" <?php if ($linha['Age'] == 'Cub') {
                                                                echo "selected";
                                                            } ?>>Filhote</option>
                                        <option value="Young" <?php if ($linha['Age'] == 'Young') {
                                                                    echo "selected";
                                                                } ?>>Jovem</option>
                                        <option value="Adult" <?php if ($linha['Age'] == 'Adult') {
                                                                    echo "selected";
                                                                } ?>>Adulto</option>
                                    </select>

                                    <label for="floatingInput">Idade</label>
                                </div>
                                <div class="form-floating">
                                    <input type="time" id="RecordTime" name="RecordTime" Value="<?php echo $linha['RecordTime']; ?>" class="form-control" required>
                                    <label for="floatingInput">Hora do registro</label>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12">

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="SensitiveContent" name="SensitiveContent" <?php if ($linha['SensitiveContent'] == 1) {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?>>
                                    <label class="form-check-label" for="SensitiveContent">
                                        A imagem contém conteúdo sensível? (ex: atropelamento)
                                    </label>
                                </div>

                                <div class="form-floating">
                                    <textarea class="form-control" id="Notes" name="Notes"><?php echo $linha['Notes']; ?></textarea>

                                    <label for="floatingTextarea">Observações</label>
                                </div>

                                <div class="form-floating">
                                    <div class="map-wrapper">
                                        <div id="map"></div>
                                    </div> <br>
                                </div>
                                <div class="form-floating">
                                    <input type="text" name="Location" id="Location" readonly required class="form-control" value="<?php echo 'LatLng(' . $linha['Location'] . ')' ?>">
                                    <label for="floatingInput">Localização</label>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <?php
                            $PostID = $_GET["PostID"];
                            $tabelaimagem = mysqli_query($conexao, "SELECT ImageName FROM photos WHERE PostID=$PostID");
                            if (mysqli_num_rows($tabelaimagem) > 0) {
                                for ($i = 0; $i < mysqli_num_rows($tabelaimagem); $i++) {
                                    $imagem = mysqli_fetch_array($tabelaimagem)['ImageName'];
                                    echo "<div class='col-md-6 mb-4'>
                                            <div class='d-flex align-items-center gap-3'>
                                                <img src='../assets/media/photos/$imagem' alt='Mídia' width='100px'>
                                                <div class='form-check m-0'>
                                                    <input class='form-check-input' type='checkbox' id='imagensParaDeletar[$i]' name='imagensParaDeletar[$i]' value='$imagem'>
                                                    <label class='form-check-label' for='imagensParaDeletar[$i]'>
                                                    Deletar essa imagem: $imagem
                                                    </label>
                                                </div>
                                            </div>
                                        </div>";
                                }
                            }

                            $tabelavideos = mysqli_query($conexao, "SELECT * FROM videos WHERE PostID=$PostID");
                            if (mysqli_num_rows($tabelavideos) > 0) {
                                for ($i = 0; $i < mysqli_num_rows($tabelavideos); $i++) {
                                    $video = mysqli_fetch_array($tabelavideos)['VideoName'];
                                    echo "<div class='col-md-6 mb-4'>
                                            <div class='d-flex align-items-center gap-3'>
                                                <video src='../assets/media/videos/$video width='600px' controls>
                                                <div class='form-check m-0'>
                                                    <input class='form-check-input' type='checkbox' id='videosParaDeletar[$i]' name='videosParaDeletar[$i]' value='$video'>
                                                    <label class='form-check-label' for='videosParaDeletar[$i]'>
                                                    Deletar esse vídeo: $video
                                                    </label>
                                                </div>
                                            </div>
                                        </div>";
                                }
                            }
                            ?>
                        </div>


                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-floating">
                                <button type="submit" class="form-control">Enviar</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </section>
    </main>
    <script>
        var map = L.map('map').setView([<?php echo $linha['Location'] ?>], 12);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var coord;

        var popup = L.popup();

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("Esse é o novo local do seu registro")
                .openOn(map);
            let coord = e.latlng;
            document.getElementById("Location").value = coord;
        }

        map.on('click', onMapClick);

        var marker = L.marker([<?php echo $linha['Location'] ?>]).addTo(map);
        marker.bindPopup("<b>Este é o local do registro</b>").openPopup();
    </script>
    <!-- JAVASCRIPT FILES -->
    <script src="../assets/js/template/jquery.min.js"></script>
    <script src="../assets/js/template/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/template/jquery.sticky.js"></script>
    <script src="../assets/js/template/custom.js"></script>

</body>

</html>