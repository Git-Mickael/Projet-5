<?php 
require_once 'View/view.php';

class RegistrationController{
    
    public function __construct() {
        
    }
    public function registration(){
        $view = new AllView("registration");
        $view->generate(array());
    }
}