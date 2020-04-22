<?php
    require_once 'conect.php';
    session_start();
    if ((empty($_SESSION['nome'])) or (empty($_SESSION['senha']))) {header("location: index.php");}
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
                <li class="nav-item"><a class="nav-link" href="adminFisios.php"><svg class="bi bi-people" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.995-.944v-.002.002zM7.022 13h7.956a.274.274 0 00.014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 00.022.004zm7.973.056v-.002.002zM11 7a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0zM6.936 9.28a5.88 5.88 0 00-1.23-.247A7.35 7.35 0 005 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 015 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 116 0 3 3 0 01-6 0zm3-2a2 2 0 100 4 2 2 0 000-4z" clip-rule="evenodd"/></svg><br>Físios</a></li>
                <li class="nav-item"><a class="nav-link" href="pAdmin.php"><svg class="bi bi-house" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 00.5.5h9a.5.5 0 00.5-.5V7h1v6.5a1.5 1.5 0 01-1.5 1.5h-9A1.5 1.5 0 012 13.5zm11-11V6l-2-2V2.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M7.293 1.5a1 1 0 011.414 0l6.647 6.646a.5.5 0 01-.708.708L8 2.207 1.354 8.854a.5.5 0 11-.708-.708L7.293 1.5z" clip-rule="evenodd"/></svg><br>Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="adminSessoes.php"><svg class="bi bi-calendar" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14 0H2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M6.5 7a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/></svg><br>Sessões</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <h1><svg class="bi bi-calendar" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14 0H2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M6.5 7a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/></svg> Sessões</h1>
            <?php if ($_SESSION['msgm']!=null) {echo $_SESSION['msgm'];$_SESSION['msgm']=null;} ?>
            <br>

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Pesquisa por Crefito <svg class="bi bi-box-arrow-down" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.646 11.646a.5.5 0 01.708 0L8 14.293l2.646-2.647a.5.5 0 01.708.708l-3 3a.5.5 0 01-.708 0l-3-3a.5.5 0 010-.708z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M8 4.5a.5.5 0 01.5.5v9a.5.5 0 01-1 0V5a.5.5 0 01.5-.5z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M2.5 2A1.5 1.5 0 014 .5h8A1.5 1.5 0 0113.5 2v7a1.5 1.5 0 01-1.5 1.5h-1.5a.5.5 0 010-1H12a.5.5 0 00.5-.5V2a.5.5 0 00-.5-.5H4a.5.5 0 00-.5.5v7a.5.5 0 00.5.5h1.5a.5.5 0 010 1H4A1.5 1.5 0 012.5 9V2z" clip-rule="evenodd"/></svg></button></h2>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <form action="adminSessoes.php" method="post">
                            <div class="form-group">
                                <label for="dia">Dia</label>
                                <input type="date" id="dia" class="form-control" required name="dia">
                            </div>
                            <div class="form-group">
                                <label for="selectCrefito">Crefito</label>
                                <select class="form-control" required id="selectCrefito" name="crefito">
                                    <?php
                                        $r = $db->query("SELECT * FROM fisioterapeuta ORDER BY crefito");
                                        $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($linhas as $l) {echo "<option value=".$l['crefito'].">".$l['crefito']." ".$l['nome']."</option>";}
                                    ?>
                                </select>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="realizada" value="1" id="checkRealizada">
                                <label class="form-check-label" for="checkRealizada">Realizada</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="cancelada" value="1" id="checkCancelada">
                                <label class="form-check-label" for="checkCancelada">Cancelada</label>
                            </div>
                            <button type="submit" class="btn btn-link">LISTAR</button>
                        </form>
                    </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0"><button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Pesquisa por Cpf <svg class="bi bi-box-arrow-down" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.646 11.646a.5.5 0 01.708 0L8 14.293l2.646-2.647a.5.5 0 01.708.708l-3 3a.5.5 0 01-.708 0l-3-3a.5.5 0 010-.708z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M8 4.5a.5.5 0 01.5.5v9a.5.5 0 01-1 0V5a.5.5 0 01.5-.5z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M2.5 2A1.5 1.5 0 014 .5h8A1.5 1.5 0 0113.5 2v7a1.5 1.5 0 01-1.5 1.5h-1.5a.5.5 0 010-1H12a.5.5 0 00.5-.5V2a.5.5 0 00-.5-.5H4a.5.5 0 00-.5.5v7a.5.5 0 00.5.5h1.5a.5.5 0 010 1H4A1.5 1.5 0 012.5 9V2z" clip-rule="evenodd"/></svg></button></h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <form action="adminSessoes.php" method="post">
                            <div class="form-group">
                                <label for="dia">Dia</label>
                                <input type="date" id="dia" class="form-control" required name="dia2">
                            </div>
                            <div class="form-group">
                                <label for="selectCpf2">Cpf</label>
                                <select class="form-control" required id="selectCpf2" name="cpf2">
                                    <?php
                                        $r = $db->query("SELECT * FROM paciente ORDER BY ativo=0,cpf");
                                        $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($linhas as $l) {
                                            if($l['ativo']==0) {echo "<option value=".$l['cpf'].">Inativo - ".$l['cpf']." ".$l['nome']."</option>";}
                                            else {echo "<option value=".$l['cpf'].">".$l['cpf']." ".$l['nome']."</option>";}
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="realizada2" value="1" id="checkRealizada">
                                <label class="form-check-label" for="checkRealizada">Realizada</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="cancelada2" value="1" id="checkCancelada">
                                <label class="form-check-label" for="checkCancelada">Cancelada</label>
                            </div>
                            <button type="submit" class="btn btn-link">LISTAR</button>
                        </form>
                    </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0"><button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Listar tudo por Crefito <svg class="bi bi-box-arrow-down" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.646 11.646a.5.5 0 01.708 0L8 14.293l2.646-2.647a.5.5 0 01.708.708l-3 3a.5.5 0 01-.708 0l-3-3a.5.5 0 010-.708z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M8 4.5a.5.5 0 01.5.5v9a.5.5 0 01-1 0V5a.5.5 0 01.5-.5z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M2.5 2A1.5 1.5 0 014 .5h8A1.5 1.5 0 0113.5 2v7a1.5 1.5 0 01-1.5 1.5h-1.5a.5.5 0 010-1H12a.5.5 0 00.5-.5V2a.5.5 0 00-.5-.5H4a.5.5 0 00-.5.5v7a.5.5 0 00.5.5h1.5a.5.5 0 010 1H4A1.5 1.5 0 012.5 9V2z" clip-rule="evenodd"/></svg></button></h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <form action="adminSessoes.php" method="post">
                            <div class="form-group">
                                <label for="selectCrefito3">Crefito</label>
                                <select class="form-control" required id="selectCrefito3" name="crefito3">
                                    <?php
                                        $r = $db->query("SELECT * FROM fisioterapeuta ORDER BY crefito");
                                        $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($linhas as $l) {echo "<option value=".$l['crefito'].">".$l['crefito']." ".$l['nome']."</option>";}
                                    ?>
                                </select>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="realizada3" value="1" id="checkRealizada" checked>
                                <label class="form-check-label" for="checkRealizada">Realizada</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="cancelada3" value="1" id="checkCancelada" checked>
                                <label class="form-check-label" for="checkCancelada">Cancelada</label>
                            </div>
                            <button type="submit" class="btn btn-link">LISTAR</button>
                        </form>
                    </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h2 class="mb-0"><button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Listar tudo por Cpf <svg class="bi bi-box-arrow-down" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.646 11.646a.5.5 0 01.708 0L8 14.293l2.646-2.647a.5.5 0 01.708.708l-3 3a.5.5 0 01-.708 0l-3-3a.5.5 0 010-.708z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M8 4.5a.5.5 0 01.5.5v9a.5.5 0 01-1 0V5a.5.5 0 01.5-.5z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M2.5 2A1.5 1.5 0 014 .5h8A1.5 1.5 0 0113.5 2v7a1.5 1.5 0 01-1.5 1.5h-1.5a.5.5 0 010-1H12a.5.5 0 00.5-.5V2a.5.5 0 00-.5-.5H4a.5.5 0 00-.5.5v7a.5.5 0 00.5.5h1.5a.5.5 0 010 1H4A1.5 1.5 0 012.5 9V2z" clip-rule="evenodd"/></svg></button></h2>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                    <div class="card-body">
                        <form action="adminSessoes.php" method="post">
                            <div class="form-group">
                                <label for="selectCpf4">Cpf</label>
                                <select class="form-control" required id="selectCpf4" name="cpf4">
                                    <?php
                                        $r = $db->query("SELECT * FROM paciente ORDER BY ativo=0,cpf");
                                        $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($linhas as $l) {
                                            if($l['ativo']==0) {echo "<option value=".$l['cpf'].">Inativo - ".$l['cpf']." ".$l['nome']."</option>";}
                                            else {echo "<option value=".$l['cpf'].">".$l['cpf']." ".$l['nome']."</option>";}
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="realizada4" value="1" id="checkRealizada" checked>
                                <label class="form-check-label" for="checkRealizada">Realizada</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="cancelada4" value="1" id="checkCancelada" checked>
                                <label class="form-check-label" for="checkCancelada">Cancelada</label>
                            </div>
                            <button type="submit" class="btn btn-link">LISTAR</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="row">
        <div class="col-sm-12">
            <ul class="list-group list-group-flush">
                <?php
                    // Listagem por dia/crefito
                    if((!empty($_POST['dia'])) and (!empty($_POST['crefito']))) {
                        $dia = $_POST['dia'];
                        $crefito = $_POST['crefito'];
                        if(empty($_POST['realizada'])) {$realizada = 0;}
                        else {$realizada = $_POST['realizada'];}
                        if(empty($_POST['cancelada'])) {$cancelada = 0;}
                        else {$cancelada = $_POST['cancelada'];}
                        
                        $r = $db->prepare("SELECT * FROM sessao WHERE dia=? AND crefito=? AND realizada=? AND cancelada=? ORDER BY horario");
                        $r->execute(array($dia,$crefito,$realizada,$cancelada));
                        $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                        
                        echo "<h3>Crefito ".$crefito.", ".$dia."</h3>";
                        foreach($linhas as $l) {
                            if($l['cancelada']==1) {echo "<li class='list-group-item' style='color: red;'><strong>".$l['horario'].":00 ".$l['descricao']."</strong> Cpf: ".$l['cpf']." Valor: R$ ".number_format($l['valor'],2,",","")." <span class='badge badge-secondary'>Cod ".$l['id']."</span></li>";}
                            elseif($l['realizada']==1) {echo "<li class='list-group-item' style='color: green;'><strong>".$l['horario'].":00 ".$l['descricao']."</strong> Cpf: ".$l['cpf']." Valor: R$ ".number_format($l['valor'],2,",","")." <span class='badge badge-secondary'>Cod ".$l['id']."</span></li>";}
                            else {echo "<li class='list-group-item'><strong>".$l['horario'].":00 ".$l['descricao']."</strong> Cpf: ".$l['cpf']." Valor: R$ ".number_format($l['valor'],2,",","")." <span class='badge badge-secondary'>Cod ".$l['id']."</span></li>";}
                        }
                    }

                    // Listagem por dia/cpf
                    if((!empty($_POST['dia2'])) and (!empty($_POST['cpf2']))) {
                        $dia = $_POST['dia2'];
                        $cpf = $_POST['cpf2'];
                        if(empty($_POST['realizada2'])) {$realizada = 0;}
                        else {$realizada = $_POST['realizada2'];}
                        if(empty($_POST['cancelada2'])) {$cancelada = 0;}
                        else {$cancelada = $_POST['cancelada2'];}

                        $r = $db->prepare("SELECT * FROM sessao WHERE dia=? AND cpf=? AND realizada=? AND cancelada=? ORDER BY horario");
                        $r->execute(array($dia,$cpf,$realizada,$cancelada));
                        $linhas = $r->fetchAll(PDO::FETCH_ASSOC);

                        echo "<h3>Cpf ".$cpf.", ".$dia."</h3>";
                        foreach($linhas as $l) {
                            if($l['cancelada']==1) {echo "<li class='list-group-item' style='color: red;'><strong>".$l['horario'].":00 ".$l['descricao']."</strong> Crefito: ".$l['crefito']." Valor: R$ ".number_format($l['valor'],2,",","")." <span class='badge badge-secondary'>Cod ".$l['id']."</span></li>";}
                            elseif($l['realizada']==1) {echo "<li class='list-group-item' style='color: green;'><strong>".$l['horario'].":00 ".$l['descricao']."</strong> Crefito: ".$l['crefito']." Valor: R$ ".number_format($l['valor'],2,",","")." <span class='badge badge-secondary'>Cod ".$l['id']."</span></li>";}
                            else {echo "<li class='list-group-item'><strong>".$l['horario'].":00 ".$l['descricao']."</strong> Crefito: ".$l['crefito']." Valor: R$ ".number_format($l['valor'],2,",","")." <span class='badge badge-secondary'>Cod ".$l['id']."</span></li>";}
                        }
                    }

                    // Listar tudo por Crefito
                    if(!empty($_POST['crefito3'])) {
                        $crefito = $_POST['crefito3'];
                        if(empty($_POST['realizada3'])) {$realizada = 0;}
                        else {$realizada = $_POST['realizada3'];}
                        if(empty($_POST['cancelada3'])) {$cancelada = 0;}
                        else {$cancelada = $_POST['cancelada3'];}

                        $r = $db->prepare("SELECT * FROM sessao WHERE crefito=? AND realizada=? AND cancelada=? ORDER BY dia,horario");
                        $r->execute(array($crefito,$realizada,$cancelada));
                        $linhas = $r->fetchAll(PDO::FETCH_ASSOC);

                        echo "<h3>Crefito ".$crefito."</h3>";
                        foreach($linhas as $l) {
                            if($l['cancelada']==1) {echo "<li class='list-group-item' style='color: red;'><strong>".$l['dia']." ".$l['horario'].":00 ".$l['descricao']."</strong> Cpf: ".$l['cpf']." Valor: R$ ".number_format($l['valor'],2,",","")." <span class='badge badge-secondary'>Cod ".$l['id']."</span></li>";}
                            elseif($l['realizada']==1) {echo "<li class='list-group-item' style='color: green;'><strong>".$l['dia']." ".$l['horario'].":00 ".$l['descricao']."</strong> Cpf: ".$l['cpf']." Valor: R$ ".number_format($l['valor'],2,",","")." <span class='badge badge-secondary'>Cod ".$l['id']."</span></li>";}
                            else {echo "<li class='list-group-item'><strong>".$l['dia']." ".$l['horario'].":00 ".$l['descricao']."</strong> Cpf: ".$l['cpf']." Valor: R$ ".number_format($l['valor'],2,",","")." <span class='badge badge-secondary'>Cod ".$l['id']."</span></li>";}
                        }
                    }

                    // Listar tudo por Cpf
                    if(!empty($_POST['cpf4'])) {
                        $cpf = $_POST['cpf4'];
                        if(empty($_POST['realizada4'])) {$realizada = 0;}
                        else {$realizada = $_POST['realizada4'];}
                        if(empty($_POST['cancelada4'])) {$cancelada = 0;}
                        else {$cancelada = $_POST['cancelada4'];}

                        $r = $db->prepare("SELECT * FROM sessao WHERE cpf=? AND realizada=? AND cancelada=? ORDER BY dia,horario");
                        $r->execute(array($cpf,$realizada,$cancelada));
                        $linhas = $r->fetchAll(PDO::FETCH_ASSOC);

                        echo "<h3>Cpf ".$l['cpf']."</h3>";
                        foreach($linhas as $l) {
                            if($l['cancelada']==1) {echo "<li class='list-group-item' style='color: red;'><strong>".$l['dia']." ".$l['horario'].":00 ".$l['descricao']."</strong> Crefito: ".$l['crefito']." Valor: R$ ".number_format($l['valor'],2,",","")." <span class='badge badge-secondary'>Cod ".$l['id']."</span></li>";}
                            elseif($l['realizada']==1) {echo "<li class='list-group-item' style='color: green;'><strong>".$l['dia']." ".$l['horario'].":00 ".$l['descricao']."</strong> Crefito: ".$l['crefito']." Valor: R$ ".number_format($l['valor'],2,",","")." <span class='badge badge-secondary'>Cod ".$l['id']."</span></li>";}
                            else {echo "<li class='list-group-item'><strong>".$l['dia']." ".$l['horario'].":00 ".$l['descricao']."</strong> Crefito: ".$l['crefito']." Valor: R$ ".number_format($l['valor'],2,",","")." <span class='badge badge-secondary'>Cod ".$l['id']."</span></li>";}
                        }
                    }
                ?>
            </ul>
        </div>
    </div>


</div>
</body>
</html>