<?php
/**
 * Garuda Indonesia
 * 
 * 
 * @category   Mydb
 * @package    Mydb_Db
 * @subpackage Mydb_Db_User
 */


class Mydb_Db_User extends Mydb_Db_Abstract {
    protected $_name = 'user';
    protected $_primary = 'id_user';

    /**
     * @param type $name Description
     */
    public function test(){
        $data = $this->select();
        $data->from($this->_name,array('*'));
        return $this->getAdapterSelect()->fetchAll($data);
    }
}