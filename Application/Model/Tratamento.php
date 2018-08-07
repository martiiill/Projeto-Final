<?php

/*
 * Modelo que define a classe Tratamento.
 */

require_once __DIR__ . '/../../Config.php';

class Tratamento {

    //Variáveis
    private $id;
    private $nome;
    private $funcao;
    private $dimensao;

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
    
    function getFuncao() {
        return $this->funcao;
    }

    function getDimensao() {
        return $this->dimensao;
    }

    function setFuncao($funcao) {
        $this->funcao = $funcao;
    }

    function setDimensao($dimensao) {
        $this->dimensao = $dimensao;
    }

    
    public static function createObject($id, $nome, $funcao, $dimensao) {
        $tratamento = new Rega();
        $tratamento->setId($id);
        $tratamento->setNome($nome);
        $tratamento->setFuncao($funcao);
        $tratamento->setDimensao($dimensao);
        return $tratamento;
    }

    public static function convertArrayToObject(Array $data) {
        return self::createObject($data['id'], $data['nome'], $data['funcao'], $data['dimensao']);
    }

    public function convertObjectToArray() {
        $data = array(
            'id' => $this->id,
            'nome' => $this->nome,
            'funcao' => $this->funcao,
            'dimensao' => $this->dimensao
        );
        return $data;
    }
}