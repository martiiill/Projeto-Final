<?php

require_once __DIR__ . '/../../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'CampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'TratamentoCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'PodaCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'RegaCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'AduboCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'VindimaCampoManager.php');

if (filter_has_var(INPUT_GET, 'tarefaadubo')) {
    $idTarefaAdubo = filter_input(INPUT_GET, 'tarefaadubo');

    try {
        $acManager = new AduboCampoManager();
        $acManager->deleteAduboCampoById($idTarefaAdubo);
        header('Location: ../homePageUser.php?deleteTarefa=sucesso');
    } catch (Exception $e) {
        header('Location: ../homePageUser.php?deleteTarefa=erro');
    }
} elseif (filter_has_var(INPUT_GET, 'tarefarega')) {
    $idTarefaRega = filter_input(INPUT_GET, 'tarefarega');

    try {
        $rcManager = new RegaCampoManager();
        $rcManager->deleteRegaCampoById($idTarefaRega);
        header('Location: ../homePageUser.php?deleteTarefa=sucesso');
    } catch (Exception $e) {
        header('Location: ../homePageUser.php?deleteTarefa=erro');
    }
} elseif (filter_has_var(INPUT_GET, 'tarefapoda')) {
    $idTarefaPoda = filter_input(INPUT_GET, 'tarefapoda');

    try {
        $pcManager = new PodaCampoManager();
        $pcManager->deletePodaCampoById($idTarefaRega);
        header('Location: ../homePageUser.php?deleteTarefa=sucesso');
    } catch (Exception $e) {
        header('Location: ../homePageUser.php?deleteTarefa=erro');
    }
} elseif (filter_has_var(INPUT_GET, 'tarefatrata')) {
    $idTarefaTrata = filter_input(INPUT_GET, 'tarefatrata');

    try {
        $tcManager = new TratamentoCampoManager();
        $tcManager->deleteTratamentoCampoById($idTarefaTrata);
        header('Location: ../homePageUser.php?deleteTarefa=sucesso');
    } catch (Exception $e) {
        header('Location: ../homePageUser.php?deleteTarefa=erro');
    }
} elseif (filter_has_var(INPUT_GET, 'tarefavindima')) {
    $idTarefaVindima = filter_input(INPUT_GET, 'tarefavindima');

    try {
        $vManager = new VindimaCampoManager();
        $vManager->deleteVindimaCampoById($idTarefaVindima);
        header('Location: ../homePageUser.php?deleteTarefa=sucesso');
    } catch (Exception $e) {
        header('Location: ../homePageUser.php?deleteTarefa=erro');
    }
}

