<?php
session_start();

require_once __DIR__ . ' /../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');

require_once (Conf::getApplicationManagerPath() . 'CampoManager.php');
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
            <title></title>
            <link rel="stylesheet" type="text/css" href="../CSS/styleAreaPerfil.css">
            <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
            <script type="text/javascript" src="JS/jsHomePageUser.js"></script>
        </head>
        <body>
            <ul class="menutopo">
                <li>Bem vindo, <strong><?php echo $_SESSION['login'] ?></strong></li>
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

            <h2>Área de Perfil</h2>

            <div class="dadosPerfil">
                <p><strong>Nome: </strong><?php echo $_SESSION['login'] ?></p>              
               <a href="castas.php">Ver Minhas Castas</a>       
            </div>

            <div class="conteudo">   
                <p><<strong>:: Meus Campos</strong></p>
                <table>
                    <tr>
                        <th>Nome</th>
                        <th>Área (m2)</th>
                        <th>Número de Linhas</th>
                        <th>Orientação</th>
                    </tr>
                    <?php
                    $camposMan = new CampoManager();
                    $user = new UtilizadorManager();
                    $userId = $user->getUserByUsername($_SESSION['login']);
                    $meusCampos = $camposMan->getCamposByUtilizadorId($userId[0]['id']);
                    foreach ($meusCampos as $d) {
                        ?>
                        <tr>
                            <td><a href="detalhesCampos.php?campoid=<?php echo $d['id']; ?>"><?php echo $d['nome']; ?></a></p></td>
                            <td><?php echo $d['area']; ?></td>
                            <td><?php echo $d['numero_linhas']; ?></td>
                            <td><?php echo $d['orientacao']; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="footer">
                <p>Sistema desenvolvido pela Escola Superior de Tecnologia e Gestão do Politécnico do Porto</p>
            </div>
        </body>
    </html>
    <?php
} else {
    header("Location: index.php");
}