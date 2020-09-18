<?php
//On crée l'objet subtypes pour initialiser ses attributs et avec le mot class qui est la définition de l'objet
class subtypes{
    public $id = 0;
    public $name = '';
    public $id_ahl115_types = 0;
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
/*On crée une méthode pour afficher la liste des sous-types
 de chaque produit pour l'ajouter.*/    
    public function subtypesList(){
        $subtypesListQuery = $this->db->prepare(
        'SELECT
            `id`
            ,`name`
            FROM
            `ahl115_subtypes`
            WHERE `id_ahl115_types` = :id_ahl115_types
            ORDER BY `name` ASC' 
        );
        $subtypesListQuery->bindValue(':id_ahl115_types', $this->id_ahl115_types, PDO::PARAM_INT);
        $subtypesListQuery->execute();
        return $subtypesListQuery->fetchAll(PDO::FETCH_OBJ);
    }

    /*On crée une méthode pour vérifié si le sous-type du produit existe déjà 
    grâce à son id avant de les afficher*/
    public function checkSubtypeExistById(){
        $ProductExistBySubtypeId = $this->db->prepare(
            'SELECT COUNT(`id`) AS `isIdProductSubtypeExist`
                    FROM `ahl115_subtypes` 
                    WHERE `id` = :id
                    ');
        $ProductExistBySubtypeId->bindValue(':id', $this->id, PDO::PARAM_INT);
        $ProductExistBySubtypeId->execute();
        $data = $ProductExistBySubtypeId->fetch(PDO::FETCH_OBJ);
        return $data->isIdProductSubtypeExist;
    }
}