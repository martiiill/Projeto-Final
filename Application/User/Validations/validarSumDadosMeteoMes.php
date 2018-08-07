<?php

session_start();
require_once __DIR__ . '/../../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'DadosMeteoMesManager.php');
require_once (Conf::getApplicationManagerPath() . 'DadosMeteoDiaManager.php');
require_once (Conf::getApplicationModelPath() . 'DadosMeteoMes.php');

if (isset($_SESSION['login'])) {
    if (filter_has_var(INPUT_GET, 'mes')) {
        if (filter_has_var(INPUT_GET, 'campoid')) {
            $campoid = filter_input(INPUT_GET, 'campoid');
            $mes = filter_input(INPUT_GET, 'mes');

            $dados = new DadosMeteoMes();
            $dadosManager = new DadosMeteoDiaManager();
            $dadosMesManager = new DadosMeteoMesManager();

            $temdados_campo = $dadosManager->getDadosMeteDiaByIdCampoM($mes, $campoid);

            $qt = 0;
            $temp = 0;
            $meJun = 0;

            foreach ($temdados_campo as $t) {               
                $qt += $t['humidade'];
                $temp += $t['tempMin'] + $t['tempMax'];
            }

            $tempMed = ($temp / 2) / 31;
            $humidTotal = $qt / 31;

            $addDados = $dados->createObject(rand(0, 100), $campoid, $tempMed, $humidTotal, $mes,2018);
            $dadosMesManager->addNovosDados($addDados);
            header('Location: ../homePageUser.php?addSumMeteoMes=sucesso');
        } else {
            header('Location: ../homePageUser.php?addSumMeteoMes=errocampoid');
        }
    } else {
        header('Location: ../homePageUser.php?addSumMeteoMes=erromes');
    }
} else {
    header("Location: ../../../index.php");
}