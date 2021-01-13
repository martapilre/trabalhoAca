<?php

//temporary controller


loadModel('WorkingHours');

$wh = WorkingHours::loadFromUserAndDate(1, date('Y-m-d'));
[$t1, $t2, $t3, $t4] = $wh->getTimes();
print_r($t2);
echo '<br>';
print_r($t2);
echo '<br>';
print_r($t3);
echo '<br>';
print_r($t4);
echo '<br>';

//print_r($wh->getExitTime());