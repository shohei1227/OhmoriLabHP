<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo bloginfo('name'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link rel="icon" href="<?php echo esc_url(get_theme_file_uri('assets/images/favicon.png')); ?>">

    <?php wp_head(); ?>
</head>

<body>
    <header id="header" class="wrapper">
        <h1 class="site-title">
            <a href="<?php echo esc_url(home_url()); ?>">
                <?php bloginfo('name'); ?>
            </a>
        </h1>

        <nav>
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'header'
                ));
            ?>
        </nav>
        <div class="toggle_btn">
            <span></span>
            <span></span>
        </div>

        <div id="mask"></div>
    </header>