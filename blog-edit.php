<?php
include 'config.php';
checkLogin();

// if form is posted for blog update
if (isset($_POST['btnSaveBlog'])) {
	$title = $_POST['title'];
	$id = $_GET['id'];
	$content = $_POST['content'];
	updateBlog($conn, $id, $title, $content, $_SESSION['user']['id']);
}

$result = mysqli_query($conn, "SELECT * FROM `blogs` WHERE id = '".mysqli_real_escape_string($conn, $_GET['id'])."' AND created_by = '".$_SESSION['user']['id']."'");

// if blog not found
if(!$result){
	$_SESSION['err_msg'] = "Blog not found";
	header('location: '.APP_URL.'/dashboard.php');
	exit;
}

// if blog found
if($result && mysqli_num_rows($result) > 0){
	$blog = mysqli_fetch_assoc($result);
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
	<link rel="stylesheet" href="./theme/assets/js/jqte/jquery-te-1.4.0.css">
	<noscript>
		<link rel="stylesheet" href="<?= APP_URL ?>/theme/assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload">
	<?php include './includes/header.php'; ?>

	<header class="major">
		<h1>Create Blog</h1>
	</header>
	<form action="" method="post">
		<table>
			<tr>
				<td><input type="text" name="title" id="" placeholder="Title" value="<?=$blog['title']?>"></td>
			</tr>
			<tr>
				<td>
					<textarea name="content" id="" cols="30" rows="10" placeholder="Blog content"><?=$blog['content']?></textarea>
				</td>
			</tr>
			<tr>
				<td><button type="submit" name="btnSaveBlog">Save</button></td>
			</tr>
		</table>
	</form>

	<?php include './includes/footer.php'; ?>
	<script src="./theme/assets/js/jqte/jquery-te-1.4.0.min.js"></script>
	<script>
		$('textarea').jqte();
	</script>
</body>

</html>