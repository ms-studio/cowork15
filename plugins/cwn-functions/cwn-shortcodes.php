<?php 

function cowork_tomorrow_shortcode() {
  // return 'tomorrow';
  // format wanted: mm/dd/YYYY 12/03/2015
  $tomorrow = mktime( 0, 0, 0, date("m"), date("d")+1, date("Y") );
  $tomorrow = date( 'm/d/Y', $tomorrow );
  // $datetime = new DateTime('tomorrow');
  // return $datetime->format('m/d/Y');
  return $tomorrow;
}
add_shortcode( 'tomorrow', 'cowork_tomorrow_shortcode' );

