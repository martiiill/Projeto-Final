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
            <title>Meus Campos</title>
            <link rel="stylesheet" type="text/css" href="../CSS/styleCamposUser.css">
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
                <a href="campos.php" class="active">Campos</a>
                <br/>
                <a href="producao.php">Produção</a>
            </div>

            <?php
            if (filter_has_var(INPUT_GET, 'alterar')) {

                if (filter_input(INPUT_POST, 'alterar') === 'sucesso') {
                    echo '<div style="color:green;  margin-left:500px;" id="alert">Campo alterado com sucesso.</div>';
                } elseif (filter_input(INPUT_POST, 'alterar') === 'erro') {
                    echo '<div style="color:red; margin-top:-40px; margin-left:500px;" id="alert">Erro ao alterar campo.</div>';
                } elseif (filter_input(INPUT_POST, 'erroorientacao')) {
                    
                }
            } elseif (filter_has_var(INPUT_GET, 'add')) {

                if (filter_input(INPUT_POST, 'add') === 'sucesso') {
                    echo '<div style="color:green" id="alert">Campo adicionado com sucesso.</div>';
                } elseif (filter_input(INPUT_POST, 'add') === 'erro') {
                    echo '<div style="color:red" id="alert">Erro ao adicionar campo.</div>';
                } elseif (filter_input(INPUT_POST, 'erroorientacao')) {
                    echo '<div style="color:red" id="alert">Erro na orientação do campo.</div>';
                } elseif (filter_input(INPUT_POST, 'erronumerolinhas')) {
                    echo '<div style="color:red" id="alert">Erro no número de linhas do campo.</div>';
                } elseif (filter_input(INPUT_POST, 'erroarea')) {
                    echo '<div style="color:red" id="alert">Erro na área do campo.</div>';
                } elseif (filter_input(INPUT_POST, 'erronomecampo')) {
                    echo '<div style="color:red" id="alert">Erro no nome do campo.</div>';
                } elseif (filter_input(INPUT_POST, 'erronomequinta')) {
                    echo '<div style="color:red" id="alert">Erro no nome da quinta.</div>';
                }
            } elseif (filter_has_var(INPUT_GET, 'delete')) {

                if (filter_input(INPUT_GET, 'delete') === 'sucesso') {
                    echo '<div style="color:green" id="alert">Campo eliminado com sucesso.</div>';
                } elseif (filter_input(INPUT_GET, 'delete') === 'erro') {
                    echo '<div style="color:red" id="alert">Erro ao eliminar campo.</div>';
                }
            }
            ?>

            <h2>Meus Campos</h2>
            <a href="addCampo.php" id="novaTarefa" role="button">Novo Campo</a>

            <div class="conteudo">                        
                <table>
                    <tr>
                        <th>Nome</th>
                        <th>Área (m2)</th>
                        <th>Ver Mais</th>
                    </tr>
                    <?php
                    $managerCampos = new CampoManager();
                    $managerUtilizador = new UtilizadorManager();
                    $utilizadorId = $managerUtilizador->getUserByUsername($_SESSION['login']);
                    $camposUser = $managerCampos->getCamposByUtilizadorId($utilizadorId[0]['id']);

                    if ($camposUser > 0) {
                        foreach ($camposUser as $c) {
                            ?>
                            <tr>
                                <td><?php echo $c['nome'] ?></td>
                                <td><?php echo $c['area'] ?></td>
                                <td><a href="detalhesCampos.php?campoid=<?php echo $c['id'] ?>"><img src="../Images/see-more-1.png" width="7%"></a></td>
                            </tr>
                            <?php
                        }
                    }
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