<?php 
require_once 'View/view.php';
require_once 'Model/admin.php';

class AdminController{
    private $newAdmin;
    
    public function __construct() {
        $this->newAdmin = new Admin();
    }
    
    public function adminConnect(){
        $view = new AllView("identifyAdmin");
        $view->generate(array());
    }

    public function admin(){
        $view = new AllView("admin");
        $view->generate(array());
    }
    public function adminCreation(){
        $view = new AllView("adminAdd");
        $view->generate(array());
    }
    public function verifyAdmin($name, $password){
        $admin = $this->newAdmin->adminConnect($name, $password);
        $isAdmin = password_verify($password, $admin["password"]);
        if ($admin) {
            $_SESSION['adminPassword'] = $admin['password'];
            $_SESSION['name'] = $admin['name'];
            header('Location: index.php?action=adminPage');
        }        
    }
    public function changeArticles($service, $id){
        $this->newAdmin->changeArticle($service, $id);
        if (isset($_SESSION['name']) AND isset($_SESSION['adminPassword'])){
            header('Location: index.php?action=modifyPage');
        }
        else {
            header('Location: index.php?action=admin');
        }
    }
    public function createArticles($service){
        $this->newAdmin->createArticle($service);
        if (isset($_SESSION['name']) AND isset($_SESSION['adminPassword'])){
            header('Location: index.php?action=adminPage');
        }
        else {
            header('Location: index.php?action=admin');
        }
    }
    public function removeArticles($id){
        $this->newAdmin->removeArticle($id);
        if (isset($_SESSION['name']) AND isset($_SESSION['adminPassword'])){
            header('Location: index.php?action=modifyPage');
        }
        else {
            header('Location: index.php?action=admin');
        }
    }
    public function articlesList(){
        $articles = $this->newAdmin->articleList();
        $view = new AllView("adminModify");
        $view->generate(array('articles' => $articles));
    }
}
