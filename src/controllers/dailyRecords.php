<?php
session_start();
requiredValidSession();

$date = (new DateTime())->getTimestamp();
$today = strftime('%d %B %Y - week %V/53', $date);

loadTemplateView('dailyRecords', ['today' => $today]);