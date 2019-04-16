<?php 
$session1 = session_start();
include_once 'header.php';


$err_message = "";
$logadmin = new Admin;

if(isset($_POST['login_btn'])) {

// get and sanitize input

$adminname = filter_input(INPUT_POST, 'Adminname', FILTER_SANITIZE_NUMBER_INT);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_MAGIC_QUOTES);
$logadmin->Adminname = $adminname;
$logadmin->password = $password;

// connect to database
$result = $logadmin->check_login();
	if($result == TRUE) {
		$_SESSION['Admin'] = $adminname;
		echo '<meta HTTP-EQUIV=REFRESH CONTENT="1; \'admin.php?page=start\'">';
	} else {
		$err_message = "Log in failed. Check that your ID and password are correct."; 
	}
}
?>


<form class="content" method="post" action="login.php">
	<div class="input-group">
		<label>Användarnamn</label>
		<input type="text" name="Adminname">
	</div>

	<div class="input-group">
		<label>Lösenord</label>
		<input type="password" name="password">
		</div>

	<div class="input-group">
		<button type="submit" class="btn" name="login_btn">Logga in</button>
	</div>
</form>