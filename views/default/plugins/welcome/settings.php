<?php
/**
 * Plugin settings
 */
$welcome_input = $vars['entity']->welcome_adwords;

echo elgg_echo('welcome:welcome_adwords');
echo '<br>';
echo elgg_view("input/plaintext", array("name" => "params[welcome_adwords]", "value" => $welcome_input, ));
echo '<br>';
