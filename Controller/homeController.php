<?php 
require_once 'View/view.php';
require_once 'Model/registration.php';

class HomeController{
    private $newMembers;
    
    public function __construct() {
        $this->newMembers = new Members();
    }
    public function home(){
        $view = new AllView("home");
        $view->generate(array());
    }
        public function verifyMember($email, $password){
        $member = $this->newMembers->getMembers($email, $password);
        $isMember = password_verify($password, $member["password"]);
        header('Location: index.php?action=homePage');
    }
}