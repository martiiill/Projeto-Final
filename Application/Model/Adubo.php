<?php

/*
 * Modelo que representa a classe Adubo.
 */

require_once __DIR__ . '/../../Config.php';

class Adubo{

    //Variáveis
    private $id;
    private $nome;
    private $composicao;
    private $peso;

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

    function getComposicao() {
        return $this->composicao;
    }

    function getPeso() {
        return $this->peso;
    }

    function setComposicao($composicao) {
        $this->composicao = $composicao;
    }

    function setPeso($peso) {
        $this->peso = $peso;
    }

    public static function createObject($id, $nome, $composicao, $peso) {
        $adubo = new Rega();
        $adubo->setId($id);
        $adubo->setNome($nome);
        $adubo->setComposicao($composicao);
        $adubo->setPeso($peso);
        return $adubo;
    }

    public static function convertArrayToObject(Array $data) {
        return self::createObject($data['id'], $data['nome'], $data['composicao'], $data['peso']);
    }

    public function convertObjectToArray() {
        $data = array(
            'id' => $this->id,
            'nome' => $this->nome,
            'composicao' => $this->composicao,
            'peso' => $this->peso
        );
        return $data;
    }
}