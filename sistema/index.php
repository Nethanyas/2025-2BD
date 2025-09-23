<?php
    include 'conexao.php';
    $sql = $pdo->query("SELECT * FROM Alunos");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <title>Página Principal</title>
</head>

<body>
   
    

    <div class="container">
        <h1>Página Principal</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">aluno</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Data de nascimento</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($linha = $sql->fetch(PDO::FETCH_ASSOC)){

                 ?>        

                <tr>
                    <th scope="row"><?php echo $linha['ID']?></th>
                    <td><?php echo $linha['NOME']?></td>
                    <td><?php echo $linha['EMAIL']?></td>
                    <td><?php 
                            $partes = explode('-', $linha['DATA_NASCIMENTO']);
                            $data = "".$partes[2]."/".$partes[1]."/".$partes[0];
                            echo $data ?>
                    </td>

                    <td>
                        <form action="editar.php" method="POST">
                        <button class="btn btn-primary" name="btnEditar" value="<?php echo $linha['ID'];?>">Editar</button>
                    </form>
                    </td>

                    <td>
                        <form action="excluir.php" method="POST">
                        <button class="btn btn-danger" name="btnExcluir" value="<?php echo $linha['ID'];?>">Excluir</button>
                    </form>
                    </td>

                </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
    <div class="container"> 
        <form action="adicionar.php" method="POST">
        <input type="text" name="txtNome"
        placeholder="Digite o nome do aluno..." required>

        <input type="email" name="txtEmail"
        placeholder="Digite o email do aluno.." required>
        
        <input type="date" name="txtData"
        placeholder="Digite a data de nascimento do aluno..">

        <input type="submit" value="Salvar" name="btnSalvar" class="btn btn-success">
        </form>
    </div>
</body>

</html>