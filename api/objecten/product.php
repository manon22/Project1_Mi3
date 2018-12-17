//PRODUCT OBJECT
//De onderstaande code toont een klasse met de naam Product met verschillende eigenschappen. Het toont ook een constructormethode //die de databaseverbinding accepteert.
<?php
class Product{
 
    // database connection and table name
    private $conn;
    private $table_name = "products";
 
    // object properties
    public $id;
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $category_name;
    public $created;
 
    // constructor with $db as database connection
    //constructor methode die de database verbinding accepteerd
    public function __construct($db){
        $this->conn = $db;
    }
}