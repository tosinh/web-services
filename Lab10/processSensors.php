<?php

include_once("dbLib.inc");
$xml = simplexml_load_file("data.xml");
if ($xml) {
    foreach ($xml->Monitor->sensorList->sensor as $sensor) {
        echo "<p>" . $sensor->name . "</p>";
        echo "<p>" . $sensor->value . "</p>";
        echo "<p>" . $sensor->status . "</p>";
        recordSensor($sensor->name, $sensor->value, $sensor->status);
    }
}
