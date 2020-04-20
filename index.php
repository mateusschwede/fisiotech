<?php
    require_once 'conect.php';
    
    if ((!empty($_POST['codigo'])) and (!empty($_POST['senha']))) {
        $codigo = $_POST['codigo'];
        $senha = strtolower($_POST['senha']);
        $r = $db->prepare("SELECT crefito,senha FROM fisioterapeuta WHERE crefito=? AND senha=?");
        $r->execute(array($codigo,$senha));

        if (($codigo==100) and ($senha==100)) {
            session_start();
            $_SESSION['nome'] = 100;
            $_SESSION['senha'] = 100;
            $_SESSION['msgm'] = null;
            header("location: pAdmin.php");
        }

        if ($r->rowCount()>0) {
            session_start();
            $_SESSION['nome'] = $codigo;
            $_SESSION['senha'] = $senha;
            $_SESSION['msgm'] = null;
            header("location: pFisio.php");
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
        <div class="col-sm-12" id="entrada">
        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="65" height="65" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><path d="M25.8,172c-14.24895,0 -25.8,-11.55105 -25.8,-25.8v-120.4c0,-14.24895 11.55105,-25.8 25.8,-25.8h120.4c14.24895,0 25.8,11.55105 25.8,25.8v120.4c0,14.24895 -11.55105,25.8 -25.8,25.8z" fill="#007bff"></path><g fill="#ffffff"><path d="M71.59391,30.92785c-2.52962,0.03954 -4.54964,2.11968 -4.515,4.64938v35.92292c-0.08187,0.49532 -0.08187,1.00072 0,1.49604v12.29084l-13.52708,40.57229c-0.51882,1.55554 -0.16825,3.2697 0.91962,4.49665c1.08787,1.22695 2.74773,1.78024 4.3542,1.4514c1.60647,-0.32884 2.91542,-1.48983 3.43369,-3.04555l0.11646,-0.34938l16.97604,-36.88146h25.79104l17.11042,46.05479c0.62794,2.40166 3.05175,3.8687 5.47074,3.31122c2.41899,-0.55748 3.95623,-2.93738 3.46968,-5.37163l-11.43084,-53.33792c-1.80478,-8.43246 -9.31836,-14.50354 -17.94354,-14.50354h-22.01062l-3.55646,-31.88271v-0.22396c0.01698,-1.23978 -0.46865,-2.43362 -1.34623,-3.30952c-0.87758,-0.87589 -2.07236,-1.35922 -3.3121,-1.33986zM46.43891,67.68389c-6.33287,0 -11.46667,5.1338 -11.46667,11.46667c0,6.33287 5.1338,11.46667 11.46667,11.46667c6.33287,0 11.46667,-5.1338 11.46667,-11.46667c0,-6.33287 -5.1338,-11.46667 -11.46667,-11.46667zM94.44662,99.72785c-0.19823,0.00809 -0.39573,0.02904 -0.59125,0.06271h-7.33688l-5.55416,35.64521c-0.49874,1.61272 -0.07141,3.36904 1.11249,4.57236c1.1839,1.20332 2.93304,1.65915 4.55366,1.18671c1.62061,-0.47244 2.85079,-1.79681 3.2026,-3.44782l9.17333,-32.10667c0.05291,-0.17943 0.09479,-0.36192 0.12541,-0.54646l1.51396,-5.30333h-5.27646c-0.30467,-0.05193 -0.61381,-0.07294 -0.92271,-0.06271z"></path></g></g></svg>
            <h1 style="color: #007bff">FisioTech</h1>
            <p>Gestão automatizada em fisioterapia</p>
            <form action="index.php" method="post">
                <div class="form-group">
                    <input type="number" class="form-control" required name="codigo" placeholder="Código" min=0 max=1000000000>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" required name="senha" placeholder="Senha" maxlength="5">
                </div>
                <button type="submit" class="btn btn-link">ENTRAR</button>
            </form>
        </div>
    </div>


</div>    
</body>
</html>