<?php

/*
 * Modelo que representa a classe Adubo.
 */

require_once __DIR__ . '/../../Config.php';

class DadosMeteoDia {

    //Variáveis
    private $id;
    private $idcampo;
    private $local;
    private $tempMax;
    private $tempMin;
    private $humidade;
    private $dia;
    private $mes;

    function getId() {
        return $this->id;
    }

    function getIdcampo() {
        return $this->idcampo;
    }

    function getTempMax() {
        return $this->tempMax;
    }

    function getTempMin() {
        return $this->tempMin;
    }

    function getHumidade() {
        return $this->humidade;
    }

    function getDia() {
        return $this->dia;
    }

    function getMes() {
        return $this->mes;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdcampo($idcampo) {
        $this->idcampo = $idcampo;
    }

    function setTempMax($tempMax) {
        $this->tempMax = $tempMax;
    }

    function setTempMin($tempMin) {
        $this->tempMin = $tempMin;
    }

    function setHumidade($humidade) {
        $this->humidade = $humidade;
    }

    function setDia($dia) {
        $this->dia = $dia;
    }

    function setMes($mes) {
        $this->mes = $mes;
    }

    public static function createObject($id, $idcampo, $tempMax, $tempMin, $humidade, $dia, $mes) {
        $dadosMeteoDia = new DadosMeteoDia();
        $dadosMeteoDia->setId($id);
        $dadosMeteoDia->setIdcampo($idcampo);
        $dadosMeteoDia->setTempMax($tempMax);
        $dadosMeteoDia->setTempMin($tempMin);
        $dadosMeteoDia->setHumidade($humidade);
        $dadosMeteoDia->setDia($dia);
        $dadosMeteoDia->setMes($mes);
        return $dadosMeteoDia;
    }

    public static function convertArrayToObject(Array $data) {
        return self::createObject($data['id'], $data['idcampo'], $data['tempMax'], $data['tempMin'], $data['humidade'], $data['dia'], $data['mes']);
    }

    public function convertObjectToArray() {
        $data = array(
            'id' => $this->id,
            'idcampo' => $this->idcampo,
            'tempMax' => $this->tempMax,
            'tempMin' => $this->tempMin,
            'humidade' => $this->humidade,
            'dia' => $this->dia,
            'mes' => $this->mes
        );
        return $data;
    }

}
