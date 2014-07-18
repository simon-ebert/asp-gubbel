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

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <div class="container" id="page">

            <div id="header">
                <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
            </div><!-- header -->

            <div id="mainmenu">
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'items' => array(
                        array('label' => 'Profile', 'url' => array('/site/profile')),
                        array('label' => 'Event', 'url' => array('/site/createevent')),
                        array('label' => 'Events', 'url' => array('/site/showevents')),
                    ),
                ));
                ?>
            </div><!-- mainmenu -->

            <?php echo $content; ?>

            <div class="clear"></div>

            <div data-role="footer" data-position="fixed">
                <div data-role="navbar" data-position="fixed">
                    <ul>
                        <li><a href="#" class="ui-btn-active">Profile</a></li>
                        <li><a href="#">Events</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div><!-- /navbar -->
            </div>
        </div><!-- page -->

    </body>
</html>
