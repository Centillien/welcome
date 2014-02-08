<?php
/**
 * Elgg welcome plugin
 */

$english = array(
        'welcome' => 'Welcome',
        'welcome:title' => 'You are almost there!',
        'welcome:text' => '<p>Welcome %s, you have successfully registered to %s.</p>
<p>Before you can sign in you must activate your account. We have sent you an activation link to the address <strong>%s</strong>. Please check your inbox and click on the link to finish your registration.<p>
<p>If you do not see the email, be sure to check also your spam folder.</p>',
        'welcome:changeemail' => 'Change email',
        'welcome:changeemailtext' => '<p>If you accidentally entered the wrong email addres, change it using the button. This can only be done <strong>once</strong></p>',
        'welcome:changeemailcontact' => '<p>If you still did not get an email, use the <a href="/mod/contact">contact</a> form</p>',
        'welcome:no_user_guid_provided' => 'User-GUID not provided.',
        'welcome:user_email_changed_to' => 'Email address of user %s changed to %s.',
        'welcome:email_address_invalid' => 'Provided email address %s is invalid.',
        'welcome:user_email_not_changed' => 'Email address of user %s could not be changed',
        'welcome:new_user_email' => 'Enter the new email address for %s: ',
        'welcome:change_email' => 'Change email',

);

add_translation('en', $english);

