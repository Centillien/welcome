<?php
/**
 * Elgg welcome plugin display welcome page with
 * instructions about the pending email validation
 *
 * @author Gerard Kanters
 * @author Wouter van Os
 * @author Juho Jaakkola
 *
 * @website https://www.centillien.com
 *
 * @copyright Centillien 2016
 */

if (elgg_get_user_validation_status($user->guid) == true) {
    register_error(elgg_echo('notallowed'));
    forward('/');
}

$user = get_user(get_input('guid'));
$site = elgg_get_site_entity();

$email = trim($user->email);

if(!checkEmail($email)) {
$content = elgg_echo('welcome:wrongemail', array(
        $user->name,
        $site->name,
        $user->email
));
}else{ 
$content = elgg_echo('welcome:text', array(
        $user->name,
        $site->name,
        $user->email
));
}

// Create button to be able to change email
elgg_register_title_button();

$count = (int)$user->getPrivateSetting('welcome_email_count');
$user->setPrivateSetting('welcome_email_count', $count + 1);

if ($count <= 1 || !$emailCheck) {
    // Set access status to perform needed operation
    $hidden_status = access_get_show_hidden_status();
    access_show_hidden_entities(true);

    $url = elgg_get_site_url() . 'ajax/view/welcome/change_email/?user_guid=' . $user->guid . '&user_name=' . $user->username;

    elgg_register_menu_item('title', [
        'name' => 'changeemail',
        'href' => $url,
        'text' => elgg_echo('welcome:changeemail'),
        'contexts' => [
            'welcome',
            'welcome-social'
        ],
        'class' => 'elgg-button elgg-lightbox',
    ]);

    if (checkEmail($email)) {
        $content .= elgg_echo('welcome:changeemailtext');
    }

    access_show_hidden_entities($hidden_status);
} else {
    if (elgg_is_active_plugin('contact')) {
        $content = elgg_echo('welcome:changeemailcontact');
    }
}

if (elgg_is_active_plugin('fbnotify')) {
    if (checkEmail($email)) {
        $content .= elgg_view('fbnotify/link');
    }
}

$params = array(
    'title' => elgg_echo('welcome:title'),
    'content' => $content,
    'filter_override' => '',
);

$body = elgg_view_layout('content', $params);

echo elgg_view_page(elgg_echo('welcome'), $body);
