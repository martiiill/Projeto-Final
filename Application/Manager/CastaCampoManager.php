<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once __DIR__ . '/../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'CastaCampo.php');

class CastaCampoManager extends MyDataAccessPDO {

    const SQL_TABLE_NAME = 'castacampo';

    public function getCastaCampos() {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getCastaCampoByIdCasta($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('idcasta' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getCastaCampoByIdUva($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('iduva' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getCastaCampoByIdCampo($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('idcampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getCastaCampoByCastaCampo($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('idcastaampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function addCastaCampo(CastaCampo $obj) {
        try {
            $this->insert(self::SQL_TABLE_NAME, $obj->convertObjectToArray());
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteCastaCampoByIdCampo($id) {
        try {
            $this->delete(self::SQL_TABLE_NAME, array('idcampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteCastaCampoById($id) {
        try {
            $this->delete(self::SQL_TABLE_NAME, array('idcastacampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function editarIdCastaCampo($idcastacampo,$idcasta, $idcampo, $vides) {
        $campo = array("idcasta" => $idcasta, "numero_vides" => $vides, "idcampo" => $idcampo, "idcastacampo" => $idcastacampo);
        $where = array("idcastacampo" => $idcastacampo);
        try {
            $this->update(self::SQL_TABLE_NAME, $campo, $where);
        } catch (Exception $e) {
            throw $e;
        }
    }

}
