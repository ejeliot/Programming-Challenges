<?php
    /* 
        This script returns the number of and listing of months that have 5 full weekends between 1900 and 2100.
        It also returns the number of years that don't have 5 full weekends in any month.
        
        Coded to solve "Five weekends" challenge at http://rosettacode.org/wiki/Five_weekends
        
        Copyright: Ed Eliot, 2012, License: FreeBSD
    */
    date_default_timezone_set('UTC');
    
    $fwMonths = array();
    $fwYears = array();
    
    for ($year = 1900; $year <= 2100; $year++) {
        foreach (array(1, 3, 5, 7, 8, 10, 12) as $month) {
            $ts = strtotime("$year/$month/31");
            if (date('l', $ts) == 'Sunday') {
                $fwMonths[] = date("F Y", $ts);
                if (!in_array($year, $fwYears)) {
                    $fwYears[] = $year;
                }
            }
        }
    }
    
    printf(
        "Months with 5 weekends are:\n%s\n".
        "Number of 5 weeks months between 1900 and 2100 is %d\n".
        "Number of years between 1900 and 2100 with no five weekend months is %d\n", 
        implode("\n", $fwMonths),
        count($fwMonths),
        count(array_diff(range(1900, 2100), $fwYears))
    );
?>