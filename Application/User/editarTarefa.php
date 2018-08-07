<?php
session_start();

require_once __DIR__ . ' /../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'RegaCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'CampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'AduboCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'AduboManager.php');
require_once (Conf::getApplicationManagerPath() . 'PodaCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'TratamentoCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'TratamentoManager.php');
require_once (Conf::getApplicationManagerPath() . 'PodaManager.php');
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
        <title>Alterar tarefa</title>
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
        $tarefaPodaCampo = filter_input(INPUT_GET, 'tarefapoda');
        $tarefaRegaCampo = filter_input(INPUT_GET, 'tarefarega');
        $tarefaAduboCampo = filter_input(INPUT_GET, 'tarefaadubo');
        $tarefaTrata = filter_input(INPUT_GET, 'tarefatrata');
        $tarefaVindima = filter_input(INPUT_GET, 'tarefavindima');
        $campoManager = new CampoManager();

        if ($tarefaAduboCampo) {
            ?>

            <h2><u>Alterar Tarefa nº<?php echo $tarefaAduboCampo ?></u></h2>

            <?php
            $aduboCampoManager = new AduboCampoManager();
            $detalhes = $aduboCampoManager->getAduboCampoByIdAduboCampo($tarefaAduboCampo);
            $campo = $campoManager->getCampoById($detalhes[0]['idcampo']);
            $adubo = new AduboManager();
            ?>

            <div class="conteudoDetalhes">
                <form id="formAlteraTarefaAdubo" method="post" action="Validations/validarEditarTarefa.php">
                    <input type="hidden" value="<?php echo $tarefaAduboCampo ?>" name="adubocampoid">

                    <select name="idAdubo_tarefa" id="idAdubo_tarefa">
                        <option selected="" value="">Escolha um produto (*)</option>
                        <?php
                        $listaAdubos = $adubo->getAdubos();
                        foreach ($listaAdubos as $adubo) {
                            ?>
                            <option value="<?php echo $adubo['id'] ?>"><?php echo $adubo['nome'] ?></option>
                        <?php } ?>         
                    </select>

                    <br/><br/>

                    <label for="nome_campo_tarefa">Nome do Campo:</label>
                    <input type="text" name="nome_campo_tarefa" value="<?php echo $campo[0]['nome'] ?>" readonly />

                    <br/><br/>

                    <label for="data">Data: (*)</label>
                    <input type="date" name="data"/>

                    <br/><br/>

                    <label for="descricao">Descrição: (*)</label>
                    <input type="text" name="descricao"/>

                    <br/><br/>

                    <input type="submit" value="Alterar dados" id="sbutton" required>
                </form>
            </div>

        <?php } elseif ($tarefaPodaCampo) { ?>

            <h2><u>Alterar Tarefa nº<?php echo $tarefaPodaCampo ?></u></h2>

            <?php
            $podaCampoManager = new PodaCampoManager();
            $detalhes = $podaCampoManager->getPodaCampoByIdPodaCampo($tarefaPodaCampo);
            $campo = $campoManager->getCampoById($detalhes[0]['idcampo']);
            $poda = new PodaManager();
            ?>

            <div class="conteudoDetalhes">
                <form id="formAlteraTarefaPoda" method="post" action="Validations/validarEditarTarefa.php">
                    <input type="hidden" value="<?php echo $tarefaPodaCampo ?>" name="podacampoid">

                    <select name="idPoda_tarefa" id="idPoda_tarefa">
                        <option selected="" value="">Escolha um tipo de poda (*)</option>
                        <?php
                        $listaPodas = $poda->getPodas();
                        foreach ($listaPodas as $p) {
                            ?>
                            <option value="<?php echo $p['id'] ?>"><?php echo $p['nome'] ?></option>
                        <?php } ?>                            
                    </select>

                    <br/><br/>

                    <label for="nome_campo_tarefa">Nome do Campo:</label>
                    <input type="text" name="nome_campo_tarefa" value="<?php echo $campo[0]['nome'] ?>" readonly />

                    <br/><br/>

                    <label for="data">Data: (*)</label>
                    <input type="date" name="data"/>

                    <br/><br/>

                    <label for="descricao">Descrição: (*)</label>
                    <input type="text" name="descricao"/>

                    <br/><br/>

                    <input type="submit" value="Alterar dados" id="sbutton" required>
                </form>
            </div>

        <?php } elseif ($tarefaRegaCampo) { ?>
            <h2><u>Alterar Tarefa nº<?php echo $tarefaRegaCampo ?></u></h2>

            <?php
            $regaCampoManager = new RegaCampoManager();
            $detalhes = $regaCampoManager->getRegaCampoByIdRegaCampo($tarefaPodaCampo);
            $campo = $campoManager->getCampoById($detalhes[0]['idcampo']);
            $rega = new RegaManager();
            ?>

            <div class="conteudoDetalhes">
                <form id="formAlteraTarefaRega" method="post" action="Validations/validarEditarTarefa.php">
                    <input type="hidden" value="<?php echo $tarefaRegaCampo ?>" name="regacampoid">

                    <select name="idRega_tarefa" id="idRega_tarefa">
                        <option selected="" value="">Escolha um tipo de rega (*)</option>
                        <?php
                        $listaRegas = $rega->getRegas();
                        foreach ($listaRegas as $r) {
                            ?>
                            <option value="<?php echo $r['id'] ?>"><?php echo $r['nome'] ?></option>
                        <?php } ?>                            
                    </select>

                    <br/><br/>

                    <label for="nome_campo_tarefa">Nome do Campo:</label>
                    <input type="text" name="nome_campo_tarefa" value="<?php echo $campo[0]['nome'] ?>" readonly />

                    <br/><br/>

                    <label for="data">Data: (*)</label>
                    <input type="date" name="data"/>

                    <br/><br/>

                    <label for="descricao">Descrição: (*)</label>
                    <input type="text" name="descricao"/>

                    <br/><br/>

                    <input type="submit" value="Alterar dados" id="sbutton" required>
                </form>
            </div>      

        <?php } elseif ($tarefaTrata) { ?>
            <h2><u>Alterar Tarefa nº<?php echo $tarefaTrata ?></u></h2>

            <?php
            $trataCampoManager = new TratamentoCampoManager();
            $detalhes = $trataCampoManager->getTratamentoCampoByIdTratamentoCampo($tarefaTrata);
            $campo = $campoManager->getCampoById($detalhes[0]['idcampo']);
            $tratamento = new TratamentoManager();
            ?>

            <div class="conteudoDetalhes">
                <form id="formAlteraTarefaTrata" method="post" action="Validations/validarEditarTarefa.php">
                    <input type="hidden" value="<?php echo $tarefaTrata ?>" name="tratacampoid">

                    <label for="nome_trata_tarefa">Tipo de tratamento: (*)</label>
                    <select name="idTrata_tarefa" id="idTrata_tarefa">
                        <option selected="" value="" disabled="true">Escolha um tipo de tratamento</option>
                        <?php
                        $listaTratas = $tratamento->getTratamentos();
                        foreach ($listaTratas as $t) {
                            ?>
                            <option value="<?php echo $t['id'] ?>"><?php echo $t['nome'] ?></option>
                        <?php } ?>                            
                    </select>

                    <!-- permitir trocar de tratamento relativo a uma doenca? -->

                    <br/><br/>

                    <label for="nome_campo_tarefa">Nome do Campo: (*)</label>
                    <input type="text" name="nome_campo_tarefa" value="<?php echo $campo[0]['nome'] ?>" readonly />

                    <br/><br/>

                    <label for="data">Data: (*)</label>
                    <input type="date" name="data"/>

                    <br/><br/>

                    <label for="descricao">Descrição: (*)</label>
                    <input type="text" name="descricao"/>

                    <br/><br/>

                    <input type="submit" value="Alterar dados" id="sbutton" required>
                </form>
            </div>      
        <?php } elseif ($tarefaVindima) { ?>
            <h2><u>Alterar Tarefa nº<?php echo $tarefaVindima ?></u></h2>

            <?php
            $vindimaCampoManager = new VindimaCampoManager();
            $detalhes = $vindimaCampoManager->getVindimaCampoById($tarefaVindima);
            $campo = $campoManager->getCampoById($detalhes[0]['idcampo']);
            ?>

            <div class="conteudoDetalhes">
                <form id="formAlteraTarefaVindima" method="post" action="Validations/validarEditarTarefa.php">
                    <input type="hidden" value="<?php echo $tarefaVindima ?>" name="vindimacampoid">
                    <br/><br/>

                    <label for="nome_campo_tarefa">Nome do Campo: (*)</label>
                    <input type="text" name="nome_campo_tarefa" value="<?php echo $campo[0]['nome'] ?>" readonly />
                    <input type="hidden" name="id_campo_tarefa" value="<?php echo $campo[0]['id'] ?>" readonly />
                    <br/><br/>

                    <label for="quantidade">Quantidade: (*)</label>
                    <input type="number" name="quantidade" required/>

                    <br/><br/>

                    <label for="data">Data: (*)</label>
                    <input type="date" name="data" required/>

                    <br/><br/>

                    <label for="descricao">Descrição: (*)</label>
                    <input type="text" name="descricao" required/>

                    <br/><br/>

                    <input type="submit" value="Alterar dados" id="sbutton" required>
                </form>
            </div>      
        <?php } ?>
        <div class="footer">
            <p>Sistema desenvolvido pela Escola Superior de Tecnologia e Gestão do Politécnico do Porto</p>
        </div>
    </body>
</html>