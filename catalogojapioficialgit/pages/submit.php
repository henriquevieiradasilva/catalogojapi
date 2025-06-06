<?php 
    require '../assets/php/auth/login_check_true.php'; 
    require '../assets/php/db.php';
    date_default_timezone_set('America/Sao_Paulo');
    $date = new DateTimeImmutable();
?>

<!--

TemplateMo 590 topic listing

https://templatemo.com/tm-590-topic-listing

-->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> </title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
    <link href="../assets/css/template/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/template/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/template/templatemo-topic-listing.css" rel="stylesheet">
    <link href="../assets/css/window.css" rel="stylesheet">

    <style>
        .map-wrapper {
            width: 100%;
            height: 300px;
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

</head>

<body class="topics-listing-page" id="top">
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
                                <li class="breadcrumb-item"><a href="../menu.php">Menu</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Postar Registro</li>
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
                        <h3 class="mb-4 pb-2">Insira informações do seu registro</h3>
                    </div>


                    <form action="../assets/php/posts/postarconfirm.php?Crud=I" method="post" enctype="multipart/form-data" class="custom-form contact-form" role="form">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-floating">
                                    <select name="Classification" id="Classification" class="form-control">
                                        <option value="" disabled selected>Selecione classificação</option>
                                        <option value="Mammals">Mamífero</option>
                                        <option value="Birds">Pássaro</option>
                                        <option value="Reptiles">Réptil</option>
                                        <option value="Fish">Peixe</option>
                                        <option value="Amphibians">Anfíbio</option>
                                        <option value="Invertebrates">Invertebrados</option>
                                        <option value="Angiosperms">Gimnosperma</option>
                                        <option value="Gymnosperms">Gimnosperma</option>
                                        <option value="Ferns">Samambaia</option>
                                        <option value="Lycophytes">Licófita</option>
                                        <option value="Bryophytes">BRiófita</option>
                                        <option value="Algae">Alga</option>
                                    </select>

                                    <label for="floatingInput">Classificação</label>
                                </div>
                                <div class="form-floating">
                                    <select name="Sex" id="Sex" class="form-control">
                                        <option value="" disabled selected>Selecione sexo</option>
                                        <option value="Female">Feminino</option>
                                        <option value="Male">Masculino</option>
                                        <option value="Undentified">Não identificado</option>
                                    </select>

                                    <label for="floatingInput">Sexo</label>
                                </div>

                                <div class="form-floating">
                                    <input type="date" id="RecordDate" name="RecordDate" class="form-control" value="<?php echo date_format($date, 'Y-m-d') ?>" min="2000-01-01" max="<?php echo date_format($date, 'Y-m-d') ?>" required />
                                    <label for="floatingInput">Dia do registro</label>
                                </div>

                                <div class="mb-3">
                                    <label for="imagens" class="form-label">Selecione suas imagens</label>
                                    <input type="file" name="imagens[]" id="imagens" accept="image/*" class="form-control" multiple>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-floating">
                                    <input type="text" name="Species" id="Species" class="form-control" placeholder="Nome científico">

                                    <label for="floatingInput">Nome científico</label>
                                </div>
                                <div class="form-floating">
                                    <select name="Age" id="Age" class="form-control">
                                        <option value="" disabled selected>Selecione idade</option>
                                        <option value="Cub">Filhote</option>
                                        <option value="Young">Jovem</option>
                                        <option value="Adult">Adulto</option>
                                        <option value="Undentified">Não identificado</option>
                                    </select>

                                    <label for="floatingInput">Idade</label>
                                </div>
                                <div class="form-floating">
                                    <input type="time" id="RecordTime" name="RecordTime" class="form-control" required>
                                    <label for="floatingInput">Hora do registro</label>
                                </div>

                                <div class="mb-3">
                                    <label for="videos" class="form-label">Selecione seus vídeos</label>
                                    <input type="file" name="videos[]" id="videos" accept="video/*" class="form-control" multiple>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12">

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="SensitiveContent" name="SensitiveContent">
                                    <label class="form-check-label" for="SensitiveContent">
                                        A imagem contém conteúdo sensível? (ex: atropelamento)
                                    </label>
                                </div>

                                <div class="form-floating">
                                    <textarea class="form-control" id="Notes" name="Notes" placeholder="Observações"></textarea>

                                    <label for="floatingTextarea">Observações</label>
                                </div>

                                <div class="form-floating">
                                    <div class="map-wrapper">
                                        <div id="map"></div>
                                    </div> <br>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-floating">
                                    <input type="text" name="Location" id="Location" readonly required class="form-control">
                                    <label for="floatingInput">Localização</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-floating">
                                    <button type="submit" class="form-control">Enviar</button>
                                </div>
                            </div>

                        </div>
                    </form>


                </div>
            </div>
        </section>

    </main>

    <script>
        var map = L.map('map').setView([-23.295623, -46.974106], 12);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var popup = L.popup();

        var coord;

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("Esse é o local do seu registro")
                .openOn(map);
            let coord = e.latlng;
            document.getElementById("Location").value = coord;
        }

        map.on('click', onMapClick);

        document.querySelector("form").addEventListener("submit", function(e) {
            const location = document.getElementById("Location").value.trim();

            if (!location) {
                alert("Por favor, selecione um local no mapa.");
                e.preventDefault(); // impede o envio do formulário
            }
        });
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