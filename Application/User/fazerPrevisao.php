<?php
session_start();

use Phpml\Regression\LeastSquares;

require_once __DIR__ . ' /../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'CampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'VindimaCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'DadosMeteoMesManager.php');
require 'C:/xampp/htdocs/projeto/vendor/autoload.php';

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
            <title>Fazer Previsão</title>
            <link rel="stylesheet" type="text/css" href="../CSS/styleDetalhesCamposUser.css">
            <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
            <script type="text/javascript" src="../JS/jsHomePageUser.js"></script>
            <script type="text/javascript" src="../JS/decision-tree.js"></script>
        </head>
        <body onload="init()">
            <ul class="menutopo">
                <li>Bem vindo, <a href="areaUser.php"><strong><?php echo $_SESSION['login'] ?></strong></a></li>
                <li></li>
                <li><a href="../../logout.php">Sair</a></li>
            </ul>

            <h1><a href="homePageUser.php">VitiAl - Sistema de Previsão Vitivínicola</a></h1>

            <div class="menu-items">     
                <a href="homePageUser.php">Tarefas</a>
                <br/>
                <a href="campos.php">Campos</a>
                <br/>
                <a href="producao.php" class="active">Produção</a>
            </div>

            <?php $campoid = filter_input(INPUT_GET, 'campoid'); ?>
            <h2><u>Previsão Produção Campo nº<?php echo $campoid ?></u></h2>

            <div class="conteudoDetalhes">

                <?php
                $campoManager = new CampoManager();
                $dadosCampo = $campoManager->getCampoById($campoid);
                $local = $dadosCampo[0]['localizacao'];

                $dadosMeteoManager = new DadosMeteoMesManager();

                $vindimaCampoManager = new VindimaCampoManager();
                $dadosProducao2018 = $vindimaCampoManager->getVindimaCampoByIdCampoAndAno($campoid, 2018);
                $dadosProducao2017 = $vindimaCampoManager->getVindimaCampoByIdCampoAndAno($campoid, 2017);
                $dadosProducao2016 = $vindimaCampoManager->getVindimaCampoByIdCampoAndAno($campoid, 2016);
                $dadosProducao2015 = $vindimaCampoManager->getVindimaCampoByIdCampoAndAno($campoid, 2015);
                $dadosProducao2014 = $vindimaCampoManager->getVindimaCampoByIdCampoAndAno($campoid, 2014);
                $dadosProducao2013 = $vindimaCampoManager->getVindimaCampoByIdCampoAndAno($campoid, 2013);

                //somar ano 2018
                $dadosMeteoAno2018Jun = $dadosMeteoManager->getDadosMeteoMesByAnoMesAndIdCampo(2018, 6, $campoid);
                $dadosMeteoAno2018Maio = $dadosMeteoManager->getDadosMeteoMesByAnoMesAndIdCampo(2018, 5, $campoid);
                $dadosMeteoAno2018Abr = $dadosMeteoManager->getDadosMeteoMesByAnoMesAndIdCampo(2018, 4, $campoid);
                $dadosMeteoAno2018Mar = $dadosMeteoManager->getDadosMeteoMesByAnoMesAndIdCampo(2018, 3, $campoid);

                $humidade2018 = 0;
                $temperatura2018 = 0;
//                if ($dadosMeteoAno2018Mar && $dadosMeteoAno2018Abr && $dadosMeteoAno2018Maio && $dadosMeteoAno2018Jun) { //se tiver dados de todos os meses
                $dadosMeteo2018 = $dadosMeteoManager->getDadosMeteoMesByAnoAndIdCampo(2018, $campoid);

                foreach ($dadosMeteo2018 as $dmad) {
                    $temperatura2018 += $dmad['tempMedio'];
                    $humidade2018 += $dmad['humidadeMedia'];
                }
                $tempMediaAno2018 = $temperatura2018 / 4;
                $humMediaAno2018 = $humidade2018 / 4;
                // }
                //Ano 2017
                $dadosMeteoAno2017 = $dadosMeteoManager->getDadosMeteoMesByAnoAndIdCampo(2017, $campoid);
                $humidade2017 = 0;
                $temperatura2017 = 0;

                foreach ($dadosMeteoAno2017 as $dma) {
                    $temperatura2017 += $dma['tempMedio'];
                    $humidade2017 += $dma['humidadeMedia'];
                }
                $tempMediaAno2017 = $temperatura2017 / 4;
                $humMediaAno2017 = $humidade2017 / 4;

                //Ano 2016
                $dadosMeteoAno2016 = $dadosMeteoManager->getDadosMeteoMesByAnoAndIdCampo(2016, $campoid);
                $humidade2016 = 0;
                $temperatura2016 = 0;

                foreach ($dadosMeteoAno2016 as $dmaa) {
                    $temperatura2016 += $dmaa['tempMedio'];
                    $humidade2016 += $dmaa['humidadeMedia'];
                }
                $tempMediaAno2016 = $temperatura2016 / 4;
                $humMediaAno2016 = $humidade2016 / 4;

                //Ano 2015
                $dadosMeteoAno2015 = $dadosMeteoManager->getDadosMeteoMesByAnoAndIdCampo(2015, $campoid);
                $humidade2015 = 0;
                $temperatura2015 = 0;

                foreach ($dadosMeteoAno2015 as $dm) {
                    $temperatura2015 += $dm['tempMedio'];
                    $humidade2015 += $dm['humidadeMedia'];
                }
                $tempMediaAno2015 = $temperatura2015 / 4;
                $humMediaAno2015 = $humidade2015 / 4;

                //Ano 2014
                $dadosMeteoAno2014 = $dadosMeteoManager->getDadosMeteoMesByAnoAndIdCampo(2014, $campoid);
                $humidade2014 = 0;
                $temperatura2014 = 0;

                foreach ($dadosMeteoAno2014 as $m) {
                    $temperatura2014 += $m['tempMedio'];
                    $humidade2014 += $m['humidadeMedia'];
                }
                $tempMediaAno2014 = $temperatura2014 / 4;
                $humMediaAno2014 = $humidade2014 / 4;

                //Ano 2013
                $dadosMeteoAno2013 = $dadosMeteoManager->getDadosMeteoMesByAnoAndIdCampo(2013, $campoid);
                $humidade2013 = 0;
                $temperatura2013 = 0;

                foreach ($dadosMeteoAno2013 as $mm) {
                    $temperatura2013 += $mm['tempMedio'];
                    $humidade2013 += $mm['humidadeMedia'];
                }
                $tempMediaAno2013 = $temperatura2013 / 4;
                $humMediaAno2013 = $humidade2013 / 4;

                $samples = [[$temperatura2013, $humidade2013], [$temperatura2014, $humidade2014], [$temperatura2015, $humidade2015],
                    [$temperatura2016, $humidade2016], [$temperatura2017, $humidade2017]];
                $targets = [$dadosProducao2013[0]['quantidade'], $dadosProducao2014[0]['quantidade'], $dadosProducao2015[0]['quantidade'],
                    $dadosProducao2016[0]['quantidade'], $dadosProducao2017[0]['quantidade']];

                $regression = new LeastSquares();
                $regression->train($samples, $targets);
                ?>
                <p style="font-size: 18px;">Para o ano de <strong>2018</strong>, a previsão de produção do campo "<?php echo $dadosCampo[0]['nome']; ?>" é 
                    <strong> <?php echo intval($regression->predict([$temperatura2018, $humidade2018])); ?></strong> mil KG por hectare.</p>

                <div class = "footer">
                    <p>Sistema desenvolvido pela Escola Superior de Tecnologia e Gestão do Politécnico do Porto</p>
                </div>
            </div>
        </body>
    </html>
    <?php
} else {
    header("Location: ../../index.php");
}    