<?php
session_start();
requireValidSession();

$date = (new Datetime())->getTimestamp();
$today = strftime('%d %B %Y - week %V/53', $date);
loadTemplateView('day_records', ['today' => $today]);
