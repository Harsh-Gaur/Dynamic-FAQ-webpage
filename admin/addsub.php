<?php
include_once("connectM.php");
if(isset($_POST['create_module'])){
	$subcategory=strip_tags(mysqli_real_escape_string($db_connection,$_POST['subcategory']));
	$category=strip_tags(mysqli_real_escape_string($db_connection,$_POST['category']));
	$res= mysqli_query($db_connection,"INSERT INTO subcategory(cat_id,subcategory) VALUE('".$category."','".$subcategory."')") or die(mysqli_error());
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
	<h1>ADD SUB MODULES</h1>

</header>
<p align="center"><a href= "home.php"> HOME </a>|<a href= "index.php"> MODULE INDEX</a>|<a href= "modulesC.php"> ADD CATEGORY</a>|<a href= "modulesE.php"> EDIT CATEGORY</a>|<a href= "addsub.php"> ADD SUB CATEGORY</a>|<a href= "editsub.php"> EDIT SUB CATEGORY</a></p>
<br/>
<br/>

	<form action="addsub.php" method="post">		
	Category: <select name="category">
		<?php
		$res=mysqli_query($db_connection,"select * from category");
		while($row=mysqli_fetch_array($res))
		{
		$cat=$row['category'];
		echo' <option selected value='.$row[cat_id].'> '.$cat.' </option>';
	
	} ?>
	</select>
	Sub-Category:<input type="text" name="subcategory" size ="65"/><br/><br/>
	<input type="submit" name="create_module" value="Add New Sub module" />
    </form>
	</div>
<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</body>
</html>