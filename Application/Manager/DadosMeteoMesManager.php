<?php

/*
 * Este manager representa todos os metodos necessários para manipulação da tabela
 * adubo presente na base de dados.
 */

require_once __DIR__ . '/../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'DadosMeteoMes.php');

class DadosMeteoMesManager extends MyDataAccessPDO {

    const SQL_TABLE_NAME = 'dadosmeteomes';

    public function getDadosMeteoMes() {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getDadosMeteoMesById($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('id' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getDadosMeteoMesByIdCampo($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('idcampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getDadosMeteoMesByMesAndIdCampo($mes, $idcampo) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('mes' => $mes, 'idcampo' => $idcampo));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getDadosMeteoMesByAnoAndIdCampo($ano, $idcampo) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('ano' => $ano, 'idcampo' => $idcampo));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getDadosMeteoMesByAnoMesAndIdCampo($ano, $mes, $idcampo) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('ano' => $ano, 'mes' => $mes, 'idcampo' => $idcampo));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function addNovosDados(DadosMeteoMes $c) {
        try {
            return $this->insert(self::SQL_TABLE_NAME, $c->convertObjectToArray());
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteDadosMeteoMesByCampoId($id) {
        try {
            $this->delete(self::SQL_TABLE_NAME, array('idcampo' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

}
