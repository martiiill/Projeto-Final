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

class TratamentoCampoManager extends MyDataAccessPDO {

    const SQL_TABLE_NAME = 'tratamentocampo';

    public function getTratamentosCampos() {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getTratamentoCampoByDescricao($descricao) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('descricao' => $descricao));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getTratamentoCampoByIdTratamentoCampo($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('idtratamentocampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getTratamentoCampoByIdCampo($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('idcampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getTratamentoCampoByIdTratamento($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('idTratamento' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function addTratamentoCampo(TratamentoCampo $obj) {
        try {
            $this->insert(self::SQL_TABLE_NAME, $obj->convertObjectToArray());
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteTratamentoCampoByIdCampo($id) {
        try {
            $this->delete(self::SQL_TABLE_NAME, array('idcampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteTratamentoCampoById($id) {
        try {
            $this->delete(self::SQL_TABLE_NAME, array('idtratamentocampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function editarTratamentoCampo($idtratamentocampo, $idtratamento, $data, $descricao) {
        $campo = array("idtratamento" => $idtratamento, "data" => $data, "descricao" => $descricao, "idtratamentocampo" => $idtratamentocampo);
        $where = array("idtratamentocampo" => $idtratamentocampo);
        try {
            $this->update(self::SQL_TABLE_NAME, $campo, $where);
        } catch (Exception $e) {
            throw $e;
        }
    }

}
