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
            <title>Alterar Dados do Campo</title>
            <link rel="stylesheet" type="text/css" href="../CSS/styleAddVindimaCampo.css">
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

            <?php
            $campoid = filter_input(INPUT_GET, 'vindima');

            $campoManager = new CampoManager();
            $infoCampo = $campoManager->getCampoById($campoid);
            $local = $infoCampo[0]['localizacao'];

            $weather = json_decode(file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=' . $local . '&appid=64ae3b08d7a46d0393ef90a6675dfc22')); //Obtenho dados meteo
            $KELVIN = ($weather->main->temp) - 273.15; //Converto para celsius
            $humidade = $weather->main->humidity;
            
            if($humidade > 90){
                 echo '<div style="color:red; margin-top: 12%; margin-left: 400px;" id="alert">Não existem boas condições meteorológicas para a vindima!</div>';
            }
            ?>

            <h2><u>Fazer a Vindima do Campo nº<?php echo $campoid ?></u></h2>

            <div class="conteudoDetalhes">
                <form id="formAddVindimaCampo" method="post" action="Validations/validarAddVindimaCampo.php">
                    <input type="hidden" value="<?php echo $campoid ?>" name="campoid">
                    <label for="data_vindima">Data: (*)</label>
                    <input type="date" name="data_vindima" required/>
                    <br/><br/>
                    <label for="quantidade_vindima">Quantidade (kg): (*)</label>
                    <input type="number" name="quantidade_vindima" required/>
                    <br/><br/>
                    <label for="descricao_vindima">Descrição: (*)</label>
                    <textarea id="descricao_vindima" name="descricao_vindima" rows="4" cols="40" placeholder="Indique quanta mão-de-obra utilizou, por exemplo..."></textarea>
                    <br/><br/> 
                    <input type="submit" value="Realizar Vindima" id="sbutton" required/>
                </form>
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