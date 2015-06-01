<?php

/**
 * This is the "base controller class". All other "real" controllers extend this class.
 */

class Controller 
{
    /**
     * @var null Database Connection
     * @value 'aaa';
     */
    
    public $db = null;
    public $array  ;

    protected $_request = null;

    /**
     * Whenever a controller is created, open a database connection too. The idea behind is to have ONE connection
     * that can be used by multiple models (there are frameworks that open one connection per model).
     */
    public function __construct()
    {
        $this->openDatabaseConnection();
    }

    /**
     * Open the database connection with the credentials from application/config/config.php
     */
    private function openDatabaseConnection()
    {
        // set the (optional) options of the PDO connection. in this case, we set the fetch mode to
        // "objects", which means all results will be objects, like this: $result->user_name !
        // For example, fetch mode FETCH_ASSOC would return results like this: $result["user_name] !
        // @see http://www.php.net/manual/en/pdostatement.fetch.php
        global $Config;


        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        // generate a database connection, using the PDO connector
        // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
         $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $options);

        //$this->db  = new PDO ($Config->databes);

//        print_r($a);die;
    }

    /**
     * Load the model with the given name.
     * loadModel("SongModel") would include models/songmodel.php and create the object in the controller, like this:
     * $songs_model = $this->loadModel('SongsModel');
     * Note that the model class name is written in "CamelCase", the model's filename is the same in lowercase letters
     * @param string $model_name The name of the model
     * @return object model
     */
    public function loadModel($model_name)
    {   
        require 'application/models/' . strtolower($model_name) . '.php';
        // return new model (and pass the database connection to the model)
        return new $model_name($this->db);
    }  
    
     /**
      * 
      * @param type $modul 
      * @param type $model_name
      * @return \model_name
      */
     public function loadModels($modul,$model_name)
    {   
        require 'application/modules/' . $modul .'/models/'. strtolower($model_name) . '.php';
        // return new model (and pass the database connection to the model)
        return new $model_name($this->db);
    }  
    
    public function redirect($value){
//        $url  = 'http://' . $_SERVER['HTTP_HOST'];            // Get the server
//        $url .= rtrim(dirname($_SERVER['PHP_SELF']), '/\\'); // Get the current directory
//        $url .= '/';
//        $url .= $value;            // <-- Your relative path
        header('Location: ' .URL.$value, true, 302);        
    }
    
    public function view($controller,$action,$data){
        if(!empty($data)){
        $this->array = $data;}
//        $titlee  = '<title>$title</title>';
        require 'application/views/'.$controller.'/'.$action.'.html';
//        $this->load->view =$data;
        
    }
    

    
    protected function getRequest(){
        $param = $_GET['url'];
        $param = explode('/', $param);
        
        if(is_dir(APP_MODUL.DS.$param[0])){          
            $params['modules']= (!empty($param[0]) ? $param[0]:'index');
            $params['controller'] = (!empty($param[1]) ? $param[1] : 'index');
            $params['action'] = (!empty($param[2]) ? $param[2] : 'index');       
            foreach ($param as $idx=>$value){ 
                if($idx > 2){
                   $params['params'][]=$value;  
                }        
            }    
        }

        return $params;
    }
    
    protected function getPost(){
        $post = $_POST;
        return $post;
    }
    
    /**
     * 
     * @param type $params
     * @return type Array
     */
    protected function pr($params){
        echo '<pre>';
        print_r($params);
        echo '</pre>';
        return $params;
    }
    
    protected function json_Format($param = array()){
        $param = json_encode($param);
        return $param;
    }
        
    
    protected function title($title=null){
        if(!empty($title)){
            echo '<title>'.$title.'</title>';
        }else{
            echo '<title>Framework V-01</title>';
        }
    }

}
