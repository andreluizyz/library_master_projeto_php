<?php
// session_start();
include 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo ?? "Library Master"; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(45deg,rgb(20, 21, 21),rgb(185, 183, 182));
            color: white;
            font-family: Arial, sans-serif;
        }
        
        
        /* .hidden {
            display: none;
        }
        .not-hidden {
            display: block;
        } */

        
        
        footer {
            text-align: center;
            margin-top: 40px;
            font-size: 1rem;
            color: white;
        }
		
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top bg-light navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#"><img id=""
            src="" alt="MDB Logo"
            draggable="false" height="30" /></a>
        <button class="navbar-toggler" type="button" data-mdb-collapse-init data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto align-items-center">
            <li class="nav-item">
            <a class="nav-link mx-2" href="listar_livros.php"><i class="fas fa-plus-circle pe-2"></i>Livros</a>
            </li>
            <li class="nav-item">
            <a class="nav-link mx-2" href="cadastrar_livros.php"><i class="fas fa-bell pe-2">Cadastrar Livro</i></a>
            </li>
            <li class="nav-item">
            <a class="nav-link mx-2" href="#!"><i class="fas fa-bell pe-2">Sobre</i></a>
            </li>
            <li class="nav-item ms-3">
            <a class="btn btn-dark btn-rounded" href="#!">Login</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    
    <!-- Conteúdo da página -->
    <?php echo $conteudo ?? "<p>Conteúdo não disponível</p>"; ?>
</div>

<footer>
    <p>&copy; 2025 Library Master. Todos os direitos reservados.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
