<?php
session_start();
require_once __DIR__ . ' /../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'CampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'UtilizadorManager.php');
require_once (Conf::getApplicationManagerPath() . 'CastaManager.php');
require_once (Conf::getApplicationManagerPath() . 'CastaCampoManager.php');

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
            <title>Minhas Castas</title>
            <link rel="stylesheet" type="text/css" href="../CSS/styleCastas.css">
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
                <a href="producao.php">Produção</a>
            </div>

            <h2>Minhas Castas</h2>

            <div class="conteudo">                        
                <table>
                    <tr>
                        <th>Casta</th>
                        <th>Campo</th>
                    </tr>
                    <?php
                    $managerCampos = new CampoManager();
                    $castasManager = new CastaManager();
                    $castascampoManager = new CastaCampoManager();
                    $managerUtilizador = new UtilizadorManager();
                    $utilizadorId = $managerUtilizador->getUserByUsername($_SESSION['login']);
                    $camposUser = $managerCampos->getCamposByUtilizadorId($utilizadorId[0]['id']);

                    if ($camposUser > 0) {
                        foreach ($camposUser as $c) {
                            $camposcastas = $castascampoManager->getCastaCampoByIdCampo($c['id']);
                            foreach ($camposcastas as $cc) {
                                $castas = $castasManager->getCastaById($cc['idcasta']);
                                foreach ($castas as $ct) {
                                    ?>
                                    <tr>
                                        <td><?php echo $ct['nome'] ?></td>
                                        <td><?php echo $c['nome'] ?></td>                                      
                                    </tr>
                                    <?php
                                }
                            }
                        }
                        ?>
                    <?php } else { ?>
                        <p>Não existem campos associados.</p>
                    <?php }
                    ?>
                </table>
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