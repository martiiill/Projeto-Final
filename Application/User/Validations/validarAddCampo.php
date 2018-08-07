<?php

session_start();
require_once __DIR__ . '/../../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'CampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'UtilizadorManager.php');
require_once (Conf::getApplicationModelPath() . 'Campo.php');

if (isset($_SESSION['login'])) {
    if (filter_has_var(INPUT_POST, 'nomeQuinta')) {
        if (filter_has_var(INPUT_POST, 'nome_campo')) {
            if (filter_has_var(INPUT_POST, 'localizacao_campo')) {
                if (filter_has_var(INPUT_POST, 'area_campo')) {
                    if (filter_has_var(INPUT_POST, 'numero_linhas_campo')) {
                        if (filter_has_var(INPUT_POST, 'orientacao_campo')) {
                            $quintaid = filter_input(INPUT_POST, 'nomeQuinta');
                            $nome_campo = filter_input(INPUT_POST, 'nome_campo', FILTER_SANITIZE_SPECIAL_CHARS);
                            $localizacao_ampo = filter_input(INPUT_POST, 'localizacao_campo', FILTER_SANITIZE_SPECIAL_CHARS);
                            $area_campo = filter_input(INPUT_POST, 'area_campo', FILTER_SANITIZE_NUMBER_INT);
                            $numero_linhas_campo = filter_input(INPUT_POST, 'numero_linhas_campo', FILTER_SANITIZE_NUMBER_INT);
                            $orientacao_campo = filter_input(INPUT_POST, 'orientacao_campo', FILTER_SANITIZE_SPECIAL_CHARS);
                            $campoManager = new CampoManager();
                            $campo = new Campo();
                            $utilizador = new UtilizadorManager();
                            $idUtilizador = $utilizador->getUserByUsername($_SESSION['login']);
                            $cc = $campo->createObject(rand(1, 60), $nome_campo, $localizacao_ampo, $area_campo, $numero_linhas_campo, $orientacao_campo, $quintaid, $idUtilizador[0]['id']);
                            $campoManager->addNovoCampo($cc);
                            header('Location: ../campos.php?add=sucesso');
                        } else {
                            header('Location: ../campos.php?add=erroorientacao');
                        }
                    } else {
                        header('Location: ../campos.php?add=erronumerolinhas');
                    }
                } else {
                    header('Location: ../campos.php?add=erroarea');
                }
            } else {
                header('Location: ../campos.php?add=erro');
            }
        } else {
            header('Location: ../campos.php?add=erronomecampo');
        }
    } else {
        header('Location: ../campos.php?add=erronomequinta');
    }
} else {
    header("Location: ../../../index.php");
}