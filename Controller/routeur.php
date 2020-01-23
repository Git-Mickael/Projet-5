<?php 
    require_once 'Controller/homeController.php';
    require_once 'Controller/connectionController.php';
    require_once 'Controller/calendarController.php';
    require_once 'Controller/registrationController.php';

class Routeur{
    private $ctrlHome;
    private $ctrlConnect;
    private $ctrlCalendar;
    private $ctrlRegistration;
            
    public function __construct() {
        $this->ctrlHome = new HomeController();
        $this->ctrlConnect = new ConnectController();
        $this->ctrlCalendar = new CalendarController();
        $this->ctrlRegistration = new RegistrationController();
    }
    
    public function routerRequest() {
        
        try {
            if (isset($_GET['action'])){
                if ($_GET['action'] == 'homePage'){
                    $this->ctrlHome->home();
                }
                else if ($_GET['action'] == 'calendar'){
                    $this->ctrlCalendar->reservation();
                }
                else if ($_GET['action'] == 'create'){
                    $this->ctrlRegistration->registration();
                }
                else
                    throw new Exception("Action non valide");
            }
            else{
                $this->ctrlConnect->identification();
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
}