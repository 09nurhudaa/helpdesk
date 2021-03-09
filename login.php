<?php 
require 'core/init.php';
$general->logged_in_protect();
if (empty($_POST) === false)
{	$username = strip_tags(addslashes(trim($_POST['username']))); 
	$password = strip_tags(addslashes(trim($_POST['password']))); 
	if (empty($username) === true || empty($password) === true) {
		$errors[] = 'Sorry, but we need your username and password.';
	} else if ($users->user_exists($username) === false) {
		$errors[] = 'Sorry, that username doesn\'t exists. Please try again.';
	} 
	else
	{	$login = $users->login($username, $password);
		if ($login === false) {
			$errors[] = 'Sorry, that username/password is invalid. Please try again.';
		}else if (!$users->email_confirmed($username)){
			$errors[] = 'Sorry, your account is locked. Please contact Administrator.';
		}else {
			$_SESSION['loginid'] =  $login;
			$users->log_users($login,'Login to Helpdesk System');
			echo $login;
			header('location: home.php');
			exit();
		}
	}
} 
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Helpdesk System</title>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body onload="document.login.username.focus();">
<br/><br/>
<h1 class="loginform">Login Helpdesk System</h1>
<div class="loginform" align="center">
	<table class="loginform">
	<tr><td>
		<img src="images/logo.png" alt="Company-Logo" align="middle" width="300" height="200" >
	</td>
	<td>
		<form name="login" method="post">
		<fieldset><legend>&nbsp;Please Log in&nbsp;</legend>
		<label>User Name : </label>
		<input type="text" name="username" autocomplete="off" size="20"><br />
		<label>Password : </label>
		<input type="password" name="password" autocomplete="off" size="20"><br /><br />
		<center><input type="submit" name="login" value="Login" ></center>
		</fieldset>
		</form>
	</td>
	</tr>
	</table>
</div>
	<tr><td>
		<img src="images/dlogo.png" alt="Company-Logo" width="1300" height="200" />
	</td>
</tr>
<?php 
	if(empty($errors) === false){
		echo '<p class="errormsg">' . implode('</p><p class="errormsg">', $errors) . '</p>';	
	}
?>
<div class="footer">
	<div class="copyrights text-center">
   	  <p>Design by <a>Nur Huda</a>
        </p>
      </div>
    </div>
</div>
</body>
</html>
