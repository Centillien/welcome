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
	if (elgg_is_active_plugin('uservalidationbyemail')){
	elgg_register_plugin_hook_handler('forward', 'system', 'welcome_forward_hook');
	}
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
	$current = current_page_url();

	// Check whether user is being forwarded from the registration action and not already logged in.
	if (strpos($current, 'action/register' === false || elgg_is_logged_in())) {
		return $return;
	}

	$username = get_input('username');

	// User validation by email has disabled the user so we need to
	// explicitly include hidden entities in the database query
	$hidden_status = access_get_show_hidden_status();
	access_show_hidden_entities(true);

	$user = get_user_by_username($username);

	// Set hidden entity status back to normal
	access_show_hidden_entities($hidden_status);

	if (!$user) {
		// User does not exist meaning that registration failed
		return $return;
	}

	// Pass on the user GUID in the url so the welcome page can access the user
	$welcome_url = elgg_normalize_url("welcome/{$user->guid}");

	return $welcome_url;
}

/**
 * Handle requests to /welcome/
 *
 * @param array $page Page segments
 * @return boolean
 */
function welcome_page_handler($page) {
	// User validation by email has disabled the user so we need to
	// explicitly include hidden entities in the database query
	$hidden_status = access_get_show_hidden_status();
	access_show_hidden_entities(true);

	$user = get_user($page[0]);

	// Set hidden entity status back to normal
	access_show_hidden_entities($hidden_status);

	if (!$user) {
		forward();
	}

	set_input('guid', $user->guid);

	$base = elgg_get_plugins_path() . 'welcome/pages/';

	switch ($page[0]) {
		default:
			include $base . '/welcome.php';
			break;
	}

	return true;
}
