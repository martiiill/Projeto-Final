<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once __DIR__ . '/../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'VindimaCampo.php');

class VindimaCampoManager extends MyDataAccessPDO {

    const SQL_TABLE_NAME = 'vindimacampo';

    public function getVindimaCampos() {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getVindimaCampoById($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('id' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getVindimaCampoByIdCampo($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('idcampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getVindimaCampoByIdCampoAndAno($id, $ano) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('idcampo' => $id, 'ano' => $ano));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getVindimaCampoByData($data) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('ano' => $data));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getVindimaCampoByIdQuinta($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('idquinta' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function addVindimaCampo(VindimaCampo $obj) {
        try {
            $this->insert(self::SQL_TABLE_NAME, $obj->convertObjectToArray());
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteVindimaCampoByIdCampo($id) {
        try {
            $this->delete(self::SQL_TABLE_NAME, array('idcampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteVindimaCampoById($id) {
        try {
            $this->delete(self::SQL_TABLE_NAME, array('id' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function editarAduboCampo($quantidade, $data, $descricao, $idcampo, $id) {
        $campo = array("idcampo" => $idcampo, "data" => $data, "descricao" => $descricao, "quantidade" => $quantidade, "id" => $id);
        $where = array("id" => $id);
        try {
            $this->update(self::SQL_TABLE_NAME, $campo, $where);
        } catch (Exception $e) {
            throw $e;
        }
    }

}
