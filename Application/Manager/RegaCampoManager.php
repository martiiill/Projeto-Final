<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once __DIR__ . '/../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'RegaCampo.php');

class RegaCampoManager extends MyDataAccessPDO {

    const SQL_TABLE_NAME = 'regacampo';

    public function getRegasCampos() {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getRegaCampoByDescricao($descricao) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('descricao' => $descricao));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getRegaCampoByIdRegaCampo($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('idregacampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getRegaCampoByIdCampo($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('idcampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getRegaCampoByIdRega($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('idrega' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function addRegaCampo(RegaCampo $obj) {
        try {
            $this->insert(self::SQL_TABLE_NAME, $obj->convertObjectToArray());
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteRegaCampoByIdCampo($id) {
        try {
            $this->delete(self::SQL_TABLE_NAME, array('idcampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteRegaCampoById($id) {
        try {
            $this->delete(self::SQL_TABLE_NAME, array('idregacampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function editarRegaCampo($idregacampo, $idrega, $data, $descricao) {
        $campo = array("idrega" => $idrega, "data" => $data, "descricao" => $descricao, "idregacampo" => $idregacampo);
        $where = array("idregacampo" => $idregacampo);
        try {
            $this->update(self::SQL_TABLE_NAME, $campo, $where);
        } catch (Exception $e) {
            throw $e;
        }
    }

}
