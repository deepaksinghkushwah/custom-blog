<?php
include 'config.php';
if (isset($_POST['btnLogin'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	login($conn, $username, $password);
}
?>
<!DOCTYPE HTML>
<!--
	Forty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>Generic - Forty by HTML5 UP</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="<?= APP_URL ?>/theme/assets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="<?= APP_URL ?>/theme/assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload">
	<?php include './includes/header.php'; ?>

	<header class="major">
		<h1>Login</h1>
	</header>
	<form method="post" action="">
		<table width="50%">
			<tr>
				<td><label for="username">Username</label></td>
				<td><input type="text" name="username" id=""></td>
			</tr>
			<tr>
				<td><label for="password">Password</label></td>
				<td><input type="password" name="password" id=""></td>
			</tr>
			<tr>
				<td></td>
				<td><button type="submit" name="btnLogin">Login</button></td>
			</tr>
		</table>
	</form>
	<?php include './includes/footer.php'; ?>

</body>

</html>