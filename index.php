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
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="65" height="65" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#007bff"><path d="M68.71042,17.12161c-3.16203,0.04943 -5.68705,2.6496 -5.64375,5.81172v44.90364c-0.10233,0.61915 -0.10233,1.2509 0,1.87005v15.36354l-16.90885,50.71536c-0.64852,1.94442 -0.21031,4.08713 1.14952,5.62081c1.35984,1.53369 3.43466,2.22529 5.44274,1.81425c2.00808,-0.41105 3.64427,-1.86229 4.29211,-3.80694l0.14557,-0.43672l21.22005,-46.10182h32.2388l21.38802,57.56849c0.78492,3.00208 3.81468,4.83587 6.83842,4.13902c3.02374,-0.69685 4.94529,-3.67173 4.3371,-6.71454l-14.28854,-66.6724c-2.25597,-10.54058 -11.64795,-18.12942 -22.42942,-18.12942h-27.51328l-4.44558,-39.85339v-0.27995c0.02122,-1.54972 -0.58581,-3.04203 -1.68279,-4.1369c-1.09698,-1.09487 -2.59045,-1.69903 -4.14013,-1.67482zM37.26667,63.06667c-7.91608,0 -14.33333,6.41725 -14.33333,14.33333c0,7.91608 6.41725,14.33333 14.33333,14.33333c7.91608,0 14.33333,-6.41725 14.33333,-14.33333c0,-7.91608 -6.41725,-14.33333 -14.33333,-14.33333zM97.2763,103.12161c-0.24779,0.01012 -0.49466,0.0363 -0.73906,0.07839h-9.1711l-6.94271,44.55651c-0.62342,2.0159 -0.08926,4.2113 1.39061,5.71545c1.47988,1.50415 3.66631,2.07394 5.69207,1.48339c2.02577,-0.59055 3.56349,-2.24601 4.00325,-4.30977l11.46667,-40.13333c0.06613,-0.22428 0.11849,-0.4524 0.15677,-0.68308l1.89245,-6.62917h-6.59557c-0.38084,-0.06492 -0.76727,-0.09118 -1.15339,-0.07839z"></path></g></g></svg>
            <h1 style="color: #007bff">FisioTech</h1>
            <p style="color: #007bff">Gestão automatizada em fisioterapia</p>
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