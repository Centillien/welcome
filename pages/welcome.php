<?php
$site = elgg_get_site_entity();
$site_name = $site->name;

$content = elgg_echo('welcome:title');
$content .= elgg_echo('welcome:text');
$content .= "<strong> $name </strong> on " . $site_name .".<br>";
$content .= elgg_echo('welcome:text_email');
$content .= "<strong> $email</strong>";

$body = elgg_view_layout('one_sidebar', array('content' => $content));

echo elgg_view_page(elgg_echo('welcome'), $body);
