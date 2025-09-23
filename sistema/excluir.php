<?php
    include 'conexao.php';
    $id = $_POST['btnExcluir'];

    // APAGAR MATRICULA SE EXISTIR
        $sql = $pdo->prepare("DELETE FROM MATRICULAS WHERE ALUNOS_ID = ?");
        $sql->execute([$id]);

        // apagar aluno
    $sql = $pdo->prepare("DELETE FROM ALUNOS WHERE ID = ?");
    $sql->execute([$id]);

    header("location: index.php");
    exit;

?>