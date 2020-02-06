<?php 
require_once 'Model/model.php';

class Admin extends Model{

    public function adminConnect($name, $password){
        $sql = 'SELECT Name_admin as name, Password_admin as password from admin where Name_admin =? and Password_admin =?';
        $admin = $this->executerRequete($sql, array($name, $password));
        if($admin->rowCount()==1){
           return $admin->fetch();
        }
        else {
            throw new Exception("Erreur d'identifiant ou mot de passe");
        }
    }
    public function articleList(){
        $sql = 'SELECT id_Services as id, text_Services as text from services order by id_Services';
        $articles = $this->executerRequete($sql);
        return $articles;
    }
    public function createArticle($service){
        $sql = 'INSERT into services(text_Services) values(?)';
        $this->executerRequete($sql, array($service));
    }
    public function changeArticle($service, $id){
        $sql = 'UPDATE services SET text_Services = ? WHERE id_Services = ?';
        $this->executerRequete($sql, array($service, $id));
    }
    public function removeArticle($id){
        $sql = 'DELETE FROM services WHERE id_Services = ?';
        $this->executerRequete($sql, array($id));
    }
    public function identifyImage(){
        $sql = 'SELECT id_Image as id, image as img from identifyimage order by id_Image';
        $images = $this->executerRequete($sql);
        return $images;
    }
    public function changeIdentifyImage($image, $id){
        $sql = 'UPDATE identifyimage SET id_Image = ? WHERE id_Image = ?';
        $this->executerRequete($sql, array($service, $id));
    }
}