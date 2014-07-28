<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - Profile';
$this->breadcrumbs = array(
    'Profile',
);
$cs = Yii::app()->getClientScript();

$cs->registerCoreScript('jquery.ui');
$cs->registerCssFile($cs->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css');

$email = $plus->people->get('me')->emails[0]->value;
//var_dump($eventsCurrent);
//var_dump($eventsPast);
?>

<h1>Profile</h1>
<h5>Logged in as <?php echo $email; ?></h5>

<div class="accordion">
    <h3><a href="#">Number of events</a></h3>
    <div><?php echo 'Current: '.count($eventsCurrent->items).' / Past: '.count($eventsPast->items) ?></div>
</div>    
<div class="accordion">
    <h3><a href="#">Second</a></h3>
    <div>Phasellus mattis tincidunt nibh.</div>
</div>         
<div class="accordion">
    <h3><a href="#">Third</a></h3>
    <div>Nam dui erat, auctor a, dignissim quis.</div>
</div>
<script type="text/javascript">
    $(".accordion").accordion({collapsible: true, active: false});
</script>