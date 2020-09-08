<?php
//On crée l'objet types pour initialiser ses attributs et avec le mot class qui est la définition de l'objet
class types{
    public $id = 0;
    public $name = '';
    public $id_ahl115_subcategories = '';
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
/*On crée une méthode pour afficher la liste des sous-types
 de chaque produit pour l'ajouter.*/    
    public function getListSubtypeProduct(){
        $listSubtypeProduct = $this->db->query(
        'SELECT
            `id`
            ,`name`
            ,`id_ahl115_types`
            FROM
            `ahl115_subtypes`
            ORDER BY `name` ASC' 
        );
        return $listSubtypeProduct->fetchAll(PDO::FETCH_OBJ);
    }
}