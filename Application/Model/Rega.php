<?php

/*
 * Modelo que representa a classe Rega.
 */

require_once __DIR__ . '/../../Config.php';

class Rega {

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
        $rega = new Rega();
        $rega->setId($id);
        $rega->setNome($nome);
        return $rega;
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