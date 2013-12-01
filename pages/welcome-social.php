<?php

$user=elgg_get_logged_in_user_entity();

?>
<head>
<meta http-equiv="refresh" content="4; URL=<?php echo elgg_get_site_url(); ?>profile/<?php echo $user->username;?>/edit" />
</head>
<?php

  $content = "<br>";
  $content .= "<br>";
  $content .= "<h2>Welcome $user->username</h2>";
  $content .= "<br>";
  $content .= "You have succesfull registered as <strong>$user->username</strong> from <strong>$location</strong> . Great that you joined <br><br>";
  $content .= "<br>";
  $content .= "<br>We will now forward you to complete your profile.";

$body = elgg_view_layout('one_sidebar', array('content' => $content));

echo elgg_view_page(elgg_echo('welcome'), $body);
