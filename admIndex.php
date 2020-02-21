<?php
    require_once 'extras/start.php';
    if($_SESSION['nome'] == null) {header('location: index.php');}
?>

    <?php require_once 'extras/menu.php' ?>
        <li class="nav-item active"><a class="nav-link" href="admIndex.php">Fisioterapeutas</a></li>
        <li class="nav-item"><a class="nav-link" href="admPacientes.php">Pacientes</a></li>
        <li class="nav-item"><a class="nav-link" href="extras/logout.php">Logout</a></li>
        </ul>
        </div>
    </nav>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">

        <div class="accordion" id="accordionExample">
    
        <!-- Cadastrar Fisioterapeuta -->
            <div class="card">
                <div class="card-header" id="heading1">
                    <h2 class="mb-0"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Cadastrar fisioterapeuta</button></h2>
                </div>

                <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionExample">
                    <div class="card-body">

                        <?php
                            if( (!empty($_POST['crefito'])) && (!empty($_POST['nome'])) && (!empty($_POST['senha'])) ) {
                                $crefito = $_POST['crefito'];
                                $nome = strtolower($_POST['nome']);
                                $senha = strtolower($_POST['senha']);

                                //Verificar se crefito já existe
                                $r = $db->prepare('SELECT crefito FROM fisioterapeuta WHERE crefito=:crefito');
                                $r->execute(array(':crefito'=>$crefito));

                                if($r->rowCount() == 0) {
                                    //Cadastra
                                    $r2 = $db->prepare('INSERT INTO fisioterapeuta(crefito,nome,senha) VALUES (:crefito,:nome,:senha)');
                                    $r2->execute(array(':crefito'=>$crefito,':nome'=>$nome,':senha'=>$senha));
                                    $_SESSION['msgm'] = require_once 'extras/msgCadastrado.php';
                                } else {$_SESSION['msgm'] = require_once 'extras/msgExiste.php';}
                            }
                        ?>

                        <form action="admIndex.php" method="post">
                            <input type="number" name="crefito" placeholder="Crefito" min="100000" max="999999">
                            <input type="text" name="nome" placeholder="Nome" maxlength="70">
                            <input type="text" name="senha" placeholder="Senha" minlength="5" maxlength="5">
                            <input type="submit" value="Cadastrar">
                        </form>

                    </div>
                </div>
            </div>
    


        <!-- Editar Fisioterapeuta -->
            <div class="card">
                <div class="card-header" id="heading2">
                    <h2 class="mb-0"><button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">Editar fisioterapeuta</button></h2>
                </div>
                <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordionExample">
                    <div class="card-body">

                        <?php
                            if( (!empty($_POST['crefito3'])) && (!empty($_POST['nCrefito'])) && (!empty($_POST['nNome'])) && (!empty($_POST['nSenha'])) ) {
                                $crefito = $_POST['crefito3'];
                                $novoCrefito = $_POST['nCrefito'];
                                $nome = strtolower($_POST['nNome']);
                                $senha = strtolower($_POST['nSenha']);

                                //Novo crefito já existe
                                $r = $db->prepare('SELECT crefito FROM fisioterapeuta WHERE crefito=:crefito');
                                $r->execute(array(':crefito'=>$novoCrefito));
                                if($r->rowCount() == 0) {
                                    $r2 = $db->prepare('UPDATE fisioterapeuta SET crefito=:novoCrefito,nome=:nome,senha=:senha WHERE crefito=:crefito');
                                    $r2->execute(array(':novoCrefito'=>$novoCrefito,':nome'=>$nome,':senha'=>$senha,':crefito'=>$crefito));
                                    $_SESSION['msgm'] = require_once 'extras/msgAtualizado.php';
                                } else {$_SESSION['msgm'] = require_once 'extras/msgExiste.php';}
                            }
                        ?>
                        
                        <form action="admIndex.php" method="post">
                            <p id="obs">Obs: Preencha todos os campos!</p>
                            Fisioterapeuta è editar
                            <select name="crefito3">
                                <?php
                                    $r = $db->query('SELECT crefito,nome FROM fisioterapeuta ORDER BY crefito');
                                    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($linhas as $l) {echo "<option value=".$l['crefito'].">".$l['crefito']."- ".$l['nome']."</option>";}
                                ?>
                            </select><br>
                            <input type="number" name="nCrefito" placeholder="Novo crefito" min="100000" max="999999">
                            <input type="text" name="nNome" placeholder="Novo nome" maxlength="70">
                            <input type="text" name="nSenha" placeholder="Nova senha" minlength="5" maxlength="5">
                            <input type="submit" value="Atualizar">
                        </form>

                    </div>
                </div>
            </div>



        <!-- Remover Fisioterapeuta -->
            <div class="card">
                <div class="card-header" id="heading3">
                    <h2 class="mb-0"><button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Remover fisioterapeuta</button></h2>
                </div>
                <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionExample">
                    <div class="card-body">
                        
                        <?php
                            if(!empty($_POST['crefito2'])) {
                                $crefito = $_POST['crefito2'];
                                $r = $db->prepare('DELETE FROM fisioterapeuta WHERE crefito=:crefito');
                                $r->execute(array(':crefito'=>$crefito));
                                $_SESSION['msgm'] = require_once 'extras/msgRemovido.php';
                            }
                        ?>

                        <form action="admIndex.php" method="post">
                            Fisioterapeuta à remover
                            <select name="crefito2">
                                <?php
                                    $r = $db->query('SELECT crefito,nome FROM fisioterapeuta ORDER BY crefito');
                                    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($linhas as $l) {echo "<option value=".$l['crefito'].">".$l['crefito']."- ".$l['nome']."</option>";}
                                ?>
                            </select>
                            <input type="submit" value="Remover">
                        </form>

                    </div>
                </div>
            </div>





        </div>

        <?php if($_SESSION['msgm'] != null) { echo $msg;} ?>
    

    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <h3>Fisioterapeutas</h3>
        <br>
        <?php
            $r = $db->query('SELECT * FROM fisioterapeuta ORDER BY crefito');
            $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($linhas as $l) {
                echo "
                    <h6>Crefito: ".$l['crefito']."</h6>
                    <p>".$l['nome']."</p>
                    <p>Senha: ".$l['senha']."</p>
                    <hr>
                ";
            }
        ?>
    </div>
</div>

<?php require_once 'extras/end.php' ?>