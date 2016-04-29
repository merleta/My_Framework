<?php

namespace lib;

use pdo;
use Exception;

abstract class Model{
    protected static $_bdd;


    /**
     * DB connect
     *
     * @return void
     */
    public function __construct() {
        try {
            self::$_bdd = new PDO('mysql:host='._DB_HOST_.';dbname='._DB_NAME_, _DB_USER_, _DB_PASSWORD_);
            self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}

?>