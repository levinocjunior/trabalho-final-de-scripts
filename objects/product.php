<?php 
class Product{ 
    // database connection and table name 
    private $conn; 
    private $table_name = "produtos"; 
 
    // object properties 
    public $id; 
    public $nome; 
    public $email; 
    public $telefone; 
     
 
    // constructor with $db as database connection 
    public function __construct($db){ 
        $this->conn = $db;
    }
	
	// read products
function readAll(){
 
    // select all query
    $query = "SELECT 
                id, nome, email, telefone 
            FROM 
                " . $this->table_name . "
            ORDER BY 
                id DESC";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
     
    // execute query
    $stmt->execute();
     
    return $stmt;
}

}

// create product
function create(){
     
    // query to insert record
    $query = "INSERT INTO 
                " . $this->table_name . "
            SET 
                nome=:nome, telefone=:telefone, email=:email";
     
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // posted values
    $this->nome=htmlspecialchars(strip_tags($this->nome));
    $this->telefone=htmlspecialchars(strip_tags($this->telefone));
    $this->email=htmlspecialchars(strip_tags($this->email));
 
    // bind values
    $stmt->bindParam(":nome", $this->nome);
    $stmt->bindParam(":telefone", $this->telefone);
    $stmt->bindParam(":email", $this->email);

     
    // execute query
    if($stmt->execute()){
        return true;
    }else{
        echo "<pre>";
            print_r($stmt->errorInfo());
        echo "</pre>";
 
        return false;
    }
}

// used when filling up the update product form
function readOne(){
     
    // query to read single record
    $query = "SELECT 
                nome, telefone, email  
            FROM 
                " . $this->table_name . "
            WHERE 
                id = ? 
            LIMIT 
                0,1";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
     
    // bind id of product to be updated
    $stmt->bindParam(1, $this->id);
     
    // execute query
    $stmt->execute();
 
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    // set values to object properties
    $this->nome = $row['nome'];
    $this->telefone = $row['telefone'];
    $this->email = $row['email'];
}
	
// update the product
function update(){
 
    // update query
    $query = "UPDATE 
                " . $this->table_name . "
            SET 
                nome = :nome, 
                telefone = :telefone, 
                email = :email 
            WHERE
                id = :id";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // posted values
    $this->nome=htmlspecialchars(strip_tags($this->nome));
    $this->telefone=htmlspecialchars(strip_tags($this->telefone));
    $this->email=htmlspecialchars(strip_tags($this->email));
 
    // bind new values
    $stmt->bindParam(':nome', $this->nome);
    $stmt->bindParam(':telefone', $this->telefone);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':id', $this->id);
     
    // execute the query
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}		
// update the product
function update(){
 
    // update query
    $query = "UPDATE 
                " . $this->table_name . "
            SET 
                nome = :nome, 
                telefone = :telefone, 
                email = :email 
            WHERE
                id = :id";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // posted values
    $this->nome=htmlspecialchars(strip_tags($this->nome));
    $this->telefone=htmlspecialchars(strip_tags($this->telefone));
    $this->email=htmlspecialchars(strip_tags($this->email));
 
    // bind new values
    $stmt->bindParam(':nome', $this->nome);
    $stmt->bindParam(':telefone', $this->telefone);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':id', $this->id);
     
    // execute the query
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}	

// delete the product
function delete(){
 
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
     
    // prepare query
    $stmt = $this->conn->prepare($query);
     
    // bind id of record to delete
    $stmt->bindParam(1, $this->id);
 
    // execute query
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}


?>