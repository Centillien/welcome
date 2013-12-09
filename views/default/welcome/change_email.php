<?php

/**
 * Welcome plugin
 * (c) Centillien 
 * Website: https://www.centillien.com
 *
 */

$user_guid = $vars['user_guid'];
$username =  $vars['user_name'];
$action =  elgg_add_action_tokens_to_url(elgg_get_site_url() . "action/welcome/change_user_email/?user_guid=$user_guid");

$body = "<div style=\"width:600px;\"><label>".elgg_echo('welcome:new_user_email',array($username))."</label>";
$body .= elgg_view('input/text', array('name' => 'new_email'))."<br><br>";
$body .= elgg_view('input/submit', array('value' => elgg_echo('welcome:change_email'))).'</div>';

echo elgg_view('input/form', array('action' => $action, 'body' => $body));
