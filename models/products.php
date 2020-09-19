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
            $this->db = new PDO('mysql:host='.SQL_HOST.';dbname='.SQL_DBNAME.';charset=utf8', SQL_USER, SQL_PWD);
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
    public function getInfoProductById(){
        $infoProductById = $this->db->prepare(
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
                WHERE `id` = :id
                '); 
        $infoProductById->bindValue(':id', $this->id, PDO::PARAM_INT);
        $infoProductById->execute();
        return $infoProductById->fetch(PDO::FETCH_OBJ);
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
            WHERE `id_ahl115_subtypes` = :id_ahl115_subtypes
            '); 
    $getListProductsSubtype->bindValue(':id_ahl115_subtypes', $this->id_ahl115_subtypes, PDO::PARAM_INT);
    $getListProductsSubtype->execute();
    return $getListProductsSubtype->fetchAll(PDO::FETCH_OBJ);
}

/*On crée une méthode pour récupérer tous les produits
via le type*/
public function getListProductsByType($types){
    $getListProductsByType = $this->db->prepare(
        'SELECT
        `pro`.`name`
        , `reference`
        , `description`
        , `price`
        , `picture`
        , `energy`  
        FROM
        `ahl115_products` AS `pro`
        INNER JOIN `ahl115_subtypes` AS `subtyp` ON `pro`.`id_ahl115_subtypes` = `subtyp`.`id`
        WHERE `subtyp`.`id_ahl115_types` = :types
    ');
    $getListProductsByType->bindValue(':types', $types, PDO::PARAM_INT);
    $getListProductsByType->execute();
    return $getListProductsByType->fetchAll(PDO::FETCH_OBJ);
}

/*On crée une méthode pour récupérer tous les produits 
 via la sous-catégorie*/
 public function getListProductsBySubcategory($subcategories){
    $getListProductsSubcategory = $this->db->prepare(
        'SELECT
        `pro`.`name`
        , `reference`
        , `description`
        , `price`
        , `picture`
        , `energy`
        FROM
        `ahl115_products` AS `pro`
        INNER JOIN `ahl115_subtypes` AS `subtyp` ON `pro`.`id_ahl115_subtypes` = `subtyp`.`id`
        INNER JOIN `ahl115_types` AS `typ` ON `subtyp`.`id_ahl115_types` = `typ`.`id`
        WHERE `typ`.`id_ahl115_subcategories` = :subcategories
        '); 
    $getListProductsSubcategory->bindValue(':subcategories', $subcategories, PDO::PARAM_INT);
    $getListProductsSubcategory->execute();
    return $getListProductsSubcategory->fetchAll(PDO::FETCH_OBJ);
}

/* On crée une méthode pour récupérer tous les produits
via la catégorie*/
public function getListProductsByCategory($categories){
    $getListProductsCategory = $this->db->prepare(
        'SELECT
        `pro`.`name`
        , `reference`
        , `description`
        , `price`
        , `picture`
        , `energy`  
        FROM
        `ahl115_products` AS `pro`
        INNER JOIN `ahl115_subtypes` AS `subtyp` ON `pro`.`id_ahl115_subtypes`= `subtyp`.`id`
        INNER JOIN `ahl115_types` AS `typ` ON `subtyp`.`id_ahl115_types`= `typ`.`id`
        INNER JOIN `ahl115_subcategories` AS `subcat` ON `typ`.`id_ahl115_subcategories`= `subcat`.`id`
        WHERE `subcat`.`id_ahl115_categories` = :categories
    ');
    $getListProductsCategory->bindValue(':categories', $categories, PDO::PARAM_INT);
    $getListProductsCategory->execute();
    return $getListProductsCategory->fetchAll(PDO::FETCH_OBJ);
}
/*On crée une méthode pour récupérer toutes les information relatives
 à tous les produits enregistrés*/
 public function getProductsList(){
    $ListProduct = $this->db->query(
        'SELECT
            `id`
            , `name`
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
    public function updateInfoProduct(){
        $updateInfoProductQuery = $this->db->prepare(
            'UPDATE `ahl115_products`
            SET
             `name` = :name
            , `reference` = :reference
            , `description` = :description
            , `price` = :price
            , `picture` = :picture
            , `energy` = :energy
            WHERE `id` = :id
            ');
        $updateInfoProductQuery->bindValue(':name', $this->name, PDO::PARAM_STR);
        $updateInfoProductQuery->bindValue(':reference', $this->reference, PDO::PARAM_STR);
        $updateInfoProductQuery->bindValue(':description', $this->description, PDO::PARAM_STR);
        $updateInfoProductQuery->bindValue(':price', $this->price, PDO::PARAM_STR);
        $updateInfoProductQuery->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $updateInfoProductQuery->bindValue(':energy', $this->energy, PDO::PARAM_STR);
        $updateInfoProductQuery->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $updateInfoProductQuery->execute();
    }
//On crée une méthode pour supprimer un produit
    public function deleteProduct(){
        $deleteProductQuery = $this->db->prepare(
            'DELETE FROM
            `ahl115_products`
            WHERE `id` = :id
            ');
        $deleteProductQuery->bindvalue(':id', $this->id, PDO::PARAM_INT);
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