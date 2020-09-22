<?php
//On crée l'objet user pour initialiser ses attributs et avec le mot class qui est la définition de l'objet
class user{
    public $id = 0;
    public $lastname = '';
    public $firstname = '';
    public $mail = '';
    public $address = '';
    public $password = '';
    public $phoneNumber = '';
    public $id_ahl115_roles = 0;
    private $db = NULL;
    public function __construct()
    {
    //try essaie de se connecter à la base de données
    try{
            // $db devient une instance de l'objet PDO
            $this->db = new PDO('mysql:host='.SQL_HOST.';dbname='.SQL_DBNAME.';charset=utf8', SQL_USER, SQL_PWD);
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
/*On crée une méthode pour vérifié si l'utilisateur a déjà un compte 
grâce à son id lorsqu'il veut modifier son compte*/
    public function checkUserAccountExistById(){
        $userAccountExistById = $this->db->prepare(
            'SELECT COUNT(`id`) AS `isIdAccountExist`
                    FROM `ahl115_users` 
                    WHERE `id` = :id');
        $userAccountExistById->bindValue(':id', $this->id, PDO::PARAM_INT);
        $userAccountExistById->execute();
        $data = $userAccountExistById->fetch(PDO::FETCH_OBJ);
        return $data->isIdAccountExist;
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
/*On crée une lméthode pour modifier le mot de passe de l'utilisateur*/
    public function updatePasswordUser(){
        $updatePwdUser = $this->db->prepare(
            'UPDATE
            `ahl115_users`
            SET
            `password`= :password
            WHERE `id`= :id
        ');
        $updatePwdUser->bindValue(':password', $this->password, PDO::PARAM_STR);
        $updatePwdUser->bindValue(':id', $this->id, PDO::PARAM_INT);

        return $updatePwdUser->execute();
    }
/*On crée une méthode pour récupérer toutes les informations relatives
 au compte de l'utilisateur déjà inscrit*/
    public function getInfoUserAccount(){
        $infoUserAccount = $this->db->prepare(
            'SELECT
                `id`
                ,`lastname`
                , `firstname`
                , `id_ahl115_roles`
                FROM
                `ahl115_users`
                WHERE `mail` = :mail'); 
        $infoUserAccount->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $infoUserAccount->execute();
        return $infoUserAccount->fetch(PDO::FETCH_OBJ);
    }
/*On crée une méthode pour récupérer toutes les informations relatives
au compte de l'utilisateur déjà inscrit via son id*/
    public function getInfoUserAccountById(){
        $infoUserAccount = $this->db->prepare(
            'SELECT
                `lastname`
                , `firstname`
                , `address`
                , `phoneNumber`
                , `mail`
                FROM
                `ahl115_users`
                WHERE `id` = :id'); 
        $infoUserAccount->bindValue(':id', $this->id, PDO::PARAM_INT);
        $infoUserAccount->execute();
        return $infoUserAccount->fetch(PDO::FETCH_OBJ);
    }
//On crée une méthode pour modifier les informations du compte utilisateur
    public function updateMyAccount(){
        $updateMyAccountQuery = $this->db->prepare(
            'UPDATE `ahl115_users`
            SET
            `lastname` = :lastname
            , `firstname` = :firstname
            , `address` = :address
            , `phoneNumber` = :phoneNumber
            , `mail` = :mail 
            WHERE `id` = :id');
        $updateMyAccountQuery->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $updateMyAccountQuery->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $updateMyAccountQuery->bindValue(':address', $this->address, PDO::PARAM_STR);
        $updateMyAccountQuery->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $updateMyAccountQuery->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $updateMyAccountQuery->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $updateMyAccountQuery->execute();
    }
//On crée une méthode pour supprimer un compte utilisateur
    public function deleteUserAccount(){
        $deleteUserAccountQuery = $this->db->prepare(
            'DELETE FROM
            `ahl115_users`
            WHERE `id` = :id'    
        );
        $deleteUserAccountQuery->bindvalue(':id', $this->id, PDO::PARAM_INT);
        return $deleteUserAccountQuery->execute();
    }
}