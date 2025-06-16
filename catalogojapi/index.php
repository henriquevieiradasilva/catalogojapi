<!--

TemplateMo 590 topic listing

https://templatemo.com/tm-590-topic-listing

-->

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=""> <!-- TASK: Completar isso aqui -->
    <meta name="author" content=""> <!-- TASK: Completar isso aqui -->
    <title>Catálogo JAPI</title> <!-- TASK: Completar isso aqui -->

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
    <link href="./assets/css/template/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/template/bootstrap-icons.css" rel="stylesheet">
    <link href="./assets/css/template/templatemo-topic-listing.css" rel="stylesheet">
</head>

<body id="top">
    <main>

        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg" style="background-color: #80d0c7;">
            <div class="container">

                <a class="navbar-brand" href="#">
                    <span>Catálogo JAPÍ</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="./pages/categories.php">categorias</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="./pages/submit.php">novo registro</a> <!-- TASK: Arrumar para que atalho novo registro -->
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mostrar Registros</a>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="./assets/php/posts/filters.php?">Todos os Registros</a></li>
                                <hr>
                                <li><a class="dropdown-item" href="./assets/php/posts/filters.php?Mammals=1&Birds=1&Reptiles=1&Amphibians=1&Fish=1&Invertebrates=1">Registros da Fauna</a></li>
                                <li><a class="dropdown-item" href="./assets/php/posts/filters.php?Angiosperms=1&Gymnosperms=1&Ferns=1&Lycophytes=1&Bryophytes=1&Algae=1">Registros da Flora</a></li>
                                <hr>
                                <li><a class="dropdown-item" href="./assets/php/posts/filters.php?ExpertVerified=1">Verificados por Especialistas</a></li>      <!-- TASK: Arrumar atalho para posts veri. espec. -->
                                <li><a class="dropdown-item" href="./assets/php/posts/filters.php?">Discussão entre Especialistas</a></li>                      <!-- TASK: Arrumar atalho para posts disc. espec. -->
                                <li><a class="dropdown-item" href="./assets/php/posts/filters.php?CommunityVerified=1">Verificados pela Comunidade</a></li>     <!-- TASK: Arrumar atalho para posts veri. comun. -->
                                <li><a class="dropdown-item" href="./assets/php/posts/filters.php?">Discussão entre a Comunidade</a></li>                       <!-- TASK: Arrumar atalho para posts disc. comun. -->
                                <li><a class="dropdown-item" href="./assets/php/posts/filters.php?UndeterminedClass=1">Não Identificados</a></li>
                            </ul>
                        </li>

                        <li class="nav-item d-lg-none">
                            <a class="nav-link" href="./pages/account.php">Meu Perfil</a>
                        </li>

                    </ul>
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">

                        <li class="nav-item">
                            <div class="d-none d-lg-block">
                                <a class="nav-link click-scroll" href="./pages/account.php">MEU PERFIL</a>
                                <a href="./pages/account.php" class="navbar-icon bi-person smoothscroll"></a>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </nav>

        <!-- HEADER -->
        <header class="hero-section d-flex justify-content-center align-items-center" id="section_1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 mx-auto">
                        <h1 class="text-white text-center">Catálogo JAPI</h1>
                        <h6 class="text-center">A plataforma da biodiversidade da serra.</h6>

                        <form method="post" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search"
                            action="./assets/php/posts/filters.php">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bi-search" id="basic-addon1"></span>
                                <input name="pesquisa" type="search" class="form-control" id="pesquisa"
                                    placeholder="Pesquisar catálogo por nome da espécie" aria-label="Search">
                                <button type="submit" class="form-control">Pesquisar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- FEATURED SECTION -->
        <section class="featured-section">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                        <div class="custom-block bg-white shadow-lg">
                            <a href="./pages/categories.php">
                                <div class="d-flex">
                                    <div>
                                        <h5 class="mb-2">Categorias</h5>
                                        <p class="mb-0">Explorar as categorias de seres registrados na serra do japí. Aqui sua pesquisa é personalizada para o que você procura.</p>
                                    </div>
                                    <span class="badge bg-design rounded-pill ms-auto">13</span>
                                </div>
                                <img src="./assets/media/images/All.jpg" class="custom-block-image img-fluid" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="custom-block custom-block-overlay">
                            <div class="d-flex flex-column h-100">
                                
                                <img src="./assets/media/template/businesswoman-using-tablet-analysis.jpg" class="custom-block-image img-fluid" alt="">

                                <div class="custom-block-overlay-text d-flex">
                                    <div>
                                        <h5 class="text-white mb-2">Sobre o projeto</h5>
                                        <p class="text-white">
                                                Sistema criado por dois alunos da Fatec Jundiaí para ajudar no armazenamento e consulta de registros da Serra do Japi.
                                        </p>
                                        <!--<a href="https://www.cps.sp.gov.br/cursos-fatec/analise-e-desenvolvimento-de-sistemas/" class="btn custom-btn mt-2 mt-lg-3">Veja mais</a> --> <!-- TASK: Arrumar de forma geral as informações sobre a Serra-->
                                    </div>
                                </div>
                                
                                <div class="social-share d-flex flex-column flex-md-row align-items-start align-items-md-center">
                                    <p class="text-white me-md-4 mb-2 mb-md-0">Redes Sociais:</p>
                                    <ul class="social-icon d-flex">
                                        <li class="social-icon-item me-2">
                                            <a href="#" class="social-icon-link bi-instagram"></a> <!-- TASK: Fazer icone funcionar para rede social do projeto-->
                                        </li>
                                        <li class="social-icon-item me-2">
                                            <a href="#" class="social-icon-link bi-github"></a> <!-- TASK: Fazer icone funcionar para rede social do projeto -->
                                        </li>
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-linkedin"></a> <!-- TASK: Fazer icone funcionar para rede social do projeto -->
                                        </li>
                                    </ul>
                                </div>

                                <div class="section-overlay"></div>
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- FREQUENTLY ASKED QUESTIONS SECTION --> 
        <section class="faq-section section-padding" id="section_2">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8 col-12">
                        <h2 class="mb-5">Sobre a Serra</h2>

                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Onde fica?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body text-start">
                                        <a href="https://goo.gl/maps/M482Lu1VAivkS9pD6" target="_blank">
                                            Clique aqui para descobrir como chegar na serra.
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Como visitar a serra?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body text-start">
                                        Primeiro, 
                                        <a href="https://jundiai.sp.gov.br/planejamento-e-meio-ambiente/visitacao-monitorada/circuitos-visitaveis-dentro-da-reserva/" target="_blank">
                                            escolha sua rota
                                        </a>, depois, 
                                        <a href="https://jundiai.sp.gov.br/planejamento-e-meio-ambiente/visitacao-monitorada/programacao-de-visitas/" target="_blank">
                                            consulte as datas e trilhas disponíveis
                                        </a> e 
                                        <a href="https://docs.google.com/spreadsheets/d/1Xb6A1BdblEjhWhmKLh0ZMPJoPT4sxTZ9KlTIddG3Xec/edit?pli=1&gid=0#gid=0" target="_blank">
                                            realize seu agendamento com um dos educadores ambientais!
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Onde posso aprender mais sobre a Serra do Japi?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body text-start">
                                        A Serra do Japi tem seu próprio site, patrocinado pela prefeitura de Jundiaí. 
                                        <a href="https://serradojapi.jundiai.sp.gov.br/institucional/" target="_blank">
                                            Clique aqui!
                                        </a>
                                    </div>
                                </div>
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
    <script src="./assets/js/template/jquery.min.js"></script>
    <script src="./assets/js/template/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/template/jquery.sticky.js"></script>
    <script src="./assets/js/template/custom.js"></script>
</body>

</html>
