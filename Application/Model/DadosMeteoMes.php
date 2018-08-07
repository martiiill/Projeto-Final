<?php

/*
 * Modelo que representa a classe Dados Meteo Mes.
 */

require_once __DIR__ . '/../../Config.php';

class DadosMeteoMes {

    //Variáveis
    private $id;
    private $idcampo;
    private $tempMedio;
    private $humidadeMedia;
    private $mes;
    private $ano;

    function getId() {
        return $this->id;
    }

    function getIdcampo() {
        return $this->idcampo;
    }

    function getTempMedio() {
        return $this->tempMedio;
    }

    function getHumidadeMedia() {
        return $this->humidadeMedia;
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

    function setTempMedio($tempMedio) {
        $this->tempMedio = $tempMedio;
    }

    function setHumidadeMedia($humidadeMedia) {
        $this->humidadeMedia = $humidadeMedia;
    }

    function setMes($mes) {
        $this->mes = $mes;
    }
    
    function getAno() {
        return $this->ano;
    }

    function setAno($ano) {
        $this->ano = $ano;
    }

        
    public static function createObject($id, $idcampo, $tempMedio,$humidadeMedia, $mes, $ano) {
        $dadosMeteoDia = new DadosMeteoMes();
        $dadosMeteoDia->setId($id);
        $dadosMeteoDia->setIdcampo($idcampo);
        $dadosMeteoDia->setTempMedio($tempMedio);
        $dadosMeteoDia->setHumidadeMedia($humidadeMedia);
        $dadosMeteoDia->setMes($mes);
        $dadosMeteoDia->setAno($ano);
        return $dadosMeteoDia;
    }

    public static function convertArrayToObject(Array $data) {
        return self::createObject($data['id'], $data['idcampo'], $data['tempMedio'], $data['humidadeMedia'],$data['mes'], $data['ano']);
    }

    public function convertObjectToArray() {
        $data = array(
            'id' => $this->id,
            'idcampo' => $this->idcampo,
            'tempMedio' => $this->tempMedio,
            'humidadeMedia' => $this->humidadeMedia,
            'mes' => $this->mes,
            'ano' => $this->ano
        );
        return $data;
    }

}
