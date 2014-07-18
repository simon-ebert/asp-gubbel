<?php
/* @var $this SiteController */
/* @var $model EventForm */
/* @var $form CActiveForm  */

Yii::app()->clientScript->registerCoreScript('jquery.ui');
Yii::app()->clientScript->registerCssFile(Yii::app()->clientScript->getCoreScriptUrl().'/jui/css/base/jquery-ui.css');

$this->pageTitle = Yii::app()->name . ' - Events';
$this->breadcrumbs = array(
    'Events',
);

try {
    if (!isset(Yii::app()->session['auth_token'])) {
        $this->client->authenticate();
        Yii::app()->session['auth_token'] = $this->client->getAccessToken();
    } else {
        $this->client->setAccessToken(Yii::app()->session['auth_token']);
        $calList = $this->service->getService('Calendar')->calendarList->listCalendarList();

        foreach ($calList->items as $item) {
            if ($item->summary == 'Gubbel') {
                $id = $item->id;
                break;
            }
        }

        if (isset($id)) {
            $events = $this->service->getService('Calendar')->events->listEvents($id);
            $i = 1
            ?>

        <h1>Events</h1>
        
        <?php if (count($events->getItems())>0) { ?>
        
        <div id="accordion">
  <h3>Section 1</h3>
  <div>
    <p>
    Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
    ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
    amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
    odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
    </p>
  </div>
  <h3>Section 2</h3>
  <div>
    <p>
    Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
    purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
    velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
    suscipit faucibus urna.
    </p>
  </div>
  <h3>Section 3</h3>
  <div>
    <p>
    Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
    Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
    ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
    lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
    </p>
    <ul>
      <li>List item one</li>
      <li>List item two</li>
      <li>List item three</li>
    </ul>
  </div>
  <h3>Section 4</h3>
  <div>
    <p>
    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
    et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
    faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
    mauris vel est.
    </p>
    <p>
    Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
    inceptos himenaeos.
    </p>
  </div>
</div>
       
<script>
  $(function() {
    $( "#accordion" ).accordion();
  });
  </script>
        
            <table>
                <tr>
                    <td>#</td>
                    <td>Summary</td>
                    <td>Date</td>
                    <td>Starttime</td>
                    <td>Endtime</td>
                    <td>Location</td>
                    <td>Description</td>
                    <td>Attendees</td>
                    <td>Update</td>
                </tr>
                <?php foreach ($events->getItems() as $event) {
                    /* var_dump($event); */ ?>
                
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $event->summary; ?></td>
                        <td><?php echo $event->start->dateTime; ?></td>
                        <td><?php echo $event->start->dateTime; ?></td>
                        <td><?php echo $event->end->dateTime; ?></td>
                        <td><?php echo $event->location; ?></td>
                        <td><?php echo $event->description; ?></td>
                        <td><?php
                            if (count($event->attendees) > 0) {
                                foreach ($event->attendees as $attendee) {
                                    echo $attendee->email . ' (' . $attendee->responseStatus . ')<br/>';
                                }
                            }
                            ?></td>
                        <td><a href="#">Update</a></td>
                    </tr>
            <?php } ?>
            </table>
            <?php
        }else{
            echo '<p>There are currently no events</p>';
        }
        }
        // We're not done yet. Remember to update the cached access token.
        // Remember to replace $_SESSION with a real database or memcached.
        Yii::app()->session['auth_token'] = $this->client->getAccessToken();
    }
} catch (Exception $exc) {
    //Becarefull because the Exception you catch may not be from invalid token
    Yii::app()->session['auth_token'] = null;
    throw $exc;
}
?>
