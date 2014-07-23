<?php

/* @var $this SiteController */


echo CHtml::link(
        CHtml::image('assets/sign-in-with-google.png', 'Google Login', array('width' => 300)), $this->client->createAuthUrl());
