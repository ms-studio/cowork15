<?php
/*
Plugin Name: Coworking Neuchatel Analytics
Plugin URI: https://coworking-neuchatel.ch
Description: This plugin adds functionality to the Coworking Neuchatel website.
Version: 0.0.1
Author: Manuel Schmalstieg
Author URI: http://ms-studio.net
*/



// Je teste de la publicité sur linkedin et google adwords.
// Pour optimiser le processus d'acquisition de potentiels coworkeurs, 
// pourrais-tu ajouter le tag suivant sur le site web : 

function cowork_analytics_footer(){

?>

<script type="text/javascript">
_linkedin_data_partner_id = "57462";
</script><script type="text/javascript">
(function(){var s = document.getElementsByTagName("script")[0];
var b = document.createElement("script");
b.type = "text/javascript";b.async = true;
b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
s.parentNode.insertBefore(b, s);})();
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://dc.ads.linkedin.com/collect/?pid=57462&fmt=gif" />
</noscript>

<?php } 

add_action('wp_footer', 'cowork_analytics_footer'); ?>