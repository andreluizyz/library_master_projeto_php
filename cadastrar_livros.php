<?php

$titulo = "Cadastrar Livro";
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $nome_livro = $_POST['nome_livro'];
    $autora = $_POST['autora'];

    if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] == 0) {
        $arquivo = $_FILES['arquivo'];

        $diretorio = "uploads/";

        if (!is_dir($diretorio)) {
            mkdir($diretorio, 0777, true);
        }

        $nomeArquivo = time() . "_" . basename($arquivo["name"]);
        $caminhoArquivo = $diretorio . $nomeArquivo;

        if (move_uploaded_file($arquivo["tmp_name"], $caminhoArquivo)) {
           
            $sql = "INSERT INTO livros (nome_livro, autora, arquivo) VALUES (?, ?, ?)";
            $stmt = $conexao->prepare($sql);
            $stmt->execute([$nome_livro, $autora, $nomeArquivo]);

            header("Location: listar_livros.php");
            exit();
        } else {
            $erro = "Erro ao fazer upload do arquivo.";
        }
    } else {
        $erro = "Nenhum arquivo foi enviado.";
    }
}

ob_start();
?>

<style>
    

    .card {
            width: 100%;
            max-width: 400px;
            margin: 20px;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
        }

        .card-header {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            color: #ff6600;
        }

        .form-control {
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .btn-custom {
            background-color: #ff6600;
            color: white;
            padding: 12px 24px;
            font-size: 1.2rem;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-custom:hover {
            background-color: #ff4500;
        }

        .toggle-btn {
            color: #ff6600;
            background: none;
            border: none;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 10px;
        }
		
</style>

<h2>Cadastrar Livro</h2>
<form method="POST" class="mt-5" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Nome do Livro</label>
        <input type="text" class="form-control" name="nome_livro" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Autora</label>
        <input type="text" class="form-control" name="autora" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Anexar arquivo livro:</label>
        <input type="file" class="form-control" name="arquivo" required>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

<?php if (isset($erro)) echo "<p class='text-danger'>$erro</p>"; ?>

<?php
$conteudo = ob_get_clean();
include 'base.php';
?>
