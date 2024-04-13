<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo bloginfo('name'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="<?php echo esc_url(get_theme_file_uri('assets/images/favicon.png')); ?>">

    <?php wp_head(); ?>
</head>

<body>
    <header id="ohmorilab__site-header"
        class='fixed w-full py-4 px-4 sm:px-10 bg-transparent font-[sans-serif] min-h-[70px] transition-colors duration-300 z-50'>
        <div class='flex justify-between items-center gap-5 relative'>
            <div class='flex items-center mx-4'>
                <h1 class='px-4'><?php bloginfo( 'name' ); ?>のロゴ</h1>
                <?php wp_nav_menu( array(
                'menu'  => 'main', 
                'theme_location' => 'header-menu', 
                'menu_class' => 'text-white lg:!flex lg:space-x-5 max-lg:space-y-2 max-lg:hidden max-lg:py-4 max-lg:w-full px-4',
                'walker'  => new Custom_Walker_Main_Menu 
            )); ?>
            </div>
            <div class='flex lg:ml-auto'>
                <button
                    class='px-4 py-2 text-sm rounded-full font-bold text-primary border-2 border-[#007bff] bg-[#007bff] transition-all ease-in-out duration-300 hover:bg-transparent hover:text-[#007bff]'>Login</button>
                <button id="toggle" class='lg:hidden ml-7'>
                    <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
    </header>