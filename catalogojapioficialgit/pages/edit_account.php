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
    <title>Catálogo JAPI - Editar Perfil</title>
    
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

        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../">Início</a></li>
                                <li class="breadcrumb-item"><a href="./account.php">Perfil de Usuário</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Editar Dados</li>
                            </ol>
                        </nav>
                        <h2 class="text-white">Editar Dados</h2>
                        <p class="text-white mt-3">
                            Edite aqui todos os Dados da sua Conta!
                        </p>
                    </div>
                </div>
            </div>
        </header>

        <section class="section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10 mx-auto">

                        <!-- ERROR ALERT -->
                        <div id="jsErrorContainer">
                            <?php if ($register_error): ?>
                                <div class="alert alert-danger text-center"><?php echo $register_error; ?></div>
                            <?php endif; ?>
                        </div>

                        
                        <form id="registerForm" action="../assets/php/account/update_account_check.php" method="post" enctype="multipart/form-data" class="custom-form contact-form" role="form">
                            <div class="row">

                                <!-- Coluna da esquerda com foto de perfil ocupando toda a altura -->
                                <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                                    <label class="form-label">Foto de perfil:</label>
                                    <img id="preview" src="../assets/media/profile_photos/<?php echo htmlspecialchars($userprofilephoto); ?>" alt="Preview" class="rounded mb-3" style="width: 190px; height: 190px; object-fit: cover; border: 1px solid #ccc;">
                                    <input type="file" name="userprofilephoto" id="photo" class="form-control" accept=".png, .jpg, .jpeg">
                                </div>

                                <!-- Coluna da direita com todos os demais campos -->
                                <div class="col-md-6">

                                    <!-- Campos Nome Completo, Nome de Usuário e Email -->
                                    <div class="form-floating mb-4">
                                        <input type="text" name="username" maxlength="120" class="form-control" value="<?php echo htmlspecialchars($username); ?>">

                                        <label>Nome Completo</label>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="text" name="userid" maxlength="30" class="form-control" required value="<?php echo htmlspecialchars($userid); ?>">

                                        <label>Nome de Usuário</label>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="email" name="useremail" maxlength="255" class="form-control" required value="<?php echo htmlspecialchars($useremail); ?>">

                                        <label>Email</label>
                                    </div>

                                    <!-- Linha das senhas, dentro da mesma coluna -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="password" name="userpassword_new" id="userpassword_new" maxlength="30" class="form-control">
                                                <label>Nova Senha</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="password" id="userconfirmpassword_new" maxlength="30" class="form-control">
                                                <label>Confirmar Nova Senha</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                                
                            <button type="submit" class="form-control btn btn-primary">SALVAR</button>
                            
                            <div class="row mt-2 g-3">
                                <div class="col-12 col-md-7 d-grid">
                                    <a href="" class="btn custom-btn custom-border-btn">Excluir Conta</a>
                                </div>
                                <div class="col-12 col-md-5 d-grid">
                                    <a href="./account.php" class="btn custom-btn custom-border-btn">Voltar</a>
                                </div>
                            </div> 
                        </form>
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
    <script src="../assets/js/auth/script.js"></script>
    <script src="../assets/js/account/edit_account.js"></script>
</body>

</html>
