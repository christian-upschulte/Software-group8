<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css" />
	<title>Download Files</title>
	<style type="text/css">
	#wrapper {
	margin: 0 auto;
	float: none;
	width:70%;
}
.header {
	padding:10px 0;
	border-bottom:1px solid #CCC;
}
.title {
	padding: 0 5px 0 0;
	float:left;
	margin:0;
}
.container form input {
	height: 30px;
}
body
{
    background-color: transparent;
    font-size:14;
    font-weight:bold;
}
		</style>
</head>
<body  align="center">

<br>
<div class="container home">

 <table class="table table-bordered">
  <thead>
   <tr style="background-color: #ffffff;">
    <th>Title</th>
    <th>Description</th>
<<<<<<< HEAD
    <th>Size (bytes)</th>
    <th>Upload Date</th>
=======
>>>>>>> origin/master
		<th>Download Files</th>
  </tr>
   </thead>
    <tbody>
 
 <?php

	$link=mysql_connect("localhost","root","");
	mysql_select_db("test2",$link);
	$q="select count(*) \"total\"  from presentation";
	$ros=mysql_query($q, $link);
	$row=(mysql_fetch_array($ros));
	$total=$row['total'];
	$dis=3;
	$total_page=ceil($total/$dis);
	$page_cur=(isset($_GET['page']))?$_GET['page']:1;
	$k=($page_cur-1)*$dis;
	$q="SELECT * FROM presentation ORDER BY subject ASC limit $k,$dis";
	$ros=mysql_query($q,$link);
	
	while($row=mysql_fetch_array($ros))
	{
		echo '<tr>';
		echo '<td align=center>' .$row['subject'];
		echo '<td align=center>' .$row['topic'];
		echo '<td align=center>' .$row['size'];
		echo '<td align=center>' .$row['uploaddate'];
		echo "<td align=center><a title='Click here to download in file.' 
		     href='download.php?id={$row['file']}'>{$row['file']} </a>"; 
		echo '</tr>';
		
	}
	echo '</table>';
	echo  '</tbody>';
	echo '<br/>';
	
	if($page_cur>1)
	{
	 echo '<a href="display.php?page='.($page_cur-1).'"><input type="button" value=" Previous "></a> ';
     }
	else
	{
	  echo '<input type="button" value=" Previous ">';
	}
	for($i=1;$i<$total_page;$i++)
	{
		if($page_cur==$i)
		{
		    
			echo '<input type="button" value="'.$i.'"> ';
	
		}
		else
		{
		echo '<a href="display.php?page='.$i.'"> <input type="button" value="'.$i.'"> </a> ';
		
		}
	}
	if($page_cur<$total_page)
	{
		
		echo '<a href="display.php?page='.($page_cur+1).'"><input type="button" value=" Next "></a>';
  	  
	}
	else
	{

	 echo '<input type="button" value=" Next "> ';
     }
   
?>

</div>
</body>
</html>