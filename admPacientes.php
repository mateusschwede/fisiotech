<?php
    require_once 'extras/start.php';
    if($_SESSION['nome'] == null) {header('location: index.php');}
?>

    <?php require_once 'extras/menu.php' ?>
        <li class="nav-item"><a class="nav-link" href="admIndex.php">Fisioterapeutas</a></li>
        <li class="nav-item active"><a class="nav-link" href="admPacientes.php">Pacientes</a></li>
        <li class="nav-item"><a class="nav-link" href="extras/logout.php">Logout</a></li>
        </ul>
        </div>
    </nav>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">

        <div class="accordion" id="accordionExample">
    
        <!-- Cadastrar Paciente -->
            <div class="card">
                <div class="card-header" id="heading1">
                    <h2 class="mb-0"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Cadastrar paciente</button></h2>
                </div>

                <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionExample">
                    <div class="card-body">

                        <?php
                            if( (!empty($_POST['cpf'])) && (!empty($_POST['nome'])) ) {
                                $cpf = $_POST['cpf'];
                                $nome = strtolower($_POST['nome']);

                                //Verificar se cpf já existe
                                $r = $db->prepare('SELECT cpf FROM paciente WHERE cpf=:cpf');
                                $r->execute(array(':cpf'=>$cpf));

                                if($r->rowCount() == 0) {
                                    //Cadastra
                                    $r2 = $db->prepare('INSERT INTO paciente(cpf,nome) VALUES (:cpf,:nome)');
                                    $r2->execute(array(':cpf'=>$cpf,':nome'=>$nome));
                                    $_SESSION['msgm'] = require_once 'extras/msgCadastrado.php';
                                } else {$_SESSION['msgm'] = require_once 'extras/msgExiste.php';}
                            }
                        ?>

                        <form action="admPacientes.php" method="post">
                            <input type="number" name="cpf" placeholder="Cpf" min="10000000000" max="99999999999">
                            <input type="text" name="nome" placeholder="Nome" maxlength="70">
                            <input type="submit" value="Cadastrar">
                        </form>

                    </div>
                </div>
            </div>
    


        <!-- Editar Paciente -->
            <div class="card">
                <div class="card-header" id="heading2">
                    <h2 class="mb-0"><button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">Editar paciente</button></h2>
                </div>
                <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordionExample">
                    <div class="card-body">

                        <?php
                            if( (!empty($_POST['cpf3'])) && (!empty($_POST['nCpf'])) && (!empty($_POST['nNome'])) ) {
                                $cpf = $_POST['cpf3'];
                                $novoCpf = $_POST['nCpf'];
                                $nome = strtolower($_POST['nNome']);

                                //Novo cpf já existe
                                $r = $db->prepare('SELECT cpf FROM paciente WHERE cpf=:cpf');
                                $r->execute(array(':cpf'=>$novoCpf));
                                if($r->rowCount() == 0) {
                                    $r2 = $db->prepare('UPDATE paciente SET cpf=:novoCpf,nome=:nome WHERE cpf=:cpf');
                                    $r2->execute(array(':novoCpf'=>$novoCpf,':nome'=>$nome,':cpf'=>$cpf));
                                    $_SESSION['msgm'] = require_once 'extras/msgAtualizado.php';
                                } else {$_SESSION['msgm'] = require_once 'extras/msgExiste.php';}
                            }
                        ?>
                        
                        <!---------------------------------------------------- CONTINUA AQUI!!! -->
                        <form action="admPacientes.php" method="post">
                            <p id="obs">Obs: Preencha todos os campos!</p>
                            Fisioterapeuta è editar
                            <select name="cpf3">
                                <?php
                                    $r = $db->query('SELECT crefito,nome FROM fisioterapeuta ORDER BY crefito');
                                    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($linhas as $l) {echo "<option value=".$l['crefito'].">".$l['crefito']."- ".$l['nome']."</option>";}
                                ?>
                            </select><br>
                            <input type="number" name="nCpf" placeholder="Novo crefito" min="100000" max="999999">
                            <input type="text" name="nNome" placeholder="Novo nome" maxlength="70">
                            <input type="text" name="nSenha" placeholder="Nova senha" minlength="5" maxlength="5">
                            <input type="submit" value="Atualizar">
                        </form>

                    </div>
                </div>
            </div>



        <!-- Ativar Paciente -->
            <div class="card">
                <div class="card-header" id="heading3">
                    <h2 class="mb-0"><button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Ativar paciente</button></h2>
                </div>
                <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionExample">
                    <div class="card-body">
                        
                        <?php
                            if(!empty($_POST['cpf2'])) {
                                $cpf = $_POST['cpf2'];
                                $r = $db->prepare('UPDATE paciente SET ativo=1 WHERE cpf=:cpf');
                                $r->execute(array(':cpf'=>$cpf));
                                $_SESSION['msgm'] = require_once 'extras/msgAtualizado.php';
                            }
                        ?>

                        <form action="admPacientes.php" method="post">
                            Paciente à ativar
                            <select name="cpf2">
                                <?php
                                    $r = $db->query('SELECT cpf,nome FROM paciente WHERE ativo=0 ORDER BY cpf');
                                    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($linhas as $l) {echo "<option value=".$l['cpf'].">".$l['cpf']."- ".$l['nome']."</option>";}
                                ?>
                            </select>
                            <input type="submit" value="Ativar">
                        </form>

                    </div>
                </div>
            </div>



            <!-- Inativar Paciente -->
            <div class="card">
                <div class="card-header" id="heading3">
                    <h2 class="mb-0"><button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">Inativar paciente</button></h2>
                </div>
                <div id="collapse4" class="collapse" aria-labelledby="heading3" data-parent="#accordionExample">
                    <div class="card-body">
                        
                        <?php
                            if(!empty($_POST['cpf3'])) {
                                $cpf = $_POST['cpf3'];
                                $r = $db->prepare('UPDATE paciente SET ativo=0 WHERE cpf=:cpf');
                                $r->execute(array(':cpf'=>$cpf));
                                $_SESSION['msgm'] = require_once 'extras/msgAtualizado.php';
                            }
                        ?>

                        <form action="admPacientes.php" method="post">
                            Paciente à inativar
                            <select name="cpf3">
                                <?php
                                    $r = $db->query('SELECT cpf,nome FROM paciente WHERE ativo=1 ORDER BY cpf');
                                    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($linhas as $l) {echo "<option value=".$l['cpf'].">".$l['cpf']."- ".$l['nome']."</option>";}
                                ?>
                            </select>
                            <input type="submit" value="Inativar">
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
        <h3>Pacientes</h3>
        <br>
        <?php
            $r = $db->query('SELECT * FROM paciente ORDER BY ativo DESC,cpf');
            $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($linhas as $l) {
                if($l['ativo'] == 0) {
                    echo "
                    <h6 class='inativo'>Cpf: ".$l['cpf']."</h6>
                    <p class='inativo'>".$l['nome']."</p>
                    <p class='inativo'>Ativo: ".$l['ativo']."</p>
                    <hr>
                ";
                } else {
                    echo "
                    <h6>Cpf: ".$l['cpf']."</h6>
                    <p>".$l['nome']."</p>
                    <p>Ativo: ".$l['ativo']."</p>
                    <hr>
                ";
                }
            }
        ?>
    </div>
</div>

<?php require_once 'extras/end.php' ?>