<?php

/*
 * Modelo que representa a classe Campo.
 */

require_once __DIR__ . '/../../Config.php';

class Campo {

    //Variáveis
    private $id;
    private $nome;
    private $localizacao;
    private $area;
    private $numero_linhas;
    private $orientacao;
    private $quinta_id;
    private $utilizador_id;

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getArea() {
        return $this->area;
    }

    function getNumero_linhas() {
        return $this->numero_linhas;
    }

    function getOrientacao() {
        return $this->orientacao;
    }

    function getQuinta_id() {
        return $this->quinta_id;
    }

    function setArea($area) {
        $this->area = $area;
    }

    function setNumero_linhas($numero_linhas) {
        $this->numero_linhas = $numero_linhas;
    }

    function setOrientacao($orientacao) {
        $this->orientacao = $orientacao;
    }

    function setQuinta_id($quinta_id) {
        $this->quinta_id = $quinta_id;
    }

    function getUtilizador_id() {
        return $this->utilizador_id;
    }

    function setUtilizador_id($utilizador_id) {
        $this->utilizador_id = $utilizador_id;
    }

    public static function createObject($id, $nome, $localizacao, $area, $numero_linhas, $orientacao, $quinta_id, $utilizador_id) {
        $campo = new Campo();
        $campo->setId($id);
        $campo->setNome($nome);
        $campo->setLocalizacao($localizacao);
        $campo->setArea($area);
        $campo->setNumero_linhas($numero_linhas);
        $campo->setOrientacao($orientacao);
        $campo->setQuinta_id($quinta_id);
        $campo->setUtilizador_id($utilizador_id);
        return $campo;
    }
    
    function getLocalizacao() {
        return $this->localizacao;
    }

    function setLocalizacao($localizacao) {
        $this->localizacao = $localizacao;
    }

    
    public static function convertArrayToObject(Array $data) {
        return self::createObject($data['id'], $data['nome'], $data['localizacao'], $data['area'], $data['numero_linhas'], $data['orientacao'], $data['quinta_id'], $data['utilizador_id']);
    }

    public function convertObjectToArray() {
        $data = array(
            'id' => $this->id,
            'nome' => $this->nome,
            'localizacao' => $this->localizacao,
            'area' => $this->area,
            'numero_linhas' => $this->numero_linhas,
            'orientacao' => $this->orientacao,
            'quinta_id' => $this->quinta_id,
            'utilizador_id' => $this->utilizador_id
        );
        return $data;
    }

}
