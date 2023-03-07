<?php include '../config.php';?>
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
	<link rel="stylesheet" href="<?=APP_URL?>/theme/assets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="<?=APP_URL?>/theme/assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload">
	<?php include SITE_FS_PATH.'/includes/header.php'; ?>

	<header class="major">
		<h1>Paginaion</h1>
	</header>

	<?php
	// pagination start, first find total rows to calculate pagination pages
	$paginationSql = "SELECT count(*) FROM `blogs` WHERE id > 0 ";
	
	$paginationResult = mysqli_query($conn, $paginationSql);
	$recordCount = mysqli_fetch_column($paginationResult);
	$pagination = new yidas\data\Pagination(['totalCount' => $recordCount, 'perPage' => 5]);

	// this is actual query which fetch data with limit
	$sql = "SELECT * FROM `blogs` WHERE id > 0  LIMIT {$pagination->offset}, {$pagination->limit} ";	
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	?>
		<?php while ($row = mysqli_fetch_assoc($result)) { ?>
			<div class="blogRow">
				<div class="">
					<div class="blogTitle">
						<a href="<?= APP_URL . '/blog-detail.php?id=' . $row['id'] ?>">
							<?= $row['title'] ?>
						</a>
					</div>
					<div class="blogAddDate"><?= date('d M Y', strtotime($row['created_at'])) ?></div>
				</div>
			</div>
		<?php
		}
		// last is patination widget to display links
		echo \yidas\widgets\Pagination::widget([
			'pagination' => $pagination,
		]);
		?>

	<?php
	}
	?>
	<?php include SITE_FS_PATH.'/includes/footer.php'; ?>

</body>

</html>