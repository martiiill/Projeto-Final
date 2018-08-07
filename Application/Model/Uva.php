<?php

/*
 * Modelo que define a classe Uva.
 */

require_once __DIR__ . '/../../Config.php';

class Uva {

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
        $uva = new Uva();
        $uva->setId($id);
        $uva->setNome($nome);
        return $uva;
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