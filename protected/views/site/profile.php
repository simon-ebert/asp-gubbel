<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - Profile';
$this->breadcrumbs = array(
    'Profile',
);

//Create an extension Instance
$jgoogleapi = Yii::app()->JGoogleAPI;
$client = $jgoogleapi->getClient();

if (null !== Yii::app()->request->getQuery('logout')) {
    unset(Yii::app()->session['auth_token']);
}

if (null !== Yii::app()->request->getQuery('code')) {
    $client->authenticate(Yii::app()->request->getQuery('code'));
    Yii::app()->session['auth_token'] = $client->getAccessToken();
    header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
}

if (null === Yii::app()->session['auth_token']) {
    echo CHtml::link(
            CHtml::image('assets/sign-in-with-google.png'), $client->createAuthUrl());
} else {
    $client->setAccessToken(Yii::app()->session['auth_token']);
    ?>

    <h1>Profile</h1>

    <p>Please fill out the following form with your event information:</p>

    <?php
    // We're not done yet. Remember to update the cached access token.
    // Remember to replace $_SESSION with a real database or memcached.
    Yii::app()->session['auth_token'] = $client->getAccessToken();
}
