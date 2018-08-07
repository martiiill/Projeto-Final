<?php

/*
 * Este manager representa todos os metodos necessários para manipulação da tabela
 * adubo presente na base de dados.
 */

require_once __DIR__ . '/../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'DadosMeteoDia.php');

class DadosMeteoDiaManager extends MyDataAccessPDO {

    const SQL_TABLE_NAME = 'dadosmeteodia';

    public function getDadosMeteoDia() {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getDadosMeteoDiaById($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('id' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getDadosMeteoDiaByIdCampo($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('idcampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getDadosMeteoDiaByMes($mes) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('mes' => $mes));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getDadosMeteoDiaByDia($dia) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('dia' => $dia));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getDadosMeteDiaByIdCampoDM($dia, $mes, $campo) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('dia' => $dia, 'mes' => $mes, 'idcampo' => $campo));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getDadosMeteDiaByIdCampoM($mes, $campo) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('mes' => $mes, 'idcampo' => $campo));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function addNovosDados(DadosMeteoDia $c) {
        try {
            return $this->insert(self::SQL_TABLE_NAME, $c->convertObjectToArray());
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteDadosMeteoDiaByCampoId($id) {
        try {
            $this->delete(self::SQL_TABLE_NAME, array('idcampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

}
