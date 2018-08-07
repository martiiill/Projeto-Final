<?php

require_once __DIR__ . '/../../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'UtilizadorManager.php');

if (filter_has_var(INPUT_POST, 'nome') && filter_has_var(INPUT_POST, 'palavrapasse')) {
    $user = filter_input(INPUT_POST, 'nome');
    $pass = filter_input(INPUT_POST, 'palavrapasse');  //TODO: depois alterar pra md5
    $userManager = new UtilizadorManager();
    if ($userManager->checkUserExistenceByNomeePassword($user, $pass)) {
        session_start();
        $_SESSION['login'] = filter_input(INPUT_POST, 'nome');
        header('Location: ../homePageUser.php');
    } else {
        $_SESSION['login'] = filter_input(INPUT_POST, 'error');
        header('Location: ../../../index.php?login=error');
    }
} else {
    header('Location: ../../../index.php?login=errorPreencher');
}