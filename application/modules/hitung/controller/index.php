<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Index extends Controller{
    public function index(){
        require_once APP_MODUL.'/hitung/controller/aritmatika.php';
        $penjumlahan = new aritmatika();
        $penjumlahan->index();
    }

}