<?php
include_once("connectM.php");
if(isset($_POST['create_module'])){
	$category=strip_tags(mysqli_real_escape_string($db_connection,$_POST['category']));
	$res= mysqli_query($db_connection,"INSERT INTO category(category) VALUE('".$category."')") or die(mysqli_error());
	header("Location: index.php");
	exit();
}
?>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="../assets/a/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="../assets/a/css/style.css"> <!-- Resource style -->
	<script src="../assets/a/js/modernizr.js"></script> <!-- Modernizr -->
	<title>MODULES</title>
</head>
<body>
<header>
	<h1>ADD MODULES</h1>

</header>
<p align="center"><a href= "home.php"> HOME </a>|<a href= "index.php"> MODULE INDEX</a>|<a href= "modulesC.php"> ADD CATEGORY</a>|<a href= "modulesE.php"> EDIT CATEGORY</a>|<a href= "addsub.php"> ADD SUB CATEGORY</a>|<a href= "editsub.php"> EDIT SUB CATEGORY</a></p>
<br/>
<br/>

	<form action="modulesC.php" method="post">		
	CATEGORY:<input type="text" name="category" size ="65"/><br/><br/>
	<input type="submit" name="create_module" value="Add New Category" />
    </form>
	</div>
<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</body>
</html>