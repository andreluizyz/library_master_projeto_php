<?php

$titulo = "Página Inicial";
include 'conexao.php';

ob_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
    <style>
        .hero-section {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            flex-direction: column;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .hero-section p {
            font-size: 1.2rem;
            margin-bottom: 40px;
        }

        .btn-custom {
            background-color:rgb(0, 0, 0);
            color: white;
            padding: 12px 24px;
            font-size: 1.2rem;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-custom:hover {
            background-color:rgb(52, 51, 51);
        }

    </style>
</head>
<body>

<div class="hero-section">
    <h1>Bem-vindo a Melhor Biblioteca Virtual</h1>
    <p>Encontre e baixe todos livros disponiveis em nosso banco de dados!</p>
    <a href="login.php" class="btn btn-custom">Começar</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
$conteudo = ob_get_clean();
include 'base.php';
?>
