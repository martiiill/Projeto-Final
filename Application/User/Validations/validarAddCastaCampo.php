<?php

session_start();
require_once __DIR__ . '/../../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'CastaCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'CampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'UvaManager.php');
require_once (Conf::getApplicationModelPath() . 'CastaCampo.php');

if (isset($_SESSION['login'])) {
    if (filter_has_var(INPUT_POST, 'casta')) {
        if (filter_has_var(INPUT_POST, 'numero_vides')) {
            $idcampo = filter_input(INPUT_POST, 'campoid');
            $idcasta = filter_input(INPUT_POST, 'casta', FILTER_SANITIZE_NUMBER_INT);
            $numero_vides = filter_input(INPUT_POST, 'numero_vides', FILTER_SANITIZE_NUMBER_INT);
          
            $castacampoManager = new CastaCampoManager();
            $castacampo = new CastaCampo();
            
            $uvaManager = new UvaManager();
            $detalhesUva = $uvaManager->getUvaByCastaId($idcasta);
            
            $campoManager = new CampoManager();
            $detalhesCampo = $campoManager->getQuintaIdByCampoId($idcampo);

            $cc = $castacampo->createObject(rand(0, 20),$detalhesUva[0]['id'], $idcasta, $idcampo, $detalhesCampo, $numero_vides);
            $castacampoManager->addCastaCampo($cc);
            header('Location: ../campos.php?addcastacampo=sucesso');
        } else {
            header('Location: ../campos.php?addcastacampo=erroorientacao');
        }
    } else {
        header('Location: ../campos.php?addcastacampo=erronomequinta');
    }
} else {
    header("Location: ../../../index.php");
}