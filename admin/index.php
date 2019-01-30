<?php
include_once("connectM.php");
include_once("list.php");
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
<style>
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 20px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 20px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc;
}

.accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.panel {
  padding: 0 20px;
  background-color: white;
  max-height: 0 10px;
  overflow: hidden;  
  font-size: 22px;
  transition: max-height 0.2s ease-out;
}

* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myList li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</head>
<body>
<header>
	<h1>MODULES</h1>

</header>
<p align="center"><a href= "home.php"> HOME </a>|<a href= "index.php"> MODULE INDEX</a>|<a href= "modulesC.php"> ADD CATEGORY</a>|<a href= "modulesE.php"> EDIT CATEGORY</a>|<a href= "addsub.php"> ADD SUB CATEGORY</a>|<a href= "editsub.php"> EDIT SUB CATEGORY</a></p>
<section class="cd-faq">
<!-- cd-faq-categories -->
<br/>
<br/>
<br/>
    
	<div >
    
    <br/>
    <br/>
    <input id="myInput" type="text" placeholder="Search..">
<br>
		<ul class="cd-faq-group" id="myList">
				<?php
$sql="SELECT * FROM category ";

$res=mysqli_query($db_connection,$sql) or die(mysqli_error($db_connection));
if (mysqli_num_rows($res) > 0){
	while($row=mysqli_fetch_assoc($res)){
    	$category= $row['category'];
      echo'<li class="accordion" >'.$category.'</li>';
      echo' <div class="panel">';

      $sql2=" SELECT * from subcategory where subcategory.cat_id = '".$row['cat_id']."'";
      $res2=mysqli_query($db_connection,$sql2) or die(mysqli_error($db_connection));
      while($row2=mysqli_fetch_assoc($res2)){
              $subcat= $row2['subcategory'];
              $id=$row2['subcat_id'];
            	echo'<a href="faqU.php?id='.$id.'"><p>'.$subcat.'<p></a>';}
              
              echo'</div>';
              echo'<br/>';
}

}

else{
	echo "No modules at this time";
}
			?></ul>
		</ul> <!-- cd-faq-group -->
	</div> <!-- cd-faq-items -->
</section> <!-- cd-faq -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}

</script>

</body>
</html>