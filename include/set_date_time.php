<?php
function set_date($date){
    $date = explode("-" , $date);
    $month = $date[1];
    if($month == "01"){
        $month = "Jan";
    }
    elseif($month == "02"){
        $month = "Feb";
    }
    elseif($month == "03"){
        $month = "Mar";
    }
    elseif($month == "04"){
        $month = "Apr";
    }
    elseif($month == "05"){
        $month = "May";
    }
    elseif($month == "06"){
        $month = "Jun";
    }
    elseif($month == "07"){
        $month = "Jul";
    }
    elseif($month == "08"){
        $month = "Aug";
    }
    elseif($month == "09"){
        $month = "Sep";
    }
    elseif($month == "10"){
        $month = "Oct";
    }
    elseif($month == "11"){
        $month = "Nov";
    }
    elseif($month == "12"){
        $month = "Dec";
    }
    $day = $date[2];
    $year = $date[0];
    return  $day . ' ' . $month . ' ' . $year;
}
function set_time($time){
    $time = explode(':' , $time);
    return $time[0] . ":" . $time[1];
}
?>