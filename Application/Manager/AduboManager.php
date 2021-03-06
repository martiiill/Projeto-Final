<?php

/*
 * Este manager representa todos os metodos necessários para manipulação da tabela
 * adubo presente na base de dados.
 */

require_once __DIR__ . '/../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'Adubo.php');

class AduboManager extends MyDataAccessPDO {

    const SQL_TABLE_NAME = 'adubo';

    public function getAdubos() {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getAdduboById($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('id' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getAduboByNome($nome) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('nome' => $nome));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getAduboByPeso($peso) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('peso' => $peso));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getAuboByComposicao($composicao) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('composicao' => $composicao));
        } catch (Exception $e) {
            throw $e;
        }
    }
}
