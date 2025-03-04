<?php

$titulo = "Listar Livros";
include 'conexao.php';


$paginacao = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$limite = 20; 
$inicio = ($paginacao - 1) * $limite;

$total = $conexao->query("SELECT COUNT(*) FROM livros")->fetchColumn();
$total_paginas = ceil($total / $limite);

$sql = "SELECT * FROM livros ORDER BY created_at ASC LIMIT :inicio, :limite";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':inicio', $inicio, PDO::PARAM_INT);
$stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
$stmt->execute();
$livros = $stmt->fetchAll(PDO::FETCH_ASSOC);

ob_start();
?>

<h2 class="text-center mb-4">Lista de Livros</h2>
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome do Livro</th>
            <th>Autora</th>
            <th>Download</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($livros as $livro): ?>
            <tr>
                <td><?= $livro['id_livro'] ?></td>
                <td><?= $livro['nome_livro'] ?></td>
                <td><?= $livro['autora'] ?></td>
                <td>
                    <?php if (!empty($livro['arquivo'])): ?>
                        <a href="download.php?arquivo=<?= urlencode($livro['arquivo']) ?>" class="btn btn-success">Baixar</a>
                    <?php else: ?>
                        <span class="text-muted">Sem arquivo</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Paginação -->
<nav>
    <ul class="pagination justify-content-center">
        <?php if ($paginacao > 1): ?>
            <li class="page-item">
                <a class="page-link" href="?pagina=<?= $paginacao - 1 ?>">Anterior</a>
            </li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
            <li class="page-item <?= $i == $paginacao ? 'active' : '' ?>">
                <a class="page-link" href="?pagina=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($paginacao < $total_paginas): ?>
            <li class="page-item">
                <a class="page-link" href="?pagina=<?= $paginacao + 1 ?>">Próxima</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>

<?php
$conteudo = ob_get_clean();
include 'base.php';
?>
