<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class aritmatika extends Controller{
    
    
    protected function form(){
        include  APP_MODUL.'/hitung/view/aritmatika/penjumlahan.phtml';
    }

    public function index(){
        $data = array('user'=>'testZend',
                      'pass'=>'test',
                      'level'=>'mbuh'
            );
        Mydb::getModelUser()->test();
    }
                
    
    public function proses(){
       $form = $this->getPost();
       $metode = $form['metode'];
       if(!empty($metode)){
           if(is_numeric($form['bilangan1']) && is_numeric($form['bilangan2'])){
                if($metode==='Penjumlahan'){
                    $hasil = $form['bilangan1'] + $form['bilangan2'];
                    include APP_MODUL.'/hitung/view/aritmatika/penjumlahan.phtml';
                }elseif ($metode==='Perkalian'){
                    $hasil = $form['bilangan1'] * $form['bilangan2'];
                    include APP_MODUL.'/hitung/view/aritmatika/penjumlahan.phtml';
                }elseif ($metode==='Pembagian') {
                    $hasil = $form['bilangan1'] / $form['bilangan2'];
                    include APP_MODUL.'/hitung/view/aritmatika/penjumlahan.phtml';
                }
           }else {
               $alert = 'Bilangan Ke 1, Atau Ke 2 Harus Angka,dan boleh kosong :D';
               include APP_MODUL.'/hitung/view/aritmatika/penjumlahan.phtml';
           }
           
       }
    }
    

}