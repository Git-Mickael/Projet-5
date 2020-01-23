<?php 
require_once 'View/view.php';

class HomeController{
    
    public function __construct() {
        
    }
    public function home(){

        $view = new AllView("home");
        $view->generate(array());
    }
}