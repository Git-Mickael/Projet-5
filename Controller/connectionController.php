<?php 
require_once 'View/view.php';

class ConnectController{
    
    public function __construct() {
        
    }
    public function identification(){
        $view = new AllView("identify");
        $view->generate(array());
    }
}