<?php
/* @var $this SiteController */
/* @var $model EventForm */
/* @var $form CActiveForm  */

$cs = Yii::app()->getClientScript();

$cs->registerCoreScript('jquery.ui');
$cs->registerCssFile($cs->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css');

$this->pageTitle = Yii::app()->name . ' - Event';
?>

<div id="head">
    <h1 class="inline"><?php echo (($update == true) ? 'Update' : 'Create') . ' event'; ?></h1>
    <span class = "right">
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
        <?php echo $form->textField($model, 'summary', array('size' => 40/* , 'value' => 'nur zum testen' */)); ?>
        <?php echo $form->error($model, 'summary'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'date'); ?>
        <?php echo $form->dateField($model, 'date'/* , array('value' => '2014-07-31') */); ?>
        <?php echo $form->error($model, 'date'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'starttime'); ?>
        <?php echo $form->timeField($model, 'starttime'/* , array('value' => '08:00') */); ?>
        <?php echo $form->error($model, 'starttime'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'endtime'); ?>
        <?php echo $form->timeField($model, 'endtime'/* , array('value' => '18:00') */); ?>
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
    <?php CHtml::hiddenField('update', $update); ?>
    <div class="row buttons">
        <?php
        if ($update) {
            echo CHtml::hiddenField('calendarId', $calendarId);
            echo CHtml::hiddenField('eventId', $eventId);
        }
        ?>
        <?php echo CHtml::submitButton((($update == true) ? 'Update' : 'Create') . ' event'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->

<script>
    $(function() {
        var availableTags = [
<?php echo $contacts; ?>
        ];
        $("#EventForm_attendee1, #EventForm_attendee2, #EventForm_attendee3, #EventForm_attendee4").autocomplete({
            source: availableTags
        });
    });
</script>