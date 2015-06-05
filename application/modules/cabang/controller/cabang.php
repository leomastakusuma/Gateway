<?php

class cabang extends Controller {
    
    
    
    public function save(){
        $data = $this->getPost();
        try{           
            $this->getCabangModel()->insert($data);
            $this->redirect('cabang');
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
    public function getCabangModel(){
        return new Mydb_Db_Cabang();
    }
    
    public function getAlldata(){
        $data = $this->getCabangModel()->getAllCabang();
        return $data;
    }
}


