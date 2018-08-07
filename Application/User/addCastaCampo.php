<?php
session_start();
require_once __DIR__ . ' /../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
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
            <title>Adicionar Casta a Campo</title>
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
            ?>

            <h2>Adicionar Nova Casta ao Campo nº <?php echo $campoid; ?> </h2>

            <div class="conteudoDetalhes">
                <form id="formAddCastaCampo" method="post" action="Validations/validarAddCastaCampo.php">
                    <input type="hidden" value="<?php echo $campoid; ?>" name="campoid">
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
                        <?php } ?> 
                    </select>
                    <br/><br/>
                    <label for="numero_vides">Número de Vides:</label>
                    <input type="number" name="numero_vides" placeholder="Número de Vides" required/>

                    <input type="submit" value="Adicionar Nova Casta Campo" id="sbutton" required>
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