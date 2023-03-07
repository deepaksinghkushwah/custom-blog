<?php 
include '../config.php'; 
$sortBy = isset($_GET['sortBy']) ? $_GET['sortBy'] : 'id'; 
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
    <?php include SITE_FS_PATH . '/includes/header.php'; ?>

    <header class="major">
        <h1>Paginaion</h1>
    </header>

    <form method="get" action="" name="searchForm" id="searchForm">
        <table>
            <tr>
                <td width="50%">
                    <input type="text" name="searchString" id="" value="<?=$_GET['searchString'] ?? null;?>" placeholder="Search blogs...">
                </td>
                <td width="20%" style="vertical-align: top;">
                    <select name="sortBy" id="">
                        <optgroup style="color: black;" label="Sort Data Via (Desending Order)">
                            <option <?= $sortBy == 'id' ? 'selected' : ''; ?> value="id">ID</option>
                            <option <?= $sortBy == 'title' ? 'selected' : ''; ?> value="title">Title</option>
                            <option <?= $sortBy == 'created_at' ? 'selected' : ''; ?> value="created_at">Date</option>
                        </optgroup>
                    </select>
                </td>
                <td width="30%" style="vertical-align: top;">
                    <button type="submit" name="btnSearch">Search</button>
                    <button type="button" onclick="javascript:window.location = '<?= APP_URL ?>/for-happy/searching.php'">Reset</button>
                </td>

            </tr>
        </table>
    </form>

    <?php

    // this is actual query which fetch data with limit
    $sql = "SELECT * FROM `blogs` WHERE id > 0 ";

    if (isset($_GET['btnSearch'])) {
        $searchString = trim($_GET['searchString']);
        if ($searchString != '') {
            $sql .= " AND `title` LIKE '%$searchString%' ";
        }
    }
    $sql .= " ORDER BY `$sortBy` DESC ";
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
        <?php } ?>
    <?php  }     ?>
    <?php include SITE_FS_PATH . '/includes/footer.php'; ?>

</body>

</html>