<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
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
<<<<<<< HEAD
    font-size:14;
=======
    font-size:12;
>>>>>>> origin/master
    font-weight:bold;
}
label
{
	font-size: 16;
	font-weight:bold;
}


		</style>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <?php
			if(!empty($_POST))
			{
				$con = mysql_connect("localhost","root","");
				if (!$con)
					echo('Could not connect: ' . mysql_error());
				else
				{
					if (file_exists("download/" . $_FILES["file"]["name"]))
					{
						echo '<script language="javascript">alert("Error! Filename already exists. Please try again.")</script>';
					}
					else if (((int)$_FILES["file"]["size"]) > 1048576)
					{
						echo '<script language="javascript">alert("Error! File size is too big! Please try again.")</script>';
					}
					else if (pathinfo("download/".$_FILES["file"]["name"], PATHINFO_EXTENSION) !== 'txt')
					{
						echo '<script language="javascript">alert("Error! File is not a .txt file! Please try again.")</script>';
					}
					else
					{
						move_uploaded_file($_FILES["file"]["tmp_name"],
						"download/" . $_FILES["file"]["name"]) ;
						mysql_select_db("test2", $con);
						$size = (int)$_FILES["file"]["size"];
						$date = date('Y-m-d');
						$sql = "INSERT INTO presentation(subject,topic,file,size,uploaddate) VALUES ('" . $_POST["sub"] ."','" . $_POST["pre"] . "','" . 
							  $_FILES["file"]["name"] ."', '$size', '$date');";
						if (!mysql_query($sql,$con))
							echo('Error : ' . mysql_error());
						else
							echo '<script language="javascript">alert("Success! Your file has been successfully uploaded!")</script>';
						}
				}
				mysql_close($con);
			}
        ?>
    </head>
     <body>
	   <div class="container home">
      <br>

        <form id="form3" enctype="multipart/form-data" method="post" action="upload.php">
             <table class="table table-bordered">         	
                <tr>
<<<<<<< HEAD
                    <td><label for="sub">Title:</label></td>
                    <td><input type="text" name="sub" id="sub" class="input-medium"  
					         required autofocus placeholder="Title of the file"/>	</td>
                </tr>
                <tr>
                    <td style="font-size: 16px; font-weight: bold;">Description:</td>
=======
                    <td>	<label for="sub">Title: </label>	</td>
                    <td>	<input type="text" name="sub" id="sub" class="input-medium"  
					         required autofocus placeholder="Title of the subject"/>	</td>
                </tr>
                <tr>
                    <td valign="top" align="left">Description:</td>
>>>>>>> origin/master
                    <td valign="top" align="left"><input type="text" name="pre" cols="50" rows="10" id="pre"  
					placeholder="Description of the file"
					class="input-medium" required></textarea></td>
                </tr>
                <tr>
                    <td><label for="file">File:</label></td>
                    <td><input type="file" name="file" id="file" 
                        title="Click here to select file to upload." required /></td>
                </tr>
<<<<<<< HEAD
=======
                <tr>
                  
				   <td colspan="2" align="center">		    
				   <input type="submit" class="btn btn-success" name="upload" id="upload" 
				   title="Click here to upload the file." value="Upload File" /> </td>
                </tr>
>>>>>>> origin/master
            </table>
            <input type="submit" class="btn btn-success" name="upload" id="upload" 
				   title="Click here to upload the file." value="Upload File" />
        </form>
		</div>
    </body>
</html>
