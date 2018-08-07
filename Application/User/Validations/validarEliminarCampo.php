<?php

require_once __DIR__ . '/../../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'CampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'TratamentoManager.php');
require_once (Conf::getApplicationManagerPath() . 'PodaCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'RegaCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'AduboCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'VindimaCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'DadosMeteoMesManager.php');
require_once (Conf::getApplicationManagerPath() . 'DadosMeteoDiaManager.php');

if (filter_has_var(INPUT_GET, 'campoid')) {
    $campoid = filter_input(INPUT_GET, 'campoid');
    try {
        $campoManager = new CampoManager();
        $pcManager = new PodaCampoManager();
        $rcManager = new RegaCampoManager();
        $acManager = new AduboCampoManager();
        $tdManager = new TratamentoCampoManager();
        $dmmManager = new DadosMeteoMesManager();
        $ddManager = new DadosMeteoDiaManager();
        $vManager = new VindimaCampoManager();

        $acManager->deleteAduboCampoByIdCampo($campoid);
        $rcManager->deleteRegaCampoByIdCampo($campoid);
        $pcManager->deletePodaCampoByCampoId($campoid);
        $tdManager->deleteTratamentoCampoByIdCampo($campoid);
        $dmmManager->deleteDadosMeteoMesByCampoId($campoid);
        $ddManager->deleteDadosMeteoDiaByCampoId($campoid);
        $vManager->deleteVindimaCampoByIdCampo($campoid);
        $campoManager->deleteCampo($campoid);

        header('Location: ../campos.php?delete=sucesso');
    } catch (Exception $e) {
        header('Location: ../campos.php?delete=erro');
    }
} else {
    header('Location: ../campos.php?delete=erro');
}
