<?php

session_start();
require_once __DIR__ . '/../../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'RegaCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'PodaCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'AduboCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'TratamentoCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'VindimaCampoManager.php');

if (isset($_SESSION['login'])) {
    if (filter_has_var(INPUT_POST, 'adubocampoid')) {
        $tipoTarefa = filter_input(INPUT_POST, 'adubocampoid');
        if (filter_has_var(INPUT_POST, 'idAdubo_tarefa')) {
            if (filter_has_var(INPUT_POST, 'data')) {
                if (filter_has_var(INPUT_POST, 'descricao')) {
                    $texto = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $idAdubo = filter_input(INPUT_POST, 'idAdubo_tarefa', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                    $manager = new AduboCampoManager();
                    $manager->editarAduboCampo($tipoTarefa, $idAdubo, $data, $texto);
                    header('Location: ../homePageUser.php?editTarefa=sucesso');
                } else {
                    header('Location: ../homePageUser.php?editTarefa=erro');
                }
            } else {
                header('Location: ../homePageUser.php?editTarefa=erro');
            }
        } else {
            header('Location: ../homePageUser.php?editTarefa=erro');
        }
    } elseif (filter_has_var(INPUT_POST, 'podacampoid')) {
        $tipoTarefa = filter_input(INPUT_POST, 'podacampoid');
        if (filter_has_var(INPUT_POST, 'idPoda_tarefa')) {
            if (filter_has_var(INPUT_POST, 'data')) {
                if (filter_has_var(INPUT_POST, 'descricao')) {
                    $texto = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $idPoda = filter_input(INPUT_POST, 'idPoda_tarefa', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                    $manager = new PodaCampoManager();
                    $manager->editarPodaCampo($tipoTarefa, $idPoda, $data, $texto);
                    header('Location: ../homePageUser.php?editTarefa=sucesso');
                } else {
                    header('Location: ../homePageUser.php?editTarefa=erro');
                }
            } else {
                header('Location: ../homePageUser.php?editTarefa=erro');
            }
        } else {
            header('Location: ../homePageUser.php?editTarefa=erro');
        }
    } elseif (filter_has_var(INPUT_POST, 'regacampoid')) {
        $tipoTarefa = filter_input(INPUT_POST, 'regacampoid');
        if (filter_has_var(INPUT_POST, 'idRega_tarefa')) {
            if (filter_has_var(INPUT_POST, 'data')) {
                if (filter_has_var(INPUT_POST, 'descricao')) {
                    $texto = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $idRega = filter_input(INPUT_POST, 'idRega_tarefa', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                    $manager = new RegaCampoManager();
                    $manager->editarRegaCampo($tipoTarefa, $idRega, $data, $texto);
                    header('Location: ../homePageUser.php?editTarefa=sucesso');
                } else {
                    header('Location: ../homePageUser.php?editTarefa=erro');
                }
            } else {
                header('Location: ../homePageUser.php?editTarefa=erro');
            }
        } else {
            header('Location: ../homePageUser.php?editTarefa=erro');
        }
    } elseif (filter_has_var(INPUT_POST, 'tratacampoid')) {
        $tipoTarefa = filter_input(INPUT_POST, 'tratacampoid');
        if (filter_has_var(INPUT_POST, 'idTrata_tarefa')) {
            if (filter_has_var(INPUT_POST, 'data')) {
                if (filter_has_var(INPUT_POST, 'descricao')) {
                    $texto = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $idTrata = filter_input(INPUT_POST, 'idTrata_tarefa', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                    $manager = new TratamentoCampoManager();
                    $manager->editarTratamentoCampo($tipoTarefa, $idTrata, $data, $texto);
                    header('Location: ../homePageUser.php?editTarefa=sucesso');
                } else {
                    header('Location: ../homePageUser.php?editTarefa=erro');
                }
            } else {
                header('Location: ../homePageUser.php?editTarefa=erro');
            }
        } else {
            header('Location: ../homePageUser.php?editTarefa=erro');
        }
    
    } elseif (filter_has_var(INPUT_POST, 'vindimacampoid')) {
        $tipoTarefa = filter_input(INPUT_POST, 'vindimacampoid');
        if (filter_has_var(INPUT_POST, 'id_campo_tarefa')) {
            if (filter_has_var(INPUT_POST, 'data')) {
                if (filter_has_var(INPUT_POST, 'descricao')) {
                    if (filter_has_var(INPUT_POST, 'quantidade')) {
                        $texto = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_FLOAT);
                        $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $idcampo = filter_input(INPUT_POST, 'id_campo_tarefa', FILTER_SANITIZE_NUMBER_INT);
                        $id = filter_input(INPUT_POST, 'vindimacampoid', FILTER_SANITIZE_NUMBER_INT);

                        $manager = new VindimaCampoManager();
                        $manager->editarAduboCampo($quantidade, $data, $texto, $idcampo, $id);
                        header('Location: ../homePageUser.php?editTarefa=sucesso');
                    }
                } else {
                    header('Location: ../homePageUser.php?editTarefa=erro');
                }
            } else {
                header('Location: ../homePageUser.php?editTarefa=erro');
            }
        } else {
            header('Location: ../homePageUser.php?editTarefa=erro');
        }
    }
} else {
    header("Location: ../../../index.php");
}    