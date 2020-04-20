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
                <li class="nav-item"><a class="nav-link" href="fisioPacientes.php"><svg class="bi bi-people" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.995-.944v-.002.002zM7.022 13h7.956a.274.274 0 00.014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 00.022.004zm7.973.056v-.002.002zM11 7a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0zM6.936 9.28a5.88 5.88 0 00-1.23-.247A7.35 7.35 0 005 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 015 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 116 0 3 3 0 01-6 0zm3-2a2 2 0 100 4 2 2 0 000-4z" clip-rule="evenodd"/></svg><br>Pacientes</a></li>
                <li class="nav-item"><a class="nav-link active" href="pFisio.php"><svg class="bi bi-house" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 00.5.5h9a.5.5 0 00.5-.5V7h1v6.5a1.5 1.5 0 01-1.5 1.5h-9A1.5 1.5 0 012 13.5zm11-11V6l-2-2V2.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M7.293 1.5a1 1 0 011.414 0l6.647 6.646a.5.5 0 01-.708.708L8 2.207 1.354 8.854a.5.5 0 11-.708-.708L7.293 1.5z" clip-rule="evenodd"/></svg><br>Home</a></li>
                <li class="nav-item"><a class="nav-link" href="fisioSessoes.php"><svg class="bi bi-calendar" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14 0H2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M6.5 7a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/></svg><br>Sessões</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <?php
                $r = $db->prepare("SELECT nome FROM fisioterapeuta WHERE crefito=?");
                $r->execute(array($_SESSION['nome']));
                $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                foreach($linhas as $l) {echo "<span class='badge badge-secondary'>".$l['nome']."</span>";}
            ?>
            <button type="button" class="btn btn-link" id="btnRed" data-dismiss="modal" onclick="window.location.href='logout.php'"><svg class="bi bi-power" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.578 4.437a5 5 0 104.922.044l.5-.866a6 6 0 11-5.908-.053l.486.875z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M7.5 8V1h1v7h-1z" clip-rule="evenodd"/></svg> Logout</button>

            <?php
                $r = $db->prepare("SELECT count(id) FROM sessao WHERE crefito=? AND realizada=0 AND cancelada=0");
                $r->execute(array($_SESSION['nome']));
                $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                foreach($linhas as $l) {$abertas = $l['count(id)'];}

                $r = $db->prepare("SELECT count(id) FROM sessao WHERE crefito=? AND realizada=1");
                $r->execute(array($_SESSION['nome']));
                $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                foreach($linhas as $l) {$realizadas = $l['count(id)'];}

                $r = $db->prepare("SELECT count(id) FROM sessao WHERE crefito=? AND cancelada=1");
                $r->execute(array($_SESSION['nome']));
                $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                foreach($linhas as $l) {$canceladas = $l['count(id)'];}

                echo "<h2 style='text-align: center;'><span class='badge badge-pill badge-primary'>".$abertas." abertas</span> <span class='badge badge-pill badge-success'>".$realizadas." realizadas</span> <span class='badge badge-pill badge-danger'>".$canceladas." canceladas</span></h2>"
            ?>

            <h1><svg class="bi bi-briefcase" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M0 12.5A1.5 1.5 0 001.5 14h13a1.5 1.5 0 001.5-1.5v-6h-1v6a.5.5 0 01-.5.5h-13a.5.5 0 01-.5-.5v-6H0v6z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M0 4.5A1.5 1.5 0 011.5 3h13A1.5 1.5 0 0116 4.5v2.384l-7.614 2.03a1.5 1.5 0 01-.772 0L0 6.884V4.5zM1.5 4a.5.5 0 00-.5.5v1.616l6.871 1.832a.5.5 0 00.258 0L15 6.116V4.5a.5.5 0 00-.5-.5h-13zM5 2.5A1.5 1.5 0 016.5 1h3A1.5 1.5 0 0111 2.5V3h-1v-.5a.5.5 0 00-.5-.5h-3a.5.5 0 00-.5.5V3H5v-.5z" clip-rule="evenodd"/></svg> Sessões hoje</h1>
            <?php if ($_SESSION['msgm']!=null) {echo $_SESSION['msgm'];$_SESSION['msgm']=null;} ?>
            <button type="button" class="btn btn-link" onclick="window.location.href='addSessao.php'">ADICIONAR</button>
            
            <ul class="list-group list-group-flush">
                <?php
                    $r = $db->prepare("SELECT * FROM sessao WHERE dia=? AND crefito=? ORDER BY horario");
                    $r->execute(array(date('Y-m-d'),$_SESSION['nome']));
                    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach($linhas as $l) {
                        $r2 = $db->prepare("SELECT nome FROM paciente WHERE cpf=?");
                        $r2->execute(array($l['cpf']));
                        $linhas2 = $r2->fetchAll(PDO::FETCH_ASSOC);
                        foreach($linhas2 as $l2) {$nome = $l2['nome'];}
                        
                        if($l['cancelada']==1) {
                            echo "
                                <a href='#' class='list-group-item list-group-item-action d-flex justify-content-between align-items-center' style='color: red;'>
                                <strong>".$l['horario'].":00 ".$l['descricao']."</strong> ".$l['cpf']." - ".$nome."
                                </a>
                            ";
                        } elseif($l['realizada']==1) {
                            echo "
                                <a href='#' class='list-group-item list-group-item-action d-flex justify-content-between align-items-center' style='color: green;'>
                                <strong>".$l['horario'].":00 ".$l['descricao']."</strong> ".$l['cpf']." - ".$nome."
                                </a>
                            ";
                        } else {
                            echo "
                                <a href='painelSessao.php?id=".base64_encode($l['id'])."' class='list-group-item list-group-item-action d-flex justify-content-between align-items-center'>
                                <strong>".$l['horario'].":00 ".$l['descricao']."</strong> ".$l['cpf']." - ".$nome."
                                </a>
                            ";
                        }
                    }
                ?>
            </ul>
        </div>
    </div>


</div>
</body>
</html>