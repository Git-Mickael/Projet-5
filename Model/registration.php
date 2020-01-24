<?php 
require_once 'Model/model.php';

class Members extends Model{
    
    public function getMembers($email, $password) {
        $sql = 'SELECT Email_Members as email, Password_Members as password from members where Email_Members =? and Password_Members =?';
        $members = $this->executerRequete($sql, array($email, $password));
        if($members->rowCount()==1){
           return $members->fetch(); 
        }
        else {
            throw new Exception("Erreur d'identifiant ou mot de passe");
        }
    }
    public  function createNewMembers($name, $surname, $password, $email, $phone){
        $sql = 'INSERT into members(Name_Members, Surname_Members, Password_Members, Email_Members, Phone_Members)values (?, ?, ?, ?, ?)';
        $this->executerRequete($sql, array($name, $surname, $password, $email, $phone));
    }
    
}