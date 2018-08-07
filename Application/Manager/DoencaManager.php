<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once __DIR__ . '/../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'Doenca.php');

class DoencaManager extends MyDataAccessPDO {

    const SQL_TABLE_NAME = 'doenca';

    public function getDoencas() {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getDoencaById($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('id' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getDoencaByNome($nome) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('nome' => $nome));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getDoencaByCaracteristicas($caracteristicas) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('caracteristicas' => $caracteristicas));
        } catch (Exception $e) {
            throw $e;
        }
    }
}
