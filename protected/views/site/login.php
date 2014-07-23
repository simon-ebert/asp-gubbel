<?php

/* @var $this SiteController */


echo CHtml::link(
        CHtml::image('assets/sign-in-with-google.png'), $this->client->createAuthUrl());
