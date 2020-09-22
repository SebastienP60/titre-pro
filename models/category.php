<?php
//On crée l'objet category pour initialiser ses attributs et avec le mot class qui est la définition de l'objet
class category{
    public $id = 0;
    public $name = '';
    private $db = NULL;
    public function __construct(){
    //try essaie de se connecter à la base de données
    try{
        // $db devient une instance de l'objet PDO
        $this->db = new PDO('mysql:host='.SQL_HOST.';dbname='.SQL_DBNAME.';charset=utf8', SQL_USER, SQL_PWD);
    }catch(Exception $error) {
            die ($error->getMessage());
    }
}
//On crée une méthode pour afficher les différentes catégories
    public function categoryList(){
        $categoryListQuery = $this->db->query(
            'SELECT
                `id`
                , `name`
            FROM
            `ahl115_categories`
        ');
            return $categoryListQuery->fetchAll(PDO::FETCH_OBJ);
    }

/*On crée une méthode pour vérifié si le type du produit existe déjà 
grâce à son id avant de les afficher*/
    public function checkCategoryExistById(){
        $ProductExistByCategoryId = $this->db->prepare(
            'SELECT COUNT(`id`) AS `isIdProductCategoryExist`
                    FROM `ahl115_categories` 
                    WHERE `id` = :id
                    ');
        $ProductExistByCategoryId->bindValue(':id', $this->id, PDO::PARAM_INT);
        $ProductExistByCategoryId->execute();
        $data = $ProductExistByCategoryId->fetch(PDO::FETCH_OBJ);
        return $data->isIdProductCategoryExist;
    }
}
 
