<?php
    include 'conexao.php';
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data = $_POST['data'];

    $sql = $pdo->prepare("UPDATE ALUNOS SET NOME = ?, EMAIL = ?, DATA_NASCIMENTO = ? WHERE ID = ?" );
    $sql->execute([$nome, $email, $data, $id]);
    header("location: index.php");
    exit;
?>