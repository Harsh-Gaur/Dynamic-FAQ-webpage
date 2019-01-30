<?php
include_once("connectM.php");

if(isset($_POST['edit_faq'])){
	$ids=strip_tags(mysqli_real_escape_string($db_connection,$_GET['ids']));
	$questions=strip_tags(mysqli_real_escape_string($db_connection,$_POST['questions']));
	$answers=strip_tags(mysqli_real_escape_string($db_connection,$_POST['answers']));
	$res= mysqli_query($db_connection,"UPDATE faq SET questions = '".$questions."', answers ='".$answers."' WHERE faq_id = '".$ids."' LIMIT 1") or die(mysqli_error($db_connection));
	header("Location: faq.php");
	exit();
}
if(isset($_POST['delete_faq'])){
	$faq=strip_tags(mysqli_real_escape_string($db_connection,$_GET['ids']));
	$res = mysqli_query($db_connection,"DELETE FROM faq WHERE faq_id='".$faq."' LIMIT 1")or die(mysqli_error($db_connection));
	header("Location: edit.php");
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
	<title>FAQ</title>
	<style>
 #nav{
  border-left: 6px solid cyan;
  color: black;
  padding: 15px;
  background-color: lightblue;
  font-size: 100%;}
 #nav2{
  border-left: 6px solid red;
  padding: 10px;
  color: black;
  background-color: orange;
  font-size: 100%;
 }

</style>

</head>
<body>
<header>
	<h1>EDIT FAQ</h1>

</header>
<p align="center"><a href= "home.php"> Home </a>|<a href= "faq.php"> FAQ INDEX</a>|<a href= "create.php"> ADD FAQ</a>|<a href= "edit.php"> EDIT FAQ</a></p>
<br/>
<br/>
<?php

$res2=mysqli_query($db_connection,"SELECT * FROM category") or die(mysqli_error($db_connection));
if (mysqli_num_rows($res2) > 0){
	while($row2=mysqli_fetch_assoc($res2)){	
	
	$category= $row2['category'];
	echo '<br/><br/><p id="nav">'.$category.'</p>';

$res=mysqli_query($db_connection,"SELECT * FROM subcategory where subcategory.cat_id = '".$row2['cat_id']."'") or die(mysqli_error($db_connection));
if (mysqli_num_rows($res) > 0){
	while($row=mysqli_fetch_assoc($res)){	
	$subcategory=$row['subcategory'];
	echo '<div><p id="nav2">'.$subcategory.'</p>';	
	


$res3=mysqli_query($db_connection,"SELECT * FROM faq where faq.subcat_id ='".$row['subcat_id']."'") or die(mysqli_error($db_connection));
if (mysqli_num_rows($res3) > 0){
	while($row3=mysqli_fetch_assoc($res3)){	
		$questions=$row3['questions'];
		$answers=$row3['answers'];
		$id= $row3['faq_id'];
	echo'<div class="id"><form action="edit.php?ids='.$id.'" method="post">
		 <br/>

		<span>Questions: <input type="text" name="questions" size="65" value="'.$questions.'"/></span><br/>
		<span>Answers: &nbsp; &nbsp;<input type="text" name="answers" size="65" value="'.$answers.'"/></span><br/>
		<input type="submit" name="delete_faq" value="Delete module" onclick="return myFunction()"/> 
		<input type="submit" name="edit_faq" value="Submit Changes" />
		</form></div> 

</div><br/>'
		;
}
}
}
}
}
}
else{
	echo "No modules at this time";
}
			?>
		
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