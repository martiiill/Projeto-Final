<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once __DIR__ . '/../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'PodaCampo.php');

class PodaCampoManager extends MyDataAccessPDO {

    const SQL_TABLE_NAME = 'podacampo';

    public function getPodaCampos() {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getPodaCampoByIdPoda($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('idpoda' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getPodaCampoByIdCampo($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('idcampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getPodaCampoByData($data) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('data' => $data));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getPodaCampoByIdPodaCampo($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('idpodacampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function addPodaCampo(PodaCampo $obj) {
        try {
            $this->insert(self::SQL_TABLE_NAME, $obj->convertObjectToArray());
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deletePodaCampoByCampoId($id) {
        try {
            $this->delete(self::SQL_TABLE_NAME, array('idcampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deletePodaCampoById($id) {
        try {
            $this->delete(self::SQL_TABLE_NAME, array('idpodacampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function editarPodaCampo($idpodacampo, $idpoda, $data, $descricao) {
        $campo = array("idpoda" => $idpoda, "data" => $data, "descricao" => $descricao, "idpodacampo" => $idpodacampo);
        $where = array("idpodacampo" => $idpodacampo);
        try {
            $this->update(self::SQL_TABLE_NAME, $campo, $where);
        } catch (Exception $e) {
            throw $e;
        }
    }

}
