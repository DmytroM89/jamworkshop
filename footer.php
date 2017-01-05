<?php
/**
 * Шаблон подвала (footer.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
?>

    <div class="sign-in">
        <div class="wrap-main-sign-in">
            <div class="wrap-sign-in"><a href="http://jamworkshop.com.ua/wp-login.php"><i class="fa fa-sign-in" aria-hidden="true"></i></a></div>
        </div>
    </div>
    
	<!---------- Footer ----------->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 copyright">© Jam Workshop | 2016</div>
            </div>
        </div>
    </footer>
    <!---------- End of Footer ----------->
    
    
	
	 <!-- Modal -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
<!--                    <button class="close" type="button" data-dismiss="modal">×</button>-->
                    <h4 class="modal-title">Напишите нам и наш менеджер свяжется с Вами.</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" id="form">
                       <div class="col-3 input-effect">
                           <input class="effect-16" type="text" required="required" placeholder="Ваше имя" name="name" id="name" autocomplete="off">
                           <span class="focus-border"></span>
                           <span class="pencil"></span>
                       </div>
                       <div class="col-3 input-effect">
                           <input class="effect-16" type="text" required="required" placeholder="Номер телефона" name="phone" id="phone" autocomplete="off">
                           <span class="focus-border"></span>
                           <span class="pencil"></span>
                       </div>
                       <div class="col-3 input-effect">
                           <input class="effect-16" type="text" required="required" placeholder="E-Mail" name="email" id="email" autocomplete="off">
                           <span class="focus-border"></span>
                           <span class="pencil"></span>
                       </div>
                       <div class="col-3 input-effect" style="height: 100px">
                           <textarea class="effect-7" type="text" cols="30" rows="5" name="message"></textarea>
                           <span class="focus-border"><i></i></span>
                       </div>
                       
                    </form>
                </div>
                <div class="modal-footer">
                    <a class="btn shutter-in-vertical submit">ОТПРАВИТЬ</a>
                </div>
            </div>
            <div class="myalert fade"></div>
        </div>
    </div>
    <!-- End of Modal -->
    
    <!-- Alert Modal -->
	<div id="alertModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
<!--                    <button class="close" type="button" data-dismiss="modal">×</button>-->
                    <h4 class="modal-title">Сообщение!</h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn shutter-in-vertical alert_close" data-dismiss="modal">ЗАКРЫТЬ</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Alert Modal -->
    
    <!-------------------------- Modal Gallery ---------------------------->
    <!-- Gallery Private Parties -->
    <div class="modal fade" id="private_parties" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
            <!--<h2 class="modal-title">Свадьбы</h2>-->
        </div>
        <div class="modal-dialog modal-lg">
            <div class="container-fluid modal-body">
                <div class="gallery-parties">
                    <div class="row">
                    <?php $images = get_field('holiday_gallery'); ?>
                    <?php if($images): ?>
                        <?php foreach( $images as $image ): ?>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs">
                            <a href="<?php echo $image['url']; ?>" title=""><img src="<?php echo $image['sizes']['big-thumb']; ?>" class="img-responsive"></a>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Gallery Private Parties -->
    
    <!-- Gallery Corporate -->
    <div class="modal fade" id="corporate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
            <!--<h2 class="modal-title">Свадьбы</h2>-->
        </div>
        <div class="modal-dialog modal-lg">
            <div class="container-fluid modal-body">
                <div class="gallery-corporate">
                    <div class="row">
                    <?php $images = get_field('corporate_gallery'); ?>
                    <?php if($images): ?>
                        <?php foreach( $images as $image ): ?>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs">
                            <a href="<?php echo $image['url']; ?>" title=""><img src="<?php echo $image['sizes']['big-thumb']; ?>" class="img-responsive"></a>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Gallery Corporate -->

    <!-- Gallery Decor -->
    <div class="modal fade" id="decor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
            <!--<h2 class="modal-title">Свадьбы</h2>-->
        </div>
        <div class="modal-dialog modal-lg">
            <div class="container-fluid modal-body">
                <div class="decor">
                    <div class="row">
                    <?php $images = get_field('decor_gallery'); ?>
                    <?php if($images): ?>
                        <?php foreach( $images as $image ): ?>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs">
                            <a href="<?php echo $image['url']; ?>" title=""><img src="<?php echo $image['sizes']['big-thumb']; ?>" class="img-responsive"></a>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Gallery Decor -->
    <!-------------------------- End of the Modal Gallery ---------------------------->
    
<?php wp_footer(); // необходимо для работы плагинов и функционала  ?>
</body>
</html>
