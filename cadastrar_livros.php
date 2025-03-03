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
    form {
        max-width: 400px;
        margin: 0 auto;
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
