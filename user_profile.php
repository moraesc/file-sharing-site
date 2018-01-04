<!DOCTYPE html>
<html>
<head>
	<title>
		<?php session_start();
			$username=$_SESSION['username'];
			printf('Profile: %s', $username);
		?>
	</title>

<meta charset="utf-8">
<link rel="stylesheet" href="user_profile.css" type="text/css">

</head>
<body>

<div id="rectangle"></div>
<h1>File Sharing Site</h1>
<h2>Welcome</h2>

<a href="logout.php">Click Here to Log Out</a>

<div id="searchbar">
<form action="user_profile.php" method="POST">
<input type="text" name="search" placeholder="Search">
<input type="submit" name="searchbutton" value="Submit Search" id="searchbutton">
</form>
</div>

<?php
if(isset($_POST['searchbutton']))
{
	$search = $_POST['search'];
	if(empty($_POST['search']))
	{
		echo "No input entered";
	}
}
?>

<?php

$username=$_SESSION['username'];
$user_file_directory = 'resources/users/' . $username . '/personal_files';
$user_file_array = scandir($user_file_directory);
?>

<div id="text">
<?php
printf("This is the user account of  %s", $username);
	for($i=2; $i<sizeof($user_file_array); $i++){
		echo('<br>');
		echo($user_file_array[$i]);
		echo('<br>');
	}

?>
</div>

<form enctype="multipart/form-data" action="upload_file.php" method="POST">
	<p>
		<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
		<!--<label for="uploadfile_input">Upload File:</label> -->
		<input name="uploadedfile" type="file" id="uploadfile_input" />
	</p>
	<p>
		<input type="submit" value="Upload File" id="submit"/>
	</p>

</form>

</body>
</html>
