<?php

session_start();
require_once __DIR__ . '/../../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'DadosMeteoDiaManager.php');
require_once (Conf::getApplicationModelPath() . 'DadosMeteoDia.php');

if (isset($_SESSION['login'])) {
    if (filter_has_var(INPUT_POST, 'campoid')) {
        if (filter_has_var(INPUT_POST, 'temp_min')) {
            if (filter_has_var(INPUT_POST, 'temp_max')) {
                if (filter_has_var(INPUT_POST, 'humidade')) {
                    $campoid = filter_input(INPUT_POST, 'campoid');
                    $temp_min = filter_input(INPUT_POST, 'temp_min', FILTER_SANITIZE_NUMBER_FLOAT);
                    $temp_max = filter_input(INPUT_POST, 'temp_max', FILTER_SANITIZE_NUMBER_FLOAT);
                    $humidade = filter_input(INPUT_POST, 'humidade', FILTER_SANITIZE_NUMBER_FLOAT);

                    $dados = new DadosMeteoDia();
                    $dadosManager = new DadosMeteoDiaManager();

                    $now = new DateTime('now');
                    $month = $now->format('m');
                    $day = $now->format('d');

                    $temdados_campo = $dadosManager->getDadosMeteDiaByIdCampoDM($day, $month, $campoid);

                    if (count($temdados_campo) > 0) { //Se já tem guardado os dados desde dia, deste mes, deste campo
                        header('Location: ../homePageUser.php?addPrevisao=errojaexiste');
                    } else {
                        $i = rand(0, 100);
                        $tem = $dadosManager->getDadosMeteoDiaById($i);
                        if (count($tem) === 0) {
                            $addDados = $dados->createObject(rand(30, 100), $campoid, $temp_max, $temp_min, $humidade, $day, $month);
                            $dadosManager->addNovosDados($addDados);
                            header('Location: ../homePageUser.php?addPrevisao=sucesso');
                        } else {
                            header('Location: ../homePageUser.php?addPrevisao=erroidjaexiste');
                        }
                    }
                } else {
                    header('Location: ../homePageUser.php?addPrevisao=errohumidade');
                }
            } else {
                header('Location: ../homePageUser.php?addPrevisao=errotempmax');
            }
        } else {
            header('Location: ../homePageUser.php?addPrevisao=errotempmin');
        }
    } else {
        header('Location: ../homePageUser.php?addPrevisao=errocampo');
    }
} else {
    header("Location: ../../../index.php");
}