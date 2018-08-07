<?php

/*
 * Modelo que representa a classe Doenca.
 */

require_once __DIR__ . '/../../Config.php';

class Doenca {

    //Variáveis
    private $id;
    private $nome;
    private $caracteristicas;

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
    
    function getCaracteristicas() {
        return $this->caracteristicas;
    }

    function setCaracteristicas($caracteristicas) {
        $this->caracteristicas = $caracteristicas;
    }

    
    public static function createObject($id, $nome, $caracteristicas) {
        $doenca = new Rega();
        $doenca->setId($id);
        $doenca->setNome($nome);
        $doenca->setCaracteristicas($caracteristicas);
        return $doenca;
    }

    public static function convertArrayToObject(Array $data) {
        return self::createObject($data['id'], $data['nome'], $data['caracteristicas']);
    }

    public function convertObjectToArray() {
        $data = array(
            'id' => $this->id,
            'nome' => $this->nome,
            'caracteristicas' => $this->caracteristicas,
        );
        return $data;
    }
}