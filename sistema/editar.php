<?php 
    include 'conexao.php';
    $id = $_POST['btnEditar'];
    $sql = $pdo->prepare("SELECT * FROM ALUNOS WHERE ID = ?");
    $sql->execute([$id]);
    $linha = $sql->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <title>Editar</title>
</head>
<body>
    <h1>Editar Aluno: <?php echo $linha['NOME'] ?></h1> 

    <div class="container">
        <form action="atualizar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $linha['ID']?>">

            <input type="text" name="nome" value="<?php echo $linha['NOME']?>">

            <input type="email" name="email" value="<?php echo $linha['EMAIL']?>">

            <input type="date" name="data" value="<?php echo $linha['DATA_NASCIMENTO']?>">

            <input type="submit" name="btnSalvar" value="Salvar" class="btn btn-primary">
        </form>
    </div>

</body>
</html>