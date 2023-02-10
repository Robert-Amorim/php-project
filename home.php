
<?php  require_once("header.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    
    </html>
    <main class="main" >
        <table class="tabela" border="1">
            <thead>
                <tr>
                <?php 
                    if($_SESSION['perfil'] == 1){
                        ?>
                    <th>Usuario</th>
                    <?php } ?>
                    <th>Título</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th> Categoria</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <?php foreach ($result_tarefas as $tarefa){ ?>
                <tr>
            <?php 
                if($_SESSION['perfil'] == 1){
            ?>
                <td> <?= $tarefa['nome']?></td>
            <?php } ?>
                <td><a href="visualizar_tarefa.php?cod=<?= $tarefa['codt']?>"><?= $tarefa['titulo']?></a></td>
                <td><?= date("d/m/Y", strtotime($tarefa['data']));?></td>
                <td><?= $tarefa['hora']?></td>
                <?php 
                    $cod_tarefa = $tarefa['categoria_cod'];
                    $sql = "SELECT * FROM categoria_tarefa WHERE cod = $cod_tarefa";
                    $result_cat = mysqli_query($con, $sql);
                    $cat_tarefa = mysqli_fetch_array($result_cat);
                    ?>
                <td><?= $cat_tarefa['nome']?></td>
                <td>
                    <a href="editar_tarefa.php?cod=<?= $tarefa['codt']?>"><i>edit</i></a>
                    <?php 
                        if($_SESSION['perfil'] == 1){
                            ?>
                    <a href="db/excluir_tarefa.php?cod=<?= $tarefa['codt']?>"><i>delete</i></a>
                    <?php 
                        }
                        ?>
                </td>
            </tr>
            <?php } ?>
        </table>
    </main>
</body>