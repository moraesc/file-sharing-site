<?php
session_start();
$filename = basename($_FILES['uploadedfile']['name']);
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	echo "Invalid filename";
	exit;
}
 
// Get the username and make sure it is valid
$username = $_SESSION['username'];
if( !preg_match('/^[\w_\-]+$/', $username) ){
	echo "Invalid username";
	exit;
}
 
$full_path = sprintf("/fall2017-module2-group-443499-444683/resources/users/%s/personal_files/%s", $username, $filename);
echo $full_path;
 
if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
	header("Location: user_profile.php");
	exit;
}else{
	echo $full_path;
	printf('Could not be added');
	exit;


}
?>
