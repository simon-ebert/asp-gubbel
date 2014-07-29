<?php
/* @var $this SiteController */
/* @var $model EventForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Event';
?>

<div id="head">
    <h1 class="inline">Create event</h1>
    <span class="right">
        <?php
        echo CHtml::submitButton('Back', array('id' => 'showEvents', 'submit' => Yii::app()->createUrl('site/eventsShow')));
        ?>
    </span>
</div>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'event-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'summary'); ?>
        <?php echo $form->textField($model, 'summary', array('size' => 40)); ?>
        <?php echo $form->error($model, 'summary'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'date'); ?>
        <?php echo $form->dateField($model, 'date'); ?>
        <?php echo $form->error($model, 'date'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'starttime'); ?>
        <?php echo $form->timeField($model, 'starttime'); ?>
        <?php echo $form->error($model, 'starttime'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'endtime'); ?>
        <?php echo $form->timeField($model, 'endtime'); ?>
        <?php echo $form->error($model, 'endtime'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'location'); ?>
        <?php echo $form->textField($model, 'location', array('size' => 40)); ?>
        <?php echo $form->error($model, 'location'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo $form->textarea($model, 'description', array('cols' => 40, 'rows' => 5)); ?>
        <?php echo $form->error($model, 'description'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'attendees'); ?>
        <?php echo $form->emailField($model, 'attendee1'); ?>
        <?php echo $form->error($model, 'attendee1'); ?>
    </div>
    <div class="row">
        <?php echo $form->emailField($model, 'attendee2'); ?>
        <?php echo $form->error($model, 'attendee2'); ?>
    </div>
    <div class="row">
        <?php echo $form->emailField($model, 'attendee3'); ?>
        <?php echo $form->error($model, 'attendee3'); ?>
    </div>
    <div class="row">
        <?php echo $form->emailField($model, 'attendee4'); ?>
        <?php echo $form->error($model, 'attendee4'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Create event'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
