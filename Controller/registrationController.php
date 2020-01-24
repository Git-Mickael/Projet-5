<?php 
require_once 'View/view.php';
require_once 'Model/registration.php';

class RegistrationController{
    private $newMembers;
            
    public function __construct() {
        $this->newMembers = new Members();
    }
    public function identification(){
        $view = new AllView("identify");
        $view->generate(array());
    }
    public function registration(){
        $view = new AllView("registration");
        $view->generate(array('members' => $members));
    }
    public function newMembers($name, $surname, $password, $email, $phone){
        $this->newMembers->createNewMembers($name, $surname, $password, $email, $phone);
        header('location: index.php?action=homePage');
    }
}