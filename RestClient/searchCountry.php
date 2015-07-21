<html>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<body>
<div ng-app="myApp" ng-controller="myCtrl">
<h2>{{title}}</h2> 
<form action = "" method = "POST"> 
<input type = "text" name = "name" ng-model="name" placeholder="Country name...">
<input type = "submit" name = "submit"> 
<p>Enter country name, e.g.,Cuba, India, Germany.</p>
<h4>{{name}}</h4>
</form>
</div>
<script>
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
    $scope.title = "Search Country name";
});
</script> 
</body>
</html>

<?php
if(isset($_POST['submit']))
{

	$name = $_POST['name'];
	//Resource Address
	$url="http://localhost/restservice/$name";
	//initializes the curl instance and process the url
	$client=curl_init($url);
	
	//2nd and 3rd parameters (CURLOPT_RETURNTRANSFER,1) force curl 
	//not to print the result
	curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
	
	//curl_exec return result as string 
	$response=curl_exec($client);
	
	//decode the json response
	$result=json_decode($response);
	
	if(isset($result->data))
	     echo $result->data." country found";
    else
	     echo $name." country not found";
	
}
?>