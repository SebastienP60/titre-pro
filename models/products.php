<?php
//On crée l'objet product pour initialiser ses attributs et avec le mot class qui est la définition de l'objet
class product{
    public $id = 0;
    public $name = '';
    public $reference = '';
    public $description = '';
    public $price = 0;
    public $picture = '';
    public $energy = '';
    public $id_ahl115_subtypes = 0;
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
/*Méthode pour insérer un nouveau produit dans la table products avec une fonction préparée
car on attend des informations de l'administrateur */
//:name est un marqueur nominatif
    public function addNewProduct(){
        $addNewProductQuery = $this->db->prepare(
            'INSERT INTO `ahl115_products` (`name`, `reference`, `description`, `price`, `picture`, `energy`, `id_ahl115_subtypes`)
             VALUES(:name, :reference, :description, :price, :picture, :energy, :fk)');
       $addNewProductQuery->bindValue(':name', $this->name, PDO::PARAM_STR);
       $addNewProductQuery->bindValue(':reference', $this->reference, PDO::PARAM_STR);
       $addNewProductQuery->bindValue(':description', $this->description, PDO::PARAM_STR);
       $addNewProductQuery->bindValue(':price', $this->price, PDO::PARAM_STR);
       $addNewProductQuery->bindValue(':picture', $this->picture, PDO::PARAM_STR);
       $addNewProductQuery->bindValue(':energy', $this->energy, PDO::PARAM_STR);
       $addNewProductQuery->bindValue(':fk', $this->id_ahl115_subtypes, PDO::PARAM_INT);
       return $addNewProductQuery->execute();
    }
//On crée une méthode pour vérifié si le produit exsite déjà grâce à sa référence
    public function checkProductExist(){
        $ProductExist = $this->db->prepare(
            'SELECT COUNT(`reference`) AS `isReferenceExist`
                    FROM `ahl115_products` 
                    WHERE `reference` = :reference');
        $ProductExist->bindValue(':reference', $this->reference, PDO::PARAM_STR);
        $ProductExist->execute();
        $data = $ProductExist->fetch(PDO::FETCH_OBJ);
        return $data->isReferenceExist;
    }
/*On crée une méthode pour afficher toutes les information relatives
 à un produit enregistré*/
    public function getInfoProduct(){
        $infoProduct = $this->db->prepare(
            'SELECT
                `name`
                , `reference`
                , `description`
                , `price`
                , `picture`
                , `energy`
                , `id_ahl115_subtypes`   
                FROM
                `ahl115_products`
                WHERE `id` = :id'); 
        $infoProduct->bindValue(':id', $this->id, PDO::PARAM_INT);
        $infoProduct->execute();
        return $infoProduct->fetch(PDO::FETCH_OBJ);
    }
/*On crée une méthode pour récupérer tous les produits 
 via son sous-type*/
 public function getListProductsBySubtype(){
    $getListProductsSubtype = $this->db->prepare(
        'SELECT
            `name`
            , `reference`
            , `description`
            , `price`
            , `picture`
            , `energy`  
            FROM
            `ahl115_products`
            WHERE `id_ahl115_subtypes` = :id_ahl115_subtypes'); 
    $getListProductsSubtype->bindValue(':id_ahl115_subtypes', $this->id_ahl115_subtypes, PDO::PARAM_INT);
    $getListProductsSubtype->execute();
    return $getListProductsSubtype->fetch(PDO::FETCH_OBJ);
}
/*On crée une méthode pour récupérer tous les produits 
 via la sous-catégorie*/
 public function getListProductsBySubcategory(){
    $getListProductsSubcategory = $this->db->prepare(
        'SELECT
        `ahl115_products`.`name`
        , `reference`
        , `description`
        , `price`
        , `picture`
        , `energy`  
        FROM
        `ahl115_products`
        INNER JOIN `ahl115_subtypes` ON `id_ahl115_subtypes`= `ahl115_subtypes`.`id`
        INNER JOIN `ahl115_types` ON `id_ahl115_types`= `ahl115_types`.`id`
        WHERE `id_ahl115_subcategories` = :id_ahl115_subcategories'); 
    $getListProductsSubcategory->bindValue(':id_ahl115_subcategories', $this->id_ahl115_subcategories, PDO::PARAM_INT);
    $getListProductsSubcategory->execute();
    return $getListProductsSubcategory->fetch(PDO::FETCH_OBJ);
}
/*On crée une méthode pour récupérer tous les produits
via le type*/
public function getListProductsByType(){
    $getListProductsByType = $this->db->prepare(
        'SELECT
        `ahl115_products`.`name`
        , `reference`
        , `description`
        , `price`
        , `picture`
        , `energy`  
        FROM
        `ahl115_products`
        INNER JOIN `ahl115_subtypes` ON `id_ahl115_subtypes`= `ahl115_subtypes`.`id`
        WHERE `id_ahl115_types` = :id_ahl115_types
    ');
    $getListProductsByType->bindValue(':id_ahl115_types', $this->id_ahl115_types, PDO::PARAM_INT);
    $getListProductsByType->execute();
    return $getListProductsByType->fetch(PDO::FETCH_OBJ);
}
/* ONcrée une méthode pour récupérer tous les produits
via la catégorie*/
public function getListProductsByCategory(){
    $getListProductsCategory = $this->db->prepare(
        'SELECT
        `ahl115_products`.`name`
        , `reference`
        , `description`
        , `price`
        , `picture`
        , `energy`  
        FROM
        `ahl115_products`
        INNER JOIN `ahl115_subtypes` ON `id_ahl115_subtypes`= `ahl115_subtypes`.`id`
        INNER JOIN `ahl115_types` ON `id_ahl115_types`= `ahl115_types`.`id`
        INNER JOIN `ahl115_subcategories` ON `id_ahl115_subcategories`= `ahl115_subcategories`.`id`
        WHERE `id_ahl115_categories` = :id_ahl115_categories
    ');
    $getListProductsCategory->bindValue(':id_ahl115_categories', $this->id_ahl115_categories, PDO::PARAM_INT);
    $getListProductsCategory->execute();
    return $getListProductsCategory->fetch(PDO::FETCH_OBJ);
}
/*On crée une méthode pour récupérer toutes les information relatives
 à tous les produits enregistrés*/
 public function getProductsList(){
    $ListProduct = $this->db->query(
        'SELECT
            `name`
            , `reference`
            , `description`
            , `price`
            , `picture`
            , `energy`
            , `id_ahl115_subtypes`   
            FROM
            `ahl115_products`
            '); 
    return $ListProduct->fetchAll(PDO::FETCH_OBJ);
}
//On crée une méthode pour modifier les informations d'un produit
    public function updateinfoProduct(){
        $updateinfoProductQuery = $this->db->prepare(
            'UPDATE `ahl115_products`
            SET
             `name` = :name
            , `reference` = :reference
            , `description` = :description
            , `price` = :price
            , `picture` = :picture
            , `energy` = :energy
            WHERE `reference` = :reference
            ');
        $updateinfoProductQuery->bindValue(':name', $this->name, PDO::PARAM_STR);
        $updateinfoProductQuery->bindValue(':reference', $this->reference, PDO::PARAM_STR);
        $updateinfoProductQuery->bindValue(':description', $this->description, PDO::PARAM_STR);
        $updateinfoProductQuery->bindValue(':price', $this->price, PDO::PARAM_STR);
        $updateinfoProductQuery->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $updateinfoProductQuery->bindValue(':energy', $this->energy, PDO::PARAM_STR);
        return $updateinfoProductQuery->execute();
    }
//On crée une méthode pour supprimer un produit
    public function deleteProduct(){
        $deleteProductQuery = $this->db->prepare(
            'DELETE FROM
            `ahl115_products`
            WHERE `reference` = :reference'    
        );
        $deleteProductQuery->bindvalue(':reference', $this->reference, PDO::PARAM_STR);
        return $deleteProductQuery->execute();
    }
//On crée une méthode pour le champ de recherche d'un produit via sa référence
    public function searchReferenceProduct(){
        $searchRefProduct = $this->db->prepare(
            'SELECT
            `reference`
            FROM 
            `products`
            WHERE
            `reference`
            LIKE :find
        ');
        $searchRefProduct->bindvalue(':find', '%'.$this->reference.'%',PDO::PARAM_STR);
        $searchRefProduct->execute();
        return $searchRefProduct->fetch(PDO::FETCH_OBJ);    
    }    
}