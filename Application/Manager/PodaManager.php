<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once __DIR__ . '/../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'Poda.php');

class PodaManager extends MyDataAccessPDO {

    const SQL_TABLE_NAME = 'poda';

    public function getPodas() {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getPodaById($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('id' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getPodaByNome($nome) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('nome' => $nome));
        } catch (Exception $e) {
            throw $e;
        }
    }

}
