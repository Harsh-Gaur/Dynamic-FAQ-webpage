<?php
	$link=mysqli_connect("localhost","root","","modules" ) or die(mysqli_error($link));

$category=$_GET['category'];
if($category!="")
{	
	$res=mysqli_query($link,"SELECT * from subcategory where cat_id= $category");

	echo "<br/>Sub-Category: <select name='subcategory'>";
	while($row=mysqli_fetch_array($res))
	{
		echo"<option value=".$row['subcat_id'].">";
		echo $row['subcategory'];
		echo "</option>";
	}
	echo "</select>";
}

  ?>