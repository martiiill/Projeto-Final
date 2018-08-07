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
            <title>Adicionar Campo</title>
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

            <h2>Adicionar Novo Campo</h2>

            <div class="conteudoDetalhes">
                <form id="formAddCampo" method="post" action="Validations/validarAddCampo.php">

                    <label for="nomeQuinta">Nome da Quinta: </label>
                    <select name="nomeQuinta" id="nomeQuinta" required>
                        <br/>
                        <option selected="" value="">Escolha uma quinta</option>
                        <?php
                        $quintaManager = new QuintaManager();
                        $listaQuintas = $quintaManager->getQuintas();

                        foreach ($listaQuintas as $q) {
                            ?>
                            <option value="<?php echo $q['id'] ?>"><?php echo $q['nome'] ?></option>
                        <?php }
                        ?> 
                    </select>
                    <br/><br/>
                    <label for="nome_campo">Nome do Campo:</label>
                    <input type="text" name="nome_campo" placeholder="Nome do campo" required/>
                    <br/><br/>
                    <label for="localizacao_campo">Localização:</label>
                    <input type="text" name="localizacao_campo" placeholder="Localização do campo" required/>
                    <br/><br/>
                    <label for="area_campo">Área (m2):</label>
                    <input type="number" name="area_campo" placeholder="Area do campo" required/>
                    <br/><br/>
                    <label for="numero_linhas_campo">Número de Linhas:</label>
                    <input type="number" name="numero_linhas_campo" placeholder="Numero de linhas do campo" required/>
                    <br/><br/>
                    <label for="orientacao_campo">Orientação:</label>
                    <input type="text" name="orientacao_campo" placeholder="Orientação do campo" required/>   
                    <br/><br/>
                    <input type="submit" value="Adicionar Novo Campo" id="sbutton" required>
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