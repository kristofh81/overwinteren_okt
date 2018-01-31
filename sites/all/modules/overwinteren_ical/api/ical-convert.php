<?php
require_once '../src/ICal/ICal.php';

use ICal\ICal;

try {
    if (isset($_GET['url'])) {
        $url = $_GET['url'];
    }

    $ical = new ICal( (string) $url, array(
        //'defaultSpan'           => 2,     // Default value
        'defaultTimeZone'       => 'CET',
        //'defaultWeekStart'      => 'MO',  // Default value
        //'skipRecurrence'        => false, // Default value
        //'useTimeZoneWithRRules' => false, // Default value
    ));

    $events = $ical->eventsFromInterval('1 year');
    //$ical->initUrl('https://www.homeaway.co.uk/icalendar/e70002185f5040829e53f0f87e3e5682.ics');
    //
    
    // all reserved days
    $alleventDays = [];
    foreach ($events as $i => $event) {

        $dtStart = substr($event->dtstart, 0, 8);
        $dtEnd = substr($event->dtend, 0, 8);

        $begin =  DateTime::createFromFormat( 'Ymd', $dtStart );
        $end =  DateTime::createFromFormat( 'Ymd', $dtEnd )->add(new DateInterval('P1D'));


        $interval = DateInterval::createFromDateString('1 day');

        $period = new DatePeriod($begin, $interval, $end);

        foreach ( $period as $dt ) {
          $alleventDays[] = $dt->format( "Y-m-d" );
        }

        /*
        foreach ( $alleventDays as $j => $day ) {
          $output[$j]["title"] = "";
          $output[$j]["description"] = "";
          $output[$j]["datetime"]["y"] = substr($day, 0, 4);
          $output[$j]["datetime"]["m"] = substr($day, 5, 2);
          $output[$j]["datetime"]["d"] = substr($day, 8, 2);
        }
        */
    }

    // send json array of dates
    print json_encode($alleventDays);

} catch (\Exception $e) {
    die($e);
}

?>