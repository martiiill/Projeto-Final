<?php

/*
 * Modelo que representa a classe Poda Campo.
 */

require_once __DIR__ . '/../../Config.php';

class PodaCampo {

    //Variáveis
    private $idpodacampo;
    private $idPoda;
    private $idCampo;
    private $idquinta;
    private $data;
    private $descricao;

    function getIdpodacampo() {
        return $this->idpodacampo;
    }

    function setIdpodacampo($idpodacampo) {
        $this->idpodacampo = $idpodacampo;
    }

    function getIdPoda() {
        return $this->idPoda;
    }

    function getIdCampo() {
        return $this->idCampo;
    }

    function getIdquinta() {
        return $this->idquinta;
    }

    function setIdquinta($idquinta) {
        $this->idquinta = $idquinta;
    }

    function getData() {
        return $this->data;
    }

    function setIdPoda($idPoda) {
        $this->idPoda = $idPoda;
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

    public static function createObject($idPodaCampo, $idPoda, $idCampo, $idquinta, $data, $descricao) {
        $podaCampo = new PodaCampo();
        $podaCampo->setIdpodacampo($idPodaCampo);
        $podaCampo->setIdPoda($idPoda);
        $podaCampo->setIdCampo($idCampo);
        $podaCampo->setIdquinta($idquinta);
        $podaCampo->setData($data);
        $podaCampo->setDescricao($descricao);
        return $podaCampo;
    }

    public static function convertArrayToObject(Array $data) {
        return self::createObject($data['idpodacampo'], $data['idPoda'], $data['idCampo'], $data['idquinta'], $data['data'], $data['descricao']);
    }

    public function convertObjectToArray() {
        $data = array(
            'idpodacampo' => $this->idpodacampo,
            'idPoda' => $this->idPoda,
            'idCampo' => $this->idCampo,
            'idquinta' => $this->idquinta,
            'data' => $this->data,
            'descricao' => $this->descricao
        );
        return $data;
    }
}