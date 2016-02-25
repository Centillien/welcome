<?php
/**
 * Elgg welcome plugin change user email action
 *
 * @author Gerard Kanters
 * @author Wouter van Os
 * @author Juho Jaakkola
 *
 * @website https://www.centillien.com
 *
 * @copyright Centillien 2016
 */

if (elgg_get_user_validation_status($user->guid) == false) {
    register_error(elgg_echo('notallowed'));
    return;
}

action_gatekeeper('change_user_email');

// Set access status to perform needed operation
$access_status = access_get_show_hidden_status();
access_show_hidden_entities(true);

// Get user guid
$user_guid = (int) get_input('user_guid');
$new_email = get_input('new_email');

// Check if user guid is provided
if (!empty($user_guid) && !empty($new_email)) {
    $user = get_entity($user_guid);

    // Check if user exists
    if (elgg_instanceof($user, 'user')) {

        // Check if provided email address is valid
        if (validate_email_address($new_email)) {
            elgg_set_ignore_access(true);
            elgg_override_permissions(true);

            // Change user email
            $user->email = $new_email;
            $user->save();

            system_message(elgg_echo('welcome:user_email_changed_to', array($user->name, $new_email)));

            uservalidationbyemail_request_validation($user->guid);
        } else {
            register_error(elgg_echo('welcome:email_address_invalid', array($new_email)));
        }
    } else {
        register_error(elgg_echo('welcome:no_user_guid_provided'));
    }
} else {
    register_error(elgg_echo('welcome:no_user_guid_provided'));
}

access_show_hidden_entities($access_status);

forward($_SERVER['HTTP_REFERER']);

