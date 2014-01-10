<!DOCTYPE html>
<html>
    <head>
        <title>
        <?php if(is_home())
        		echo bloginfo('blogname');
			  else
			  	echo get_the_title().' | '.get_bloginfo('blogname'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="<?php echo get_template_directory_uri() ?>/Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo get_template_directory_uri(); ?>/css/component.css" rel="stylesheet" media="screen">
        <link href="<?php echo get_stylesheet_directory_uri() ?>/style.css" rel="stylesheet" media="screen">
		<script src="<?php echo get_template_directory_uri() ?>/js/prefixfree.min"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5shiv.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/respond.min.js"></script>
<![endif]-->
        <?php wp_head(); ?>
    </head>
    <body>
        <header>
        </header>