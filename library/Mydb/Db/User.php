<?php

/**
 * MDPU Finance
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
    public function getAllUser() {
        $select = $this->select();
        $select->from($this->_name, array('*'));
        $select->where('level != ?', 'admin');
        $select->order('id_user desc');
        return $this->getAdapterSelect()->fetchAll($select);
    }

}
