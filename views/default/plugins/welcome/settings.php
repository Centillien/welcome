<?php
/**
 * Plugin settings
 */

if (elgg_is_admin_logged_in()) {
    elgg_unregister_plugin_hook_handler('validate', 'input', 'htmlawed_filter_tags');
}
$welcome_input = $vars['entity']->welcome_adwords;

echo elgg_echo('welcome:welcome_adwords');
echo '<br>';
echo elgg_view("input/plaintext", array("name" => "params[welcome_adwords]", "value" => $welcome_input, ));
echo '<br>';
