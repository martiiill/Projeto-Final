<?php

/*
 * Este manager representa todos os metodos necessários para manipulação da tabela
 * adubo presente na base de dados.
 */

require_once __DIR__ . '/../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'Uva.php');

class UvaManager extends MyDataAccessPDO {

    const SQL_TABLE_NAME = 'uva';

    public function getUvas() {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getUvaById($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('id' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getUvaByNome($nome) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('nome' => $nome));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getUvaByCastaId($idcasta) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('idcasta' => $idcasta));
        } catch (Exception $e) {
            throw $e;
        }
    }
}
