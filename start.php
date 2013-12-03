<?php
/**
 * Elgg welcome plugin
 *
 * @author Gerard Kanters
 * @copyright Centillien 2013
 */

elgg_register_event_handler('init', 'system', 'welcome_init');

/**
 * Initialize the plugin
 */
function welcome_init() {
	elgg_register_page_handler('welcome', 'welcome_page_handler');
	elgg_register_plugin_hook_handler("forward", "system", "welcome_forward_hook");
}

/**
 * Directs user to welcome page after successful registration
 *
 * @param string $hook_name 'forward'
 * @param string $type		'system'
 * @param string $return	 The url that user is being forwarded to
 * @param array  $params	 Hook parameters
 * @return string $forward_url The new forward url
 */
function welcome_forward_hook($hook_name, $type, $return, $params) {
	$register_url = elgg_get_site_url() . 'action/register';

	if (elgg_get_config('https_login')) {
		$register_url = str_replace("http:", "https:", $register_url);
	}

	if (current_page_url() == $register_url) {
		$forward_url = "/welcome?email={$email}&name={$name}";
	}

	return $forward_url;
}

/**
 * Handle requests to /welcome/
 *
 * @param array $page Page segments
 * @return boolean
 */
function welcome_page_handler($page) {
	$base = elgg_get_plugins_path() . 'welcome/pages/';

	switch ($page[0]) {
		default:
			include $base . '/welcome.php';
			break;
	}

	return true;
}
