<?php

require 'cabang.php';

class Index extends cabang {
    
    protected $_modelcabang = null;
    

    protected function form(){
        include  APP_MODUL.'/cabang/view/index/index.html';

    }

    public function index(){
//        require_once UD.'header.html';
        include  APP_MODUL.'/cabang/view/cabang/dataCabang.phtml';
//        require_once UD.'footer.html';
        
    }
    
    
    
}


