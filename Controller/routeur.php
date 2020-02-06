<?php 
    require_once 'Controller/homeController.php';
    require_once 'Controller/calendarController.php';
    require_once 'Controller/registrationController.php';
    require_once 'Controller/adminController.php';

class Routeur{
    private $ctrlHome;
    private $ctrlCalendar;
    private $ctrlRegistration;
    private $ctrlAdmin;
            
    public function __construct() {
        $this->ctrlHome = new HomeController();
        $this->ctrlCalendar = new CalendarController();
        $this->ctrlRegistration = new RegistrationController();
        $this->ctrlAdmin = new AdminController();
    }
    
    public function routerRequest() {
        
        try {
            if (isset($_GET['action'])){
                if ($_GET['action'] == 'homePage'){
                    $this->ctrlHome->home();
                }
                else if ($_GET['action'] == 'connection'){
                    $this->ctrlRegistration->identification();
                }
                else if ($_GET['action'] == 'admin'){
                    $this->ctrlAdmin->adminConnect();
                }
                else if ($_GET['action'] == 'adminPage'){
                    $this->ctrlAdmin->admin();
                }
                else if ($_GET['action'] == 'post'){
                    $adminName = $this->getParameter($_POST, 'verifyAdminName');
                    $adminPassword = $this->getParameter($_POST, 'verifyAdminPassword');
                    $this->ctrlAdmin->verifyAdmin($adminName, $adminPassword);
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
                else if ($_GET['action'] == 'disconnection'){
                    $this->ctrlHome->disconnection();
                }
                else if ($_GET['action'] == 'adminDisconnection'){
                    $this->ctrlAdmin->adminDisconnection();
                }
                else if ($_GET['action'] == 'createArticle'){
                    $service = $this->getParameter($_POST, 'Description');
                    $this->ctrlAdmin->createArticles($service);
                }
                else if ($_GET['action'] == 'createPage'){
                    $this->ctrlAdmin->adminCreation();
                }
                else if ($_GET['action'] == 'modifyPage'){
                    $this->ctrlAdmin->articlesList();
                }
                else if ($_GET['action'] == 'modify'){
                    $idService = intval($this->getParameter($_GET, 'id'));
                    $service = $this->getParameter($_POST, 'newDescription');
                    $this->ctrlAdmin->changeArticles($service, $idService);
                }
                else if ($_GET['action'] == 'changeIdentifyImage'){
                    $idImage = intval($this->getParameter($_GET, 'id'));
                    $image = $this->getParameter($_POST, 'identifyImage');
                    $this->ctrlAdmin->changeIdentifyImages($image, $idImage);
                }
                else if ($_GET['action'] == 'deleteArticle'){
                    $idRemove = intval($this->getParameter($_GET, 'id'));
                    $this->ctrlAdmin->removeArticles($idRemove);
                }
                else if ($_GET['action'] == 'identifyImage'){
                    $this->ctrlAdmin->imageIdentify();
                }
                else
                    throw new Exception("Action non valide");
            }
            else{
                $this->ctrlHome->home();
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