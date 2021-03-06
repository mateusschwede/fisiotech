<?php
    require_once 'conect.php';
    session_start();
    if ((empty($_SESSION['nome'])) or (empty($_SESSION['senha']))) {header("location: index.php");}

    if((!empty($_POST['crefito'])) and (!empty($_POST['nome'])) and (!empty($_POST['senha']))) {
        $crefito = $_POST['crefito'];
        $nome = strtolower($_POST['nome']);
        $senha = strtolower($_POST['senha']);

        $r = $db->prepare("SELECT crefito FROM fisioterapeuta WHERE crefito=?");
        $r->execute(array($crefito));
        if($r->rowCount()>0) {$_SESSION['msgm'] = "<div class='alert alert-light alert-dismissible fade show' role='alert' id='msgErro'>Crefito já existente!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"; header("location: adminFisios.php");}
        else {
            $r = $db->prepare("INSERT INTO fisioterapeuta(crefito,nome,senha) VALUES (?,?,?)");
            $r->execute(array($crefito,$nome,$senha));
            $_SESSION['msgm'] = "<div class='alert alert-light alert-dismissible fade show' role='alert' id='msgSucesso'>Fisioterapeuta adicionado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            header("location: adminFisios.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
    <link rel="shortcut icon" href="https://img.icons8.com/ios-glyphs/30/000000/gymnastics.png"/>
    <title>FisioTech</title>
</head>
<body>
<div class="container-fluid">


    <div class="row">
        <div class="col-sm-12" id="menu">
            <h1><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="37" height="37" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M68.71042,17.12161c-3.16203,0.04943 -5.68705,2.6496 -5.64375,5.81172v44.90364c-0.10233,0.61915 -0.10233,1.2509 0,1.87005v15.36354l-16.90885,50.71536c-0.64852,1.94442 -0.21031,4.08713 1.14952,5.62081c1.35984,1.53369 3.43466,2.22529 5.44274,1.81425c2.00808,-0.41105 3.64427,-1.86229 4.29211,-3.80694l0.14557,-0.43672l21.22005,-46.10182h32.2388l21.38802,57.56849c0.78492,3.00208 3.81468,4.83587 6.83842,4.13902c3.02374,-0.69685 4.94529,-3.67173 4.3371,-6.71454l-14.28854,-66.6724c-2.25597,-10.54058 -11.64795,-18.12942 -22.42942,-18.12942h-27.51328l-4.44558,-39.85339v-0.27995c0.02122,-1.54972 -0.58581,-3.04203 -1.68279,-4.1369c-1.09698,-1.09487 -2.59045,-1.69903 -4.14013,-1.67482zM37.26667,63.06667c-7.91608,0 -14.33333,6.41725 -14.33333,14.33333c0,7.91608 6.41725,14.33333 14.33333,14.33333c7.91608,0 14.33333,-6.41725 14.33333,-14.33333c0,-7.91608 -6.41725,-14.33333 -14.33333,-14.33333zM97.2763,103.12161c-0.24779,0.01012 -0.49466,0.0363 -0.73906,0.07839h-9.1711l-6.94271,44.55651c-0.62342,2.0159 -0.08926,4.2113 1.39061,5.71545c1.47988,1.50415 3.66631,2.07394 5.69207,1.48339c2.02577,-0.59055 3.56349,-2.24601 4.00325,-4.30977l11.46667,-40.13333c0.06613,-0.22428 0.11849,-0.4524 0.15677,-0.68308l1.89245,-6.62917h-6.59557c-0.38084,-0.06492 -0.76727,-0.09118 -1.15339,-0.07839z"></path></g></g></svg>FisioTech</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <ul class="nav nav-pills nav-justified fixed-bottom bg-light">
                <li class="nav-item"><a class="nav-link active" href="adminFisios.php"><svg class="bi bi-people" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.995-.944v-.002.002zM7.022 13h7.956a.274.274 0 00.014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 00.022.004zm7.973.056v-.002.002zM11 7a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0zM6.936 9.28a5.88 5.88 0 00-1.23-.247A7.35 7.35 0 005 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 015 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 116 0 3 3 0 01-6 0zm3-2a2 2 0 100 4 2 2 0 000-4z" clip-rule="evenodd"/></svg><br>Físios</a></li>
                <li class="nav-item"><a class="nav-link" href="pAdmin.php"><svg class="bi bi-house" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 00.5.5h9a.5.5 0 00.5-.5V7h1v6.5a1.5 1.5 0 01-1.5 1.5h-9A1.5 1.5 0 012 13.5zm11-11V6l-2-2V2.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M7.293 1.5a1 1 0 011.414 0l6.647 6.646a.5.5 0 01-.708.708L8 2.207 1.354 8.854a.5.5 0 11-.708-.708L7.293 1.5z" clip-rule="evenodd"/></svg><br>Home</a></li>
                <li class="nav-item"><a class="nav-link" href="adminSessoes.php"><svg class="bi bi-calendar" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14 0H2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M6.5 7a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/></svg><br>Sessões</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <h1><svg class="bi bi-people" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.995-.944v-.002.002zM7.022 13h7.956a.274.274 0 00.014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 00.022.004zm7.973.056v-.002.002zM11 7a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0zM6.936 9.28a5.88 5.88 0 00-1.23-.247A7.35 7.35 0 005 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 015 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 116 0 3 3 0 01-6 0zm3-2a2 2 0 100 4 2 2 0 000-4z" clip-rule="evenodd"/></svg> Novo Fisioterapeuta</h1>
            <br>
            <form action="addFisio.php" method="post">
                <div class="form-group">
                    <input type="number" class="form-control" min=0 max=1000000000 required name="crefito" placeholder="Crefito">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" maxlength="70" required name="nome" placeholder="Nome">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" maxlength="5" required name="senha" placeholder="Senha">
                </div>
                <button type="button" class="btn btn-link" id="btnRed" onclick="window.location.href='adminFisios.php'">CANCELAR</button>
                <button type="submit" class="btn btn-link">ADICIONAR</button>
            </form>
        </div>
    </div>


</div>
</body>
</html>