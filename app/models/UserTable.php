<?php

namespace app\models;

use lib\Model;

use PDO;

class UserTable extends Model {

    /**
     * Search infos in DB
     *
     * @param string 	$where 		the condition
     * @param array 	$array
     *
     * @return result $findQuery
     */
    public function findOne($where, $array) {
        $findQuery = self::$_bdd->prepare('SELECT * FROM user WHERE '.$where);
        foreach ($array as $key => $value){
            $findQuery->bindValue($key + 1, $value);
        }
        $exec = $findQuery->execute();
        return $findQuery->fetch();
    }
}

?>