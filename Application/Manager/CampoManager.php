<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once __DIR__ . '/../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'Campo.php');

class CampoManager extends MyDataAccessPDO {

    const SQL_TABLE_NAME = 'campo';

    public function getCampos() {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getCampoById($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('id' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getQuintaIdByCampoId($id_campo) {
        try {
            $result = $this->getRecords(self::SQL_TABLE_NAME, array('id' => $id_campo));
            return $result[0]['quinta_id'];
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getCampoByNome($nome) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('nome' => $nome));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getCamposByQuintaId($quinta_id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('quinta_id' => $quinta_id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getCamposByUtilizadorId($utilizador_id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('utilizador_id' => $utilizador_id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function alterarDados($id, $nome, $area, $numero_linhas, $orientacao) {
        $campo = array("nome" => $nome, "area" => $area, "numero_linhas" => $numero_linhas, "orientacao" => $orientacao, "id" => $id);
        $where = array("id" => $id);
        try {
            $this->update(self::SQL_TABLE_NAME, $campo, $where);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function addNovoCampo(Campo $c) {
        try {
            return $this->insert(self::SQL_TABLE_NAME, $c->convertObjectToArray());
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteCampo($id) {
        try {
            $this->delete(self::SQL_TABLE_NAME, array('id' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

}
