<?php
session_start();

require_once __DIR__ . ' /../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'CampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'QuintaManager.php');
require_once (Conf::getApplicationManagerPath() . 'PodaCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'RegaCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'AduboCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'TratamentoCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'VindimaCampoManager.php');

if (isset($_SESSION['login'])) {
    $regaCampoManager = new RegaCampoManager();
    $campoManager = new CampoManager();
    $podaCampoManager = new PodaCampoManager();
    $aduboCampoManager = new AduboCampoManager();
    $tratamentoCampoManager = new TratamentoCampoManager();
    $vindimaCampoManager = new VindimaCampoManager();
    ?>

    <!DOCTYPE html>
    <!--
    Projeto Final :: VitiAl
    Ana Martins @8130368 
    P.Porto - ESTG
    -->
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Home Page Utilizador</title>
            <link rel="stylesheet" type="text/css" href="../CSS/styleHomePageUser.css">
            <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>      
            <script type="text/javascript" src="../JS/jsHomePageUser.js"></script>
            <script type="text/javascript" src="../JS/fadeOutMessage.js"></script>

        </head>
        <body onload="start()">
            <ul class="menutopo">
                <div id="egdiv"></div>
                <li>Bem vindo, <a href="areaUser.php"><strong><?php echo $_SESSION['login'] ?></strong></a></li>
                <li></li>
                <li><a href="../../logout.php">Sair</a></li>
            </ul>

            <h1><a href="homePageUser.php">VitiAl - Sistema de Previsão Vitivínicola</a></h1>

            <div class="menu-items">     
                <a href="homePageUser.php" class="active">Tarefas</a>
                <br/>
                <a href="campos.php">Campos</a>
                <br/>
                <a href="producao.php">Produção</a>
            </div>

            <?php
            if (filter_has_var(INPUT_GET, 'addTarefa')) {
                if (filter_input(INPUT_GET, 'addTarefa') === 'sucesso') {
                    echo '<div style="color:green; margin-top:-40px; margin-left:500px;" id="alert">Tarefa adicionada com sucesso.</div>';
                } elseif (filter_input(INPUT_GET, 'addTarefa') === 'erro') {
                    echo '<div style="color:red; margin-top:-40px; margin-left:500px;" id="alert">Erro ao adicionar tarefa.</div>';
                } elseif (filter_input(INPUT_GET, 'addTarefa') === 'erroids') {
                    echo '<div style="color:red; margin-top:-40px; margin-left:500px;" id="alert">Erro no id ao adicionar tarefa.</div>';
                } elseif (filter_input(INPUT_GET, 'addTarefa') === 'erroDescricao') {
                    echo '<div style="color:red; margin-top:-40px; margin-left:500px;" id="alert">Erro na descrição ao adicionar tarefa.</div>';
                } elseif (filter_input(INPUT_GET, 'addTarefa') === 'erroData') {
                    echo '<div style="color:red; margin-top:-40px; margin-left:500px;" id="alert">Erro na data ao adicionar tarefa.</div>';
                } elseif (filter_input(INPUT_GET, 'addTarefa') === 'erroTipoAdubo') {
                    echo '<div style="color:red; margin-top:-40px; margin-left:500px;" id="alert">Erro no tipo de adubo ao adicionar tarefa.</div>';
                } elseif (filter_input(INPUT_GET, 'addTarefa') === 'erroCampo') {
                    echo '<div style="color:red; margin-top:-40px; margin-left:500px;" id="alert">Erro no campo ao adicionar tarefa.</div>';
                } elseif (filter_input(INPUT_GET, 'addTarefa') === 'erroTipoTrata') {
                    echo '<div style="color:red; margin-top:-40px; margin-left:500px;" id="alert">Erro no tipo de tratamento ao adicionar tarefa.</div>';
                } elseif (filter_input(INPUT_GET, 'addTarefa') === 'sucesso2') {
                    echo '<div style="color:green; margin-top:-40px; margin-left:500px;" id="alert">As duas tarefas foram adicionadas com sucesso.</div>';
                }
            }
            if (filter_has_var(INPUT_GET, 'deleteTarefa')) {
                if (filter_input(INPUT_GET, 'deleteTarefa') === 'sucesso') {
                    echo '<div style="color:green; margin-top:-40px; margin-left:500px;" id="alert">Tarefa eliminada com sucesso.</div>';
                } elseif (filter_input(INPUT_GET, 'deleteTarefa') === 'erro') {
                    echo '<div style="color:red; margin-top:-40px; margin-left:500px;" id="alert" margin-top:-40px; margin-left:500px;>Erro ao eliminar tarefa.</div>';
                }
            }

            if (filter_has_var(INPUT_GET, 'editTarefa')) {
                if (filter_input(INPUT_GET, 'editTarefa') === 'sucesso') {
                    echo '<div style="color:green"; margin-top:-40px; margin-left:500px; id="alert">Tarefa editada com sucesso.</div>';
                } elseif (filter_input(INPUT_GET, 'editTarefa') === 'erro') {
                    echo '<div style="color:red; margin-top:-40px; margin-left:500px;" id="alert">Erro ao editar tarefa.</div>';
                }
            }

            if (filter_has_var(INPUT_GET, 'addPrevisao')) {
                if (filter_input(INPUT_GET, 'addPrevisao') === 'sucesso') {
                    echo '<div style="color:green"; margin-top:-40px; margin-left:500px; id="alert">Previsão Meteorológica adicionada com sucesso.</div>';
                } elseif (filter_input(INPUT_GET, 'addPrevisao') === 'errojaexiste') {
                    echo '<div style="color:red; margin-top:-40px; margin-left:500px;" id="alert" >Já existe uma previsão meteorológica guardada para hoje.</div>';
                }
            }
            ?> 


            <?php
            $ll = json_decode(file_get_contents('https://ipapi.co/json/')); //Obtenho cidade atraves do ip

            $weather = json_decode(file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=' . $ll->city . '&appid=64ae3b08d7a46d0393ef90a6675dfc22')); //Obtenho dados meteo
            $KELVIN = ($weather->main->temp) - 273.15; //Converto para celsius

            if ($KELVIN > 15 && $KELVIN < 28 && $weather->main->humidity > 98) {
                echo '<div style="color:red; margin-top:-40px; margin-left:500px;">' . $KELVIN . 'ºC e ' . $weather->main->humidity . '%. Provável ocorrência de oídio. Fazer tratamento no campo desta localização.</div>';
            }

            if ($KELVIN > 18 && $KELVIN < 25 && $weather->main->humidity > 25 && $weather->main->humidity < 100) {
                echo '<div style="color:red; margin-top:-40px; margin-left:500px;">' . $KELVIN . 'ºC e ' . $weather->main->humidity . '%.Provável ocorrência de míldio. Fazer tratamento no campo desta localização.</div>';
            }

            if ($KELVIN > 15 && $KELVIN < 25 && $weather->main->humidity > 90 && $weather->main->humidity < 100) {
                echo '<div style="color:red; margin-top:-40px; margin-left:500px;">' . $KELVIN . 'ºC e ' . $weather->main->humidity . '%.Provável ocorrência de prodrião cinzenta. Fazer tratamento no campo desta localização.</div>';
            }
            ?>
            <div class = "conteudo" id="conteudo">

                <?php
                if (filter_has_var(INPUT_GET, 'campoid')) {
                    $campoid = filter_input(INPUT_GET, 'campoid');
                    $regas = $regaCampoManager->getRegaCampoByIdCampo($campoid);
                    $podas = $podaCampoManager->getPodaCampoByIdCampo($campoid);
                    $adubos = $aduboCampoManager->getAduboCampoByIdCampo($campoid);
                    $tratamentos = $tratamentoCampoManager->getTratamentoCampoByIdCampo($campoid);
                    $vindimas = $vindimaCampoManager->getVindimaCampoByIdCampo($campoid);

                    if (count($adubos) > 0 || count($podas) > 0 || count($regas) > 0 || count($tratamentos) > 0 || count($vindimas) > 0) {
                        ?>
                        <h2>Tarefas do campo nº<?php echo $campoid; ?></h2>
                        <a href="addTarefa.php" id="novaTarefa" role="button">Nova Tarefa</a>
                        <table>
                            <tr>
                                <th>Tarefa</th>
                                <th>Categoria</th>
                                <th>Data</th>
                                <th>Campo</th>
                                <th>Detalhes</th>
                            </tr>

                        <?php } else { ?>
                            <h2>Este campo não tem tarefas adicionadas...</h2>
                            <?php
                        }

                        if ($regas > 0) {
                            foreach ($regas as $r) {
                                ?>

                                <tr>
                                    <?php
                                    $campo = $campoManager->getCampoById($campoid);
                                    foreach ($campo as $c) {
                                        if ($c['id'] == $r['idcampo']) {
                                            ?>
                                            <td><?php echo $r['descricao'] ?></td>
                                            <td>Rega</td>
                                            <td><?php echo $r['data'] ?></td>
                                            <td><?php echo $c['nome'] ?></td>
                                            <td><a href="detalhesTarefa.php?tarefaRegaCampo=<?php echo $r['idregacampo'] ?>"><img src="../Images/see-more-1.png" width="7%"></a></td>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tr>
                                <?php
                            }
                        }

                        if ($podas > 0) {
                            foreach ($podas as $p) {
                                ?>
                                <tr>
                                    <?php
                                    $campo = $campoManager->getCampoById($campoid);
                                    foreach ($campo as $c) {
                                        if ($c['id'] == $p['idcampo']) {
                                            ?>
                                            <td><?php echo $p['descricao'] ?></td>
                                            <td>Poda</td>
                                            <td><?php echo $p['data'] ?></td>
                                            <td><?php echo $c['nome'] ?></td>
                                            <td><a href="detalhesTarefa.php?tarefaPodaCampo=<?php echo $p['idpodacampo'] ?>"><img src="../Images/see-more-1.png" width="7%"></a></td>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tr>
                                <?php
                            }
                        }

                        if ($adubos > 0) {
                            foreach ($adubos as $a) {
                                ?>
                                <tr>
                                    <?php
                                    $campo = $campoManager->getCampoById($campoid);
                                    foreach ($campo as $c) {
                                        if ($c['id'] == $a['idcampo']) {
                                            ?>
                                            <td><?php echo $a['descricao'] ?></td>
                                            <td>Adubação</td>
                                            <td><?php echo $a['data'] ?></td>
                                            <td><?php echo $c['nome'] ?></td>
                                            <td><a href="detalhesTarefa.php?tarefaAduboCampo=<?php echo $a['idadubocampo'] ?>"><img src="../Images/see-more-1.png" width="7%"></a></td>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tr>
                                <?php
                            }
                        }

                        if ($tratamentos > 0) {
                            foreach ($tratamentos as $t) {
                                ?>
                                <tr>
                                    <?php
                                    $campo = $campoManager->getCampoById($campoid);
                                    foreach ($campo as $c) {
                                        if ($c['id'] == $t['idcampo']) {
                                            ?>
                                            <td><?php echo $t['descricao'] ?></td>
                                            <td>Tratamento</td>
                                            <td><?php echo $t['data'] ?></td>
                                            <td><?php echo $c['nome'] ?></td>
                                            <td><a href="detalhesTarefa.php?tarefaTratamentoCampo=<?php echo $t['idtratamentocampo'] ?>"><img src="../Images/see-more-1.png" width="7%"></a></td>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <h3>Este campo não tem tarefas adicionadas...</h3> 
                        <?php }
                        ?>
                    </table>  

                    <?php
                } else {

                    $regas = $regaCampoManager->getRegasCampos();
                    $podas = $podaCampoManager->getPodaCampos();
                    $adubos = $aduboCampoManager->getAduboCampos();
                    $tratamentos = $tratamentoCampoManager->getTratamentosCampos();
                    $vindimas = $vindimaCampoManager->getVindimaCampos();

                    if (count($adubos) > 0 || count($podas) > 0 || count($regas) > 0 || count($tratamentos) > 0 || count($vindimas) > 0) {
                        ?>
                        <h2>Minhas Tarefas</h2>
                        <a href="addTarefa.php" id="novaTarefa" role="button">Nova Tarefa</a>
                        <table>
                            <tr>
                                <th>Tarefa</th>
                                <th>Categoria</th>
                                <th>Data</th>
                                <th>Campo</th>
                                <th>Detalhes</th>
                            </tr>

                        <?php } else { ?>
                            <h2>Ainda não tem tarefas adicionadas..</h2>
                            <?php
                        }

                        if ($regas > 0) {
                            foreach ($regas as $r) {
                                ?>
                                <tr>
                                    <?php
                                    $campo = $campoManager->getCampoById($r['idcampo']);
                                    foreach ($campo as $c) {
                                        if ($c['id'] == $r['idcampo']) {
                                            ?>
                                            <td><?php echo $r['descricao'] ?></td>
                                            <td>Rega</td>
                                            <td><?php echo $r['data'] ?></td>
                                            <td><?php echo $c['nome'] ?></td>
                                            <td><a href="detalhesTarefa.php?tarefaRegaCampo=<?php echo $r['idregacampo'] ?>"><img src="../Images/see-more-1.png" width="7%"></a></td>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tr>
                                <?php
                            }
                        }
                        if ($podas > 0) {
                            foreach ($podas as $p) {
                                ?>
                                <tr>
                                    <?php
                                    $campo = $campoManager->getCampoById($p['idcampo']);
                                    foreach ($campo as $c) {
                                        if ($c['id'] == $p['idcampo']) {
                                            ?>
                                            <td><?php echo $p['descricao'] ?></td>
                                            <td>Poda</td>
                                            <td><?php echo $p['data'] ?></td>
                                            <td><?php echo $c['nome'] ?></td>
                                            <td><a href="detalhesTarefa.php?tarefaPodaCampo=<?php echo $p['idpodacampo'] ?>"><img src="../Images/see-more-1.png" width="7%"></a></td>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tr>
                                <?php
                            }
                        }

                        if ($adubos > 0) {
                            foreach ($adubos as $a) {
                                ?>
                                <tr>
                                    <?php
                                    $campo = $campoManager->getCampoById($a['idcampo']);
                                    foreach ($campo as $c) {
                                        if ($c['id'] == $a['idcampo']) {
                                            ?>
                                            <td><?php echo $a['descricao'] ?></td>
                                            <td>Adubação</td>
                                            <td><?php echo $a['data'] ?></td>
                                            <td><?php echo $c['nome'] ?></td>
                                            <td><a href="detalhesTarefa.php?tarefaAduboCampo=<?php echo $a['idadubocampo'] ?>"><img src="../Images/see-more-1.png" width="7%"></a></td>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tr>
                                <?php
                            }
                        }

                        if ($tratamentos > 0) {
                            foreach ($tratamentos as $t) {
                                ?>
                                <tr>
                                    <?php
                                    $campo = $campoManager->getCampoById($t['idcampo']);
                                    foreach ($campo as $c) {
                                        if ($c['id'] == $t['idcampo']) {
                                            ?>
                                            <td><?php echo $t['descricao'] ?></td>
                                            <td>Tratamento</td>
                                            <td><?php echo $t['data'] ?></td>
                                            <td><?php echo $c['nome'] ?></td>
                                            <td><a href="detalhesTarefa.php?tarefaTratamentoCampo=<?php echo $t['idtratamentocampo'] ?>"><img src="../Images/see-more-1.png" width="7%"></a></td>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tr>
                                <?php
                            }
                        }

                        if ($vindimas > 0) {
                            foreach ($vindimas as $v) {
                                ?>
                                <tr>
                                    <?php
                                    $campo = $campoManager->getCampoById($v['idcampo']);
                                    foreach ($campo as $c) {
                                        if ($c['id'] == $v['idcampo']) {
                                            ?>
                                            <td><?php echo $v['descricao'] ?></td>
                                            <td><strong>Vindima</strong></td>
                                            <td><?php echo $v['ano'] ?></td>
                                            <td><?php echo $c['nome'] ?></td>
                                            <td><a href="detalhesTarefa.php?tarefaVindimaCampo=<?php echo $v['id'] ?>"><img src="../Images/see-more-1.png" width="7%"></a></td>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>
                </div>


    <?php } ?>

            <div class="footer">
                <p>Sistema desenvolvido pela Escola Superior de Tecnologia e Gestão do Politécnico do Porto</p>
            </div>

        </body>
    </html>
    <?php
} else {
    header("Location: ../../index.php");
}    