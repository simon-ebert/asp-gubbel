<?php
/* @var $this SiteController */
/* @var $events Events */

$basePath = Yii::app()->basePath;

$cs = Yii::app()->getClientScript();

$cs->registerCoreScript('jquery.ui');
$cs->registerCssFile($cs->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css');

$this->pageTitle = Yii::app()->name . ' - Events';
?>

<div>
    <h1 class="inline"><?php echo ucfirst($show) . ' '; ?>Events </h1>
    <?php echo CHtml::link(' (' . (($show == 'current') ? 'past' : 'current') . ') ', array('site/eventsshow', 'show' => $showAlt)); ?>
    <span class="right">
        <?php
        echo CHtml::submitButton('Create event', array('submit' => Yii::app()->createUrl('site/eventsCreate')));
        ?>
    </span>

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

            <h3><?php echo $event->summary; ?>
                <span class="right"><?php echo $dateStart->format('M d, Y'); ?></span>
            </h3>
            <div>
                <p>
                    <?php echo $event->description; ?>
                </p>
                <p>
                    Location: <?php echo $event->location; ?>
                </p>
                <p>
                    Time: <?php echo $dateStart->format('g:i A') . ' - ' . $dateEnd->format('g:i A'); ?>
                </p>
                Attendees:
                <ul>
                    <?php
                    if (count($event->attendees) > 0) {
                        foreach ($event->attendees as $attendee) {
                            echo '<li>' . $attendee->email . ' (' . $attendee->responseStatus . ')</li>';
                        }
                    }
                    ?>
                </ul>
            </div>

        <?php } ?>

    </div>
    <script>
        $(function() {
            $("#accordion").accordion();
        });
    </script>

    <?php
} else {
    echo '<p>There are currently no events</p>';
}
// We're not done yet. Remember to update the cached access token.
// Remember to replace $_SESSION with a real database or memcached.
Yii::app()->session['auth_token'] = $this->client->getAccessToken();

