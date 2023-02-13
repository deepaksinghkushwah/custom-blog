<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header">
        <a href="index.html" class="logo"><strong>Forty</strong> <span>by HTML5 UP</span></a>
        <nav>
            <a href="#menu">Menu</a>
        </nav>
    </header>

    <!-- Menu -->
    <nav id="menu">
        <ul class="links">
            <li><a href="index.html">Home</a></li>
            <li><a href="landing.html">Landing</a></li>
            <li><a href="generic.html">Generic</a></li>
            <li><a href="elements.html">Elements</a></li>
        </ul>
        <ul class="actions stacked">
            <li><a href="#" class="button primary fit">Get Started</a></li>
            <?php if (checkLogin()) { ?>
                <!-- user is logged in -->
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
                <?php include './includes/message.php';?>