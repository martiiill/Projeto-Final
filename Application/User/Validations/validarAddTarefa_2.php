<?php

session_start();
require_once __DIR__ . '/../../../Config.php';

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationManagerPath() . 'RegaCampoManager.php');
require_once (Conf::getApplicationModelPath() . 'RegaCampo.php');
require_once (Conf::getApplicationManagerPath() . 'PodaCampoManager.php');
require_once (Conf::getApplicationModelPath() . 'PodaCampo.php');
require_once (Conf::getApplicationManagerPath() . 'AduboCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'TratamentoCampoManager.php');
require_once (Conf::getApplicationManagerPath() . 'TratamentoManager.php');
require_once (Conf::getApplicationModelPath() . 'AduboCampo.php');
require_once (Conf::getApplicationModelPath() . 'TratamentoCampo.php');
require_once (Conf::getApplicationManagerPath() . 'CampoManager.php');

if (isset($_SESSION['login'])) {
    if (filter_has_var(INPUT_POST, 'nomeCampo')) {
        $idCampo = filter_input(INPUT_POST, 'nomeCampo', FILTER_SANITIZE_NUMBER_INT);
        $tipoTarefa = filter_input(INPUT_POST, 'tipoTarefa');
        if ($tipoTarefa === 'rega') {
            if (filter_has_var(INPUT_POST, 'tipoRega')) {
                if (filter_has_var(INPUT_POST, 'data')) {
                    if (filter_has_var(INPUT_POST, 'descricao')) {
                        $texto = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $idRega = filter_input(INPUT_POST, 'tipoRega', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                        //Se existir uma tarefa numero 2
                        if (filter_has_var(INPUT_POST, 'tipoTarefa2')) {
                            $tipoTarefa2 = filter_input(INPUT_POST, 'tipoTarefa2');
                            if ($tipoTarefa2 === 'rega2') {
                                if (filter_has_var(INPUT_POST, 'tipoRega2')) {
                                    if (filter_has_var(INPUT_POST, 'data2')) {
                                        if (filter_has_var(INPUT_POST, 'descricao2')) {
                                            $texto2 = filter_input(INPUT_POST, 'descricao2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                                            $data2 = filter_input(INPUT_POST, 'data2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                                            $idRega2 = filter_input(INPUT_POST, 'tipoRega2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                                            $manager = new RegaCampoManager();
                                            $managerCampo = new CampoManager();

                                            $campoquinta = $managerCampo->getQuintaIdByCampoId($idCampo);
                                            $c = new RegaCampo();
                                            $i = rand(1, 50);
                                            $regaCampos = $manager->getRegaCampoByIdRegaCampo($i);
                                            if (count($regaCampos) == 0) {
                                                $cc = $c->createObject($i, $idRega, $idCampo, $campoquinta, $data, $texto);
                                                $manager->addRegaCampo($cc);
                                            } else {
                                                
                                            }
                                            $manager2 = new RegaCampoManager();
                                            $c2 = new RegaCampo();
                                            
                                            $i2 = rand(1, 50);
                                            $regaCampos2 = $manager2->getRegaCampoByIdRegaCampo($i);
                                            if (count($regaCampos2) == 0) {
                                                $cc2 = $c2->createObject($i2, $idRega2, $idCampo, $campoquinta, $data2, $texto2);
                                                $manager2->addRegaCampo($cc2);
                                            } else {
                                                
                                            }
                                            header('Location: ../homePageUser.php?addTarefa=sucesso2');
                                        }
                                    }
                                }
                            } elseif ($tipoTarefa2 === 'poda2') {
                                if (filter_has_var(INPUT_POST, 'tipoPoda2')) {
                                    if (filter_has_var(INPUT_POST, 'data2')) {
                                        if (filter_has_var(INPUT_POST, 'descricao2')) {
                                            $texto2 = filter_input(INPUT_POST, 'descricao2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                                            $data2 = filter_input(INPUT_POST, 'data2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                                            $idPoda2 = filter_input(INPUT_POST, 'tipoPoda2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                                            $manager2 = new PodaCampoManager();
                                            $c2 = new PodaCampo();
                                            $i2 = rand(1, 50);
                                            $managerCampo2 = new CampoManager();
                                            $campoquinta2 = $managerCampo2->getQuintaIdByCampoId($idCampo);
                                            $cc2 = $c2->createObject($i2, $idPoda2, $idCampo, $campoquinta2, $data2, $texto2);
                                            $manager2->addPodaCampo($cc2);
                                            header('Location: ../homePageUser.php?addTarefa=sucesso2');
                                        } else {
                                            header('Location: ../homePageUser.php?addTarefa=erro2');
                                        }
                                    } else {
                                        header('Location: ../homePageUser.php?addTarefa=erro2');
                                    }
                                } else {
                                    header('Location: ../homePageUser.php?addTarefa=erro2');
                                }
                            } elseif ($tipoTarefa2 === 'adubo2') {
                                if (filter_has_var(INPUT_POST, 'tipoAdubo2')) {
                                    if (filter_has_var(INPUT_POST, 'data2')) {
                                        if (filter_has_var(INPUT_POST, 'descricao2')) {

                                            $texto2 = filter_input(INPUT_POST, 'descricao2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                                            $data2 = filter_input(INPUT_POST, 'data2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                                            $idAdubo2 = filter_input(INPUT_POST, 'tipoAdubo2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                                            $manager2 = new AduboCampoManager();
                                            $c2 = new AduboCampo();
                                            $i2 = rand(1, 150);
                                            $adubosExistentes2 = $manager2->getAduboCampoByIdAdubo($i2);
                                            $managerCampo2 = new CampoManager();
                                            $campoquinta2 = $managerCampo2->getQuintaIdByCampoId($idCampo);

                                            if (count($adubosExistentes2) == 0) { //Se nao existe um id igual ao id gerado de forma aleatoria.
                                                $cc2 = $c2->createObject($i2, $idAdubo2, $idCampo, $campoquinta2, $data2, $texto2);
                                                $manager2->addAduboCampo($cc2);
                                                header('Location: ../homePageUser.php?addTarefa=sucesso2');
                                            } else {
                                                header('Location: ../homePageUser.php?addTarefa=erroIds2');
                                            }
                                        } else {
                                            header('Location: ../homePageUser.php?addTarefa=erroDescricao2');
                                        }
                                    } else {
                                        header('Location: ../homePageUser.php?addTarefa=erroData2');
                                    }
                                } else {
                                    header('Location: ../homePageUser.php?addTarefa=erroTipoAdubo2');
                                }
                            } elseif ($tipoTarefa2 === 'trata2') {
                                $tipoTratamento2 = filter_input(INPUT_POST, 'tipoTratamento2');
                                if ($tipoTratamento2 === 'doenca2') {
                                    if (filter_has_var(INPUT_POST, 'tipoDoenca2')) {
                                        if (filter_has_var(INPUT_POST, 'data2')) {
                                            if (filter_has_var(INPUT_POST, 'descricao2')) {

                                                $texto2 = filter_input(INPUT_POST, 'descricao2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                                                $data2 = filter_input(INPUT_POST, 'data2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                                                $idTratamento2 = filter_input(INPUT_POST, 'tipoDoenca2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                                                $manager2 = new TratamentoCampoManager();
                                                $c2 = new TratamentoCampo();
                                                $i2 = rand(1, 150); //Crio um id aleatório.
                                                $tratamentosExistentes2 = $manager2->getTratamentoCampoByIdTratamentoCampo($i2);
                                                $managerCampo2 = new CampoManager();
                                                $campoquinta2 = $managerCampo2->getQuintaIdByCampoId($idCampo);

                                                if (count($tratamentosExistentes2) == 0) { //Se nao existe um id igual ao id gerado de forma aleatoria.
                                                    $cc2 = $c2->createObject($i2, $idTratamento2, $idCampo, $campoquinta2, $data2, $texto2);
                                                    $manager2->addTratamentoCampo($cc2);
                                                    header('Location: ../homePageUser.php?addTarefa=sucesso2');
                                                } else {
                                                    header('Location: ../homePageUser.php?addTarefa=erroIds2');
                                                }
                                            } else {
                                                header('Location: ../homePageUser.php?addTarefa=erroDescricao2');
                                            }
                                        } else {
                                            header('Location: ../homePageUser.php?addTarefa=erroData2');
                                        }
                                    } else {
                                        header('Location: ../homePageUser.php?addTarefa=erroTipoAdubo2');
                                    }
                                } elseif ($tipoTratamento === 'sulfatacao2') {
//completar!!!!!
                                }
                            } else {
                                header('Location: ../homePageUser.php?addTarefa=erroTipoTrata2');
                            }
                        } else {
                            $managerCampo = new CampoManager();
                            $campoquinta = $managerCampo->getQuintaIdByCampoId($idCampo);
                            $c = new RegaCampo();
                            $managerRegaCampo = new RegaCampoManager();
                            $i = rand(1, 50);
                            $regaCamposExistentes = $managerRegaCampo->getRegaCampoByIdRegaCampo($i);
                            if (count($regaCamposExistentes) == 0) { //Se nao existe um id igual ao id gerado de forma aleatoria.
                                $cc = $c->createObject($i, $idRega, $idCampo, $campoquinta, $data, $texto);
                                $manager = new RegaCampoManager();
                                $manager->addRegaCampo($cc);
                                header('Location: ../homePageUser.php?addTarefa=sucesso');
                            } else {
                                header('Location: ../homePageUser.php?addTarefa=erro');
                            }
                        }
                    } else {
                        header('Location: ../homePageUser.php?addTarefa=erro');
                    }
                } else {
                    header('Location: ../homePageUser.php?addTarefa=erro');
                }
            } else {
                header('Location: ../homePageUser.php?addTarefa=erro');
            }
        } elseif ($tipoTarefa === 'poda') {
            if (filter_has_var(INPUT_POST, 'tipoPoda')) {
                if (filter_has_var(INPUT_POST, 'data')) {
                    if (filter_has_var(INPUT_POST, 'descricao')) {
                        $texto = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $idPoda = filter_input(INPUT_POST, 'tipoPoda', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                        $manager = new PodaCampoManager();
                        $c = new PodaCampo();
                        $i = rand(1, 50);
                        $managerCampo = new CampoManager();
                        $campoquinta = $managerCampo->getQuintaIdByCampoId($idCampo);
                        $cc = $c->createObject($i, $idPoda, $idCampo, $campoquinta, $data, $texto);
                        $manager->addPodaCampo($cc);
                        header('Location: ../homePageUser.php?addTarefa=sucesso');
                    } else {
                        header('Location: ../homePageUser.php?addTarefa=erro');
                    }
                } else {
                    header('Location: ../homePageUser.php?addTarefa=erro');
                }
            } else {
                header('Location: ../homePageUser.php?addTarefa=erro');
            }
        } elseif ($tipoTarefa === 'adubo') { // O utilizador quer fazer a adubacao
            if (filter_has_var(INPUT_POST, 'tipoAdubo')) {
                if (filter_has_var(INPUT_POST, 'data')) {
                    if (filter_has_var(INPUT_POST, 'descricao')) {

                        $texto = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $idAdubo = filter_input(INPUT_POST, 'tipoAdubo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                        $manager = new AduboCampoManager();
                        $c = new AduboCampo();
                        $i = rand(1, 150);
                        $adubosExistentes = $manager->getAduboCampoByIdAdubo($i);
                        $managerCampo = new CampoManager();
                        $campoquinta = $managerCampo->getQuintaIdByCampoId($idCampo);

                        if (count($adubosExistentes) == 0) { //Se nao existe um id igual ao id gerado de forma aleatoria.
                            $cc = $c->createObject($i, $idAdubo, $idCampo, $campoquinta, $data, $texto);
                            $manager->addAduboCampo($cc);
                            header('Location: ../homePageUser.php?addTarefa=sucesso');
                        } else {
                            header('Location: ../homePageUser.php?addTarefa=erroIds');
                        }
                    } else {
                        header('Location: ../homePageUser.php?addTarefa=erroDescricao');
                    }
                } else {
                    header('Location: ../homePageUser.php?addTarefa=erroData');
                }
            } else {
                header('Location: ../homePageUser.php?addTarefa=erroTipoAdubo');
            }
        } elseif ($tipoTarefa === 'trata') {
            $tipoTratamento = filter_input(INPUT_POST, 'tipoTratamento');
            if ($tipoTratamento === 'doenca') {
                if (filter_has_var(INPUT_POST, 'tipoDoenca')) { //Se tiver selecionado um adubo da lista.
                    if (filter_has_var(INPUT_POST, 'data')) { //Se tiver introduzido a data.
                        if (filter_has_var(INPUT_POST, 'descricao')) { //Se tiver introduzido a descricao.
                            $texto = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                            $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                            $idTratamento = filter_input(INPUT_POST, 'tipoDoenca', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                            $manager = new TratamentoCampoManager();
                            $c = new TratamentoCampo();
                            $i = rand(1, 150); //Crio um id aleatório.
                            $tratamentosExistentes = $manager->getTratamentoCampoByIdTratamentoCampo($i);
                            $managerCampo = new CampoManager();
                            $campoquinta = $managerCampo->getQuintaIdByCampoId($idCampo);

                            if (count($tratamentosExistentes) == 0) { //Se nao existe um id igual ao id gerado de forma aleatoria.
                                $cc = $c->createObject($i, $idTratamento, $idCampo, $campoquinta, $data, $texto);
                                $manager->addTratamentoCampo($cc);
                                header('Location: ../homePageUser.php?addTarefa=sucesso');
                            } else {
                                header('Location: ../homePageUser.php?addTarefa=erroIds');
                            }
                        } else {
                            header('Location: ../homePageUser.php?addTarefa=erroDescricao');
                        }
                    } else {
                        header('Location: ../homePageUser.php?addTarefa=erroData');
                    }
                } else {
                    header('Location: ../homePageUser.php?addTarefa=erroTipoAdubo');
                }
            } elseif ($tipoTratamento === 'sulfatacao') {
//completar!!!!!
            } else {
                header('Location: ../homePageUser.php?addTarefa=erroTipoTrata');
            }
        } elseif ($tipoTarefa === 'Vindima') { //O utlizador quer fazer a vindima.
            if (filter_has_var(INPUT_POST, 'data')) {
                if (filter_has_var(INPUT_POST, 'descricao')) {

                    $texto = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                    $manager = new TratamentoCampoManager();
                    $c = new TratamentoCampo();
                    $managerTrata = new TratamentoManager();
                    $idVindima = $managerTrata->getTratamentoByNome("Vindima");

                    $i = rand(1, 250); //Crio um id aleatório.
                    $managerCampo = new CampoManager();
                    $campoquinta = $managerCampo->getQuintaIdByCampoId($idCampo);

                    $tratamentosExistentes = $manager->getTratamentoCampoByIdTratamentoCampo($i);

                    if (count($tratamentosExistentes) == 0) { //Se nao existe um id igual ao id gerado de forma aleatoria.
                        $cc = $c->createObject($i, $idVindima[0]['id'], $idCampo, $campoquinta, $data, $texto);
                        $manager->addTratamentoCampo($cc);
                        header('Location: ../homePageUser.php?addTarefa=sucesso');
                    } else {
                        header('Location: ../homePageUser.php?addTarefa=erroIds');
                    }
                } else {
                    header('Location: ../homePageUser.php?addTarefa=erroDescricao');
                }
            } else {
                header('Location: ../homePageUser.php?addTarefa=erroData');
            }
        }
    } else {
        header('Location: ../homePageUser.php?addTarefa=erroCampo');
    }
} else {
    header("Location: ../../../index.php");
}