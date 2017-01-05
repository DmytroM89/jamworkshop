<?php
/**
 * Шаблон шапки (header.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); // вывод атрибутов языка ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); // кодировка ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php /* RSS и всякое */ ?>
	<link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo('rdf_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="Comments RSS" href="<?php bloginfo('comments_rss2_url'); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php /* Все скрипты и стили теперь подключаются в functions.php */ ?>

	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php wp_head(); // необходимо для работы плагинов и функционала ?>
	
	<!--    Preloader style    -->
    <style type="text/css">
        #preloader_preload {
            display: block;
            position: fixed;
            z-index: 99999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            min-width: 1000px;
            background: #6e244a url(http://hello-site.ru//main/images/preloads/grid.svg) center center no-repeat;
            background-size: 41px;
        }
    </style>
    <!--    End Preloader style    -->
	
</head>
<body <?php body_class('slider-background'); // все классы для body ?> data-spy="scroll" data-target=".navbar-collapse">
    <div id="preloader">
        <div id="preloader_preload"></div>
    </div>
   
    <div id="top"></div>
    <div id="bg_pattern"></div>

    <!----- Backstrech SlideShow ---->
    <div class="backstrech">
    <?php while( have_rows('backstrech') ): the_row();
		$image = get_sub_field('image');
    ?>
       <img class="backImg" src="<?php echo $image['url']; ?>">
    <?php endwhile; ?>
    </div>
    <!----- End of Backstrech SlideShow ---->

    <!-------- ScrollTop Button -------->
    <a href="#" class="scrollToTop hidden-xs hidden-sm">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a>
    <!-------- End of ScrollTop Button -------->

	<header>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
       <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#topnav" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand" id="logo" href="#top">
                <?php $logo = get_field('logo');
                    if( !empty($logo) ): ?>
                   <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
                <?php endif; ?>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="topnav">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#services">Услуги</a></li>
                <li><a href="#ourteam">Наша команда</a></li>
                <li><a href="#feedbacks">Отзывы</a></li>
                <li><a href="#clients">Клиенты</a></li>
                <li><a href="#contacts">Контакты</a></li>
            </ul>
        </div>
        </div>
    </nav>
</header>
