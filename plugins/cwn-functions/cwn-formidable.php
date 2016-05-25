<?php 

// Limite les dates disponibles sur un formulaire donné
// Doc: https://formidablepro.com/help-desk/date-range-for-calendar/

add_action('frm_date_field_js', 'cowork_limit_my_date_field');

function cowork_limit_my_date_field($field_id){

  if ($field_id == 'field_event-date5') { //change FIELDKEY to the key of your date field
    
     // echo ',defaultDate:"2016-11-05"'; // ,minDate:0,maxDate:+6
     
     // $eventdate = mktime(5, 11, 2016, 0);
     
     $cdate = mktime( 0, 0, 0, 5, 18, 2016);
     $today = time();
     $difference = $cdate - $today;
     
     if ($difference < 0) { 
     	$difference = 0; 
     }
     
     $daysleft = floor($difference/60/60/24);
     
     // echo "There are ". floor($difference/60/60/24)." days remaining";
     
     
     echo ',minDate:+'.$daysleft.',maxDate:+'. ($daysleft + 4) .'';
     
//     echo ',beforeShowDay: function(date){var day=date.getDay();return [(day != 2 && day != 4)];}';
//     
       
       
  }

}
// 


