<?php

require 'cabang.php';

class Index extends cabang {
       
    public function index(){
        require_once UD.'headerDataTables.phtml';
        $data = $this->getAlldata();
        include  APP_MODUL.'/cabang/view/cabang/dataCabang.phtml';       
        require_once UD.'footerDataTables.phtml';
        
    }
    
    
    
}


