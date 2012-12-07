<?php
/**
* Helpers for the template file.
*/
$lanaya->data['footer'] = '<p>&copy; Lanaya by Andreas Thuresson</h1>';


/**
* Print debuginformation from the framework.
*/
function get_debug() {
  $lanaya = CLanaya::Instance(); 
  $html = null;
  if(isset($lanaya->config['debug']['db-num-queries']) && $lanaya->config['debug']['db-num-queries'] && isset($lanaya->db)) {
    $html .= "<p>Database made " . $lanaya->db->GetNumQueries() . " queries.</p>";
  }   
  if(isset($lanaya->config['debug']['db-queries']) && $lanaya->config['debug']['db-queries'] && isset($lanaya->db)) {
    $html .= "<p>Database made the following queries.</p><pre>" . implode('<br/><br/>', $lanaya->db->GetQueries()) . "</pre>";
  }   
  if(isset($lanaya->config['debug']['lanaya']) && $lanaya->config['debug']['lanaya']) {
    $html .= "<hr><h3>Debuginformation</h3><p>The content of CLanaya:</p><pre>" . htmlent(print_r($lanaya, true)) . "</pre>";
  }   
  return $html;
}

/**
* Create a url by prepending the base_url.
*/
function base_url($url) {
  	return CLanaya::Instance()->request->base_url . trim($url, '/');
}

/**
 * Render all views.
 */
function render_views() {
	return CLanaya::Instance()->views->Render();
}

/**
 * Get messages stored in flash-session.
 */
function get_messages_from_session() {
	$messages = CLanaya::Instance()->session->GetMessages();
	$html = null;
	if(!empty($messages)) {
		foreach($messages as $val) {
			$valid = array('info', 'notice', 'success', 'warning', 'error', 'alert');
			$class = (in_array($val['type'], $valid)) ? $val['type'] : 'info';
			$html .= "<div class='$class'>{$val['message']}</div>\n";
		}
	}
	return $html;
}