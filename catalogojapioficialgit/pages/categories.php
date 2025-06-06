<!--

TemplateMo 590 topic listing

https://templatemo.com/tm-590-topic-listing

-->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=""> <!-- TASK: Completar isso aqui -->
    <meta name="author" content=""> <!-- TASK: Completar isso aqu -->
    <title>Catálogo JAPI - Categorias</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
    <link href="../assets/css/template/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/template/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/template/templatemo-topic-listing.css" rel="stylesheet">
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
                            <a class="nav-link" href="./account.php">Meu Perfil</a>
                        </li>

                    </ul>
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">

                        <li class="nav-item">
                            <div class="d-none d-lg-block">
                                <a class="nav-link click-scroll" href="./account.php">MEU PERFIL</a>
                                <a href="#" class="navbar-icon bi-person smoothscroll"></a>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </nav>

        <!-- HEADER -->
        <header class="hero-section d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-12 mx-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../">Início</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Categorias</li>
                            </ol>
                        </nav>

                        <h1 class="text-white text-center">Categorias</h1>

                        <h6 class="text-center">Que biodiversidade o trouxe aqui?</h6>

                    </div>
                </div>
            </div>
        </header>

        <!-- CLASSIFICATIONS SECTION-->
        <section class="section-padding section-bg">
            <div class="container">
                <div class="row">
                    <div class='col-md-6 mb-4'>
                        <div class='h-100 d-flex align-items-stretch'>
                                <div class='custom-block bg-white shadow-lg h-100 d-flex flex-column'>
                                    <a href='../assets/php/posts/filters.php?'>
                                        <div class='d-flex'>
                                            <div>
                                                <h5 class='mb-2'>Todos</h5>

                                                <p class='mb-0'>Todos os registros armazenados no Catálogo-Japi!
                                            </div>
                                        </div>

                                        <img src='../assets/media/images/All.jpg' class='custom-block-image img-fluid' style='width: 1000px; object-fit: cover;' alt='Todos'>
                                    </a>
                                </div>
                        </div>
                    </div>
                    <div class='col-md-6 mb-4'>
                        <div class='h-100 d-flex align-items-stretch'>
                                <div class='custom-block bg-white shadow-lg h-100 d-flex flex-column h-100 d-flex flex-column'>
                                    <a href='../assets/php/posts/filters.php?Mammals=1'>
                                        <div class='d-flex'>
                                            <div>
                                                <h5 class='mb-2'>Mamíferos</h5>

                                                <p class='mb-0'>Mamíferos avistados na serra do japi! Onças, jaguatirricas e gambás!
                                            </div>
                                        </div>

                                        <img src='../assets/media/images/Mammals.png' class='custom-block-image img-fluid' style='width: 1000px; object-fit: cover;' alt='Mamíferos'>
                                    </a>
                                </div>
                        </div>
                    </div>
                    <div class='col-md-6 mb-4'>
                        <div class='h-100 d-flex align-items-stretch'>
                            <div class='custom-block bg-white shadow-lg h-100 d-flex flex-column'>
                                <a href='../assets/php/posts/filters.php?Birds=1'>
                                    <div class='d-flex'>
                                        <div>
                                            <h5 class='mb-2'>Aves</h5>

                                            <p class='mb-0'>Aves avistadas na serra do japi! Tucanos, corujas e araras!
                                        </div>
                                    </div>

                                    <img src='../assets/media/images/Birds.jpg' class='custom-block-image img-fluid' style='width: 1000px; object-fit: cover;' alt='Aves'>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6 mb-4'>
                        <div class='h-100 d-flex align-items-stretch'>
                            <div class='custom-block bg-white shadow-lg h-100 d-flex flex-column'>
                                <a href='../assets/php/posts/filters.php?Reptiles=1'>
                                    <div class='d-flex'>
                                        <div>
                                            <h5 class='mb-2'>Répteis</h5>

                                            <p class='mb-0'>Répteis avistados na serra do japi! Cobras e lagartos!
                                        </div>
                                    </div>

                                    <img src='../assets/media/images/Reptiles.jpg' class='custom-block-image img-fluid' style='width: 1000px; object-fit: cover;' alt='Répteis'>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6 mb-4'>
                        <div class='h-100 d-flex align-items-stretch'>
                            <div class='custom-block bg-white shadow-lg h-100 d-flex flex-column'>
                                <a href='../assets/php/posts/filters.php?Amphibians=1'>
                                    <div class='d-flex'>
                                        <div>
                                            <h5 class='mb-2'>Anfíbios</h5>

                                            <p class='mb-0'>Anfíbios avistados na serra do japi! Sapos e rãs!
                                        </div>
                                    </div>

                                    <img src='../assets/media/images/Amphibians.jpg' class='custom-block-image img-fluid' style='width: 1000px; object-fit: cover;' alt='Anfíbios'>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6 mb-4'>
                        <div class='h-100 d-flex align-items-stretch'>
                            <div class='custom-block bg-white shadow-lg h-100 d-flex flex-column'>
                                <a href='../assets/php/posts/filters.php?Fish=1'>
                                    <div class='d-flex'>
                                        <div>
                                            <h5 class='mb-2'>Peixes</h5>

                                            <p class='mb-0'>Peixes encontrados nos rios da serra!
                                        </div>
                                    </div>

                                    <img src='../assets/media/images/Fish.jpg' class='custom-block-image img-fluid' style='width: 1000px; object-fit: cover;' alt='Peixes'>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6 mb-4'>
                        <div class='h-100 d-flex align-items-stretch'>
                            <div class='custom-block bg-white shadow-lg h-100 d-flex flex-column'>
                                <a href='../assets/php/posts/filters.php?Invertebrates=1'>
                                    <div class='d-flex'>
                                        <div>
                                            <h5 class='mb-2'>Invertebrados</h5>

                                            <p class='mb-0'>Insetos e outros invertebrados da região!
                                        </div>
                                    </div>

                                    <img src='../assets/media/images/Invertebrates.jpg' class='custom-block-image img-fluid' style='width: 1000px; object-fit: cover;' alt='Invertebrados'>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6 mb-4'>
                        <div class='h-100 d-flex align-items-stretch'>
                            <div class='custom-block bg-white shadow-lg h-100 d-flex flex-column'>
                                <a href='../assets/php/posts/filters.php?Angiosperms=1'>
                                    <div class='d-flex'>
                                        <div>
                                            <h5 class='mb-2'>Angiospermas</h5>

                                            <p class='mb-0'>Plantas com flores registradas na serra!
                                        </div>
                                    </div>

                                    <img src='../assets/media/images/Angiosperms.jpg' class='custom-block-image img-fluid' style='width: 1000px; object-fit: cover;' alt='Angiospermas'>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6 mb-4'>
                        <div class='h-100 d-flex align-items-stretch'>
                            <div class='custom-block bg-white shadow-lg h-100 d-flex flex-column'>
                                <a href='../assets/php/posts/filters.php?Gymnosperms=1'>
                                    <div class='d-flex'>
                                        <div>
                                            <h5 class='mb-2'>Gimnospermas</h5>

                                            <p class='mb-0'>Plantas gimnospermas, como pinheiros e afins!
                                        </div>
                                    </div>

                                    <img src='../assets/media/images/Gymnosperms.jpg' class='custom-block-image img-fluid' style='width: 1000px; object-fit: cover;' alt='Gimnospermas'>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6 mb-4'>
                        <div class='h-100 d-flex align-items-stretch'>
                            <div class='custom-block bg-white shadow-lg h-100 d-flex flex-column'>
                                <a href='../assets/php/posts/filters.php?Ferns=1'>
                                    <div class='d-flex'>
                                        <div>
                                            <h5 class='mb-2'>Samambaias</h5>

                                            <p class='mb-0'>Samambaias e outras pteridófitas da serra!
                                        </div>
                                    </div>

                                    <img src='../assets/media/images/Ferns.jpg' class='custom-block-image img-fluid' style='width: 1000px; object-fit: cover;' alt='Samambaias'>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6 mb-4'>
                        <div class='h-100 d-flex align-items-stretch'>
                            <div class='custom-block bg-white shadow-lg h-100 d-flex flex-column'>
                                <a href='../assets/php/posts/filters.php?Lycophytes=1'>
                                    <div class='d-flex'>
                                        <div>
                                            <h5 class='mb-2'>Licófitas</h5>

                                            <p class='mb-0'>Licófitas e vegetação rasteira da mata!
                                        </div>
                                    </div>

                                    <img src='../assets/media/images/Lycophytes.jpg' class='custom-block-image img-fluid' style='width: 1000px; object-fit: cover;' alt='Licófitas'>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6 mb-4'>
                        <div class='h-100 d-flex align-items-stretch'>
                            <div class='custom-block bg-white shadow-lg h-100 d-flex flex-column'>
                                <a href='../assets/php/posts/filters.php?Bryophytes=1'>
                                    <div class='d-flex'>
                                        <div>
                                            <h5 class='mb-2'>Briófitas</h5>

                                            <p class='mb-0'>Musgos e hepáticas nos ambientes úmidos!
                                        </div>
                                    </div>

                                    <img src='../assets/media/images/Bryophytes.jpg' class='custom-block-image img-fluid' style='width: 1000px; object-fit: cover;' alt='Briófitas'>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6 mb-4'>
                        <div class='h-100 d-flex align-items-stretch'>
                            <div class='custom-block bg-white shadow-lg h-100 d-flex flex-column'>
                                <a href='../assets/php/posts/filters.php?Algae=1'>
                                    <div class='d-flex'>
                                        <div>
                                            <h5 class='mb-2'>Algas</h5>

                                            <p class='mb-0'>Algas aquáticas e terrestres registradas!
                                        </div>
                                    </div>

                                    <img src='../assets/media/images/Algae.jpg' class='custom-block-image img-fluid' style='width: 1000px; object-fit: cover;' alt='Algas'>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6 mb-4'>
                        <div class='h-100 d-flex align-items-stretch'>
                            <div class='custom-block bg-white shadow-lg h-100 d-flex flex-column'>
                                <a href='../assets/php/posts/filters.php?UndeterminedClass=1'>
                                    <div class='d-flex'>
                                        <div>
                                            <h5 class='mb-2'>Indeterminado</h5>

                                            <p class='mb-0'>Organismos ainda não identificados corretamente!
                                        </div>
                                    </div>

                                    <img src='../assets/media/images/Undetermined.jpg' class='custom-block-image img-fluid' style='width: 1000px; object-fit: cover;' alt='Indeterminado'>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

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