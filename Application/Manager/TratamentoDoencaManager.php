<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once __DIR__ . '/../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'TratamentoDoença.php');

class TratamentoDoencaManager extends MyDataAccessPDO {

    const SQL_TABLE_NAME = 'tratamentodoenca';

    public function getRegasCampos() {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getTratamentoDoencaByTratamentoId($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('idtratamento' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getTratamentoDoencaByDoencaId($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('iddoenca' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

}
