<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Arany Muffin Kft.</title>
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT?>css/main_style.css">
        <?php if($viewData['style']) echo '<link rel="stylesheet" type="text/css" href="'.$viewData['style'].'">
'; ?>
        <script src="<?php echo SITE_ROOT?>js/jquery.min.js"></script>
        <script src="<?php echo SITE_ROOT?>js/main.js"></script>
    </head>
    <body>
        <header>
            <div id="user"><em><?= $_SESSION['userlastname']." ".$_SESSION['userfirstname'] ?></em></div>
            <h1 class="header">Arany Muffin Kft.</h1>
        </header>
        <nav>
            <?php echo Menu::getMenu($viewData['selectedItems']); ?>
        </nav>
        <aside>
            <p><img src="<?php echo SITE_ROOT?>images/muffin.jpg" alt="Arany Muffin Kft." style="width: 100%; height: auto; " /></p>
        </aside>
        <section>
            <?php if($viewData['render']) include($viewData['render']); ?>
        </section>
        <footer>&copy; Arany Muffin Kft. - <?= date("Y") ?></footer>
    </body>
</html>
