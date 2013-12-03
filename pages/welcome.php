<?php
/**
 * Display a welcome page with instructions about the pending email validation
 */

$user = get_user(get_input('guid'));

$site = elgg_get_site_entity();

$content = elgg_echo('welcome:text', array(
	$user->name,
	$site->name,
	$user->email
));

$params = array(
	'title' => elgg_echo('welcome:title'),
	'content' => $content,
);

$body = elgg_view_layout('content', $params);

echo elgg_view_page(elgg_echo('welcome'), $body);