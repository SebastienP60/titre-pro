<?php
include 'config.php';
//On crée l'objet user pour initialiser ses attributs et avec le mot class qui est la définition de l'objet
class users{
    public $id = 0;
    public $lastname = '';
    public $firstname = '';
    public $mail = '';
    public $address = '';
    public $password = '';
    public $phoneNumber = '';
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
    public function addUsersAccounts(){
        $addUsersAccountQuery = $this->db->prepare(
            'INSERT INTO `USERS` (`lastname`, `firstname`, `mail`,`address`, `password`, `phoneNumber`)
            VALUES(:lastname, :firstname, :mail, :address, :password, :phoneNumber)'
            );
       $addUsersAccountQuery->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
       $addUsersAccountQuery->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
       $addUsersAccountQuery->bindValue(':mail', $this->mail, PDO::PARAM_STR);
       $addUsersAccountQuery->bindValue(':address', $this->address, PDO::PARAM_STR);
       $addUsersAccountQuery->bindValue(':password', $this->password, PDO::PARAM_STR);
       $addUsersAccountQuery->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
       return $addUsersAccountQuery->execute();
    }
//On crée une méthode pour vérifié si l'utilisateur a déjà un compte grâce à son mail et son mot de passe
    public function checkUserAccountExist(){
        $userAccountExist = $this->db->prepare(
            'SELECT COUNT(`id`) AS `isAccountExist`
                    FROM `USERS` 
                    WHERE `mail` = :mail AND `password` = :password');
        $userAccountExist->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $userAccountExist->bindValue(':password', $this->password, PDO::PARAM_STR);
        $userAccountExist->execute();
        $data = $userAccountExist->fetch(PDO::FETCH_OBJ);
        return $data->isAccountExist;
    }
/*On crée une méthode pour afficher toutes les information relatives
 au compte de l'utilisateur déjà inscrit*/
    public function getInfoUserAccount(){
        $infoUserAccount = $this->db->prepare(
            'SELECT
                `lastname`
                , `firstname`
                , `address`
                , `phoneNumber`
                , `mail`
                ,  `password`   
                FROM
                `USERS`
                WHERE `id` = :id' 
            );
        $infoUserAccount->bindValue(':id', $this->id, PDO::PARAM_INT);
        $infoUserAccount->execute();
        return $infoUserAccount->fetch(PDO::FETCH_OBJ);
    }
}