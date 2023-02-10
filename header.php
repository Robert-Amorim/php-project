<?php
session_start();
if(!isset($_SESSION['email']) and !isset($_SESSION['perfil'])){
    header("Location:login.php?erro=1");
}
require_once("db/conexao.php");

?>
<?php
    $cod = $_SESSION['cod'];
    if(isset($_GET['busca'])){
        $busca = $_GET['busca'];
    }else{
        $busca = '';
    }
   
    if($_SESSION['perfil'] != 1){
        $sql = "SELECT *, t.cod as codt FROM tarefas t where usuario_cod = $cod AND (titulo like '%$busca%' OR descricao like '%$busca%') order by data, hora asc";
    }else{
        $sql = "SELECT *, u.cod as codu, t.cod as codt 
        FROM tarefas t, usuario u 
        where 
        t.usuario_cod = u.cod  AND 
        (titulo like '%$busca%' OR 
        descricao like '%$busca%' OR 
        u.nome like '%$busca%') 
        order by data, hora asc";
    }
    $result_tarefas = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tarefas Diárias</title>
</head>
<body>
    <nav>
    <div class="nav-wrapper <?=$cor?>">
        <ul>
            <li class="test"><a href="cadastro_tarefa.php">Cadastrar Tarefa</a></li>
            <li><a href="home.php">Listar Tarefas</a> </li>
            <li><a href="db/sair.php">Sair</a></li> <br><br>
            <h2>Olá, <?= $_SESSION['nome']?></h2>
            <a></a>
        </ul>
        </div>
    </nav>
    