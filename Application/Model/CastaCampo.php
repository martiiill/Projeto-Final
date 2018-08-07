<?php

/*
 * Modelo que representa a classe Casta Campo.
 */

require_once __DIR__ . '/../../Config.php';

class CastaCampo {

    //Variáveis
    private $idCastaCampo;
    private $idUva;
    private $idCasta;
    private $idCampo;
    private $idQuinta;
    private $vides;

    function getIdCastaCampo() {
        return $this->idCastaCampo;
    }

    function getIdUva() {
        return $this->idUva;
    }

    function getIdCasta() {
        return $this->idCasta;
    }

    function getIdCampo() {
        return $this->idCampo;
    }

    function getIdQuinta() {
        return $this->idQuinta;
    }

    function getVides() {
        return $this->vides;
    }

    function setIdCastaCampo($idCastaCampo) {
        $this->idCastaCampo = $idCastaCampo;
    }

    function setIdUva($idUva) {
        $this->idUva = $idUva;
    }

    function setIdCasta($idCasta) {
        $this->idCasta = $idCasta;
    }

    function setIdCampo($idCampo) {
        $this->idCampo = $idCampo;
    }

    function setIdQuinta($idQuinta) {
        $this->idQuinta = $idQuinta;
    }

    function setVides($vides) {
        $this->vides = $vides;
    }

    public static function createObject($idcastacampo, $idUva, $idCasta, $idCampo, $idQuinta, $vides) {
        $castacampo = new CastaCampo();
        $castacampo->setIdCastaCampo($idcastacampo);
        $castacampo->setIdCasta($idCasta);
        $castacampo->setIdUva($idUva);
        $castacampo->setIdCampo($idCampo);
        $castacampo->setIdQuinta($idQuinta);
        $castacampo->setVides($vides);
        return $castacampo;
    }

    public static function convertArrayToObject(Array $data) {
        return self::createObject($data['idcastacampo'], $data['iduva'],$data['idcasta'], $data['idcampo'], $data['idquinta'], $data['numero_vides']);
    }

    public function convertObjectToArray() {
        $data = array(
            'idcastacampo' => $this->idCastaCampo,
            'iduva' => $this->idUva,
            'idcasta' => $this->idCasta,
            'idcampo' => $this->idCampo,
            'idquinta' => $this->idQuinta,
            'numero_vides' => $this->vides,
        );
        return $data;
    }
}
