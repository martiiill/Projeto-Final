<?php
session_start();
require_once __DIR__ . ' /../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'CampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'QuintaManager.php');
require_once (Conf::getApplicationManagerPath() . 'PodaCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'RegaCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'UtilizadorManager.php');
require_once (Conf::getApplicationManagerPath() . 'CastaManager.php');
require_once (Conf::getApplicationManagerPath() . 'CastaCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'DadosMeteoDiaManager.php');
require_once (Conf::getApplicationManagerPath() . 'DadosMeteoMesManager.php');

if (isset($_SESSION['login'])) {
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
            <title>Detalhes Campo</title>
            <link rel="stylesheet" type="text/css" href="../CSS/styleDetalhesCamposUser.css">
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
                <a href="homePageUser.php">Tarefas</a>
                <br/>
                <a href="campos.php" class="active">Campos</a>
                <br/>
                <a href="producao.php">Produção</a>
            </div>

            <?php $campoid = filter_input(INPUT_GET, 'campoid'); ?>
            <h2><u>Campo nº<?php echo $campoid ?></u></h2>

            <div class="conteudoDetalhes">

                <?php
                $campoManager = new CampoManager();
                $castaManager = new CastaCampoManager();
                $quintaManager = new QuintaManager();
                $detalhesCastaCampo = $castaManager->getCastaCampoByIdCampo($campoid);
                $detalhes = $campoManager->getCampoById($campoid);
                $quintaDetalhes = $quintaManager->getQuintaById($detalhes[0]['quinta_id']);
                ?>

                <p><span><strong>Nome Quinta: </strong></span><?php echo $quintaDetalhes[0]['nome']; ?></p>
                <p><span><strong>Nome: </strong></span><?php echo $detalhes[0]['nome']; ?></p>
                <p><span><strong>Localização: </strong></span><?php echo $detalhes[0]['localizacao']; ?></p>
                <p><span><strong>Area: </strong></span><?php echo $detalhes[0]['area']; ?></p>
                <p><span><strong>Numero de Linhas: </strong></span><?php echo $detalhes[0]['numero_linhas']; ?></p>
                <p><span><strong>Orientação: </strong></span><?php echo $detalhes[0]['orientacao']; ?></p>


                <?php
                if (count($detalhesCastaCampo) > 0) {
                    foreach ($detalhesCastaCampo as $dcc) {
                        ?>
                        <p><span><strong> :: Casta </strong></p> <?php
                        $managerCasta = new CastaManager();
                        $detalhesCasta = $managerCasta->getCastaById($dcc['idcasta']);

                        foreach ($detalhesCasta as $dc) {
                            ?>
                            <p><span><strong>Nome: </strong></span><?php echo $dc['nome']; ?></p>  
                            <p><span><strong>Número de Vides: </strong></span><?php echo $dcc['numero_vides']; ?></p>
                            <?php
                        }
                    }
                } else {
                    ?>
                    <p><a href="addCastaCampo.php?campoid=<?php echo $campoid; ?>"> >> Adicionar Casta</a></p>  
                <?php }
                ?>

                <div class = "opcoes">
                    <a href = "editarCampo.php?campoid=<?php echo $campoid; ?>">Editar dados</a>
                    <br/>
                    <a href = "Validations/validarEliminarCampo.php?campoid=<?php echo $campoid; ?>">Eliminar campo e respetivas tarefas</a><br/>
                    <a href = "addVindima.php?vindima=<?php echo $campoid ?>">Fazer Vindima</a><br/>
                    <a href = "addTarefa.php?campoid=<?php echo $campoid ?>">Adicionar Tarefa</a><br/>
                    <a href = "homePageUser.php?campoid=<?php echo $campoid ?>">Ver Tarefas associadas</a><br/>
                    <a href = "addDadosMeteo.php?campoid=<?php echo $campoid ?>">Guardar Dados Meteorológicos Diário</a><br/>

                    <?php
                    $dadosMeteo = new DadosMeteoDiaManager();
                    $dadosMesManager = new DadosMeteoMesManager();
                    $da = $dadosMesManager->getDadosMeteoMesByAnoMesAndIdCampo(2018, 5, $campoid);
                    $data = $dadosMeteo->getDadosMeteDiaByIdCampoM(5, $campoid);
                    $dataJun = $dadosMeteo->getDadosMeteDiaByIdCampoM(6, $campoid);

                    if (count($data) === 31 && count($da) === 0) { //Mais    
                        echo '<a href="Validations/validarSumDadosMeteoMes.php?mes=5&campoid=', $campoid, '"> Guardar Dados Meteorológicos Médios Maio</a> ';
                    }
                    if (count($dataJun) === 30) {  
                        echo '<a href="Validations/validarSumDadosMeteoMes.php?mes=6&campoid=', $campoid, '"> Guardar Dados Meteorológicos Médios Maio</a> ';
                    }
                    ?>
                </div>
            </div>
            <div class = "footer">
                <p>Sistema desenvolvido pela Escola Superior de Tecnologia e Gestão do Politécnico do Porto</p>
            </div>
        </body>
    </html>
    <?php
} else {
    header("Location: ../../index.php");
}    