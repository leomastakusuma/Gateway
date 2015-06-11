<?php

/**
 * MDPU Finance
 * @category   Modules
 * @package    User
 * @subpackage Controller
 * @filesource user.php
 */

class user extends Controller{

    protected $_modelUser;
    protected $_modelCabang;


    public function __construct() {
        $this->_modelUser = Mydb::getModelUser();
        $this->_modelCabang = Mydb::getModelCabang();
    }

    public function index(){
        require_once UD.'header.html';
        $data = $this->_modelCabang->getAllCabang();
        include  APP_MODUL.'/user/form/form-user.html';
        require_once UD.'footer.html';
        
    }
    public function save(){
        $form = $this->getPost();
        $this->_modelUser->insert($form);
    }
}
