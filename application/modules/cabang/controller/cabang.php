<?php

class cabang extends Controller {

    protected function form() {
        include APP_MODUL . '/cabang/view/index/index.html';
    }

    public function index() {
        require_once UD . 'header.html';
        $this->form();
        require_once UD . 'footer.html';
    }

    public function save() {
        $data = $this->getPost();
        try {
            $this->getCabangModel()->insert($data);
            $this->redirect('cabang');
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function edit($id) {
        if (!is_numeric($id)) {
            $this->redirect();
        }
        require_once UD . 'header.html';
        $where = $this->getCabangModel()->getAdapter()->quoteInto('id_cabang =?', $id);
        $dataCabang = $this->getCabangModel()->fetchRow($where)->toArray();
        include APP_MODUL . '/cabang/view/cabang/edit.phtml';
        require_once UD . 'footer.html';
    }

    public function update() {
        $data = $this->getPost();
        if (!is_numeric($data['id_cabang'])) {
            $this->redirect();
        }

        try {
            $where = $this->getCabangModel()->getAdapter()->quoteInto('id_cabang = ?', $data['id_cabang']);
            unset($data['id_cabang']);
            $this->getCabangModel()->update($data, $where);
            $this->redirect('cabang');
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function delete($id) {
        if (!is_numeric($id)) {
            $this->redirect();
        }
        $where = $this->getCabangModel()->getAdapter()->quoteInto('id_cabang =?', $id);
        $this->getCabangModel()->delete($where);
        $this->redirect('cabang');
    }

    public function getCabangModel() {
        return new Mydb_Db_Cabang();
    }

    public function getAlldata() {
        $data = $this->getCabangModel()->getAllCabang();
        return $data;
    }

}
