<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <!-- blueprint CSS framework -->
        <?php
//    CVarDumper::dump(Yii::app()->request, 10, true);
//    Yii::app()->request->baseUrl = '';
        ?>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/layout.css" />

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <div class="container" id="page">

            <?php echo $content; ?>

            <div class="clear"></div>

            <div id="footer-navbar">
                <!--                <form>
                                    <div id="radio">
                                        <input type="radio" id="radio1" name="radio" /><label for="radio1" class="footer-button" >Choice 1</label>
                                        <input type="radio" id="radio2" name="radio" checked="checked" /><label for="radio2" class="footer-button" >Choice 2</label>
                                        <input type="radio" id="radio3" name="radio" /><label for="radio3" class="footer-button" >Choice 3</label>
                                    </div>
                                </form>-->
                <?php
                echo CHtml::link(
                        '<div class="footer-button">' . CHtml::image('assets/user_male3-512.png', '', $htmlOptions = array('height' => '50px')) . '</div>', array('site/profile'));
                ?>
                <?php
                echo CHtml::link(
                        '<div class="footer-button">' . CHtml::image('assets/globe-512.png', '', $htmlOptions = array('height' => '50px')) . '</div>', array('site/eventsshow'));
                ?>
                <?php
                echo CHtml::link(
                        '<div class="footer-button">' . CHtml::image('assets/help-512.png', '', $htmlOptions = array('height' => '50px')) . '</div>', array('site/faq'));
                ?>
            </div>
        </div><!-- page -->

        <script>

        </script>

    </body>
</html>
