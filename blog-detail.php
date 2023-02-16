<?php
include 'config.php';

$sql = "SELECT * FROM `blogs` WHERE id = '" . mysqli_real_escape_string($conn, $_GET['id']) . "'";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
	$blog = mysqli_fetch_assoc($result);
} else {
	$_SESSION['err_msg'] = "Blog not found";
	header('location: ' . APP_URL . '/index.php');
	exit;
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
	<title><?= $blog['title'] ?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="<?= APP_URL ?>/theme/assets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="<?= APP_URL ?>/theme/assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload">
	<?php include './includes/header.php'; ?>


	<h1 style="text-align: justify;"><?= $blog['title'] ?></h1>


	<?= $blog['content'] ?>
	<?php include './includes/footer.php'; ?>

</body>

</html>