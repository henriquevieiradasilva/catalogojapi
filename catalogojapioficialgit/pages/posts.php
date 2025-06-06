<?php
date_default_timezone_set('America/Sao_Paulo');
$date = new DateTimeImmutable();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Catálogo</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">

    <link href="../assets/css/template/bootstrap.min.css" rel="stylesheet">

    <link href="../assets/css/template/bootstrap-icons.css" rel="stylesheet">

    <link href="../assets/css/template/templatemo-topic-listing.css" rel="stylesheet">

    <style>
        .dropdown-menu.custom-dropdown {
            position: relative;
            left: 50%;
            transform: translateX(-50%);
            width: 90vw;
            max-width: 600px;
            min-width: 300px;
            margin-top: 0.5rem;
            z-index: 5;
            /* Aumente para garantir que fique acima */
        }

        header {
            overflow: visible;
            position: relative;
            z-index: 1;
        }
    </style>
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
        <header class="hero-section d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-12 mx-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../">Início</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Catálogo</li>
                            </ol>
                        </nav>

                        <h1 class="text-white text-center">Catálogo</h1>

                        <form method="post" action="./filtros.php" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bi-search" id="basic-addon1">

                                </span>

                                <input name="pesquisa" type="search" class="form-control" id="pesquisa" placeholder="Nome científico da espécie" aria-label="Search">

                                <button type="submit" class="form-control">Pesquisar</button>
                            </div>
                        </form>
                        <!--
                        <div class="d-flex justify-content-center mt-4 position-relative">
                            <button class="custom-btn w-100" type="button" id="Postar">
                                Postar Registro
                            </button>
                        </div>
                        -->
                        <div class="d-flex justify-content-center mt-4 position-relative">
                            <button class="btn dropdown-toggle custom-btn w-100" type="button" id="filtroBtn">
                                Exibir Filtros
                            </button>
                        </div>


                    </div>
                </div>
            </div>
        </header>

        <div id="dropdownContainer" class="dropdown-menu custom-dropdown p-4" style="display: none;" aria-labelledby="filtroBtn">
            <form class="row g-3" method="post" action="../assets/php/filters.php">

                <div class="col-md-6">

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="M" name="M">
                        <label class="form-check-label" for="M">
                            Mostrar somente meus registros
                        </label>
                    </div>

                    <h6>Estado de verificação</h6>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="Unidentified" name="Unidentified">
                        <label class="form-check-label" for="Unidentified">
                            Não verifiicado
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="ExpertVerified" name="ExpertVerified">
                        <label class="form-check-label" for="ExpertVerified">
                            Verificado pelos especialistas
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="CommunityVerified" name="CommunityVerified">
                        <label class="form-check-label" for="CommunityVerified">
                            Verificado pela comunidade
                        </label>
                    </div>

                    <h6>Sexo</h6>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="UndeterminedSex" name="UndeterminedSex">
                        <label class="form-check-label" for="UndeterminedSex">
                            Indeterminado
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="Male" name="Male">
                        <label class="form-check-label" for="Male">
                            Macho
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="Female" name="Female">
                        <label class="form-check-label" for="Female">
                            Fêmea
                        </label>
                    </div>

                    <h6>Idade</h6>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="UndeterminedAge" name="UndeterminedAge">
                        <label class="form-check-label" for="UndeterminedAge">
                            Indeterminado
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="Adult" name="Adult">
                        <label class="form-check-label" for="Adult">
                            Adulto
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="Young" name="Young">
                        <label class="form-check-label" for="Young">
                            Jovem
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="Cub" name="Cub">
                        <label class="form-check-label" for="Cub">
                            Indeterminado
                        </label>
                    </div>

                    <div class="form-floating">
                        <input type="date" id="RecordDate" name="RecordDate" class="form-control" min="2000-01-01" max="<?php echo date_format($date, 'Y-m-d') ?>" />
                        <label for="floatingInput">Dia do registro</label>
                    </div> <br>

                    <div class="form-floating">
                        <input type="date" id="PublishDate" name="PublishDate" class="form-control" min="2000-01-01" max="<?php echo date_format($date, 'Y-m-d') ?>" />
                        <label for="floatingInput">Dia da postagem</label>
                    </div>

                </div>


                <div class="col-md-6">

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="UndeterminedClass" name="UndeterminedClass">
                        <label class="form-check-label" for="UndeterminedClass">
                            Classificação popular indeterminada
                        </label>
                    </div>

                    <h6>Fauna</h6>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="Mammals" name="Mammals">
                        <label class="form-check-label" for="Mammals">
                            Mamíferos
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="Birds" name="Birds">
                        <label class="form-check-label" for="Birds">
                            Pássaros
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="Reptiles" name="Reptiles">
                        <label class="form-check-label" for="Reptiles">
                            Répteis
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="Amphibians" name="Amphibians">
                        <label class="form-check-label" for="Amphibians">
                            Anfíbios
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="Fish" name="Fish">
                        <label class="form-check-label" for="Fish">
                            Peixes
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="Invertebrates" name="Invertebrates">
                        <label class="form-check-label" for="Invertebrates">
                            Invertebrados
                        </label>
                    </div>

                    <h6>Flora</h6>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="Angiosperms" name="Angiosperms">
                        <label class="form-check-label" for="Angiosperms">
                            Angiospermas
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="Gymnosperms" name="Gymnosperms">
                        <label class="form-check-label" for="Gymnosperms">
                            Gimnospermas
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="Ferns" name="Ferns">
                        <label class="form-check-label" for="Ferns">
                            Samambaia
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="Lycophytes" name="Lycophytes">
                        <label class="form-check-label" for="Lycophytes">
                            Licófitas
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="Bryophytes" name="Bryophytes">
                        <label class="form-check-label" for="Bryophytes">
                            Briófitas
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="Algae" name="Algae">
                        <label class="form-check-label" for="Algae">
                            Algas
                        </label>
                    </div>

                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary mt-3">Aplicar</button>
                </div>

            </form>
        </div>

        <section class="section-padding section-bg">
            <div class="container">
                <div class="row">
                    <?php
                    include "../assets/php/db.php";

                    if (isset($_POST["pesquisa"])) {
                        $pesquisa = $_POST["pesquisa"];
                        $tabela = mysqli_query($connection, $pesquisa);
                    }

                    while ($linha = mysqli_fetch_array($tabela)) {
                        $PostID = (int)$linha['PostID'];
                        $tabelaimagem = mysqli_query($connection, "SELECT ImageName FROM photos WHERE PostID=$PostID");
                        if (mysqli_num_rows($tabelaimagem) > 0) {
                            $imagem = "../assets/media/photos/" . mysqli_fetch_array($tabelaimagem)['ImageName'];
                        } else {
                            $imagem = "../assets/media/photos/placeholder.jpg";
                        }
                        $autorID = $linha['UserID'];
                        $tabelaautor = mysqli_query($connection, "SELECT * FROM users WHERE UserID='$autorID'");
                        $nomeautor = mysqli_fetch_array($tabelaautor)["Name"];
                        $Species = $linha["Species"];
                        $RecordDate = $linha["RecordDate"];
                        $RecordTime = $linha["RecordTime"];
                        $VerificationStatus = $linha["VerificationStatus"];
                        echo "
                    <div class='col-md-4 mb-4'>
                        <div class='d-flex align-items-center gap-3'>
                            <div class='custom-block bg-white shadow-lg'>
                                <a href='./post.php?PostID=$PostID'>
                                    <div class='d-flex'>
                                        <div>
                                            <h5 class='mb-2'>$Species</h5>

                                            <p class='mb-0'>Registrado por: $nomeautor;<br>Registrado em: $RecordDate;<br>Às: $RecordTime;<br>$VerificationStatus.</p>
                                        </div>

                                        <span class='badge bg-design rounded-pill ms-auto'>$PostID</span>
                                    </div>

                                    <img src='$imagem' class='custom-block-image img-fluid' alt=''>
                                </a>
                            </div>
                        </div>
                    </div>";
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>
    <script>
        document.getElementById("Postar").addEventListener("click", function() {
            window.location.href = "./postar.php";
        });

        const btn = document.getElementById('filtroBtn');
        const menu = document.getElementById('dropdownContainer');

        btn.addEventListener('click', () => {
            const rect = btn.getBoundingClientRect();
            menu.style.position = 'absolute';
            menu.style.top = `${rect.bottom + window.scrollY + 8}px`; // +8 para margem
            menu.style.left = `${rect.left + rect.width / 2}px`;
            menu.style.transform = 'translateX(-50%)';
            menu.style.display = menu.style.display === 'none' || menu.style.display === '' ? 'block' : 'none';
        });

        // Fecha o menu ao clicar fora
        document.addEventListener('click', function(event) {
            if (!btn.contains(event.target) && !menu.contains(event.target)) {
                menu.style.display = 'none';
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

<?php
    mysqli_close($connection);
?>