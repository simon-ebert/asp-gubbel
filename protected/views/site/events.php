<?php
/* @var $this SiteController */
/* @var $model EventForm */
/* @var $form CActiveForm  */

$basePath = Yii::app()->basePath;

$cs = Yii::app()->getClientScript();

//$cs->registerCssFile('http://code.jquery.com/mobile/1.4.3/jquery.mobile-1.4.3.min.css');
//$cs->registerScriptFile('http://code.jquery.com/mobile/1.4.3/jquery.mobile-1.4.3.min.js');

$cs->registerCoreScript('jquery.ui');
$cs->registerCssFile($cs->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css');

$this->pageTitle = Yii::app()->name . ' - Events';
$this->breadcrumbs = array(
    'Events',
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
    $calList = $jgoogleapi->getService('Calendar')->calendarList->listCalendarList();

    foreach ($calList->items as $item) {
        if ($item->summary == 'Gubbel') {
            $id = $item->id;
            break;
        }
    }

    if (isset($id)) {
        $events = $jgoogleapi->getService('Calendar')->events->listEvents($id);
        $i = 1;
        ?>

        <h1>Events</h1>

        <div id="accordion">
            <?php
            if (count($events->getItems()) > 0) {
                foreach ($events->getItems() as $event) {
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
    }
    // We're not done yet. Remember to update the cached access token.
    // Remember to replace $_SESSION with a real database or memcached.
    Yii::app()->session['auth_token'] = $client->getAccessToken();
}
