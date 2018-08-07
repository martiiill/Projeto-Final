<?php

/**
 * Ficheiro de configuração.
 */
class Config {

    const IMAGES_FOLDER = '/Images/';
    const SGBD_HOST_NAME = 'localhost';
    const SGBD_DATABASE_NAME = 'vitial';
    const SGBD_USERNAME = 'root';
    const SGBD_PASSWORD = '';

    public static function getImagesPathBase() {
        return realpath(dirname(__FILE__)) . IMAGES_FOLDER;
    }

    public static function getApplicationPath() {
        return realpath(dirname(__FILE__)) . '/Application/';
    }

    public static function getApplicationDatabasePath() {
        return self::getApplicationPath() . '/Database/';
    }

    public static function getApplicationManagerPath() {
        return self::getApplicationPath() . '/Manager/';
    }

    public static function getApplicationModelPath() {
        return self::getApplicationPath() . '/Model/';
    }

    public static function getApplicationUtilsPath() {
        return self::getApplicationPath() . '/Utils/';
    }
}