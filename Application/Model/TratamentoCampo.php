<?php

/*
 * Modelo que representa a classe Tratamento Campo.
 */

require_once __DIR__ . '/../../Config.php';

class TratamentoCampo {

    //Variáveis
    private $idtratamentocampo;
    private $idTratamento;
    private $idQuinta;
    private $idCampo;
    private $data;
    private $descricao;
    
    function getIdtratamentocampo() {
        return $this->idtratamentocampo;
    }

    function setIdtratamentocampo($idtratamentocampo) {
        $this->idtratamentocampo = $idtratamentocampo;
    }

    function getIdTratamento() {
        return $this->idTratamento;
    }

    function getIdCampo() {
        return $this->idCampo;
    }

    function getData() {
        return $this->data;
    }

    function setIdTratamento($idTratamento) {
        $this->idTratamento = $idTratamento;
    }

    function setIdCampo($idCampo) {
        $this->idCampo = $idCampo;
    }

    function setData($data) {
        $this->data = $data;
    }
    
    function getDescricao() {
        return $this->descricao;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    
    function getIdQuinta() {
        return $this->idQuinta;
    }

    function setIdQuinta($idQuinta) {
        $this->idQuinta = $idQuinta;
    }

    public static function createObject($idtratamentocampo,$idTratamento, $idCampo, $idQuinta, $data, $descricao) {
        $tratamentoCampo = new TratamentoCampo();
        $tratamentoCampo->setIdtratamentocampo($idtratamentocampo);
        $tratamentoCampo->setIdTratamento($idTratamento);
        $tratamentoCampo->setIdCampo($idCampo);
        $tratamentoCampo->setIdQuinta($idQuinta);
        $tratamentoCampo->setData($data);
        $tratamentoCampo->setDescricao($descricao);
        return $tratamentoCampo;
    }

    public static function convertArrayToObject(Array $data) {
        return self::createObject($data['idtratamentocampo'],$data['idTratamento'], $data['idCampo'], $data['idQuinta'], $data['data'], $data['descricao']);
    } 

    public function convertObjectToArray() {
        $data = array(
            'idtratamentocampo' => $this->idtratamentocampo,
            'idtratamento' => $this->idTratamento,
            'idcampo' => $this->idCampo,
            'idquinta' => $this->idQuinta,
            'data' => $this->data,
            'descricao' => $this->descricao
        );
        return $data;
    }
}
