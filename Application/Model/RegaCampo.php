<?php

/*
 * Modelo que representa a classe Rega Campo.
 */

require_once __DIR__ . '/../../Config.php';

class RegaCampo {

    //Variáveis
    private $idregacampo;
    private $idRega;
    private $idQuinta;
    private $idCampo;
    private $data;
    private $descricao;
    
    function getIdregacampo() {
        return $this->idregacampo;
    }

    function setIdregacampo($idregacampo) {
        $this->idregacampo = $idregacampo;
    }

    function getIdRega() {
        return $this->idRega;
    }

    function getIdCampo() {
        return $this->idCampo;
    }

    function getData() {
        return $this->data;
    }

    function setIdRega($idRega) {
        $this->idRega = $idRega;
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

    public static function createObject($idregacampo,$idRega, $idCampo, $idQuinta, $data, $descricao) {
        $regaCampo = new RegaCampo();
        $regaCampo->setIdregacampo($idregacampo);
        $regaCampo->setIdRega($idRega);
        $regaCampo->setIdCampo($idCampo);
        $regaCampo->setIdQuinta($idQuinta);
        $regaCampo->setData($data);
        $regaCampo->setDescricao($descricao);
        return $regaCampo;
    }

    public static function convertArrayToObject(Array $data) {
        return self::createObject($data['idregacampo'],$data['idRega'], $data['idCampo'], $data['idQuinta'], $data['data'], $data['descricao']);
    } 

    public function convertObjectToArray() {
        $data = array(
            'idregacampo' => $this->idregacampo,
            'idrega' => $this->idRega,
            'idcampo' => $this->idCampo,
            'idquinta' => $this->idQuinta,
            'data' => $this->data,
            'descricao' => $this->descricao
        );
        return $data;
    }
}
