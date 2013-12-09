<?php
/**
 * Display a welcome page with instructions about the pending email validation
 */
if (elgg_get_user_validation_status($user->guid) == true) {
  register_error(elgg_echo('notallowed'));
  forward('/');
}
$user = get_user(get_input('guid'));

$site = elgg_get_site_entity();


$content = elgg_echo('welcome:text', array(
	$user->name,
	$site->name,
	$user->email
));

// Create button to be able to change email
if (elgg_is_active_plugin('unvalidatedemailchange')) {
$hidden_status = access_get_show_hidden_status();
access_show_hidden_entities(true);
$url = elgg_get_site_url() . 'ajax/view/welcome/change_email/?user_guid='. $user->guid .'&user_name='. $user->username;
elgg_register_menu_item('title', array(
        'name' => 'changeemail',
        'href' => $url,
        'text' => elgg_echo('welcome:changeemail'),
        'contexts' => array("welcome","welcome-social"),
        'class' => 'elgg-button elgg-lightbox',
));
$content .= elgg_echo('welcome:changeemailtext');
access_show_hidden_entities($hidden_status);
}



$params = array(
	'title' => elgg_echo('welcome:title'),
	'content' => $content,
);


$body = elgg_view_layout('content', $params);


echo elgg_view_page(elgg_echo('welcome'), $body);
