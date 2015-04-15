<?php

class Lenovo extends Controller{

    protected $_request;
    protected $_view;
    protected $_response;

    public function Index(){
           $data = array(
             'Nama'=>'Leo Masta Kusuma',
               'Jenis Kelamain'=>'Laki-Laki'
           );
        pr($data);
    }
    public function test(){
        echo 'Anda berada di test';
    }
}