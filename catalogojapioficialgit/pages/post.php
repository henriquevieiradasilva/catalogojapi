<!-- AQUI VAI SER A PÁGINA PARA INDIVIDUAL POR POST -->
<?php
include "../assets/php/db.php";
session_start();
$PostID = $_GET["PostID"];
$tabela = mysqli_query($connection, "SELECT * FROM posts WHERE PostID='$PostID'");
$linha = mysqli_fetch_array($tabela);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                    <span>Catálogo JAPÍ</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="./categories.php">categorias</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="./submit.php">novo registro</a> <!-- TASK: Arrumar para que atalho novo registro -->
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mostrar Registros</a>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="../assets/php/posts/filters.php?">Todos os Registros</a></li>
                                <hr>
                                <li><a class="dropdown-item" href="../assets/php/posts/filters.php?Mammals=1&Birds=1&Reptiles=1&Amphibians=1&Fish=1&Invertebrates=1">Registros da Fauna</a></li>
                                <li><a class="dropdown-item" href="../assets/php/posts/filters.php?Angiosperms=1&Gymnosperms=1&Ferns=1&Lycophytes=1&Bryophytes=1&Algae=1">Registros da Flora</a></li>
                                <hr>
                                <li><a class="dropdown-item" href="../assets/php/posts/filters.php?ExpertVerified=1">Verificados por Especialistas</a></li>      <!-- TASK: Arrumar atalho para posts veri. espec. -->
                                <li><a class="dropdown-item" href="../assets/php/posts/filters.php?">Discussão entre Especialistas</a></li>                      <!-- TASK: Arrumar atalho para posts disc. espec. -->
                                <li><a class="dropdown-item" href="../assets/php/posts/filters.php?CommunityVerified=1">Verificados pela Comunidade</a></li>     <!-- TASK: Arrumar atalho para posts veri. comun. -->
                                <li><a class="dropdown-item" href="../assets/php/posts/filters.php?">Discussão entre a Comunidade</a></li>                       <!-- TASK: Arrumar atalho para posts disc. comun. -->
                                <li><a class="dropdown-item" href="../assets/php/posts/filters.php?UndeterminedClass=1">Não Identificados</a></li>
                            </ul>
                        </li>

                        <li class="nav-item d-lg-none">
                            <a class="nav-link" href="#">Meu Perfil</a>
                        </li>

                    </ul>
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">

                        <li class="nav-item">
                            <div class="d-none d-lg-block">
                                <a class="nav-link click-scroll" href="#">MEU PERFIL</a>
                                <a href="#" class="navbar-icon bi-person smoothscroll"></a>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </nav>
        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../">Início</a></li>
                                <li class="breadcrumb-item"><a href="../assets/php/filters.php">Catálogo</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Registro <?php echo $PostID; ?></li>
                            </ol>
                        </nav>

                        <h2 class="text-white">Registro <?php echo $PostID . " - " . $linha["Species"]; ?></h2>

                        <?php
                            if (isset($_SESSION["UserID"])){
                                if ($_SESSION["UserID"] === $linha['UserID']) {
                                    echo "
                                    <form class='custom-form' method='post' action='./editor.php?PostID=$PostID'>
                                        <div class='col-12 text-center'>
                                            <button type='submit' class='form-control'>Editar</button>
                                        </div>
                                    </form>";
                                }
                            }
                             ?>
                    </div>
                </div>
            </div>
        </header>

        <section class="section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center">
                        <h3 class="mb-4">Imagens</h3>
                    </div>

                    <?php
                    $tabelaimagem = mysqli_query($connection, "SELECT ImageName FROM photos WHERE PostID=$PostID");
                    while ($imagem = mysqli_fetch_array($tabelaimagem)) {
                        $imagemname = "../assets/media/photos/" . $imagem['ImageName'];
                        echo "
                        <div class='col-md-4 mb-4'>
                            <div class='d-flex align-items-center gap-1'>
                                <div class='custom-block bg-white shadow-lg p-0 overflow-hidden'>
                                    <img src='$imagemname' class='img-fill' alt='' style='max-width: 400px;'>
                                </div>
                            </div>
                        </div>";
                    }
                    ?>

                    <div class="col-lg-12 col-12 text-center">
                        <br><br>
                        <h3 class="mb-4">Vídeos</h3>
                    </div>

                    <?php
                    $tabelavideo = mysqli_query($connection, "SELECT VideoName FROM videos WHERE PostID=$PostID");
                    while ($video = mysqli_fetch_array($tabelavideo)) {
                        $videoname = "../assets/media/videos/" . $video['VideoName'];
                        echo "
                        <div class='col-md-6 mb-4'>
                            <div class='d-flex align-items-center gap-1'>
                                <div class='custom-block bg-white shadow-lg p-0 overflow-hidden'>
                                    <video src='$videoname' class='img-fill' alt='' style='max-width: 500px;' controls>
                                </div>
                            </div>
                        </div>";
                    }
                    ?>

                    <div class="col-lg-12 col-12 text-center">
                        <br><br>
                        <h3 class="mb-4">Dados do registro</h3>
                    </div>

                    <div class="col-lg-12 col-12 text-left">
                        <h6 class="mb-4">Autor</h6>
                        <p><?php
                            $UserID = $linha["UserID"];
                            $tabelaautor = mysqli_query($connection, "SELECT * FROM users WHERE UserID='$UserID'");
                            echo mysqli_fetch_array($tabelaautor)["Name"];
                            ?></p>
                        <h6 class="mb-4">Classificação popular</h6>
                        <p><?php echo $linha["Classification"]; ?></p>
                        <h6 class="mb-4">Espécie</h6>
                        <p><?php echo $linha["Species"]; ?></p>
                        <h6 class="mb-4">Idade</h6>
                        <p><?php echo $linha["Age"]; ?></p>
                        <h6 class="mb-4">Sexo</h6>
                        <p><?php echo $linha["Age"]; ?></p>
                        <h6 class="mb-4">Status da verificação</h6>
                        <p><?php echo $linha["VerificationStatus"]; ?></p>
                        <h6 class="mb-4">Data e hora do registro</h6>
                        <p><?php echo $linha["RecordDate"] . " - " . $linha["RecordTime"]; ?></p>
                        <h6 class="mb-4">Data e hora da postagem</h6>
                        <p><?php echo $linha["PublishDate"] . " - " . $linha["PublishTime"]; ?></p>
                        <h6 class="mb-4">Observações</h6>
                        <p><?php echo $linha["Notes"]; ?></p>
                        <h6 class="mb-4">Localização</h6>
                    </div>
                    <div class="col-lg-12 col-12">
                        <div class="form-floating">
                            <div class="map-wrapper">
                                <div id="map"></div><?php $Location = $linha["Location"]; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section class="section-padding section-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <h3 class="mb-4 text-center">Comentários</h3>
                    </div>

                    <div class='col-lg-12 col-12'>
                        <?php
                        function exibirComentario($linha, $conexao)
                        {
                            $commentID = $linha["CommentID"];

                            echo "<div class='card mb-3 ms-3'>";
                            echo "<div class='card-body'>";

                            // Cabeçalho com nome do usuário e data/hora
                            echo "<h6 class='card-title mb-1'><strong>" . $linha["UserID"] . "</strong></h6>";
                            echo "<small class='text-muted'>" . $linha["CommentDate"] . " às " . $linha["CommentTime"] . "</small><br>";

                            // Informações da sugestão
                            echo "<p class='mb-2 mt-2'><strong>Sugestão de identificação:</strong> " . $linha["Species"] . " - " . $linha["Classification"] . " - " . $linha["Sex"] . " - " . $linha["Age"] . "</p>";

                            // Comentário
                            echo "<p class='card-text'>" . nl2br($linha["Notes"]) . "</p>";

                            // Botão para mostrar/ocultar formulário
                            echo "<button class='btn btn-sm btn-outline-primary' type='button' onclick=\"toggleForm('form_$commentID')\">Responder</button>";

                            // Formulário escondido inicialmente
                            echo "
                            <div id='form_$commentID' style='display:none;' class='mt-3'>
                                <form method='post' action='./postacomentario.php'>
                                    <input type='hidden' name='PostID' value='" . $linha["PostID"] . "'>
                                    <input type='hidden' name='ParentCommentID' value='" . $commentID . "'>
                                    <div class='mb-3'>
                                        <label class='form-label'>Comentário</label>
                                        <textarea name='Notes' class='form-control' rows='3' required></textarea>
                                    </div>
                                    <button type='submit' class='btn btn-primary btn-sm'>Comentar</button>
                                </form>
                            </div>";

                            // Buscar respostas recursivamente
                            $filhos = mysqli_query($connection, "SELECT * FROM comments WHERE ParentCommentID=" . $commentID);
                            while ($filho = mysqli_fetch_array($filhos)) {
                                exibirComentario($filho, $connection); // chamada recursiva
                            }

                            echo "</div></div>"; // fecha card
                        }

                        // Comentários principais (sem pai)
                        $tabelacomentarios = mysqli_query($connection, "SELECT * FROM comments WHERE PostID=$PostID AND ParentCommentID IS NULL");
                        while ($linha = mysqli_fetch_array($tabelacomentarios)) {
                            exibirComentario($linha, $connection);
                        }
                        ?>
                    </div>

                    <form method="post" action="./postacomentario.php" class="mb-4">
                        <br><h6>Faça seu comentário!</h6>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Sugestão de identificação:</label>
                            <div class="row g-2">
                                <div class="col-md-3">
                                    <label for="Species" class="form-label">Espécie</label>
                                    <input type="text" class="form-control" name="Species" id="Species" placeholder="Sua espécie">
                                </div>
                                <div class="col-md-3">
                                    <label for="Classification" class="form-label">Classificação</label>
                                    <select name="Classification" id="Classification" class="form-select">
                                        <option value="" disabled selected>Selecione</option>
                                        <option value="Mammals">Mamífero</option>
                                        <option value="Reptiles">Réptil</option>
                                        <option value="Invertebrates">Invertebrados</option>
                                        <option value="Birds">Pássaro</option>
                                        <option value="Fish">Peixe</option>
                                        <option value="Amphibians">Anfíbio</option>
                                        <option value="Angiosperms">Angiospermas</option>
                                        <option value="Gymnosperms">Gimnospermas</option>
                                        <option value="Ferns">Samambaias</option>
                                        <option value="Lycophytes">Licófitos</option>
                                        <option value="Bryophytes">Briófitas</option>
                                        <option value="Algae">Algas</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="Age" class="form-label">Idade</label>
                                    <select name="Age" id="Age" class="form-select">
                                        <option value="" disabled selected>Selecione</option>
                                        <option value="Cub">Filhote</option>
                                        <option value="Young">Jovem</option>
                                        <option value="Adult">Adulto</option>
                                        <option value="UndentifiedAge">Não identificado</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="Sex" class="form-label">Sexo</label>
                                    <select name="Sex" id="Sex" class="form-select">
                                        <option value="" disabled selected>Selecione</option>
                                        <option value="Female">Feminino</option>
                                        <option value="Male">Masculino</option>
                                        <option value="UndentifiedSex">Não identificado</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Campos ocultos -->
                        <input type="hidden" name="PostID" value="<?php echo $PostID; ?>">

                        <div class="mb-3">
                            <label for="Notes" class="form-label">Comentário</label>
                            <textarea name="Notes" id="Notes" rows="4" class="form-control" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Comentar</button>
                    </form>

                </div>
            </div>
        </section>
    </main>
    <script>
        //exibição do comentário
        function toggleForm(id) {
            const form = document.getElementById(id);
            if (form.style.display === "none") {
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
        }

        //MAPA!!!
        var map = L.map('map').setView([<?php echo $Location ?>], 12);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var popup = L.popup();

        var marker = L.marker([<?php echo $Location ?>]).addTo(map);
        marker.bindPopup("<b>Este é o local do registro</b>").openPopup();

        var popup = L.popup()
            .setLatLng([<?php echo $Location ?>])
            .setContent("<b>Este é o local do registro</b>")
            .openOn(map);
    </script>

    <!-- FOOTER -->
    <footer class="site-footer section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-12">
                    <p class="copyright-text mt-lg-5 mt-4">
                        Copyright © 2048 <br> Topic Listing Center. <br><br>All rights reserved.
                        <br><br>Design: <a rel="nofollow" href="https://templatemo.com" target="_blank">TemplateMo</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- JAVASCRIPT FILES -->
    <script src="../assets/js/template/jquery.min.js"></script>
    <script src="../assets/js/template/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/template/jquery.sticky.js"></script>
    <script src="../assets/js/template/custom.js"></script>
</body>

</html>

<?php
mysqli_close($conexao);
?>