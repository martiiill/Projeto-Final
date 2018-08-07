<?php

/*
 * Modelo que representa a classe Utilizador.
 */

require_once __DIR__ . '/../../Config.php';

class Utilizador {

    //Variáveis
    private $id;
    private $nome;
    private $palavrapasse;

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getNome() {
        return $this->nome;
    }

    function getPalavrapasse() {
        return $this->palavrapasse;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setPalavrapasse($palavrapasse) {
        $this->palavrapasse = $palavrapasse;
    }

    public static function createObject($id, $nome, $palavrapasse) {
        $utilizador = new Utilizador();
        $utilizador->setId($id);
        $utilizador->setNome($nome);
        $utilizador->setPalavrapasse($palavrapasse);
        return $utilizador;
    }

    public static function convertArrayToObject(Array $data) {
        return self::createObject($data['id'], $data['nome'], $data['palavrapasse']);
    }

    public function convertObjectToArray() {
        $data = array(
            'id' => $this->id,
            'nome' => $this->nome,
            'palavrapasse' => $this->palavrapasse
        );
        return $data;
    }

}
