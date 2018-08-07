<?php
session_start();
require_once __DIR__ . ' /../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'CampoManager.php');

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
            <title>Guardar Dados Meteorológicos</title>
            <link rel="stylesheet" type="text/css" href="../CSS/styleEfetuarPrevisao.css">
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
                <a href="campos.php">Campos</a>
                <br/>
                <a href="producao.php" class="active">Produção</a>
            </div>

            <?php $campoid = filter_input(INPUT_GET, 'campoid'); ?>
            <h2><u>Guardar Dados Meteorológicos do Campo nº<?php echo $campoid; ?></u></h2>

            <?php
            $maanger = new CampoManager();
            $dados = $maanger->getCampoById($campoid);
            ?>

            <div class="conteudo">
                <div id="localcampo" style="display: none;"><?php echo $dados[0]['localizacao']; ?></div>

                <button id="showTemp" onclick="gotLocation();">Ver Condições Meterológicas</button>  

                <form method="post" action="Validations/validarAddDadosMeteo.php">
                    <input type="hidden" name="campoid" value="<?php echo $campoid; ?>"/>

                    <label for="temp_min">Temperatura Mínima:</label>
                    <input type="number" id="temp_min" name="temp_min" readonly required/>
                    <br/><br/>
                    <label for="temp_max">Temperatura Máxima:</label>
                    <input type="number" id="temp_max" name="temp_max" readonly required/>
                    <br/><br/>
                    <label for="humidade">Humidade Relativa:</label>
                    <input type="number" id="humidade" name="humidade" readonly required/>
                    <br/><br/>
                    <input type="submit" value="Guardar Dados"/>
                </form>
            </div>

            <div class="footer">
                <p>Sistema desenvolvido pela Escola Superior de Tecnologia e Gestão do Politécnico do Porto</p>
            </div>

            <script>
                function gotLocation() {
                    var address = document.getElementById("localcampo").innerHTML;
                    api_url = 'http://api.openweathermap.org/data/2.5/weather?' + 'q=' + address + '&lang=pt&units=metric&appid=64ae3b08d7a46d0393ef90a6675dfc22';
                    $.ajax({
                        url: api_url,
                        method: 'GET',
                        success: function (data) {
                            var tempr = data.main.temp_min;
                            var tempr_max = data.main.temp_max;
                            var humidade = data.main.humidity;

                            var text = document.getElementById('temp_max');
                            text.value = tempr_max;

                            var text = document.getElementById('temp_min');
                            text.value = tempr;

                            var text = document.getElementById('humidade');
                            text.value = humidade;
                        }
                    });
                }
            </script>
        </body>
    </html>
    <?php
} else {
    header("Location: ../../index.php");
}