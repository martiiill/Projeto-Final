<?php
session_start();

require_once __DIR__ . ' /../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'RegaCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'RegaManager.php');
require_once (Conf::getApplicationManagerPath() . 'CampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'TratamentoManager.php');
require_once (Conf::getApplicationManagerPath() . 'AduboCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'TratamentoCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'TratamentoDoencaManager.php');
require_once (Conf::getApplicationManagerPath() . 'AduboManager.php');
require_once (Conf::getApplicationManagerPath() . 'PodaCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'PodaManager.php');
require_once (Conf::getApplicationManagerPath() . 'DoencaManager.php');
require_once (Conf::getApplicationManagerPath() . 'VindimaCampoManager.php');
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
        <title></title>
        <link rel="stylesheet" type="text/css" href="../CSS/styleDetalhesTarefaUser.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="../JS/jsHomePageUser.js"></script>
    </head>
    <body>
        <ul class="menutopo">
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
        $tarefaPodaCampo = filter_input(INPUT_GET, 'tarefaPodaCampo');
        $tarefaRegaCampo = filter_input(INPUT_GET, 'tarefaRegaCampo');
        $tarefaAduboCampo = filter_input(INPUT_GET, 'tarefaAduboCampo');
        $tarefaTratamento = filter_input(INPUT_GET, 'tarefaTratamentoCampo');
        $tarefaVindima = filter_input(INPUT_GET, 'tarefaVindimaCampo');
        $campoManager = new CampoManager();

        if ($tarefaAduboCampo) {
            ?>
            <h2><u>Tarefa nº<?php echo $tarefaAduboCampo ?></u></h2>

            <?php
            $aduboCampoManager = new AduboCampoManager();
            $detalhes = $aduboCampoManager->getAduboCampoByIdAduboCampo($tarefaAduboCampo);
            $campo = $campoManager->getCampoById($detalhes[0]['idcampo']);
            $adubo = new AduboManager();
            ?>

            <div class="conteudoDetalhes">
                <?php foreach ($detalhes as $d) { ?>
                    <p><span><strong>Campo: </strong></span><a href="detalhesCampos.php?campoid=<?php echo $d['idcampo']; ?>"><?php echo $campo[0]['nome']; ?></a></p>
                    <p><span><strong>Tipo de Tarefa: </strong></span>Adubação</p>
                    <p><span><strong>Data: </strong></span><?php echo $d['data']; ?></p>
                    <p><span><strong>Descrição: </strong></span><?php echo $d['descricao']; ?></p>
                    <p><strong>:: Informações Adubo</strong></p>
                    <?php
                    $infoAdubo = $adubo->getAdduboById($d['idadubo']);

                    foreach ($infoAdubo as $i) {
                        ?>
                        <p><span><strong>Nome:</strong></span><span><?php echo $i['nome']; ?></span></p>
                        <p><span><strong>Composição:</strong></span><span><?php echo $i['composicao']; ?></span></p>
                        <p><span><strong>Peso:</strong></span><span><?php echo $i['peso']; ?></span></p>
                        <?php
                    }
                }
                ?>
                <div class="opcoes">
                    <span><a href="editarTarefa.php?tarefaadubo=<?php echo $tarefaAduboCampo ?>">Editar</a></span>
                    <span><a href="Validations/validarEliminarTarefa.php?tarefaadubo=<?php echo $tarefaAduboCampo ?>">Eliminar</a></span>
                </div>
            </div>

        <?php } elseif ($tarefaPodaCampo) { ?>
            <h2><u>Tarefa nº<?php echo $tarefaPodaCampo ?></u></h2>

            <?php
            $podacampoManager = new PodaCampoManager();
            $detalhes = $podacampoManager->getPodaCampoByIdPodaCampo($tarefaPodaCampo);
            $campo = $campoManager->getCampoById($detalhes[0]['idcampo']);
            $poda = new PodaManager();
            ?>

            <div class="conteudoDetalhes">
                <?php foreach ($detalhes as $d) { ?>
                    <p><span><strong>Campo: </strong></span><a href="detalhesCampos.php?campoid=<?php echo $d['idcampo']; ?>"><?php echo $campo[0]['nome']; ?></a></p>
                    <p><span><strong>Tipo de Tarefa: </strong></span>Poda</p>
                    <p><span><strong>Data: </strong></span><?php echo $d['data']; ?></p>
                    <p><span><strong>Descrição: </strong></span><?php echo $d['descricao']; ?></p>
                    <p><strong>:: Informações Poda</strong></p>
                    <?php
                    $infoAdubo = $poda->getPodaById($d['idpoda']);

                    foreach ($infoAdubo as $i) {
                        ?>
                        <p><span><strong>Nome Poda:</strong></span><span><?php echo $i['nome']; ?></span></p>                        
                        <?php
                    }
                }
                ?>
                <div class="opcoes">
                    <span><a href="editarTarefa.php?tarefapoda=<?php echo $tarefaPodaCampo ?>">Editar</a></span>
                    <span><a href="Validations/validarEliminarTarefa.php?tarefapoda=<?php echo $tarefaPodaCampo ?>">Eliminar</a></span>
                </div>
            </div>

        <?php } elseif ($tarefaRegaCampo) { ?>

            <h2><u>Tarefa nº<?php echo $tarefaRegaCampo ?></u></h2> 

            <?php
            $regacampoManager = new RegaCampoManager();
            $detalhes = $regacampoManager->getRegaCampoByIdRegaCampo($tarefaRegaCampo);
            $campo = $campoManager->getCampoById($detalhes[0]['idcampo']);
            $rega = new RegaManager();
            ?>

            <div class="conteudoDetalhes">
                <?php foreach ($detalhes as $d) { ?>
                    <p><span><strong>Campo: </strong></span><a href="detalhesCampos.php?campoid=<?php echo $d['idcampo']; ?>"><?php echo $campo[0]['nome']; ?></a></p>
                    <p><span><strong>Tipo de Tarefa: </strong></span>Rega</p>
                    <p><span><strong>Data: </strong></span><?php echo $d['data']; ?></p>
                    <p><span><strong>Descrição: </strong></span><?php echo $d['descricao']; ?></p>
                    <p><strong>:: Informações Rega</strong></p>
                    <?php
                    $infoRega = $rega->getRegaById($d['idrega']);

                    foreach ($infoRega as $i) {
                        ?>
                        <p><span><strong>Nome Rega:</strong></span><span><?php echo $i['nome']; ?></span></p>                        
                        <?php
                    }
                }
                ?>
                <div class="opcoes">
                    <span><a href="editarTarefa.php?tarefarega=<?php echo $tarefaRegaCampo ?>">Editar</a></span>
                    <span><a href="Validations/validarEliminarTarefa.php?tarefarega=<?php echo $tarefaRegaCampo ?>">Eliminar</a></span>
                </div>
            </div>
        <?php } elseif ($tarefaTratamento) { ?>

            <h2><u>Tarefa nº<?php echo $tarefaTratamento ?></u></h2> 

            <?php
            $tratamentocampoManager = new TratamentoCampoManager();
            $detalhes = $tratamentocampoManager->getTratamentoCampoByIdTratamentoCampo($tarefaTratamento);
            $campo = $campoManager->getCampoById($detalhes[0]['idcampo']);
            $tratamentoDoencaManager = new TratamentoDoencaManager();
            $tratamentoManager = new TratamentoManager();
            ?>

            <div class="conteudoDetalhes">
                <?php foreach ($detalhes as $d) { ?>
                    <p><span><strong>Campo: </strong></span><a href="detalhesCampos.php?campoid=<?php echo $d['idcampo']; ?>"><?php echo $campo[0]['nome']; ?></a></p>
                    <p><span><strong>Tipo de Tarefa: </strong></span>Tratamento</p>
                    <p><span><strong>Data: </strong></span><?php echo $d['data']; ?></p>
                    <p><span><strong>Data: </strong></span><?php echo $d['descricao']; ?></p>
                    <p><strong>:: Informações Tratamento</strong></p>
                    <?php
                    $infoTratamento = $tratamentoManager->getTratamentoById($d['idtratamento']);
                    foreach ($infoTratamento as $it) {
                        ?>
                        <p><span><strong>Função: </strong></span><?php echo $it['funcao']; ?></p>
                        <p><span><strong>Dimensão: </strong></span><?php echo $it['dimensao']; ?></p>
                        <?php
                    }
                    $infoTratamentoDoenca = $tratamentoDoencaManager->getTratamentoDoencaByTratamentoId($d['idtratamento']); //Se existe uma doenca associada a este tratamento
                    if ($infoTratamentoDoenca) {
                        ?>
                        <p><strong>:: Informações Doença</strong></p>
                        <?php
                        $doenca = new DoencaManager();
                        foreach ($infoTratamentoDoenca as $itd) {
                            $doencaDetalhes = $doenca->getDoencaById($itd['iddoenca']);
                            foreach ($doencaDetalhes as $i) {
                                ?>
                                <p><span><strong>Nome da Doença: </strong></span><span><?php echo $i['nome']; ?></span></p>     
                                <p><span><strong>Características: </strong></span><span><?php echo $i['caracteristicas']; ?></span></p>      
                                <?php
                            }
                        }
                    }
                }
                ?>
                <div class="opcoes">
                    <span><a href="editarTarefa.php?tarefatrata=<?php echo $tarefaTratamento ?>">Editar</a></span>
                    <span><a href="Validations/validarEliminarTarefa.php?tarefatrata=<?php echo $tarefaTratamento ?>">Eliminar</a></span>
                </div>
            </div>
        <?php } elseif ($tarefaVindima) { ?>

            <h2><u>Tarefa nº<?php echo $tarefaVindima ?></u></h2> 

            <?php
            $vindimacampoManager = new VindimaCampoManager();
            $detalhes = $vindimacampoManager->getVindimaCampoById($tarefaVindima);
            $campo = $campoManager->getCampoById($detalhes[0]['idcampo']);
            ?>

            <div class="conteudoDetalhes">
                <?php foreach ($detalhes as $d) { ?>
                    <p><span><strong>Campo: </strong></span><a href="detalhesCampos.php?campoid=<?php echo $d['idcampo']; ?>"><?php echo $campo[0]['nome']; ?></a></p>
                    <p><span><strong>Tipo de Tarefa: </strong></span>Vindima</p>
                    <p><span><strong>Quantidade: </strong></span><?php echo $d['quantidade']; ?> KG</p>
                    <p><span><strong>Ano: </strong></span><?php echo $d['ano']; ?></p>
                    <p><span><strong>Descrição: </strong></span><?php echo $d['descricao']; ?></p>                 
                    <?php
                }
                ?>
                <div class="opcoes">
                    <span><a href="editarTarefa.php?tarefavindima=<?php echo $tarefaVindima ?>">Editar</a></span>
                    <span><a href="Validations/validarEliminarTarefa.php?tarefavindima=<?php echo $tarefaVindima ?>">Eliminar</a></span>
                </div>
            </div>
        <?php }
        ?>
        <div class="footer">
            <p>Sistema desenvolvido pela Escola Superior de Tecnologia e Gestão do Politécnico do Porto</p>
        </div>
    </body>
</html>
