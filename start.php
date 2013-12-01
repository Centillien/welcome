<?php

/**
 * Elgg welcome plugin
 *
 * @author Gerard Kanters
 * @copyright Centillien 2013
 */

elgg_register_event_handler('init','system','welcome_init');

function welcome_init() {

	elgg_register_page_handler('welcome', 'welcome_page_handler');
	elgg_register_plugin_hook_handler("forward", "system", "welcome_forward_hook");
		
}

 /**
 *
 * Directs user to welcome page
 * @param unknown_type $hook_name
 * @param unknown_type $entity_type
 * @param unknown_type $return_value
 * @param unknown_type $parameters
 * @return string
*/

function welcome_forward_hook($hook_name, $type, $return, $params){

$register_url = elgg_get_site_url() . 'action/register';
if (elgg_get_config('https_login')) {
        $register_url = str_replace("http:", "https:", $register_url);
}
        if(current_page_url() == $register_url) {
                $forward_url = "/welcome?email={$email}&name={$name}";
        }
        return $forward_url;
}

function welcome_page_handler() { 
	elgg_set_context('welcome');

        $base = elgg_get_plugins_path() . 'welcome/pages/';

	switch ($page[0]) {
               default:
                   include $base . '/welcome.php';
               break;
               }
               exit;
	}

?>
