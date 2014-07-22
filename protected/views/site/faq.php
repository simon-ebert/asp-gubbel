<?php
/* @var $this SiteController */
/* @var $model EventForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - FAQ';
$this->breadcrumbs = array(
    'FAQ',
);

//Create an extension Instance
$jgoogleapi = Yii::app()->JGoogleAPI;
$client = $jgoogleapi->getClient();

if (!isset(Yii::app()->session['auth_token'])) {
    echo CHtml::link(
            CHtml::image('assets/sign-in-with-google.png'), $client->createAuthUrl());
    Yii::app()->session['auth_token'] = $client->getAccessToken();
} else {
    $client->setAccessToken(Yii::app()->session['auth_token']);

    $cal = $jgoogleapi->getService('Calendar');
    ?>

    <h1>FAQ</h1>

    <p>Please fill out the following form with your event information:</p>

    <?php
    // We're not done yet. Remember to update the cached access token.
    // Remember to replace $_SESSION with a real database or memcached.
    Yii::app()->session['auth_token'] = $client->getAccessToken();
}
