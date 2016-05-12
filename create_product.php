<?php 
// get database connection 
include_once 'config/database.php'; 
$database = new Database(); 
$db = $database->getConnection();
 
// instantiate product object
include_once 'objects/product.php';
$product = new Product($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input")); 
 
// set product property values
$product->nome = $data->nome;
$product->telefone = $data->telefone;
$product->email = $data->email;
//$product->created = date('Y-m-d H:i:s');
     
// create the product
if($product->create()){
    echo "Cadastro realizado.";
}
 
// if unable to create the product, tell the user
else{
    echo "Cadastro não realizado.";
}
?>