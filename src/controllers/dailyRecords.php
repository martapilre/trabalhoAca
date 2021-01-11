<?php
session_start();
requiredValidSession();

loadModel('WorkingHours');

$date = (new DateTime())->getTimestamp();
$today = strftime('%d %B %Y - week %V/53', $date);

$user = $_SESSION['user'];
$records = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-d'));

loadTemplateView('dailyRecords', [
    'today' => $today,
    'records'=> $records
 ]);