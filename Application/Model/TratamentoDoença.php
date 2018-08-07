<?php

/*
 * Modelo que representa a classe Tratamento Doença.
 */

require_once __DIR__ . '/../../Config.php';

class TratamentoDoenca {

    //Variáveis
    private $idTratamento;
    private $idDoenca;

    function getIdTratamento() {
        return $this->idTratamento;
    }

    function getIdDoenca() {
        return $this->idDoenca;
    }

    function setIdTratamento($idTratamento) {
        $this->idTratamento = $idTratamento;
    }

    function setIdDoenca($idDoenca) {
        $this->idDoenca = $idDoenca;
    }

    public static function createObject($idTratamento, $idDoenca) {
        $tratamentoDoenca = new TratamentoDoenca();
        $tratamentoDoenca->setIdRega($idDoenca);
        $tratamentoDoenca->setIdCampo($idTratamento);
        return $tratamentoDoenca;
    }

    public static function convertArrayToObject(Array $data) {
        return self::createObject($data['idTratamento'], $data['idDoenca']);
    }

    public function convertObjectToArray() {
        $data = array(
            'idTratamento' => $this->idTratamento,
            'idDoenca' => $this->idDoenca
        );
        return $data;
    }
}