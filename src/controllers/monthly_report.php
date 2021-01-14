<?php
session_start();
requireValidSession();

$currentDate = new DateTime();

$user = $_SESSION['user'];
// get inside Working Hours static method getMonthlyReport for a user and actual
$registries = WorkingHours::getMonthlyReport($user->id, $currentDate);

$report = [];
$workday = 0;
$sumOfWorkedTime = 0;
$lastDay = getLastDayOfMonth($currenntDate)->format('d');

for($day = 1; $day <= $lastDay; $day++){
    $date = $currentDate->format('Y-m').'-'.$day;
    echo $date;
    echo '<br>';
}

//loadTemplateView('monthly_report', ['registries' => $registries]);