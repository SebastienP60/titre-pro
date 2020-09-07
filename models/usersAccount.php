<?php
//On crée l'objet users pour initialiser ses attributs et avec le mot class qui est la définition de l'objet
class user{
    public $id = 0;
    public $lastname = '';
    public $firstname = '';
    public $mail = '';
    public $address = '';
    public $password = '';
    public $phoneNumber = '';
    public $id_ahl115_roles = '';
    private $db = NULL;
    public function __construct()
    {
    //try essaie de se connecter à la base de données
    try{
            // $db devient une instance de l'objet PDO
            $this->db = new PDO('mysql:host=localhost;dbname=retzAirsoftShop;charset=utf8', 'sebastien', 'ahlmann');
            }catch(Exception $error) {
                die ($error->getMessage());
        }
    }
/*Méthode pour insérer un nouvel utilisateur dans la table users avec une fonction préparée
car on attend des informations du visiteur qui veut s'inscrire sur le site*/
//:lastname est un marqueur nominatif
    public function addUserAccount(){
        $addUserAccountQuery = $this->db->prepare(
            'INSERT INTO `ahl115_users` (`lastname`, `firstname`, `mail`, `address`, `password`, `phoneNumber`, `id_ahl115_roles`)
             VALUES(:lastname, :firstname, :mail, :address, :password, :phoneNumber, 2)');
       $addUserAccountQuery->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
       $addUserAccountQuery->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
       $addUserAccountQuery->bindValue(':mail', $this->mail, PDO::PARAM_STR);
       $addUserAccountQuery->bindValue(':address', $this->address, PDO::PARAM_STR);
       $addUserAccountQuery->bindValue(':password', $this->password, PDO::PARAM_STR);
       $addUserAccountQuery->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
       return $addUserAccountQuery->execute();
    }
//On crée une méthode pour vérifié si l'utilisateur a déjà un compte grâce à son mail
    public function checkUserAccountExist(){
        $userAccountExist = $this->db->prepare(
            'SELECT COUNT(`mail`) AS `isMailAccountExist`
                    FROM `ahl115_users` 
                    WHERE `mail` = :mail');
        $userAccountExist->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $userAccountExist->execute();
        $data = $userAccountExist->fetch(PDO::FETCH_OBJ);
        return $data->isMailAccountExist;
    }
//On crée une méthode permettant de récupérer le hash du mot de passe de l'utilisateur
    public function getUserHashPassword(){
        $userHashPassword = $this->db->prepare(
            'SELECT `password`
            FROM `ahl115_users`
            WHERE `mail` = :mail'
        );
        $userHashPassword->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $userHashPassword->execute();
        $response = $userHashPassword->fetch(PDO::FETCH_OBJ);
        if(is_object($response)){
            return $response->password;
        }else{
            return '';
        }
    }
/*On crée une méthode pour afficher toutes les informations relatives
 au compte de l'utilisateur déjà inscrit*/
    public function getInfoUserAccount(){
        $infoUserAccount = $this->db->prepare(
            'SELECT
                `lastname`
                , `firstname`
                , `address`
                , `phoneNumber`
                , `mail`
                , `password`   
                FROM
                `ahl115_users`
                WHERE `mail` = :mail'); 
        $infoUserAccount->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $infoUserAccount->execute();
        return $infoUserAccount->fetch(PDO::FETCH_OBJ);
    }
//On crée une méthode pour modifier les informations du compte utilisateur
    public function updateMyAccount(){
        $updateMyAccountQuery = $this->db->prepare(
            'UPDATE `ahl115_users`
            SET
             `address` = :address
            , `phoneNumber` = :phoneNumber
            , `mail` = :mail 
            , `password` = :password
            WHERE `id` = :id');
        $updateMyAccountQuery->bindValue(':address', $this->address, PDO::PARAM_STR);
        $updateMyAccountQuery->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $updateMyAccountQuery->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $updateMyAccountQuery->bindValue(':password', $this->password, PDO::PARAM_STR);
        return $updateMyAccountQuery->execute();
    }
//On crée une méthode pour supprimer un compte utiisateur
    public function deleteUserAccount(){
        $deleteuserAccountQuery = $this->db->prepare(
            'DELETE FROM
            `ahl115_users`
            WHERE `id` = :id'    
        );
        $deleteuserAccountQuery->bindvalue(':id', $this->id, PDO::PARAM_STR);
        return $deleteuserAccountQuery->execute();
    }
}