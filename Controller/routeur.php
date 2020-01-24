<?php 
    require_once 'Controller/homeController.php';
    require_once 'Controller/calendarController.php';
    require_once 'Controller/registrationController.php';

class Routeur{
    private $ctrlHome;
    private $ctrlCalendar;
    private $ctrlRegistration;
            
    public function __construct() {
        $this->ctrlHome = new HomeController();
        $this->ctrlCalendar = new CalendarController();
        $this->ctrlRegistration = new RegistrationController();
    }
    
    public function routerRequest() {
        
        try {
            if (isset($_GET['action'])){
                if ($_GET['action'] == 'homePage'){
                    $this->ctrlHome->home();
                }
                else if ($_GET['action'] == 'verifyMember'){
                    $mail = $this->getParameter($_POST, 'verifyName');
                    $verifyPassword = $this->getParameter($_POST, 'verifyPassword');
                    $this->ctrlHome->verifyMember($mail, $verifyPassword);
                }
                else if ($_GET['action'] == 'calendar'){
                    $this->ctrlCalendar->reservation();
                }
                else if ($_GET['action'] == 'create'){
                    $this->ctrlRegistration->registration();
                }
                else if ($_GET['action'] == 'newMember'){
                    $name = $this->getParameter($_POST, 'name');
                    $surname = $this->getParameter($_POST, 'surname');
                    $password = $this->getParameter($_POST, 'newPassword');
                    $phone = $this->getParameter($_POST, 'phone');
                    $email = $this->getParameter($_POST, 'email');
                    $this->ctrlRegistration->newMembers($name, $surname, $password, $email, $phone);
                }
                else
                    throw new Exception("Action non valide");
            }
            else{
                $this->ctrlRegistration->identification();
            }
                 
        } 
        catch (Exception $e) {
            $this->error($e->getMessage());
        }   
    }
    private function error($msgError){
        $view = new AllView("Error");
        $view->generate(array('msgError' => $msgError));
    }
    private function getParameter($table, $name) {
        if (isset($table[$name])){
            return $table[$name];
        }
        else
            throw new Exception ("Paramètre '$name' absent.");
    }
}