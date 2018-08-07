<?php
session_start();
require_once __DIR__ . ' /../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'CampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'VindimaCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'UtilizadorManager.php');

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
            <title>Produção</title>
            <link rel="stylesheet" type="text/css" href="../CSS/styleProducao.css">
            <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
            <script type="text/javascript" src="../JS/jsHomePageUser.js"></script>
            <script type="text/javascript" src="../JS/fadeOutMessage.js"></script>
        </head>
        <body>
            <ul class="menutopo">
                <li>Bem vindo, <a href="areaUser.php"><strong><?php echo $_SESSION['login'] ?></strong></a></li>
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

            <h2>Produção dos Meus Campos</h2>

            <div class="conteudo">  
                <?php
                $managerCampos = new CampoManager();
                $vindimaCampo = new VindimaCampoManager();

                $managerUtilizador = new UtilizadorManager();
                $utilizadorId = $managerUtilizador->getUserByUsername($_SESSION['login']);
                $camposUser = $managerCampos->getCamposByUtilizadorId($utilizadorId[0]['id']);

                if ($camposUser > 0) {
                    foreach ($camposUser as $c) {
                        $dadosVindima2013 = $vindimaCampo->getVindimaCampoByIdCampoAndAno($c['id'], 2013);
                        $dadosVindima2014 = $vindimaCampo->getVindimaCampoByIdCampoAndAno($c['id'], 2014);
                        $dadosVindima2015 = $vindimaCampo->getVindimaCampoByIdCampoAndAno($c['id'], 2015);
                        $dadosVindima2016 = $vindimaCampo->getVindimaCampoByIdCampoAndAno($c['id'], 2016);
                        $dadosVindima2017 = $vindimaCampo->getVindimaCampoByIdCampoAndAno($c['id'], 2017);
                        ?>
                        <p><strong>Campo: </strong><?php echo $c['nome']; ?> </p> 
                        <?php
                        foreach ($dadosVindima2013 as $d) {
                            ?>
                            <p><strong>Dados 2013: </strong><?php echo $d['quantidade']; ?> mil KG</p>
                            <?php
                        }

                        foreach ($dadosVindima2014 as $dd) {
                            ?>
                            <p><strong>Produção Ano 2014: </strong><?php echo $dd['quantidade']; ?> mil KG</p>
                            <?php
                        }
                        foreach ($dadosVindima2015 as $ddd) {
                            ?>
                            <p><strong>Produção Ano 2015: </strong><?php echo $ddd['quantidade']; ?> mil KG</p>
                            <?php
                        }
                        foreach ($dadosVindima2016 as $dddd) {
                            ?>
                            <p><strong>Produção Ano 2016: </strong><?php echo $dddd['quantidade']; ?> mil KG</p>
                            <?php
                        } foreach ($dadosVindima2017 as $ddddd) {
                            ?>
                            <p><strong>Produção Ano 2017: </strong><?php echo $ddddd['quantidade']; ?> mil KG</p><br/>
                        <?php }
                        ?>
                        <a href="fazerPrevisao.php?campoid=<?php echo $c['id']; ?>">Efetuar Previsão Produção 2018</a><br/><br/>
                        <a href="detalhesMeteoAnosAnteriores.php?campoid=<?php echo $c['id']; ?>">Ver Dados Meteorológicos Anos Anteriores</a><hr>
                        <?php
                    }
                }
                ?>
            </div>

            <div class="footer">
                <p>Sistema desenvolvido pela Escola Superior de Tecnologia e Gestão do Politécnico do Porto</p>
            </div>
        </body>
    </html>
    <?php
} else {
    header("Location: ../../index.php");
}        