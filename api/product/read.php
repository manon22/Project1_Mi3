//CREATE FILE TO READ PRODUCTS
//The code below shows headers about who can read this file and which type of content it will return.
//In this case, our read.php file can be read by anyone (asterisk * means all) and will return a data in JSON format.
<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 

//DATABASE CONNECTION WILL BE HERE
//In de onderstaande code hebben we de database.php- en product.php- bestanden opgenomen. Dit zijn de bestanden die we eerder //hebben gemaakt.
//We moeten de methode getConnection () van de klasse Database gebruiken om een ​​databaseverbinding te krijgen. We geven deze //verbinding door aan de klasse Product .
//Vervanging van // database-verbinding is hier commentaar van read.php- bestand met de volgende code.

//include database and object files
include_once '../config/database.php';
include_once '../objects/product.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$product = new Product($db);



//READ PRODUCTS WILL BE HERE
//lees producten uit database
//In de onderstaande code hebben we de methode read () van de klasse Product gebruikt om gegevens uit de database te lezen. Via de variabele $ num controleren we of er records zijn gevonden.
//Als er records worden gevonden, doorlopen we deze met behulp van de while- lus, voegen elke record toe aan de array $ products_arr , stellen een 200 OK- antwoordcode in en geven deze aan de gebruiker in JSON-indeling.
//Vervanging van // lees producten zal hier een reactie zijn van read.php bestand met de volgende code.
// query products
$stmt = $product->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $products_arr=array();
    $products_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $product_item=array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description),
            "price" => $price,
            "category_id" => $category_id,
            "category_name" => $category_name
        );
 
        array_push($products_arr["records"], $product_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show products data in json format
    echo json_encode($products_arr);
}
// NO PRODUCTS FOUND WILL BE HERE
//VERTEL DE GEBRUIKER GEEN PRODUCTEN GEVONDEN
//Als de variabele $ num een waarde nul of negatief heeft, betekent dit dat er geen records zijn geretourneerd uit de database. We moeten de gebruiker hierover informeren.
//Op de onderstaande code stellen we de antwoordcode in op 404 - Niet gevonden en een bericht met de tekst Geen producten gevonden.
//Vervanging van // geen gevonden producten zal hier een commentaar zijn van read.php bestand met de volgende code.
else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no products found
    echo json_encode(
        array("message" => "No products found.")
    );
}




//PRODUCT TOEVOEGEN "READ()" METHODE
//We hebben de methode read () in de vorige sectie gebruikt, maar deze bestaat nog niet in de klasse Product . We moeten deze read () -methode toevoegen. De onderstaande code toont de query om records uit de database te halen.
//Open de map met objecten . Open product.php bestand. Plaats de volgende code in de klasse Product . Om ervoor te zorgen dat je het correct hebt toegevoegd, plaats je de code voor de laatste sluitende accolade.
// read products
function read(){
 
    // select all query
    $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            ORDER BY
                p.created DESC";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}