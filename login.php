<!DOCTYPE html>

<head>

<title>File Sharing Site</title>
<meta charset="utf-8">

<link rel="stylesheet" href="login.css" type="text/css">


</head>
<body>

<form action="login.php" method="POST">

<div id="rectangle1"></div>
<h1> File Sharing Site </h1>
<h2> Log In Here: </h2>
<div id="rectangle2"></div>

<div id="form">
<label id="user" >Username: <input type="text" name="username"></label>

<input type="submit" name="submit" value="submit" id="submit">
</div>

</form>

<div id="errors">
<?php
session_start();
$users = fopen("users_list.txt", "r");

if (isset($_POST['submit']))
{
        $username = $_POST['username'];
        if(empty($_POST['username']))
        {
                echo "Username not entered";
        }
        else if(isset($_POST['username']))
        {
                while (!feof($users))
                {
                        $names = trim(fgets($users));

                        if ($username == $names)
                        {
                            $_SESSION['username'] = $username;
			    header("location: user_profile.php");
			}
		}
		if ($username != $names)  {
		echo "Username not valid";
		}
	}
}

?>
</div>

</body>
</html>
