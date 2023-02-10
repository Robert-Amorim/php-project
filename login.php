<?php
if(isset($_GET['erro'])){
    if($_GET['erro'] == 1){
        $erro = "Acesso Negado!";
    }else if($_GET['erro'] == 2){
        $erro = "E-mail ou senha inválidos!";
    }else if($_GET['erro'] == 3){
        $erro = "Logout realizado com sucesso!";
    }
}else{
    $erro = "";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Tarefas</title>
</head>
<body>
    <main>
    
    <form action="db/verifica_login.php" method="post" class="row">
        <div>
            <h3>Login</h3>
        </div>
        
        <div>
            <input type="text" name="login" id="login">
            <label for="login">E-mail</label>            
        </div>
        <div>
            <input type="password" name="senha" id="senha">
            <label for="senha">Senha</label>   
        </div>
        <div>
            <span id="error"><?php echo $erro; ?></span> <br>
            <button>Enviar</button> 
            <div></div>
            <a href="cadastro.php">Cadastre-se</a>
        </div>
      
    </form>
    
    </main>
</body>
</html>