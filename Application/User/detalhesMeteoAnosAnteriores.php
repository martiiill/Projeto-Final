<?php
session_start();
require_once __DIR__ . ' /../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'CampoManager.php');
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
            <title>Detalhes Dados Meteorológicos Anos Anteriores</title>
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
            <h2><u>Dados Meteorológicos de Anos Anteriores do Campo nº<?php echo $campoid ?></u></h2>

            <div class="conteudoDetalhes">

                <?php
                $campoManager = new CampoManager();
                $dadosMeteoMan = new DadosMeteoMesManager();
                $dadosCamp = $campoManager->getCampoById($campoid);
                ?>

                <p><strong>Localização:</strong> <?php echo $dadosCamp[0]['localizacao']; ?></p>

                <?php
                $dadosMet2017 = $dadosMeteoMan->getDadosMeteoMesByAnoAndIdCampo(2017, $campoid);

                $tem = 0;
                $hum = 0;
                foreach ($dadosMet2017 as $d) {
                    $tem += $d['tempMedio'];
                    $hum += $d['humidadeMedia'];
                }

                $mediaAnualHumid2017 = $hum / 4;
                $mediaAnualTemp2017 = $tem / 4;
                ?>

                <u>Ano 2017</u>
                <p><strong>Temperatura Média Anual: </strong><?php echo $mediaAnualTemp2017; ?> ºC</p>
                <p><strong>Humidade Média Anual: </strong><?php echo $mediaAnualHumid2017; ?> %</p>

                <?php
                $dadosMet2016 = $dadosMeteoMan->getDadosMeteoMesByAnoAndIdCampo(2016, $campoid);

                $temm = 0;
                $humm = 0;
                foreach ($dadosMet2016 as $dd) {
                    $temm += $dd['tempMedio'];
                    $humm += $dd['humidadeMedia'];
                }

                $mediaAnualHumid2016 = $humm / 4;
                $mediaAnualTemp2016 = $temm / 4;
                ?>

                <u>Ano 2016</u>
                <p><strong>Temperatura Média Anual: </strong><?php echo $mediaAnualTemp2016; ?> ºC</p>
                <p><strong>Humidade Média Anual: </strong><?php echo $mediaAnualHumid2016; ?> %</p>
                
                <?php
                $dadosMet2015 = $dadosMeteoMan->getDadosMeteoMesByAnoAndIdCampo(2015, $campoid);

                $temmm = 0;
                $hummm = 0;
                foreach ($dadosMet2015 as $ddd) {
                    $temmm += $ddd['tempMedio'];
                    $hummm += $ddd['humidadeMedia'];
                }

                $mediaAnualHumid2015 = $hummm / 4;
                $mediaAnualTemp2015 = $temmm / 4;
                ?>

                <u>Ano 2015</u>
                <p><strong>Temperatura Média Anual: </strong><?php echo $mediaAnualTemp2015; ?> ºC</p>
                <p><strong>Humidade Média Anual: </strong><?php echo $mediaAnualHumid2015; ?> %</p>               
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