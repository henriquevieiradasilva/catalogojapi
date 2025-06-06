<?php require '../assets/php/auth/login_check_true.php'; ?>

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
    <meta name="author" content=""> <!-- TASK: Completar isso aqu -->
    <title>Catálogo JAPI - Perfil</title>
    
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
    <link href="../assets/css/template/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/template/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/template/templatemo-topic-listing.css" rel="stylesheet">
    <link href="../assets/css/window.css" rel="stylesheet">
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

        <!-- HEADER -->
        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../">Início</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Perfil de Usuário</li>
                            </ol>
                        </nav>

                        <h2 class="text-white">Perfil de Usuário</h2>
                        <p class="text-white mt-3">Gerencie dados da sua Conta e o seu Histórico de Comentários e Postagens!</p>
                    </div>
                </div>
            </div>
        </header>

        <!-- PERFIL SECTION-->
        <section class="section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10">
                        <div class="row">

                            <div class="col-md-4 text-center">
                                <img src="../assets/media/profile_photos/<?php echo htmlspecialchars($userprofilephoto); ?>" 
                                    class="rounded-circle mb-3" 
                                    style="width: 200px; height: 200px; object-fit: cover;" 
                                    alt="Foto de Perfil">
                                
                                <p class="fw-bold">@<?php echo htmlspecialchars($userid); ?></p>
                                <p><?php echo htmlspecialchars($username); ?></p>
                            </div>

                         

                            <div class="col-md-8">
                                <div class="mb-4">

                                       <!-- ERROR ALERT -->
                                    <div id="jsErrorContainer">
                                        <?php if ($register_error): ?>
                                            <div class="alert alert-danger text-center"><?php echo $register_error; ?></div>
                                        <?php endif; ?>
                                    </div>

                                    <div id="jsErrorContainer">
                                        <?php if ($register_success): ?>
                                            <div class="alert alert-success text-center"><?php echo $register_success; ?></div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <h5>Status de Especialista</h5>
                                    <?php if ($isexpert): ?>
                                    <div class="alert alert-success">Você é um especialista!</div>
                                    <?php else: ?>
                                    <div class="alert alert-warning">
                                        Você não é um especialista. Envie seu currículo Lattes:
                                        <form id="lattesForm" action='../assets/php/account/expert_register.php' method='post' class="mt-3">
                                            <div class="mb-3">
                                                <input type='text' maxlength='65500' name='userlattes' id='userlattes' class="form-control" placeholder="Link do currículo Lattes" value="<?php echo htmlspecialchars($wlattes); ?>" required>
                                            </div>
                                            <input type='submit' value='ENVIAR' class="btn custom-btn mt-2 mt-lg-3"> <!-- TASK: Fazer isso aqui funcionar -->
                                        </form>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row mt-4 g-2">
                                <div class="col-12 col-md-5 d-grid">
                                    <a href="#" class="btn custom-btn custom-border-btn">Histórico Completo</a> <!-- TASK: Fazer isso aqui funcionar -->
                                </div>
                                <div class="col-12 col-md-4 d-grid">
                                    <a href="./edit_account.php" class="btn custom-btn custom-border-btn">Editar Dados da Conta</a>
                                </div>
                                <div class="col-12 col-md-3 d-grid">
                                    <a href="../assets/php/auth/logout.php" class="btn custom-btn custom-border-btn">Sair da Conta</a>
                                </div>
                                <div class="col-12 d-grid mt-3">
                                    <a href="../" class="btn custom-btn">Voltar</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- POP-UP -->
    <?php if ($register_error): ?>
        <div id="overlay">
            <div id="popup">
                <button id="closeBtn">&times;</button>
                <p><?php echo $register_error; ?></p>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($register_success): ?>
        <div id="overlay">
            <div id="popup">
                <button id="closeBtn">&times;</button>
                <p><?php echo $register_success; ?></p>
            </div>
        </div>
    <?php endif; ?>

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
    <script src="../assets/js/account/validate_lattes.js"></script>
    <script src="../assets/js/auth/auth.js"></script>
</body>

</html>
