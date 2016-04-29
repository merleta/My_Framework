<?php

namespace app\controllers;

use \lib\antoine\Controller;

use app\models\UserTable;

class IndexController extends Controller {

    /**
     * Display users infos
     *
     * @return void
     */
    public function indexAction() {
       /* $this->render('IndexController:ViewFilename', array("foo" => "bar", "baz" => 42));*/
        $userTable = new UserTable();
        $user = $userTable->findOne('login = ?', array('merlet_a'));
        $this->render('Index:index', $user);
    }
}

?>