<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once __DIR__ . '/../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'Quinta.php');

class QuintaManager extends MyDataAccessPDO {
   
    const SQL_TABLE_NAME = 'quinta';

    public function getQuintas() {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getQuintaById($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('id' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getQuintaByDono($dono) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('nomeDono' => $dono));
        } catch (Exception $e) {
            throw $e;
        }
    }

}
