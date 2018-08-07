<?php

/*
 * Modelo que representa a classe Quinta.
 */

require_once __DIR__ . '/../../Config.php';

class Quinta {

    //Variáveis
    private $id;
    private $nome;

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

    public static function createObject($id, $nome) {
        $quinta = new Quinta();
        $quinta->setId($id);
        $quinta->setNome($nome);
        return $quinta;
    }

    public static function convertArrayToObject(Array $data) {
        return self::createObject($data['id'], $data['nome']);
    }

    public function convertObjectToArray() {
        $data = array(
            'id' => $this->id,
            'nome' => $this->nome,
        );
        return $data;
    }
}