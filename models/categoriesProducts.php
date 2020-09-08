<?php
//On crée l'objet categoryProduct pour initialiser ses attributs et avec le mot class qui est la définition de l'objet
class categoryProduct{
    public $id = 0;
    public $name = '';
    private $db = NULL;
    public function __construct(){
    //try essaie de se connecter à la base de données
    try{
        // $db devient une instance de l'objet PDO
        $this->db = new PDO('mysql:host=localhost;dbname=retzAirsoftShop;charset=utf8', 'sebastien', 'ahlmann');
        }catch(Exception $error) {
            die ($error->getMessage());
    }
}
//On crée ue méthode pour afficher les différentes catégories
    public function categoriesProducts(){
        $categoryProducts = $this->db->query(
            'SELECT
                `id`
                , `name`
            FROM
            `ahl115_categories`
        ');
            return $categoryProducts->fetchAll(PDO::FETCH_OBJ);
    }
}
 
//     public function getAllTypes(){
//         $getAllTypesQuery = $this->db->query(
//             'SELECT
//             `name`.`ahl115_subtypes` AS `subtypesName`
//             , `id`.`ahl115_subtypes` AS `subtypesId`
//             ,`link`
//             FROM
//             `ahl115_subtypes` AS `subtypes`
//             INNER JOIN `ahl115_types` AS `typ` ON `id` = `id_ahl115_subcategories`
//             ');
//     }
    
// }      

/*SELECT 
                `name` AS `subName`
                ,`id`
                ,`typ`.`name` AS `typeName`
                ,`link`
                ,`subTyp`.`name` AS `subtypeName`
            FROM 
                `ahl115_subcategories` AS `sub`
            INNER JOIN `ahl115_types` AS `typ` ON id = `id_ahl115_subcategories`
            INNER JOIN `ahl115_subtypes` AS `subTyp` ON `id_ahl115_types` = `typ`.`id`
            WHERE `id` = 1*/
/* 
            public function getTypeNames(){

                $categoryQuery = $this->db->query(
                        'SELECT 
                        `sub`.`name` AS `subName`
                        ,`sub`.`id`
                        ,`typ`.`name` AS `typeName`
                      
                    FROM 
                        `ahl115_subcategories` AS `sub`
                    INNER JOIN `ahl115_types` AS `typ` ON `sub`.`id` = `id_ahl115_subcategories`
                    WHERE `sub`.`id` = 1
                        
                    ');
                    $data = $categoryQuery->fetchAll(PDO::FETCH_OBJ);
                    return $data;
            }
        
            public function getSubTypes($id){
        
                $categoryQuery = $this->db->query(
                        'SELECT 
                        `sub`.`name` AS `subName`
                        ,`sub`.`id`
                        ,`typ`.`name` AS `typeName`
                        ,`typ`.`id` AS `typeID`
                        ,`link`
                        ,`subTyp`.`name` AS `subtypeName`
                    FROM 
                        `ahl115_subcategories` AS `sub`
                    INNER JOIN `ahl115_types` AS `typ` ON `sub`.id = `id_ahl115_subcategories`
                    INNER JOIN `ahl115_subtypes` AS `subTyp` ON `id_ahl115_types` = `typ`.`id`
                    WHERE `sub`.`id` = 1 OR `typ`.`id` =' . $id
                    );
                    $data = $categoryQuery->fetchAll(PDO::FETCH_OBJ);
                    return $data;
            }
 */        