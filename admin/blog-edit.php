<?php
include '../config.php';
isAuthorizedAdmin();

// if form is posted for blog update
if (isset($_POST['btnSaveBlog'])) {
	$title = $_POST['title'];
	$id = $_GET['id'];
	$content = $_POST['content'];
	updateBlog($conn, $id, $title, $content, $_SESSION['user']['id']);
}

$result = mysqli_query($conn, "SELECT * FROM `blogs` WHERE id = '" . mysqli_real_escape_string($conn, $_GET['id']) . "'");

// if blog not found
if (!$result) {
	$_SESSION['err_msg'] = "Blog not found";
	header('location: ' . APP_URL . '/dashboard.php');
	exit;
}

// if blog found
if ($result && mysqli_num_rows($result) > 0) {
	$blog = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="<?=APP_URL?>/theme/assets/js/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<style>

	</style>
	<link href="./css/dashboard.css" rel="stylesheet">
	<link rel="stylesheet" href="../theme/assets/js/jqte/jquery-te-1.4.0.css">
</head>

<body>
	<?php include './includes/header.php'; ?>
	<div class="container-fluid">
		<div class="row">
			<?php include './includes/left.php'; ?>

			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2">Dashboard</h1>
					<div class="btn-toolbar mb-2 mb-md-0">
						<!--<div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar align-text-bottom" aria-hidden="true">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            This week
                        </button>-->
					</div>
				</div>
				<div class="table-responsive">
					<?php include './includes/message.php'; ?>
					<form action="" method="post">
						<table>
							<tr>
								<td><input type="text" class="form-control" name="title" id="" placeholder="Title" value="<?= $blog['title'] ?>"></td>
							</tr>
							<tr>
								<td>
									<textarea name="content" id="" cols="30" rows="10" placeholder="Blog content"><?= $blog['content'] ?></textarea>
								</td>
							</tr>
							<tr>
								<td><button class="btn btn-primary" type="submit" name="btnSaveBlog">Save</button></td>
							</tr>
						</table>
					</form>
				</div>
			</main>
		</div>
	</div>
	<script src="../theme/assets/js/jqte/jquery-te-1.4.0.min.js"></script>
	<script>
		$('textarea').jqte();
	</script>
</body>

</html>