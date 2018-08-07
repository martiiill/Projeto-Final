<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once __DIR__ . '/../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'AduboCampo.php');

class AduboCampoManager extends MyDataAccessPDO {

    const SQL_TABLE_NAME = 'adubocampo';

    public function getAduboCampos() {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getAduboCampoByIdAdubo($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('idadubo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getAduboCampoByIdCampo($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('idcampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getAduboCampoByData($data) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('data' => $data));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getAduboCampoByIdAduboCampo($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('idadubocampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function addAduboCampo(AduboCampo $obj) {
        try {
            $this->insert(self::SQL_TABLE_NAME, $obj->convertObjectToArray());
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteAduboCampoByIdCampo($id) {
        try {
            $this->delete(self::SQL_TABLE_NAME, array('idcampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteAduboCampoById($id) {
        try {
            $this->delete(self::SQL_TABLE_NAME, array('idadubocampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function editarAduboCampo($idadubocampo, $idadubo, $data, $descricao) {
        $campo = array("idadubo" => $idadubo, "data" => $data, "descricao" => $descricao, "idadubocampo" => $idadubocampo);
        $where = array("idadubocampo" => $idadubocampo);
        try {
            $this->update(self::SQL_TABLE_NAME, $campo, $where);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
