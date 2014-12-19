<?php



/*
 * Blackout some dates from the calendar
 * https://formidablepro.com/knowledgebase/frm_date_field_js/
 * The numbers must be between 0 and 6 where 0 is Sunday and 6 is Saturday.
*/

add_action('frm_date_field_js', 'limit_my_date_field');
function limit_my_date_field($field_id){

	$cowork15_affected_fields = array("field_event-date", "field_event-date2");  //change FIELDKEY to the key of your date field
	
  if ( ( in_array( $field_id, $cowork15_affected_fields ) ) ) {
    echo ',beforeShowDay: function(date){var day=date.getDay();return [(day != 0 && day != 6)];}';
  } else {
      echo ',beforeShowDay: null';
  }
}


?>