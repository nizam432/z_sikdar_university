<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Weather {
    var $source;
    var $x;
    var $parser;
    var $stack;
    var $index;
    
    public function weather($code = 24, $location="Norwich")
     {
    $x = new xml();

    $source = file_get_contents("http://newsrss.bbc.co.uk/weather/forecast/" . $code . "/ObservationsRSS.xml");
    if (!$x->fetch($source)) {
        // The class has a 'log' property that contains a log of events. This log is useful for testing and debugging.
        // Remove the <h2> once going live to prevent visible errors.
        // echo "<h2>There was a problem parsing your XML!</h2>";
        echo $x->log;
        exit();
    }
    foreach ($x->data->RSS[0]->CHANNEL[0]->ITEM as $item) {	

        if (preg_match("/cloud/", $item->TITLE[0]->_text)) {
            // cloudy
            $weather = '<h6 id=weather>Weather in '. $location . ' today: <img src="images/weather_icons/cloudy.gif" alt="cloudy" width=31 height=31></h6>';
        
        } elseif (preg_match("/sunny intervals/", $item->TITLE[0]->_text)) {
            // sunny intervals
            $weather = '<h6 id=weather>Weather in '. $location . ' today: <img src="images/weather_icons/sunny-intervals.gif" alt="sunny intervals" width=31 height=31></h6>';

        } elseif (preg_match("/sunny/", $item->TITLE[0]->_text)) {
            // sunny
            $weather = '<h6 id=weather>Weather in '. $location . ' today: <img src="images/weather_icons/sunny.gif" alt="sunny" width=31 height=31></h6>';
        
        } elseif (preg_match("/mist/", $item->TITLE[0]->_text)) {
            // mist
            $weather = '<h6 id=weather>Weather in '. $location . ' today: <img src="images/weather_icons/rain.gif" alt="mist" width=31 height=31></h6>';

        } elseif (preg_match("/drizzle/", $item->TITLE[0]->_text)) {
            // drizzle
            $weather = '<h6 id=weather>Weather in '. $location . ' today: <img src="images/weather_icons/rain.gif" alt="drizzle" width=31 height=31></h6>';
        
        } elseif (preg_match("/light rain/", $item->TITLE[0]->_text)) {
            // light rain
            $weather = '<h6 id=weather>Weather in '. $location . ' today: <img src="images/weather_icons/rain.gif" alt="light rain" width=31 height=31></h6>';
        
        } elseif (preg_match("/heavy rain/", $item->TITLE[0]->_text)) {
            // heavy rain
            $weather = '<h6 id=weather>Weather in '. $location . ' today: <img src="images/weather_icons/rain.gif" alt="heavy rain" width=31 height=31></h6>';
        
        } elseif (preg_match("/sleet/", $item->TITLE[0]->_text)) {
            // sleet
            $weather = '<h6 id=weather>Weather in '. $location . ' today: <img src="images/weather_icons/snow.gif" alt="sleet" width=31 height=31></h6>';
        
        } elseif (preg_match("/snow/", $item->TITLE[0]->_text)) {
            // snow
            $weather = '<h6 id=weather>Weather in '. $location . ' today: <img src="images/weather_icons/snow.gif" alt="snow" width=31 height=31></h6>';
        
        } else {
            // $weather = '<h6 id=noweather>Weather feed error</h6>';
            $weather = "cdfff";
        }
    }
    return $weather;
}
}