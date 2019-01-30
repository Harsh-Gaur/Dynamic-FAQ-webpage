<?php
include_once("connectM.php");
?>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="../assets/a/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="../assets/a/css/style.css"> <!-- Resource style -->
	<script src="../assets/a/js/modernizr.js"></script> <!-- Modernizr -->
	<title>FAQ</title>
<style>
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
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
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;  
  font-size: 20px;
  transition: max-height 0.2s ease-out;
}
.btn{
width: 100%;
text-align: left;
font-size: 20px;
background-color: #8ceab8n;

}
#myInput{
  padding: 10px;
  width: 100%;
}</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myDIV *").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</head>
<body>
<header>
	<h1>FAQ</h1>

</header>
<p align="center"><a href= "home.php"> Home </a>|<a href= "faq.php"> FAQ INDEX</a>|<a href= "create.php"> ADD FAQ</a>|<a href= "edit.php"> EDIT FAQ</a></p>
<section class="cd-faq">
<!-- cd-faq-categories -->
<br/>
<br/>
   
		<ul class="cd-faq-group">
   
<?php

echo'<br/><br/>';
$sql="SELECT * FROM faq";
$res=mysqli_query($db_connection,"SELECT * FROM faq") or die(mysqli_error());
if (mysqli_num_rows($res) > 0){
	while($row=mysqli_fetch_assoc($res)){
    $id=$row['faq_id'];
	$questions= $row['questions'];
	$answers= $row['answers'];
	echo'<button type="button" class="btn" data-toggle="collapse" data-target="#'.$id.'">'.$questions.'</button>
  <br/>
				<div id="'.$id.'" class="collapse">'.$answers.'</div><br/>';
			}
		
}
else{
	echo "No faqs at this time";
}
echo'</div>';
?>
		</ul> <!-- cd-faq-group -->
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