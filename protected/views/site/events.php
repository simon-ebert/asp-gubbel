<?php
/* @var $this SiteController */
/* @var $events Events */

$cs = Yii::app()->getClientScript();

$cs->registerCoreScript('jquery.ui');
$cs->registerCssFile($cs->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css');

$this->pageTitle = Yii::app()->name . ' - Events';
?>

<div id="head">
    <h1 class="inline"><?php echo ucfirst($show) . ' '; ?>Events </h1>
    <span class="right">
        <?php
        echo CHtml::submitButton('New', array('id' => 'createEvent', 'submit' => Yii::app()->createUrl('site/eventsCreate')));
        ?>
    </span>
    <h4 class="inline"><?php echo CHtml::link(' (&#8599;' . (($show == 'current') ? 'past' : 'current') . ') ', array('site/eventsshow', 'show' => $showAlt)); ?></h4>
</div>

<div id = "accordion">
    <?php
    $items = $events->getItems();
    if (count($items) > 0) {
        if ($show == 'past') {
            $items = array_reverse($items);
        }
        foreach ($items as $event) {
            $dateStart = new DateTime($event->start->dateTime);
            $dateEnd = new DateTime($event->end->dateTime);
            ?>

            <h3><?php echo $event->summary; ?><br/>
                <?php echo $dateStart->format('M d, Y'); ?></h3>
            <div>
                <p>
                    <?php echo $event->description; ?>
                </p>
                <p>
                    <span class="bold">Location: </span>
                    <?php echo CHtml::link($event->location, "https://www.google.de/maps?q=" . urlencode($event->location)); ?>
                </p>
                <p>
                    <span class="bold">Time: </span><?php echo $dateStart->format('g:i A') . ' - ' . $dateEnd->format('g:i A'); ?>
                </p>
                <span class="bold">Attendees:</span>
                <ul class="attendees">
                    <?php
                    if (count($event->attendees) > 0) {
                        foreach ($event->attendees as $attendee) {
                            switch ($attendee->responseStatus) {
                                case 'accepted':
                                    $status = 'going';
                                    break;
                                case 'needsAction':
                                    $status = 'waiting';
                                    break;
                                case 'declined':
                                    $status = 'declined';
                                    break;
                            }
                            echo '<li class="' . $status . '">' . $attendee->email . ' (' . $status . ')</li>';
                        }
                    }
                    ?>
                </ul>
                <span>
                    <?php
                    echo CHtml::SubmitButton('Edit', array('id' => 'editEvent', 'submit' => '#'));
                    ?>
                </span>
                <span class="right">
                    <?php
                    echo CHtml::ajaxSubmitButton('Delete', array('id' => 'deleteEvent', 'submit' => '#'));
                    ?>
                </span>
            </div>
        <?php } ?>
    </div>
    <script>
        $(function() {
            $("#accordion").accordion({autoHeight: false});
        });
    </script>

    <?php
} else {
    echo '<p>There are currently no events</p>';
}
// We're not done yet. Remember to update the cached access token.
// Remember to replace $_SESSION with a real database or memcached.
Yii::app()->session['auth_token'] = $this->client->getAccessToken();

