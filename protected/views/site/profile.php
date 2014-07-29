<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - Profile';
$this->breadcrumbs = array(
    'Profile',
);
$cs = Yii::app()->getClientScript();

$cs->registerCoreScript('jquery.ui');
$cs->registerCssFile($cs->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css');

$email = $plus->people->get('me')->emails[0]->value;
//var_dump($eventsCurrent);
//var_dump($eventsPast);
?>

<script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/Chart.js-master/Chart.min.js"></script>

<div id="head">
    <h1>Profile</h1>
    <h5>Logged in as <?php echo $email; ?></h5>
</div>

<div class="accordion">
    <h3><a href="#">Number of events</a></h3>
    <div><canvas id="myChart" height="300" width="300"></canvas></div>
</div>    
<div class="accordion">
    <h3><a href="#">Success rate</a></h3>
    <div><canvas id="myChart2" height="300" width="300"></canvas></div> 
</div>         
<div class="accordion">
    <h3><a href="#">Earned money in 1,000 $</a></h3>
    <div><canvas id="myChart3" height="300" width="300"></div>
</div>


<script type="text/javascript">
    $(".accordion").accordion({collapsible: true, active: true, autoHeight: false});

    var ctx = $("#myChart").get(0).getContext("2d");
    new Chart(ctx).Bar({
        labels: ["Past Events", "Current Events"],
        datasets: [
            {
                label: "Events",
                fillColor: "rgba(59,89,152,0.5)",
                strokeColor: "rgba(59,89,152,0.8)",
                highlightFill: "rgba(59,89,152,0.75)",
                highlightStroke: "rgba(59,89,152,1)",
                data: [<?php echo count($eventsPast->items) . ', ' . count($eventsCurrent->items); ?>]
            }
        ]
    }, {});

    var ctx2 = $("#myChart2").get(0).getContext("2d");
    new Chart(ctx2).Pie([
        {
            value: 25,
            color: "red",
            highlight: "red",
            label: "No purchase"
        },
        {
            value: 5,
            color: "green",
            highlight: "green",
            label: "Purchase"
        }
    ], {});

    var ctx3 = $("#myChart3").get(0).getContext("2d");
    new Chart(ctx3).Line({
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(59,89,152,0.2)",
                strokeColor: "rgba(59,89,152,1)",
                pointColor: "rgba(59,89,152,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [0, 2, 3.2, 3.3, 3.8, 4.0, 4.3]
            }
        ]
    }, {});

</script>

