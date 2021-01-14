<?php

// check if it is a string
function getDateAsDateTime($date) {
    return is_string($date) ? new DateTime($date) : $date;
}

// check if is weekend, >= 6 
function isWeekend($date) {
    $inputDate = getDateAsDateTime($date);
    return $inputDate->format('N') >= 6;
}

// check if date 1 is bigger than date 2
function isBefore($date1, $date2) {
    $inputDate1 = getDateAsDateTime($date1);
    $inputDate2 = getDateAsDateTime($date2);
    return $inputDate1 <= $inputDate2;
}

// get next day
function getNextDay($date) {
    $inputDate = getDateAsDateTime($date);
    $inputDate->modify('+1 day');
    return $inputDate;
}

// sum intervals
function sumIntervals($interval1, $interval2) {
    $date = new DateTime('00:00:00');
    $date->add($interval1);
    $date->add($interval2);
    return (new DateTime('00:00:00'))->diff($date);
}

// subtract intervals
function subtractIntervals($interval1, $interval2) {
    $date = new DateTime('00:00:00');
    $date->add($interval1);
    $date->sub($interval2);
    return (new DateTime('00:00:00'))->diff($date);
}

function getDateFromInterval($interval) {
    return new DateTimeImmutable($interval->format('%H:%i:%s'));
}

function getDateFromString($str) {
    return DateTimeImmutable::createFromFormat('H:i:s', $str);
}


function getFirstDayOfMonth($date){
    $time = getDateAsDateTime($date)->getTimestamp();
    return date('Y-m-1', $time);
}

//to get last day of month for calculate
function getLastDayOfMonth($date){
    $time = getDateAsDateTime($date)->getTimestamp();
    return date('Y-m-t', $time);
}

function getSecondsFromDateInterval($interval){
    $d1 = new DateTimeImmutable;
    $d2 = $d1->add($interval);
    return $d2->getTimestamp() - $d1->getTimestamp();

}