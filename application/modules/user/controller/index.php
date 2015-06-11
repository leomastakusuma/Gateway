<?php

/**
 * MDPU Finance
 * @category   Modules
 * @package    User
 * @subpackage Controller
 * @filesource Index.php
 */
class Index extends Controller {

    public function index() {
        require_once UD . 'headerDataTables.phtml';
        $data = $this->getModelUser()->getAllUser();
        include APP_MODUL . '/user/view/index/dataUser.phtml';
        require_once UD . 'footerDataTables.phtml';       
    }

    public function getModelUser() {
        return new Mydb_Db_User();
    }

}
