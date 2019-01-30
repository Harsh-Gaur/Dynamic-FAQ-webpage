<?php
include_once("connectM.php");
if(isset($_POST['edit_module'])){
	$ids=strip_tags(mysqli_real_escape_string($db_connection,$_GET['ids']));
	$category=strip_tags(mysqli_real_escape_string($db_connection,$_POST['category']));
	$res= mysqli_query($db_connection,"UPDATE category SET category = '".$category."' WHERE cat_id ='".$ids."' LIMIT 1") or die(mysqli_error());
	header("Location: index.php");
	exit();
}
	if(isset($_POST['delete_module']))
    {
	$ids=strip_tags(mysqli_real_escape_string($db_connection,$_GET['ids']));
	$res = mysqli_query($db_connection,"DELETE FROM category WHERE cat_id='".$ids."' LIMIT 1")or die(mysqli_error());
	header("Location: modulesE.php");
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
	<h1>EDIT MODULES</h1>

</header>
<p align="center"><a href= "home.php"> HOME </a>|<a href= "index.php"> MODULE INDEX</a>|<a href= "modulesC.php"> ADD CATEGORY</a>|<a href= "modulesE.php"> EDIT CATEGORY</a>|<a href= "addsub.php"> ADD SUB CATEGORY</a>|<a href= "editsub.php"> EDIT SUB CATEGORY</a></p>
<br/>
<br/>
<br/>
<?php
$res=mysqli_query($db_connection,"SELECT * FROM category") or die(mysqli_error($db_connection));
if (mysqli_num_rows($res) > 0){
	while($row=mysqli_fetch_assoc($res)){
	$id= $row['cat_id'];
	$category= $row['category'];
	echo'<div class="id"><form action="modulesE.php?ids='.$id.'" method="post">
		<span>category: <input type="text" name="category" size="65" value="'.$category.'"/></span><br/>
		<input type="submit" name="delete_module" value="Delete module" onclick="return myFunction()"/> 
		<input type="submit" name="edit_module" value="Submit Changes" />
		</form></div> 
		<br/><br/>';
}
}else{
	echo "No modules at this time";
}
			?>
		</div>
	</div>
	<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
<script>
function myFunction() {
  return confirm("Are you sure you want to delete permanently!");
}
</script>
</body>
</html>