<?php

// check if it is a string
function getDateAsDateTime($date){
    return is_string($date) ? new DateTime($date) : $date;
}

// check if is weekend, >= 6 
function isWeekend($date){
    $inputDate = getDateAsDateTime($date);
    return $inputDate->format('N') >= 6;
}

// check if date 1 is bigger than date 2
function isBefore($date1, $date2){
    $inputDate1 = getDateAsDateTime($date1);
    $inputDate2 = getDateAsDateTime($date2);
    return $inputDate1 <= $inputDate2;
}

// get next day
function getNextDay($date){
    $inputDate = getDateAsDateTime($date);
    $inputDate->modify('+1 day');
    return $inputDate;
}