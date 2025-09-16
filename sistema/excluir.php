<?php
    include 'conexao.php';
    $id = $_POST['btExcluir'];

    $sql = $pdo->prepare("DELETE FROM ALUNOS WHERE ID = ?");
    $sql->execute([$id]);

    header("location: index.php");
    exit;

?>