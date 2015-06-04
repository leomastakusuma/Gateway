<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Index extends Controller{
    protected function form(){
        include  APP_MODUL.'/user/view/index/index.html';
    }

    public function index(){
        require_once UD.'header.html';
        $this->form();
         require_once UD.'footer.html';
        
    }
}