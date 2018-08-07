<?php

session_start();
require_once __DIR__ . '/../../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'VindimaCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'CampoManager.php');
require_once (Conf::getApplicationModelPath() . 'Campo.php');
require_once (Conf::getApplicationModelPath() . 'VindimaCampo.php');

if (isset($_SESSION['login'])) {
    if (filter_has_var(INPUT_POST, 'campoid')) {
        if (filter_has_var(INPUT_POST, 'data_vindima')) {
            if (filter_has_var(INPUT_POST, 'quantidade_vindima')) {
                if (filter_has_var(INPUT_POST, 'descricao_vindima')) {
                    $campoManager = new CampoManager();
                    $vindima_campo = new VindimaCampo();
                    $vindima_campo_manager = new VindimaCampoManager();
                    $i = rand(0, 100);
                    $id_campo = filter_input(INPUT_POST, 'campoid', FILTER_SANITIZE_SPECIAL_CHARS);

                    $quinta_id = $campoManager->getQuintaIdByCampoId($id_campo);
                    $data_vindima = filter_input(INPUT_POST, 'data_vindima', FILTER_SANITIZE_NUMBER_INT);
                    $quantidade_vindima = filter_input(INPUT_POST, 'quantidade_vindima', FILTER_SANITIZE_NUMBER_FLOAT);
                    $descricao_vindima = filter_input(INPUT_POST, 'descricao_vindima', FILTER_SANITIZE_SPECIAL_CHARS);

                    $tem_vindima_campo_id = $vindima_campo_manager->getVindimaCampoById($i);
                    if (count($tem_vindima_campo_id) > 0) {
                        header('Location: ../homePageUser.php?add_vindima=erroidexistente');
                    } else {
                        $objet_vindima_campo = $vindima_campo->createObject($i, $id_campo, $quinta_id, $quantidade_vindima, $data_vindima, $descricao_vindima);
                        $vindima_campo_manager->addVindimaCampo($objet_vindima_campo);
                        header('Location: ../homePageUser.php?add_vindima=sucesso');
                    }
                } else {
                    header('Location: ../homePageUser.php?add_vindima=errodes');
                }
            } else {
                header('Location: ../campohomePageUsers.php?add_vindima=erroquant');
            }
        } else {
            header('Location: ../homePageUser.php?add_vindima=errodata');
        }
    } else {
        header('Location: ../homePageUser.php?add_vindima=errocampoid');
    }
} else {
    header("Location: ../../../index.php");
}