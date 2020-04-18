<?php
    require_once 'conect.php';
    session_start();
    if ((empty($_SESSION['nome'])) or (empty($_SESSION['senha']))) {header("location: index.php");}

    if(!empty($_GET['cpf'])) {
        $cpf = base64_decode($_GET['cpf']);
        $r = $db->prepare("UPDATE paciente SET ativo=true WHERE cpf=?");
        $r->execute(array($cpf));
        $_SESSION['msgm'] = "<div class='alert alert-light alert-dismissible fade show' role='alert' id='msgSucesso'>Paciente ativado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        header("location: fisioPacientes.php");
    }
?>