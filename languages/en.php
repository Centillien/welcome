<?php
/**
 * Elgg welcome plugin en language
 *
 * @author Gerard Kanters
 * @author Wouter van Os
 * @author Juho Jaakkola
 *
 * @website https://www.elgg.com
 *
 * @copyright Elgg 2016
 */

$english = array(
        'welcome' => 'Welcome',
        'welcome:title' => 'You are almost there!',
        'welcome:text' => '<p>Welcome %s, you have successfully registered to %s.</p>
<p>Before you can sign in you must activate your account. We have sent you an activation link to the address <strong>%s</strong>. Please check your inbox and click on the link to finish your registration.<p>
<p>If you do not see the email, be sure to check also your spam folder.</p>',
	'welcome:wrongemail' =>  '<p>Welcome %s, your registration on %s could not be completed. </p> A check on internet of <strong>%s</strong> returns an error. You can correct change your email address using the button on top. ', 
        'welcome:changeemail' => 'Change email',
        'welcome:changeemailtext' => '<p>If you accidentally entered the wrong email addres, change it using the button. This can only be done <strong>once</strong></p>',
        'welcome:changeemailcontact' => '<p>If you think we made a mistake, use the <a href="/mod/contact">contact</a> form</p>',
        'welcome:no_user_guid_provided' => 'User-GUID not provided.',
        'welcome:user_email_changed_to' => 'Email address of user %s changed to %s.',
        'welcome:email_address_invalid' => 'Provided email address %s is invalid.',
        'welcome:user_email_not_changed' => 'Email address of user %s could not be changed',
        'welcome:new_user_email' => 'Enter the new email address for %s: ',
        'welcome:change_email' => 'Change email',
	'welcome:welcome_adwords'  => 'If you are using adwords to measure conversion, provide the snippet below and it will be placed in the welcome page, <br><strong>Disable HTMLAWED first </strong>',

);

add_translation('en', $english);

