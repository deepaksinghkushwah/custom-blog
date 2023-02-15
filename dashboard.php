<?php 
include 'config.php';
isAuthorized();

?>
<!DOCTYPE HTML>
<!--
	Forty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>Dashboard</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="<?=APP_URL?>/theme/assets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="<?=APP_URL?>/theme/assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload">
	<?php include './includes/header.php'; ?>

	<header class="major">
		<h1>Dashboard</h1>
	</header>
	<p><a class="btn" href="<?=APP_URL.'/blog-create.php'?>">Create New Blog</a></p>
	<?php include './blog-list.php'; ?>
	<?php include './includes/footer.php'; ?>

</body>

</html>