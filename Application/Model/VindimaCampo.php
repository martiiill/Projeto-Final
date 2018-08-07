<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once __DIR__ . '/../../Config.php';

class VindimaCampo {

    //Variáveis
    private $id;
    private $idCampo;
    private $idquinta;
    private $quantidade;
    private $data;
    private $descricao;

    function getId() {
        return $this->id;
    }

    function getIdCampo() {
        return $this->idCampo;
    }

    function getIdquinta() {
        return $this->idquinta;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function getData() {
        return $this->data;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdCampo($idCampo) {
        $this->idCampo = $idCampo;
    }

    function setIdquinta($idquinta) {
        $this->idquinta = $idquinta;
    }

    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public static function createObject($id, $idCampo, $idQuinta, $quantidade, $data, $descricao) {
        $vindimacampo = new VindimaCampo();
        $vindimacampo->setId($id);
        $vindimacampo->setIdCampo($idCampo);
        $vindimacampo->setIdquinta($idQuinta);
        $vindimacampo->setQuantidade($quantidade);
        $vindimacampo->setData($data);
        $vindimacampo->setIdquinta($idQuinta);
        $vindimacampo->setDescricao($descricao);
        return $vindimacampo;
    }

    public static function convertArrayToObject(Array $data) {
        return self::createObject($data['id'], $data['idcampo'], $data['idquinta'], $data['quantidade'], $data['data'], $data['descricao']);
    }

    public function convertObjectToArray() {
        $data = array(
            'id' => $this->id,
            'idcampo' => $this->idCampo,
            'idquinta' => $this->idquinta,
            'quantidade' => $this->quantidade,
            'data' => $this->data,
            'descricao' => $this->descricao
        );
        return $data;
    }
}
