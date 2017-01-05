<?php
/*
 * Template name: Home
 */
get_header(); // подключаем header.php ?>

<!-------- Title -------->
<section class="title">
    <div class="title-inner">
        <div class="row">
            <div class="col-sm-12">
                <h1>Jam Workshop</h1>
                <h2>Мастерская небывалых праздников</h2> </div>
            <div class="col-sm-12" id="modal_btn"><a href="#myModal" class="modal_btn shutter-in-vertical" role="button" data-toggle="modal">Задай вопрос</a></div>
        </div>
    </div>
</section>
<!-------- End of Title -------->

<!-------- Baner -------->
<?php $images = get_field('baner'); ?>
<?php if($images): ?>
<section class="baner section">
    <div class="container">
        <div class="owl-carousel-baner">
        <?php foreach( $images as $image ): ?>
            <img src="<?php echo $image['url']; ?>" class="img-responsive">
        <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-------- End of Baner -------->

<!-------- Our Services -------->
    <section class="services section" id="services">
        <?php if(get_field('services')): ?>
        <div class="container">
            <div class="section-head">
                <h2>НАШИ УСЛУГИ</h2>
                <div class="separator"></div>
            </div>
            <div class="row our-serv">
               <?php while( have_rows('services') ): the_row();
                    $serviceName = get_sub_field('service_name');
                    $serviceDescribe = get_sub_field('service_describe');
                    $serviceImage = get_sub_field('service_image');
                ?>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="gallery" data-toggle="modal" data-target="#<?php echo $serviceImage['title']; ?>">
                       <div class="galerry_main_wrap_content">
                            <div class="gallery_serv_content_wrap">
                                <div class="gallery_serv_content">
                                    <h2><?php echo $serviceName; ?></h2>
                                    <p>
                                        <?php echo $serviceDescribe; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <img src="<?php echo $serviceImage['url']; ?>" alt="image" class="img-responsive">
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
        <?php endif; ?>
        
        <?php if(get_field('full_holidays')): ?>
        <div class="container">
           <div class="section-head">
                <h3>ПРАЗДНИКИ «ПОД КЛЮЧ»</h3>
                <div class="separator"></div>
            </div>
            <div class="row">
                <?php while( have_rows('full_holidays') ): the_row();
                    $fh_icon = get_sub_field('icon');
                    $fh_name = get_sub_field('name');
                    $fh_description = get_sub_field('description');
                ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="service">
                       <div class="icon">
                           <i class="<?php echo $fh_icon; ?>"></i>
                       </div>
                       <h4><?php echo $fh_name; ?></h4>
                       <p><?php echo $fh_description; ?></p>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
        <?php endif; ?>
    </section>
<!-------- End of Our Services -------->

<!-------- Our Team -------->
    <?php if(get_field('j-men')): ?>
    <section class="ourteam section" id="ourteam">
        <div class="container">
            <div class="section-head">
                <h2>НАША КОМАНДА</h2>
                <div class="separator"></div>
            </div>
            <div class="row">
                <div class="container">
                    <p class="title-text"><?php the_field('ot_describe'); ?>
                    </p>
                </div>
            </div>
            <div class="row we">
                <div class="container">
                    <?php while( have_rows('j-men') ): the_row();
                        $avatar = get_sub_field('avatar');
                        $name = get_sub_field('name');
                        $position = get_sub_field('position');
                        $describes = get_sub_field('describe');
                        $social = get_sub_field('social');
                    ?>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 j-men"> <img src="<?php echo $avatar['url']; ?>" alt="image" class="img-circle image-responsive">
                            <div class="align">
                                <h4><?php echo $name; ?></h4>
                                <span><?php echo $position; ?></span>
                                <?php foreach($social as $soc): ?>
                                    <ul class="social">
                                        <li><a href="<?php echo $soc['vk']; ?>" class="circle" target="_blank"><i class="fa fa-vk"></i></a></li>
                                        <li><a href="<?php echo $soc['fb']; ?>" class="circle" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="<?php echo $soc['insta']; ?>" class="circle" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                <?php endforeach; ?>
                                <hr>
                                <p><?php echo $describes; ?></p>
                            </div>
                                
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-------- End of Our Team -------->
    
    <!-------- Feedbacks -------->
    <?php if(get_field('comments')): ?>
    <section class="feedbacks section" id="feedbacks">
        <div class="container">
            <div class="section-head">
                <h2>ОТЗЫВЫ</h2>
                <div class="separator"></div>
            </div>
        </div>
        <div class="container">
            <div class="owl-carousel">
               <?php while( have_rows('comments') ): the_row();
                    $photo = get_sub_field('photo');
                    $name = get_sub_field('name');
                    $position = get_sub_field('position');
                    $comment = get_sub_field('comment');
                ?>
                <div class="feedback-box">
                    <img src="<?php echo $photo['url']; ?>" alt="image" class="img-circle img-responsive">
                    <p class="name"><?php echo $name; ?></p>
                    <span><?php echo $position; ?></span>
                    <div class="quote">
                        <span class="fa fa-quote-right fa-3x"></span>
                    </div>
                    <p class="comment"><?php echo $comment; ?></p>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-------- End of Feedbacks -------->
    
    <!-------- Clients -------->
    <?php if(get_field('clients')): ?>
    <section class="clients section" id="clients">
        <div class="container">
            <div class="section-head">
                <h2>НАШИ КЛИЕНТЫ</h2>
                <div class="separator"></div>
            </div>
            <div class="owl-carousel-clients">
               <?php while( have_rows('clients') ): the_row();
                    $logo = get_sub_field('logo');
                ?>
                <div class="clients-box img-thumbnail">
                    <img src="<?php echo $logo['url']; ?>" alt="image" class="img-responsive">
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-------- End of Clients -------->
    
     <!------------ Contacts -------------->
     <?php if(get_field('contacts')): ?>
    <section class="section contacts" id="contacts">
        <div class="container">
            <div class="section-head">
                <h2>КОНТАКТЫ</h2>
                <div class="separator"></div>
            </div>
            <div class="row">
                <div class="contacts-box-padding">
                    <div class="container contacts-box">
                        <div class="row r1">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="contact-info">
                                    <i class="fa fa-phone fa-3"></i>
                                    <?php while( have_rows('contacts') ): the_row();
                                        $phones = get_sub_field('phones');
                                        $name = get_sub_field('name');
                                        $email = get_sub_field('email');
                                    
                                        foreach($phones as $number):
                                    ?>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tel"><?php echo $number['number']; ?></div>
                                        <? endforeach; ?>
                                    <div class="separator"></div>
                                    <p><?php echo $name; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row r2">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="contact-info">
                                    <i class="fa fa-envelope-o"></i> <?php echo $email; ?>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <div class="connect">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h4>ПРИСОЕДИНЯЙТЕСЬ К НАМ</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <ul class="socicon">
                    <?php while( have_rows('contacts') ): the_row();
                        $social = get_sub_field('social');
                        
                        foreach($social as $soc):
                    ?>
                        <li><a href="<?php echo $soc['vk']; ?>" class="circle" target="_blank"><i class="fa fa-vk"></i></a></li>
                        <li><a href="<?php echo $soc['fb']; ?>" class="circle" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="<?php echo $soc['insta']; ?>" class="circle" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        
                    <?php
                        endforeach;
                        endwhile;
                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!---------- End of Contacts -------->

<section>
	<div class="container">
		<div class="row">
			<div class="<?php content_class_by_sidebar(); // функция подставит класс в зависимости от того есть ли сайдбар, лежит в functions.php ?>">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <?php // контэйнер с классами и id ?>
						<?php the_content(); // контент ?>
					</article>
				<?php endwhile; // конец цикла ?>
			</div>
			<?php get_sidebar(); // подключаем sidebar.php ?>
		</div>
	</div>
</section>
<?php get_footer(); // подключаем footer.php ?>
