<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header">
        <a href="index.php" class="logo"><strong>Forty</strong> <span>by HTML5 UP</span></a>
        <nav>
            <a href="#menu">Menu</a>
        </nav>
    </header>

    <!-- Menu -->
    <nav id="menu">
        <ul class="links">
            <li><a href="index.php">Home</a></li>

        </ul>
        <ul class="actions stacked">

            <?php if (isAdmin()) { ?>
                <li><a href="<?= APP_URL ?>/admin/index.php" class="button fit">Admin Panel</a></li>
            <?php } ?>

            <?php if (checkLogin()) { ?>
                <!-- user is logged in -->
                <li><a href="<?= APP_URL ?>/dashboard.php" class="button fit">Dashboard</a></li>
                <li><a href="<?= APP_URL ?>/logout.php" class="button fit">Logout</a></li>
            <?php } else { ?>
                <!-- user is not logged in -->
                <li><a href="<?= APP_URL ?>/login.php" class="button fit">Log In</a></li>
                <li><a href="<?= APP_URL ?>/register.php" class="button fit">Register</a></li>
            <?php } ?>

        </ul>
    </nav>

    <!-- Main -->
    <div id="main" class="alt">

        <!-- One -->
        <section id="one">
            <div class="inner">
                <?php include SITE_FS_PATH.'/includes/message.php'; ?>