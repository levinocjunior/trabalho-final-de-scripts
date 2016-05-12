﻿<?php 
// include database and object files 
include_once 'config/database.php'; 
include_once 'objects/product.php'; 
 
// get database connection 
$database = new Database(); 
$db = $database->getConnection();
 
// prepare product object
$product = new Product($db);
 
// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));     
 
// set ID property of product to be edited
$product->id = $data->id;
 
// set product property values
$product->nome = $data->nome;
$product->telefone = $data->telefone;
$product->email = $data->email;
 
// update the product
if($product->update()){
    echo "Cadastro atualizado.";
}
 
// if unable to update the product, tell the user
else{
    echo "Erro para atualizar cadastro.";
}
?>