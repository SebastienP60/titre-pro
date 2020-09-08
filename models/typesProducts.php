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
        $this->db = new PDO('mysql:host=localhost;dbname=retzAirsoftShop;charset=utf8', 'sebastien', 'ahlmann');
        }catch(Exception $error) {
            die ($error->getMessage());
        }
    }
/*On crée une méthode pour afficher la liste des types
 de chaque produit pour l'ajouter.*/    
    public function getListTypeProduct(){
        $listTypeProduct = $this->db->prepare(
        'SELECT
            `id`
            ,`name`
            FROM
            `ahl115_types`
            WHERE `id_ahl115_subcategories` = :id_ahl115_subcategories
            ORDER BY `name` ASC' 
        );
        $listTypeProduct->bindValue(':id_ahl115_subcategories', $this->id_ahl115_subcategories, PDO::PARAM_STR);
        $listTypeProduct->execute();
        return $listTypeProduct->fetchAll(PDO::FETCH_OBJ);
    }
}