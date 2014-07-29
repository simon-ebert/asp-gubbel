<?php
/* @var $this SiteController */
/* @var $model EventForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - FAQ';
$this->breadcrumbs = array(
    'FAQ',
);

$cs = Yii::app()->getClientScript();

$cs->registerCoreScript('jquery.ui');
$cs->registerCssFile($cs->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css');
?>

<div id="head">
    <h1>FAQ</h1>
</div>

<div id = "accordion">
    <h3>Was ist ein Elektrofahrzeug? </h3>
    <div>Ein Elektrofahrzeug ist ein Fahrzeug, welches elektrische Energie benutzt um sich fort zu bewegen.</div>
    <h3>Seit wann gibt es Elektrofahrzeuge?</h3>
    <div>Elektrofahrzeuge gibt es schon länger als Fahrzeuge mit Verbrennungsmotor.  Um die vorletzte Jahrhundertwende fuhren in New York überwiegend elektrisch angetriebene Autos, bevor der Verbrennungsmotor seinen Siegeszug antrat. Der Verbrenner setzte sich durch, da Benzin extrem billig war.</div>
    <h3>Gibt es für Elektro-Autos eine Klimaanlage?</h3>
    <div>Technisch stellt eine Klimaanlage in einem Elektrofahrzeug kein Problem dar, es kommt bei deren Betrieb jedoch zu Einbußen bei der Reichweite.</div>
    <h3>Was ist der Unterschied zwischen Hybrid und Elektrofahrzeugen?</h3>
    <div>Der Unterschied besteht darin, dass Hybridfahrzeuge neben dem Elektromotor noch von einem Verbrennungsmotor angetrieben werden. Elektrofahrzeuge dagegen werden nur von einem Elektromotor angetrieben.</div>
    <h3>Was ist Rekuperation?</h3>
    <div>Rekuperation ist eine Art der Energie-Rückgewinnung. Dabei wird Bewegungs- und Bremsenergie in elektrische Energie umgewandelt und der Akku nachgeladen. Das Ergebnis ist ein Reichweitengewinn.</div>
    <h3>Ist die Reichweite eines Elektrofahrzeuges nicht zu gering?</h3>
    <div>80 - 90% der Bundesbürger fahren im Durchschnitt weniger als 80 km täglich. Die Bedenken sind demnach gegenstandslos und eher psychologischer Natur.  Die meiste Zeit des Tages steht das Fahrzeug – ist also eher ein „Stehzeug“ und kann während dessen geladen werden. Ein Elektrofahrzeug ist somit ideal geeignet als Erstfahrzeug. Zudem wird an Akku-Technologien geforscht, die weit höhere Reichweiten.</div>
    <h3>Welche Reichweite haben Elektroautos?</h3>
    <div>Diese Frage lässt sich nicht pauschal beantworten. Die Reichweite eines Elektroautos hängt von vielen Faktoren ab, wie beispielsweise Fahrzeugtyp, Batterie, Fahrstil, Strecke und Temperatur. Verbrauchen Klimaanlage, Heizung, Licht oder Radio zusätzlich Energie, verringert sich die Reichweite. Umgekehrt kann die Reichweite aber auch vergrößert werden, indem zum Beispiel beim Bremsen Energie zurückgewonnen wird (Rekuperation). Ist ein zusätzlicher kleiner Verbrennungs-Motor (Range Extender) eingebaut, der Strom erzeugen und in die Batterie einspeisen kann, erhöht dies ebenfalls die Reichweite.</div>
    <h3>Was unterscheidet Elektrofahrzeuge im Fahrverhalten von herkömmlichen Fahrzeugen?</h3>
    <div>Zum einen steht - anderes als beim Verbrennungsmotor - das volle Drehmoment über den gesamten Drehzahlbereich zur Verfügung. Außerdem wird kein Getriebe benötigt - das Schalten entfällt. Zudem sind keine Motorengeräusche sondern einzig Fahrgeräusche zu hören.</div>
    <h3>Sind E-Autos, gerade aufgrund ihrer Geräuschlosigkeit, nicht gefährlich im Straßenverkehr?</h3>
    <div>Laut einer Studie des Center of Automotive Research (CAR) der Universität Duisburg-Essen, die sich mit der Geräuschentwicklung von insgesamt fünf E-Autos im Vergleich zu sechs fossil betriebenen Autos auseinandersetzte, wirkt sich die geringe Lärmemission von E-Autos nicht nachteilig aus. Auch für Blinde seien die E-Autos, trotz des leisen Anfahrens nicht gefährlicher als die herkömmlichen Otto-Motor-Autos. Bei konstanter Geschwindigkeit im Stadtverkehr gäbe es keine Unterschiede in der Wahrnehmung durch Fußgänger zwischen den E-Autos und den herkömmlichen Fahrzeugen.</div>
    <h3>Spare ich mit einem Elektroauto Steuern?</h3>
    <div>Elektroautos sind auf 10 Jahre nach der Erstanmeldung von der Kfz-Steuer befreit (gilt für Fahrzeuge, die zwischen 18.05.2011 und 31.12.2015 zugelassen sind).</div>
    <h3>Elektrofahrzeuge sind teurer. Lohnt sich die Anschaffung überhaupt?</h3>
    <div>Der Anschaffungspreis alleine ist im direkten Vergleich höher als bei einem konventionellen Fahrzeug. Wenn man die gesamte Nutzungsdauer eines Elektrofahrzeugs betrachtet, lässt sich der Kostenaspekt allerdings schnell relativieren: lediglich ein Drittel der sonst üblichen Betriebs- und Unterhaltungskosten werden fällig.</div>
    <h3>Wie hoch ist der Wirkungsgrad von Elektrofahrzeugen?</h3>
    <div>Der Wirkungsgrad eines Elektrofahrzeugs liegt bei 85%, während der Wirkungsgrad eines herkömmlichen Fahrzeugs mit Verbrennungsmotor bei ca. 20% liegt. Das bedeutet, dass von 100 Litern Treibstoff gerade mal 20 Liter für die Bewegung des Fahrzeuges genutzt werden. Die restlichen 80 Liter gehen durch Reibung und Wärme verloren.</div>
    <h3>Wo sollen Elektroautos geladen werden?</h3>
    <div>Grundsätzlich ist das Laden von Elektrofahrzeugen anders als das Tanken von konventionellen PKW und LKW. Das Laden findet, da es deutlich länger dauert als ein "flüssiger" Tankvorgang, in der Regel an jenen Orten statt, an denen das Fahrzeug ohnehin längere Zeit steht. Damit also vor allem Zuhause oder am firmeneigenen Parkplatz am Arbeitsplatz.</div>
    <h3>Kann ein Elektroauto an der Steckdose zu Hause aufgetankt werden?</h3>
    <div>Fast alle derzeit verfügbaren E-Autos bieten diese Möglichkeit. Allerdings ist dies nur eine Notlösung. Bei dauerhaftem Laden über das Hausnetz können die Leitungen Schaden nehmen. Für Elektroauto-Besitzer empfiehlt es sich daher, am Hauptstandort des Elektroautos eine Wallbox (Ladebox) zum Laden zu installieren. Diese lädt das Auto wesentlich schneller. Beim Aufladen gilt die Faustregel: pro Stunde können bei 3,7 kW "18 km Reichweite" geladen werden, bei 11 kW 55 km und bei 22 kW 110 km.</div>
    <h3>Wie lange dauert ein Ladevorgang?</h3>
    <div>Das Laden eines E-Fahrzeug-Akkus an einer üblichen Haushaltssteckdose dauert je nach Speicherkapazität zwischen 6 und 10 Stunden. Schnellladefähige Fahrzeuge sind in der Lage, ihre Energiespeicher in 2 bis 4 Stunden aufzuladen. Dafür benötigen sie jedoch höhere Stromstärken als im Haushaltsbereich üblich. Beim Aufladen eines E-Autos gilt die Faustregel: pro Stunde können bei 3,7 kW "18 km Reichweite" geladen werden, bei 11 kW 55 km und bei 22 kW 110 km.</div>
    <h3>Warum werden "Brushless-Motoren" eingesetzt?</h3>
    <div>Diese "bürstenlosen Motoren" sind wartungsfrei, haben keine Verschleißteile, sind sehr effizient und haben eine hohe Lebensdauer.</div>
    <h3>Sind Verbrennungsmotoren nicht viel schneller und kräftiger?</h3>
    <div>Nein, denn Verbrennungsmotoren haben bei gleicher kW-Leistung einen wesentlich schlechteren Wirkungsgrad. Es wird weniger Kraft in Bewegung umgewandelt. Elektromotoren sind wesentlich dynamischer und extremer in der Kraftentfaltung (Drehmoment).</div>
    <h3>Wird die Leistung von Elektromotoren auch in PS gemessen?</h3>
    <div>In der Regel wird die Leistung in Watt (W) bzw. Kilowatt (kW) angegeben, der offiziell anerkannten Einheit für Motorenleistung. Der Mitsubishi I-MiEV hat 47 kW. Das entspricht etwa 64 PS und ist NICHT mit einem Benzin-Auto mit 64 PS vergleichbar, da ein Elektromotor einen wesentlich höheren Wirkungsgrad und mehr Drehmoment hat, somit mehr „Kraft aufs Rad“ bringt.</div>
    <h3>Wie pflege ich Blei-Gel-Akkus am besten?</h3>
    <div>Bei Blei-Gel-Batterien gibt es eine Selbstentladung, daher alle 4 Wochen  nachladen. Den Akku möglichst nie komplett entladen, um einem Verlust der Speicherkapazität vorzubeugen.</div>
    <h3>Wie pflege ich Li-Ion-Akkus am besten?</h3>
    <div>Nach Möglichkeit niemals vollständig entladen. Häufiger zwischendurch nachladen, damit das Batterie-Management-System arbeiten kann. Vor der Einlagerung vollladen und alle 4 Wochen nachladen. Ladungen bei Minus-Graden möglichst vermeiden.</div>
    <h3>Wie aufwändig ist die Wartung des E-Fahrzeuges?</h3>
    <div>Reine Elektrofahrzeuge sind längst nicht so wartungsintensiv wie Verbrenner.  E-Antriebe haben wesentlich weniger bewegliche Teile als Verbrenner, die aus mehreren tausend mechanischen Teilen bestehen. Zudem ist die Lebensdauer eines Elektromotors deutlich größer als die des Fahrzeugs selbst.</div>
    <h3>Ist die Wartung von Elektrofahrzeugen aufwändig?</h3>
    <div>Nein, Elektrofahrzeuge benötigen kaum Wartung. Gegenüber einem Verbrenner entfallen z.B. Ölstandskontrolle, Ölwechsel, Filterwechsel, Getriebeölkontrolle/-wechsel, Zündkerzenwechsel, Vergasereinstellung, Zahnriemenwechsel, ASU usw. ermöglichen werden.</div>
    <h3>Wie funktionieren Hybridantriebe?</h3>
    <div>Von Hybridantrieb spricht man, wenn neben dem herkömmlichen Verbrennungsmotor noch ein Elektromotor ganz oder teilweise mit antreibt. Aber hybrid ist nicht hybrid! Es gibt verschiedenartige Bauweisen und Anwendungen:
        <ul>
            <li><b>Mild Hybrid: </b>Der Mild Hybrid fährt nicht rein elektrisch. Jedoch unterstützt ein Elektromotor den Verbrennungsmotor.</li>
            <li><b>Full Hybrid: </b>Der Full Hybrid kann streckenweise auch rein elektrisch fahren.</li>
            <li><b>Microhybrid: </b>Sogenannte Microhybrids mit Bremsenergierückgewinnung und Start-Stopp-Automatik tragen zwar zur Einsparung von Kraftstoff und Emissionen bei, aber einen Einfluss auf den Vortrieb haben sie nicht. Die gewonnene elektrische Energie fließt lediglich der Bordelektronik zu.</li>
            <li><b>Plug-In Hybrid: </b>Bei dieser Technik wird die Batterie nicht mehr ausschließlich durch den Verbrennungsmotor, sondern auch am Stromnetz aufgeladen. Diese Technologie ermöglicht längere rein elektrische Fahrten und wird daher als Stufe zwischen Full Hybrid und dem reinen Elektrofahrzeug angesehen.</li>
        </ul>
    </div>
</div>

<script>
    $(function() {
        $("#accordion").accordion({autoHeight: false});
    });
</script>