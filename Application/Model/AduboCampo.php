<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once __DIR__ . '/../../Config.php';

class AduboCampo {

    //Variáveis
    private $idaduboCampo;
    private $idAdubo;
    private $idCampo;
    private $idquinta;
    private $data;
    private $descricao;

    function getIdAduboCampo() {
        return $this->idaduboCampo;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function setIdAduboCampo($idaduboCampo) {
        $this->idaduboCampo = $idaduboCampo;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function getIdAdubo() {
        return $this->idAdubo;
    }

    function getIdCampo() {
        return $this->idCampo;
    }

    function getData() {
        return $this->data;
    }

    function setIdAdubo($idAdubo) {
        $this->idAdubo = $idAdubo;
    }

    function setIdCampo($idCampo) {
        $this->idCampo = $idCampo;
    }

    function setData($data) {
        $this->data = $data;
    }

    function getIdquinta() {
        return $this->idquinta;
    }

    function setIdquinta($idquinta) {
        $this->idquinta = $idquinta;
    }

    public static function createObject($idadubocampo, $idAdubo, $idCampo, $idQuinta, $data, $descricao) {
        $aduboCampo = new AduboCampo();
        $aduboCampo->setIdAduboCampo($idadubocampo);
        $aduboCampo->setIdAdubo($idAdubo);
        $aduboCampo->setIdCampo($idCampo);
        $aduboCampo->setData($data);
        $aduboCampo->setIdquinta($idQuinta);
        $aduboCampo->setDescricao($descricao);
        return $aduboCampo;
    }

    public static function convertArrayToObject(Array $data) {
        return self::createObject($data['idadubocampo'], $data['idadubo'], $data['idcampo'], $data['idquinta'], $data['data'], $data['descricao']);
    }

    public function convertObjectToArray() {
        $data = array(
            'idadubocampo' => $this->idaduboCampo,
            'idadubo' => $this->idAdubo,
            'idcampo' => $this->idCampo,
            'idquinta' => $this->idquinta,
            'data' => $this->data,
            'descricao' => $this->descricao
        );
        return $data;
    }

}