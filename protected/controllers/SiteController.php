<?php

class SiteController extends Controller {

    public $client;
    public $service;
    public $date;

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        return $this->actionProfile();
    }

    /**
     * Displays the profile page
     */
    public function actionProfile() {
        $this->service = Yii::app()->JGoogleAPI;
        $this->client = Yii::app()->JGoogleAPI->getClient();

        $plus = $this->service->getService('Plus');
        $calendar = $this->service->getService('Calendar');

        if (null !== Yii::app()->request->getQuery('code')) {
            $this->client->authenticate(Yii::app()->request->getQuery('code'));
            Yii::app()->session['auth_token'] = $this->client->getAccessToken();
            $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
            header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
        }

        if (!isset(Yii::app()->session['auth_token'])) {
            return $this->actionLogin();
        }

        $this->client->setAccessToken(Yii::app()->session['auth_token']);

//        // Calendar
        $calList = $calendar->calendarList->listCalendarList();

        foreach ($calList->items as $item) {
            if ($item->summary == 'Gubbel') {
                $id = $item->id;
                break;
            }
        }

        $limit = date(DateTime::ATOM);

        if (isset($id)) {
            $eventsCurrent = $this->service->getService('Calendar')->events->listEvents($id, array('orderBy' => 'startTime', 'singleEvents' => true, 'timeMin' => $limit));
            $eventsPast = $this->service->getService('Calendar')->events->listEvents($id, array('orderBy' => 'startTime', 'singleEvents' => true, 'timeMax' => $limit));
        }

        $this->render('profile'
        , array('plus' => $plus, 'eventsCurrent' => $eventsCurrent, 'eventsPast' => $eventsPast)
        );
    }

    public function actionEventsCreate() {
        // check if user is logged in
        if (null === Yii::app()->session['auth_token']) {
            return $this->actionProfile();
        }

        // Create an extension Instance
        $this->service = Yii::app()->JGoogleAPI;
        $this->client = Yii::app()->JGoogleAPI->getClient();

        $this->client->setAccessToken(Yii::app()->session['auth_token']);

        // contacts
        $req = new Google_HttpRequest("https://www.google.com/m8/feeds/contacts/default/full");
        $val = $this->client->getIo()->authenticatedRequest($req);
        $xml = new SimpleXMLElement($val->getResponseBody());
        $xml->registerXPathNamespace('gd', 'http://schemas.google.com/g/2005');
        $contacts = $xml->xpath('//gd:email');

        // event model
        $model = new EventForm;
        if (isset($_POST['EventForm'])) {
            $model->attributes = $_POST['EventForm'];
            if ($model->validate()) {

                // look for calendar 'Gubbel'
                $calList = $this->service->getService('Calendar')->calendarList->listCalendarList();
                foreach ($calList->items as $item) {
                    if ($item->summary == 'Gubbel') {
                        $id = $item->id;
                        break;
                    }
                }

                // create calendar 'Gubbel' if necessary
                if (!isset($id)) {
                    $calendar = $this->service->getObject('Calendar', $this->service);
                    $calendar->setLocation('Germany');
                    $calendar->setSummary('Gubbel');
                    $calendar->setTimeZone('Europe/Berlin');

                    $createdCalendar = $this->service->getService('Calendar')->calendars->insert($calendar);

                    $id = $createdCalendar->getId();
                }

                // date and time
                $ymd = explode('-', $model->date);
                $hms1 = explode(':', $model->starttime);
                $hms2 = explode(':', $model->endtime);
                $st = new DateTime;
                $st->setDate($ymd[0], $ymd[1], $ymd[2]);
                $st->setTime($hms1[0], $hms1[1]);
                $et = new DateTime;
                $et->setDate($ymd[0], $ymd[1], $ymd[2]);
                $et->setTime($hms2[0], $hms2[1]);

                // create event
                $event = $this->service->getObject('Event', $this->service);
                $event->setSummary($model->summary);
                $event->setLocation($model->location);
                $start = new Google_EventDateTime();
                $start->setDateTime(date(DateTime::ATOM, $st->getTimestamp()));
                $event->setStart($start);
                $end = new Google_EventDateTime();
                $end->setDateTime(date(DateTime::ATOM, $et->getTimestamp()));
                $event->setEnd($end);
                $event->setDescription($model->description);
                $attendee1 = new Google_EventAttendee();
                $attendee1->setEmail($model->attendee1);
                $attendee2 = new Google_EventAttendee();
                $attendee2->setEmail($model->attendee2);
                $attendee3 = new Google_EventAttendee();
                $attendee3->setEmail($model->attendee3);
                $attendee4 = new Google_EventAttendee();
                $attendee4->setEmail($model->attendee4);
// ...
                $attendees = array($attendee1, $attendee2, $attendee3, $attendee4);
                $event->attendees = $attendees;

                $createdEvent = $this->service->getService('Calendar')->events->insert($id, $event, array("sendNotifications" => true));
                echo $createdEvent->getId();
            }
        }

        $this->render('event'
                , array('model' => $model, 'contacts' => $contacts)
        );
    }

    public function actionEventUpdate() {
        // check if user is logged in
        if (null === Yii::app()->session['auth_token']) {
            return $this->actionProfile();
        }

        $this->render('event'
//                , array('model' => $model)
        );
    }

    public function actionEventsShow() {
        // check if user is logged in
        if (null === Yii::app()->session['auth_token']) {
            return $this->actionProfile();
        }

        $this->service = Yii::app()->JGoogleAPI;
        $this->client = Yii::app()->JGoogleAPI->getClient();

        $this->client->setAccessToken(Yii::app()->session['auth_token']);

        $calList = $this->service->getService('Calendar')->calendarList->listCalendarList();

        foreach ($calList->items as $item) {
            if ($item->summary == 'Gubbel') {
                $id = $item->id;
                break;
            }
        }

        $show = Yii::app()->request->getQuery('show');
        if ($show == 'current') {
            $time = 'timeMin';
            $showalt = 'past';
        } else {
            $time = 'timeMax';
            $showalt = 'current';
        }
        $limit = date(DateTime::ATOM);

        if (isset($id)) {
            $events = $this->service->getService('Calendar')->events->listEvents($id, array('orderBy' => 'startTime', 'singleEvents' => true, $time => $limit));
        }

        $this->render('events', array('events' => $events, 'show' => $show, 'showAlt' => $showalt));
    }

    public function actionFaq() {
        // check if user is logged in
        if (null === Yii::app()->session['auth_token']) {
            return $this->actionProfile();
        }

        $this->service = Yii::app()->JGoogleAPI;
        $this->client = Yii::app()->JGoogleAPI->getClient();
        $this->client->setAccessToken(Yii::app()->session['auth_token']);

        $this->render('faq');
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionGoogleLogin() {
        $identity = new GUserIdentity('test', 'test');
        $identity->authenticate();
        if ($identity->errorCode === GUserIdentity::ERROR_NONE) {
            Yii::app()->user->login($identity, $duration = 0);
            $this->redirect('/');
        } else {
            $this->redirect('/site/login');
        }
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $this->layout = 'none';
        $this->render('login');
    }

    public function actionTest() {
        echo '<pre>';
        echo "is_file('gs://yii-assets/dir/file.txt');";
        var_dump(is_file('gs://yii-assets/dir/file.txt'));

        echo "is_dir('gs://yii-assets/dir');";
        var_dump(is_dir('gs://yii-assets/dir'));

        echo "is_file('gs://yii-assets/nodir/nofile.txt');";
        var_dump(is_file('gs://yii-assets/nodir/nofile.txt'));

        echo "is_dir('gs://yii-assets/nodir');";
        var_dump(is_dir('gs://yii-assets/nodir'));

        echo "filemtime('gs://yii-assets/dir/file.txt');";
        var_dump(filemtime('gs://yii-assets/dir/file.txt'));
        echo '</pre>';
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

}
