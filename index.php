<!DOCTYPE html>
<html>
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      
    <title>CADASTRO</title>
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.29/angular.min.js"></script>
     
    <!-- include material design CSS -->
    <link rel="stylesheet" href="libs/css/materialize-v0.97.3/css/materialize.min.css" />
     
    <!-- include material design icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    
    
    <!-- include jquery -->

    
    <style>
.width-30-pct{
    width:30%;
}
 
.text-align-center{
    text-align:center;
}
 
.margin-bottom-1em{
    margin-bottom:1em;
}
</style>

     
</head>


<!-- custom CSS -->

<body>



<div class="container" ng-app="myApp" ng-controller="productsCtrl">
    <div class="row">
        <div class="col s12">
            <h4>CADASTRO COM ANGULAR JS</h4>
<!-- page content and controls will be here -->


<!-- used for searching the current list -->
			<input type="text" ng-model="search" class="form-control" placeholder="Procurar cadastro..." />
 
			<!-- table that shows product record list -->
			<table class="hoverable bordered">
 
   				 <thead>
       			 <tr>
          						  <th class="text-align-center">ID</th>
            					<th class="width-30-pct">Nome</th>
           						 <th class="width-30-pct">E-mail</th>
           						 <th class="text-align-center">Telefone</th>
          						  <th class="text-align-center">Ação</th>
       			 </tr>
    			</thead>
 
    		<tbody ng-init="getAll()">
        			<tr ng-repeat="d in nomes | filter:search">
          				  <td class="text-align-center">{{ d.id }}</td>
            				<td>{{ d.nome }}</td>
            				<td>{{ d.email }}</td>
           				 <td class="text-align-center">{{ d.telefone }}</td>
            		<td>
               					 <a ng-click="readOne(d.id)" class="waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">edit</i>Edit</a>
               					 <a ng-click="deleteProduct(d.id)" class="waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">delete</i>Delete</a>
            		</td>
       				 </tr>
    		</tbody>
			</table>




 </div> <!-- end col s12 -->
   		 </div> <!-- end row -->
</div> <!-- end container -->

 		

			<!-- modal for for creating new product -->
			<div id="modal-product-form" class="modal">
    		<div class="modal-content">
        		<h4 id="modal-product-title">Criar novo cadastro</h4>
        	<div class="row">
            			<div class="input-field col s12">
               		 <input ng-model="nome" type="text" class="validate" id="form-nome" placeholder="Digite seu nome aqui..." />
               		 <label for="nome">Nome</label>
           				 </div>
 
           				 <div class="input-field col s12">
              		  <textarea ng-model="email" type="text" class="validate materialize-textarea" placeholder="Digite o email aqui..."></textarea>
               			 <label for="email">E-mail</label>
           				 </div>
 
 
            				<div class="input-field col s12">
                		<input ng-model="telefone" type="text" class="validate" id="form-telefone" placeholder="Digite seu telefone aqui..." />
              			  <label for="telefone">Telefone</label>
           			 		</div>
 
 
               					 <a id="btn-update-product" class="waves-effect waves-light btn margin-bottom-1em" ng-click="updateProduct()"><i class="material-icons left">edit</i>Save Changes</a>
 
                				<a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">close</i>Close</a>
            			</div>
        		</div>
   				 </div>
		</div>

		<!-- floating button for creating product -->
			<div class="fixed-action-btn" style="bottom:45px; right:24px;">
 					   <a class="waves-effect waves-light btn modal-trigger btn-floating btn-large red" href="#modal-product-form" ng-click="showCreateForm()"><i class="large material-icons">add</i></a>
			</div>

 		

  			
            
            
            
             
			
            
   
			<!-- modal for for creating new product -->
		<div id="modal-product-form" class="modal">
    		<div class="modal-content">
       			 <h4 id="modal-product-title">Criar novo cadastro</h4>
        	<div class="row">
            <div class="input-field col s12">
              		  <input ng-model="nome" type="text" class="validate" id="form-nome" placeholder="Digite seu nome aqui..." />
               			 <label for="nome">Nome</label>
            </div>
 
            <div class="input-field col s12">
                <textarea ng-model="email" type="text" class="validate materialize-textarea" placeholder="Digite seu email aqui..."></textarea>
                <label for="email">E-mail</label>
            </div>
 
 
            <div class="input-field col s12">
                <input ng-model="telefone" type="text" class="validate" id="form-telefone" placeholder="Digite o seu telefone aqui..." />
                <label for="telefone">Telefone</label>
            </div>
 
 
            <div class="input-field col s12">
                <a id="btn-create-product" class="waves-effect waves-light btn margin-bottom-1em" ng-click="createProduct()"><i class="material-icons left">add</i>Create</a>
 
                <a id="btn-update-product" class="waves-effect waves-light btn margin-bottom-1em" ng-click="updateProduct()"><i class="material-icons left">edit</i>Save Changes</a>
 
                <a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">close</i>Close</a>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript" src="libs/js/jquery.js"></script>
 
<!-- material design js -->
<script src="libs/css/materialize-v0.97.3/js/materialize.min.js"></script>
 
<!-- include angular js -->
<!-- <script src="libs/js/angular.min.js"></script>-->



 
<script>
// angular js codes will be here


var app = angular.module('myApp', []);
app.controller('productsCtrl', function($scope, $http) {
	
	 // more angular JS codes will be here
	
$scope.showCreateForm = function(){
    // clear form
    $scope.clearForm();
     
    // change modal title
    $('#modal-product-title').text("Criar novo cadastro");
     
    // hide update product button
    $('#btn-update-product').hide();
     
    // show create product button
    $('#btn-create-product').show();
     
}

// clear variable / form values
$scope.clearForm = function(){
    $scope.id = "";
    $scope.nome = "";
    $scope.email = "";
    $scope.telefone = "";
}

// create new product 
$scope.createProduct = function(){
         
    // fields in key-value pairs
    $http.post('create_product.php', {
            'nome' : $scope.nome, 
            'email' : $scope.email, 
            'telefone' : $scope.telefone
        }
    ).success(function (data, status, headers, config) {
        console.log(data);
        // tell the user new product was created
        Materialize.toast(data, 4000);
         
        // close modal
        $('#modal-product-form').closeModal();
         
        // clear modal content
        $scope.clearForm();
         
        // refresh the list
        $scope.getAll();
    });
}

// read products
$scope.getAll = function(){
    $http.get("read_products.php").success(function(response){
        $scope.nomes = response.records;
    });
}

// retrieve record to fill out the form
$scope.readOne = function(id){
     
    // change modal title
    $('#modal-product-title').text("Edit Product");
     
    // show udpate product button
    $('#btn-update-product').show();
     
    // show create product button
    $('#btn-create-product').hide();
     
    // post id of product to be edited
    $http.post('read_one.php', {
        'id' : id 
    })
    .success(function(data, status, headers, config){
         
        // put the values in form
        $scope.id = data[0]["id"];
        $scope.nome = data[0]["nome"];
        $scope.email = data[0]["email"];
        $scope.telefone = data[0]["telefone"];
         
        // show modal
        $('#modal-product-form').openModal();
    })
    .error(function(data, status, headers, config){
        Materialize.toast('Unable to retrieve record.', 4000);
    });
}


	// update product record / save changes
$scope.updateProduct = function(){
    $http.post('update_product.php', {
        'id' : $scope.id,
        'nome' : $scope.nome, 
        'email' : $scope.email, 
        'telefone' : $scope.telefone
    })
    .success(function (data, status, headers, config){             
        // tell the user product record was updated
        Materialize.toast(data, 4000);
         
        // close modal
        $('#modal-product-form').closeModal();
         
        // clear modal content
        $scope.clearForm();
         
        // refresh the product list
        $scope.getAll();
    });
}

// delete product
$scope.deleteProduct = function(id){
     
    // ask the user if he is sure to delete the record
    if(confirm("Are you sure?")){
        // post the id of product to be deleted
        $http.post('delete_product.php', {
            'id' : id
        }).success(function (data, status, headers, config){
             
            // tell the user product was deleted
            Materialize.toast(data, 4000);
             
            // refresh the list
            $scope.getAll();
        });
    }
}
});	
	


									// jquery codes will be here
$(document).ready(function(){
    // initialize modal
    $('.modal-trigger').leanModal();
});




</script>
 
</body>
</html>