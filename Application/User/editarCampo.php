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
            <link rel="stylesheet" type="text/css" href="../CSS/styleEditarCampo.css">
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
                $campoid = filter_input(INPUT_GET, 'campoid');
                $campoManager = new CampoManager();
                $detalhes = $campoManager->getCampoById($campoid);
                ?>

                <h2><u>Alterar dados do Campo nº<?php echo $campoid ?></u></h2>

                <div class="conteudoDetalhes">
                    <form id="formAlteraCampo" method="get" action="Validations/validarEditarCampo.php">
                        <input type="hidden" value="<?php echo $campoid ?>" name="campoid">
                        <label for="nome_campo">Nome do Campo:</label>
                        <input type="text" name="nome_campo" placeholder="<?php echo $detalhes[0]['nome']; ?>" required/>
                        <br/><br/>
                        <label for="area_campo">Área (m2):</label>
                        <input type="number" name="area_campo" placeholder="<?php echo $detalhes[0]['area']; ?>" required/>
                        <br/><br/>
                        <label for="numero_linhas_campo">Número de Linhas:</label>
                        <input type="number" name="numero_linhas_campo" placeholder="<?php echo $detalhes[0]['numero_linhas']; ?>" required/>
                        <br/><br/>
                        <label for="orientacao_campo">Orientação:</label>
                        <input type="text" name="orientacao_campo" placeholder="<?php echo $detalhes[0]['orientacao']; ?>" required/>    
                        <br/><br/>

                        <label for="casta">Casta: </label>
                        <select name="casta" id="casta" required>
                            <br/>
                            <option selected="" value="">Escolha uma casta</option>
                            <?php
                            $castaManager = new CastaManager();
                            $listaCastas = $castaManager->getCastas();

                            foreach ($listaCastas as $q) {
                                ?>
                                <option value="<?php echo $q['id'] ?>"><?php echo $q['nome'] ?></option>
                            <?php }
                            ?> 
                        </select>
                        <br/><br/>
                        <label for="numero_vides">Número de Vides:</label>
                        <input type="text" name="numero_vides" placeholder="Número de Vides" required/>    
                        <br/><br/>
                        <input type="submit" value="Alterar dados" id="sbutton" required/>
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