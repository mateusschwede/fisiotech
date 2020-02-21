<?php
    require_once 'extras/start.php';
    
    if( (!empty($_POST['nome'])) && (!empty($_POST['senha'])) ) {
        $nome = strtolower($_POST['nome']);
        $senha = strtolower($_POST['senha']);

        //No caso do Admin
        if(($nome == "admin") && ($senha == "admin")) {
            $_SESSION['nome'] = $nome;
            $_SESSION['senha'] = $senha;
            header('location: admIndex.php');
        }

        //No caso de Fisioterapeuta
        $r = $db->prepare('SELECT nome,senha FROM fisioterapeuta WHERE nome=:nome AND senha=:senha');
        $r->execute(array(':nome'=>$nome,':senha'=>$senha));

        if($r->rowCount() != 0) {
            $_SESSION['nome'] = $nome;
            $_SESSION['senha'] = $senha;
            header('location: fisioIndex.php');
        }
    }
?>

<div class="row">
    <div class="col-sm-12">
        <img src="https://img.icons8.com/color/100/000000/triceps.png">
        <h1>FisioTech</h1>

        <form action="index.php" method="post">
            <input type="text" name="nome" placeholder="Nome" maxlength="70">
            <input type="password" name="senha" placeholder="Senha" minlength="5" maxlength="5">
            <input type="submit" value="Entrar">
        </form>
    </div>
</div>