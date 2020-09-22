<?php
//On crée l'objet types pour initialiser ses attributs et avec le mot class qui est la définition de l'objet
class types{
    public $id = 0;
    public $name = '';
    public $id_ahl115_subcategories = 0;
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
/*On crée une méthode pour afficher la liste des types
 de chaque produit pour l'ajouter.*/    
    public function typesList(){
        $typesListQuery = $this->db->prepare(
        'SELECT
            `id`
            ,`name`
            FROM
            `ahl115_types`
            WHERE `id_ahl115_subcategories` = :id_ahl115_subcategories
            ORDER BY `name` ASC' 
        );
        $typesListQuery->bindValue(':id_ahl115_subcategories', $this->id_ahl115_subcategories, PDO::PARAM_INT);
        $typesListQuery->execute();
        return $typesListQuery->fetchAll(PDO::FETCH_OBJ);
    }

/*On crée une méthode pour vérifié si le type du produit existe déjà 
grâce à son id avant de les afficher*/
    public function checkTypeExistById(){
        $ProductExistByTypeId = $this->db->prepare(
            'SELECT COUNT(`id`) AS `isIdProductTypeExist`
                    FROM `ahl115_types` 
                    WHERE `id` = :id
                    ');
        $ProductExistByTypeId->bindValue(':id', $this->id, PDO::PARAM_INT);
        $ProductExistByTypeId->execute();
        $data = $ProductExistByTypeId->fetch(PDO::FETCH_OBJ);
        return $data->isIdProductTypeExist;
    }

/*On crée une méthode pour récupérer le nom du type*/
    public function getNameTypeById(){
        $getNameTypeByIdQuery = $this->db->prepare(
            'SELECT
            `id`
            , `name`
            FROM `ahl115_types`
            WHERE `id` = :id
        ');
        $getNameTypeByIdQuery->bindValue(':id', $this->id, PDO::PARAM_INT);
        $getNameTypeByIdQuery->execute();
        return $getNameTypeByIdQuery->fetch(PDO::FETCH_OBJ)->name;
    }
}