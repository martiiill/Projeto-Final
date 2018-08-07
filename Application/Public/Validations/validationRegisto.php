<?php

session_start();

require_once __DIR__ . '/../../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'UtilizadorManager.php');
require_once (Conf::getApplicationModelPath() . 'Utilizador.php');

$errosUser = array();
$manager = new UtilizadorManager();

if (filter_has_var(INPUT_POST, 'nome')) {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

    $exists = $manager->getUserByUsername($nome);

    if (strlen($nome) < 4) {
        $errosUser['nome'] = 'O username tem de ter mais de 4 caracteres.';
    }

    for ($i = 0; $i < count($exists); $i++) {
        if (isset($exists[$i])) {
            $errosUser['nome'] = 'Este username já existe!';
        }
    }
}

if (filter_has_var(INPUT_POST, 'palavrapasse')) {
    $password = filter_input(INPUT_POST, 'palavrapasse', FILTER_SANITIZE_STRING);

    if (strlen($password) < 2) {
        $errosUser['palavrapasse'] = 'A password tem de ter pelo menos 2 caracteres!';
    }
}

if (count($errosUser) == 0) {
    $user = new Utilizador();

    $id = rand(1, 50);
    $user->setId($id);
    $user->setNome($nome);
    $user->setPalavrapasse($password);

    $manager->createPerfil($user);
    echo 'Utilizador registado com sucesso';

    header("Location: ../../../index.php?login=sucesso");
} else {
    header("Location: ../registNewUser.php?login=insucesso");
}