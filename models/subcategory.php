<?php
//On crée l'objet subcategory pour initialiser ses attributs et avec le mot class qui est la définition de l'objet
class subcategory{
    public $id = 0;
    public $name = '';
    public $id_ahl115_categories = 0;
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
/*On crée une méthode pour afficher la liste des sous-catégories
 de chaque produit pour l'ajouter.*/    
    public function subcategoryList(){
        $subcategoryListQuery = $this->db->prepare(
        'SELECT `id`, `name`
        FROM `ahl115_subcategories` 
        WHERE `id_ahl115_categories` = :id_ahl115_categories
        ORDER BY `name`  ASC
    ');
    $subcategoryListQuery->bindValue(':id_ahl115_categories', $this->id_ahl115_categories,PDO::PARAM_INT);
    $subcategoryListQuery->execute();
    return $subcategoryListQuery->fetchAll(PDO::FETCH_OBJ);
    }
}