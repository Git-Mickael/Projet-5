<?php 
require_once 'View/view.php';
require_once 'Model/registration.php';
require_once 'Model/admin.php';

class HomeController{
    private $newMembers;
    private $newAdmin;
    
    public function __construct() {
        $this->newMembers = new Members();
        $this->newAdmin = new Admin();
    }
    public function home(){
        $view = new AllView("home");
        $view->generate(array());
    }
    public function verifyMember($email, $password){
        $member = $this->newMembers->getMembers($email, $password);
        $isMember = password_verify($password, $member["password"]);
        if ($member) {
            $_SESSION['password'] = $member['password'];
            $_SESSION['email'] = $member['email'];
            header('Location: index.php?action=homePage');
        }        
    }
    public function disconnection(){
        $_SESSION = array();
        session_destroy();
        header('Location: index.php');
    }
}