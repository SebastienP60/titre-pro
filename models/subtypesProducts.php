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
        $this->db = new PDO('mysql:host=localhost;dbname=retzAirsoftShop;charset=utf8', 'sebastien', 'ahlmann');
        }catch(Exception $error) {
            die ($error->getMessage());
        }
    }
/*On crée une méthode pour afficher la liste des sous-types
 de chaque produit pour l'ajouter.*/    
    public function getListSubtypeProduct(){
        $subtypeProduct = $this->db->prepare(
        'SELECT
            `id`
            ,`name`
            FROM
            `ahl115_subtypes`
            WHERE `id_ahl115_types` = :id_ahl115_types
            ORDER BY `name` ASC' 
        );
        $subtypeProduct->bindValue(':id_ahl115_types', $this->id_ahl115_types, PDO::PARAM_INT);
        $subtypeProduct->execute();
        return $subtypeProduct->fetchAll(PDO::FETCH_OBJ);
    }
}