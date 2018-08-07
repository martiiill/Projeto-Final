<?php
session_start();

require_once __DIR__ . ' /../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');

require_once (Conf::getApplicationManagerPath() . 'UtilizadorManager.php');
require_once (Conf::getApplicationManagerPath() . 'CampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'PodaManager.php');
require_once (Conf::getApplicationManagerPath() . 'QuintaManager.php');
require_once (Conf::getApplicationManagerPath() . 'PodaCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'RegaManager.php');
require_once (Conf::getApplicationManagerPath() . 'AduboManager.php');
require_once (Conf::getApplicationManagerPath() . 'DoencaManager.php');
require_once (Conf::getApplicationManagerPath() . 'TratamentoManager.php');
require_once (Conf::getApplicationManagerPath() . 'TratamentoDoencaManager.php');

require_once (Conf::getApplicationModelPath() . 'Campo.php');

if (isset($_SESSION['login'])) {
    $camposManager = new CampoManager();
    $utilizadorManager = new UtilizadorManager();
    $regaManager = new RegaManager();
    $podaManager = new PodaManager();
    $aduboManager = new AduboManager();
    $doencaManager = new DoencaManager();
    $doencaTratamentoManager = new TratamentoDoencaManager();
    $tratamentoManager = new TratamentoManager();
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
            <title>Adicionar Nova Tarefa</title>
            <link rel="stylesheet" type="text/css" href="../CSS/styleAdicionarTarefa.css">
            <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
            <script type="text/javascript" src="../JS/jsHomePageUser.js"></script>
            <script type="text/javascript" src="../JS/newjavascript.js"></script>
            <script type="text/javascript" src="../JS/js_tarefa2.js"></script>
        </head>
        <body>
            <ul class="menutopo">
                <li>Bem vindo, <a href="areaUser.php"><strong><?php echo $_SESSION['login'] ?></strong></a></li>
                <li></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>

            <h1><a href="homePageUser.php">VitiAl - Sistema de Previsão Vitivínicola</a></h1>

            <div class="menu-items">     
                <a href="homePageUser.php" class="active">Tarefas</a>
                <br/>
                <a href="campos.php">Campos</a>
                <br/>
                <a href="producao.php">Produção</a>
            </div>

            <h2>Adicionar Nova Tarefa</h2>

            <div class="conteudo">
                <form id="formularioNovaTarefa" class="formularioNovaTarefa" method="post" action="Validations/validarAddTarefa_2.php">
                    <div id="formCampo" class="formularioCampo">
                        <label for="nomeCamp">Campo: (*) </label>     
                        <?php
                        if (filter_has_var(INPUT_GET, 'campoid')) {
                            $campoid = filter_input(INPUT_GET, 'campoid');

                            $utilizador = $utilizadorManager->getUserByUsername($_SESSION['login']);
                            $listaCampos = $camposManager->getCampoById($campoid);

                            foreach ($listaCampos as $campo) {
                                ?>         
                                <input type="text" name="<?php echo $campo['id'] ?>" required id="nomeCampo" value="<?php echo $campo['nome'] ?>" readonly/>
                                <input type="hidden" name="nomeCampo" id="nomeCampo" value="<?php echo $campo['id'] ?>"/>
                                <?php
                            }
                        } else {
                            $utilizador = $utilizadorManager->getUserByUsername($_SESSION['login']);
                            $listaCampo = $camposManager->getCamposByUtilizadorId($utilizador[0]['id']);
                            ?>

                            <select name="nomeCampo" id="nomeCampo" required>
                                <option disabled="true">Escolha o campo</option>

                                <?php foreach ($listaCampo as $camp) {
                                    ?>
                                    <option value="<?php echo $camp['id'] ?>"><?php echo $camp['nome'] ?></option>
                                <?php }
                                ?>
                            </select>    
                        <?php }
                        ?>                        
                    </div>
                    <br/>
                    <div id="formTarefa">                    
                        <label for="tipoTarefa">Tipo de Tarefa:  (*)</label>
                        <?php
                        if (filter_has_var(INPUT_GET, 'vindima')) {
                            $vindima_campo_id = filter_input(INPUT_GET, 'vindima');
                            ?>
                            <select name='tipoTarefa' class="tipoTarefa" id="tipoTarefa" required>
                                <option value="Vindima">Vindima</option>
                            </select>

                        <?php } else { ?>

                            <select name='tipoTarefa' class="tipoTarefa" id="tipoTarefa" required>
                                <option selected="" value="" disabled="true">Escolha uma tarefa</option>
                                <option value="rega">Rega</option>
                                <option value="poda">Poda</option>
                                <option value="adubo">Adubação</option>
                                <option value="trata">Tratamentos</option>
                            </select>
                        <?php }
                        ?>
                    </div>

                    <div id="formRega" style="display:none;">
                        <label for="formRega">Tipo de Rega: </label>
                        <select name="tipoRega" id="tipoRega" class="tipoRega">
                            <br/>
                            <option selected="" value="" disabled="true">Escolha um tipo de rega</option>
                            <?php
                            $listaRegas = $regaManager->getRegas();
                            foreach ($listaRegas as $rega) {
                                ?>
                                <option value="<?php echo $rega['id'] ?>"><?php echo $rega['nome'] ?></option>
                            <?php }
                            ?> 
                        </select>
                    </div>

                    <div id="formPoda" style="display:none;">
                        <label for="formPoda">Poda: </label>
                        <select name="tipoPoda" id="tipoPoda">
                            <option selected="" value="">Escolha um tipo de poda</option>
                            <?php
                            $listaPodas = $podaManager->getPodas();
                            foreach ($listaPodas as $poda) {
                                ?>
                                <option value="<?php echo $poda['id'] ?>"><?php echo $poda['nome'] ?></option>
                            <?php }
                            ?> 
                        </select>
                    </div>

                    <div id="formAdubo" style="display:none;">
                        <label for="formAdubo">Adubo: </label>
                        <select name="tipoAdubo" id="tipoAdubo">
                            <option selected="" value="">Escolha um produto</option>
                            <?php
                            $listaAdubos = $aduboManager->getAdubos();
                            foreach ($listaAdubos as $adubo) {
                                ?>
                                <option value="<?php echo $adubo['id'] ?>"><?php echo $adubo['nome'] ?></option>
                            <?php }
                            ?> 
                        </select>
                    </div>

                    <div id="formTratamentos" style="display:none;">
                        <label for="formTratamentos">Tipo de Tratamento: (*)</label>
                        <select name="tipoTratamento" id="tipoTratamento">
                            <option selected="" value="" disabled="true">Escolha um tipo de tratamento</option>
                            <option value="sulfatacao">Outros</option>
                            <option value="doenca">Doença</option>
                        </select>
                    </div>

                    <div id="formDoenca" style="display:none;">
                        <label for="formDoenca">Doença: (*)</label>
                        <select name="tipoDoenca" id="tipoDoenca">
                            <option selected="" value="" disabled="true">Escolha um tratamento para a doença</option>
                            <?php
                            $listaDoencas = $doencaManager->getDoencas();
                            foreach ($listaDoencas as $d) {
                                $listaTratamentosDoencas = $doencaTratamentoManager->getTratamentoDoencaByDoencaId($d['id']);
                                foreach ($listaTratamentosDoencas as $t) {
                                    $tratamento = $tratamentoManager->getTratamentoById($t['idtratamento']);
                                    foreach ($tratamento as $trata) {
                                        ?>
                                        <optgroup label="<?php echo $d['nome'] ?>" value="<?php echo $d['id'] ?>">
                                            <option value="<?php echo $trata['id'] ?>"><?php echo $trata['nome'] ?></option>
                                        </optgroup>

                                        <?php
                                    }
                                }
                            }
                            ?> 
                        </select>
                    </div>

                    <div id="formSulfatacao" style="display:none;">
                        <label for="formSulfatacao">Doença: </label>
                        <select name="tipoSulfatcao" id="tipoSulfatacao">
                            <option selected="" value="">Escolha um tratamento</option>
                            <?php
                            $listaTratamentos = $tratamentoManager->getTratamentos();
                            foreach ($listaTratamentos as $l) {
                                ?>
                                <option value="<?php echo $l['id'] ?>"><?php echo $l['nome'] ?></option>
                            <?php }
                            ?> 
                        </select>
                    </div>

                    <div id="formGeral" style="display: none;">
                        <br/>
                        <label for="data">Data:</label>
                        <input type="date" name="data" id="data" required/>
                        <br/>
                        <label for="descricao">Descrição:</label>
                        <input type="text" name="descricao" id="descricao" required/>   
                    </div>                                       

                    <div id="formularioNovaTarefa2" class="formularioNovaTarefa2" style="display: none;">
                        <h3> :: Nova tarefa</h3>
                        <div id="formTarefa2">
                            <label for="tipoTarefa2">Tipo de Tarefa;  (*)</label>
                            <select name='tipoTarefa2' class="tipoTarefa2" id="tipoTarefa2" required>
                                <option selected="" value="" disabled="true">Escolha uma tarefa</option>
                                <option value="rega2">Rega</option>
                                <option value="poda2">Poda</option>
                                <option value="adubo2">Adubação</option>
                                <option value="trata2">Tratamentos</option>
                            </select>
                        </div>

                        <div id="formRega2" style="display:none;">
                            <label for="formRega2">Tipo de Rega: </label>
                            <select name="tipoRega2" id="tipoRega2" class="tipoRega2">
                                <br/>
                                <option selected="" value="" disabled="true">Escolha um tipo de rega</option>
                                <?php
                                $listaRegas2 = $regaManager->getRegas();
                                foreach ($listaRegas2 as $reg) {
                                    ?>
                                    <option value="<?php echo $reg['id'] ?>"><?php echo $reg['nome'] ?></option>
                                <?php }
                                ?> 
                            </select>
                        </div>

                        <div id="formPoda2" style="display:none;">
                            <label for="formPoda2">Poda: (*) </label>
                            <select name="tipoPoda2" id="tipoPoda2">
                                <option selected="" value="">Escolha um tipo de poda</option>
                                <?php
                                $listaPodas2 = $podaManager->getPodas();
                                foreach ($listaPodas2 as $pod) {
                                    ?>
                                    <option value="<?php echo $pod['id'] ?>"><?php echo $pod['nome'] ?></option>
                                <?php }
                                ?> 
                            </select>
                        </div>


                        <div id="formAdubo2" style="display:none;">
                            <label for="formAdubo2">Adubo: (*) </label>
                            <select name="tipoAdubo2" id="tipoAdubo2">
                                <option selected="" value="">Escolha um produto</option>
                                <?php
                                $listaAdubos2 = $aduboManager->getAdubos();
                                foreach ($listaAdubos2 as $adub) {
                                    ?>
                                    <option value="<?php echo $adub['id'] ?>"><?php echo $adub['nome'] ?></option>
                                <?php }
                                ?> 
                            </select>
                        </div>

                        <div id="formTratamentos2" style="display:none;">
                            <label for="formTratamentos2">Tipo de Tratamento: (*)</label>
                            <select name="tipoTratamento2" id="tipoTratamento2">
                                <option selected="" value="" disabled="true">Escolha um tipo de tratamento</option>
                                <option value="sulfatacao2">Sulfatação</option>
                                <option value="doenca2">Doença</option>
                            </select>
                        </div>

                        <div id="formDoenca2" style="display:none;">
                            <label for="formDoenca2">Doença: (*)</label>
                            <select name="tipoDoenca2" id="tipoDoenca2">
                                <option selected="" value="" disabled="true">Escolha um tratamento para a doença</option>
                                <?php
                                $listaDoencas2 = $doencaManager->getDoencas();
                                foreach ($listaDoencas2 as $d) {
                                    $listaTratamentosDoencas2 = $doencaTratamentoManager->getTratamentoDoencaByDoencaId($d['id']);
                                    foreach ($listaTratamentosDoencas2 as $t) {
                                        $tratamento2 = $tratamentoManager->getTratamentoById($t['idtratamento']);
                                        foreach ($tratamento2 as $trata) {
                                            ?>
                                            <optgroup label="<?php echo $d['nome'] ?>" value="<?php echo $d['id'] ?>">
                                                <option value="<?php echo $trata['id'] ?>"><?php echo $trata['nome'] ?></option>
                                            </optgroup>

                                            <?php
                                        }
                                    }
                                }
                                ?> 
                            </select>
                        </div>

                        <div id="formSulfatacao2" style="display:none;">
                            <label for="formSulfatacao2">Nome Tratamento: </label>
                            <select name="tipoSulfatcao2" id="tipoSulfatacao2">
                                <option selected="" value="">Escolha um tratamento</option>
                                <?php
                                $listaTratamentos2 = $tratamentoManager->getTratamentos();
                                foreach ($listaTratamentos2 as $l) {
                                    ?>
                                    <option value="<?php echo $l['id'] ?>"><?php echo $l['nome'] ?></option>
                                <?php }
                                ?> 
                            </select>
                        </div>   

                        <div id="formGeral2" style="display: none;">
                            <br/>
                            <label for="data2">Data: (*) </label>
                            <input type="date" name="data2"/>
                            <br/>
                            <label for="descricao2">Descrição: (*) </label>
                            <input type="text" name="descricao2"/>  
                        </div>                                             
                    </div>

                    <input type="submit" value="Submeter Tarefa" id="submit1"/>
                </form>

                <button class="addTarefa" id="addTarefa">Add nova tarefa</button>
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