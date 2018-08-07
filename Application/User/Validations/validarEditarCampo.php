<?php

session_start();
require_once __DIR__ . '/../../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'CampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'CastaCampoManager.php');
require_once (Conf::getApplicationModelPath() . 'Campo.php');
require_once (Conf::getApplicationModelPath() . 'CastaCampo.php');

if (isset($_SESSION['login'])) {
    if (filter_has_var(INPUT_GET, 'campoid')) {
        if (filter_has_var(INPUT_GET, 'nome_campo')) {
            if (filter_has_var(INPUT_GET, 'area_campo')) {
                if (filter_has_var(INPUT_GET, 'numero_linhas_campo')) {
                    if (filter_has_var(INPUT_GET, 'orientacao_campo')) {
                        if (filter_has_var(INPUT_GET, 'casta')) {
                            if (filter_has_var(INPUT_GET, 'numero_vides')) {
                                $campoid = filter_input(INPUT_GET, 'campoid');
                                $nome_campo = filter_input(INPUT_GET, 'nome_campo', FILTER_SANITIZE_SPECIAL_CHARS);
                                $area_campo = filter_input(INPUT_GET, 'area_campo', FILTER_SANITIZE_NUMBER_INT);
                                $numero_linhas_campo = filter_input(INPUT_GET, 'numero_linhas_campo', FILTER_SANITIZE_NUMBER_INT);
                                $orientacao_campo = filter_input(INPUT_GET, 'orientacao_campo', FILTER_SANITIZE_SPECIAL_CHARS);
                                $idcasta = filter_input(INPUT_GET, 'casta', FILTER_SANITIZE_NUMBER_INT);
                                $numero_vides = filter_input(INPUT_GET, 'numero_vides', FILTER_SANITIZE_NUMBER_INT);
                                $campoManager = new CampoManager();
                                $castacampoManager = new CastaCampoManager();
                                $objCastaCampo = new CastaCampo();
                                $temCasta = $castacampoManager->getCastaCampoByIdCampo($campoid);
                                $campoManager->alterarDados($campoid, $nome_campo, $area_campo, $numero_linhas_campo, $orientacao_campo);
                                $castacampoManager->editarIdCastaCampo($temCasta[0]['idcastacampo'], $idcasta, $campoid, $numero_vides);
                                header('Location: ../campos.php?alterar=sucesso');
                            } else {
                                header('Location: ../campos.php?alterar=erro');
                            }
                        } else {
                            header('Location: ../campos.php?alterar=erro');
                        }
                    } else {
                        header('Location: ../campos.php?alterar=erro');
                    }
                } else {
                    header('Location: ../campos.php?alterar=erro');
                }
            } else {
                header('Location: ../campos.php?alterar=erro');
            }
        } else {
            header('Location: ../campos.php?alterar=erro');
        }
    } else {
        header('Location: ../campos.php?alterar=erro');
    }
} else {
    header("Location: ../../../index.php");
}