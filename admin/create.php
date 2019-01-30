<?php
include_once("connectM.php");
if(isset($_POST['create_faq'])){
	$subcategory=strip_tags(mysqli_real_escape_string($db_connection,$_POST['subcategory']));
	$category=strip_tags(mysqli_real_escape_string($db_connection,$_POST['category']));
	$questions=strip_tags(mysqli_real_escape_string($db_connection,$_POST['questions']));
	$answers=strip_tags(mysqli_real_escape_string($db_connection,$_POST['answers']));
	$res= mysqli_query($db_connection,"INSERT INTO faq(cat_id,subcat_id,questions,answers) VALUE('".$category."','".$subcategory."','".$questions."', '".$answers."')") or die(mysqli_error($db_connection));
	header("Location: faq.php");
	exit();

}
$link=mysqli_connect("localhost","root","","modules" ) or die(mysqli_error());

?>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="../assets/a/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="../assets/a/css/style.css"> <!-- Resource style -->
	<script src="../assets/a/js/modernizr.js"></script> <!-- Modernizr -->
	<title>FAQ </title>
	
</head>
<body>
<header>
	<h1>ADD FAQ</h1>

</header>
<p align="center"><a href= "home.php"> Home </a>|<a href= "faq.php"> FAQ INDEX</a>|<a href= "create.php"> ADD FAQ</a>|<a href= "edit.php"> EDIT FAQ</a></p>
<br/>
<br/>

	<form action="create.php" method="post" >
	 
	  <?php
  echo' Category: <select id="categorydd" name="category" onchange="changeCategory()">
  <option>SELECT CATEGORY</option>';

$res=mysqli_query($link,"SELECT * from category");
while($row=mysqli_fetch_array($res))
{
echo "<option value=".$row['cat_id']."> ".$row['category']."</option>";
}

echo '</select>

<div id="subcategory"><br/>
Sub-Category: <select name="subcategory">
  <option>SELECT SUB CATEGORY</option>
  </select>
</div>';

?>

	<br/>
	<br/>
	Question:<input type="text" name="questions" size ="65"/><br/><br/>
	Answer: <input type="text" name="answers" size="65" /> <br/><br/>
	<input type="submit" name="create_faq" value="Add New FAQ" />
    </form>
    <script type="text/javascript">
	function changeCategory(){

		var xmlhttp= new XMLHttpRequest();
		xmlhttp.open("GET","ajax.php?category="+document.getElementById("categorydd").value,false);
		xmlhttp.send(null);
		document.getElementById("subcategory").innerHTML=xmlhttp.responseText;

	}

</script>
	<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</body>
</html>