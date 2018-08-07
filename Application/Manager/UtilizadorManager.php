<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once __DIR__ . '/../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'Utilizador.php');

class UtilizadorManager extends MyDataAccessPDO {

    const SQL_TABLE_NAME = 'utilizador';

    public function getUsers() {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function checkUserExistenceByNomeePassword($user, $pass) {
        try {
            $user_Name = $this->getConnection()->quote($user);
            $user_Pass = $this->getConnection()->quote($pass);
            $results = $this->getRecordsByUserQuery('SELECT nome,palavrapasse FROM utilizador WHERE EXISTS (SELECT nome,palavrapasse FROM utilizador WHERE nome=' . $user_Name . 'AND palavrapasse=' . $user_Pass . ')');
            foreach ($results as $res) {
                return $res;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function checkUserByNome($user) {
        try {
            $user_Name = $this->getConnection()->quote($user);
            $result = $this->getRecordsByUserQuery('SELECT nome FROM utilizador WHERE EXISTS (SELECT nome FROM utilizador WHERE nome=' . $user_Name . ')');
        } catch (Exception $e) {
            throw $e;
        }
        foreach ($result as $res) {
            return $res;
        }
    }

    public function checkUserByUser(Utilizador $u) {
        try {
            $results = $this->getRecords(self::SQL_TABLE_NAME, array('nome' => $u->getNome(), 'palavrapasse' => $u->getPalavrapasse()));
        } catch (Exception $e) {
            throw $e;
        }
        if (count($results) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getPalavrapasseByUtilizador($username, $pass) {
        try {
            $result = $this->getRecords(self::SQL_TABLE_NAME, array('nome' => $username, 'palavrapasse' => $pass));
            foreach ($result as $res) {
                return $res;
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function getUserByUsername($username) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('nome' => $username));
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function getUserById($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('id' => $id));
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function createPerfil(Utilizador $obj) {
        try {
            $this->insert(self::SQL_TABLE_NAME, $obj->convertObjectToArray());
        } catch (Exception $e) {
            throw $e;
        }
    }
}