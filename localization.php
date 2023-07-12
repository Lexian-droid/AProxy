<?php

// protect from direct access
if (!defined('APO')) {
    exit;
}

// APO Localization
define("APO_TITLE", "Select your Panel");
define("APO_HEADER", "Please make a selection.");
define("APO_STATUS_ONLINE", "Online");
define("APO_STATUS_OFFLINE", "Offline");
define("APO_ABOUT", "You are accessing AProxy successfuly, here are your available websites above. To change text, try Localization.php, to change your links, try config.php. To configure authentication, try auth.php. Thank you!");
define("APO_POWEREDBY", "Powered by");
define("APO_LOGIN_PG", "Please login.");
define("APO_LOGIN_ENTRYBOX", "Password");
define("APO_LOGIN_SUBMIT", "Login");
define("APO_LOGIN_ERROR_PREFIX", "ERROR");
define("APO_LOGIN_DEFAULT", "Something went wrong.");
define("APO_LOGIN_FAILED_PASSWORD", "Incorrect password.");
define("APO_LOGOUT_SUCCESS", "You have been logged out.");
define("APO_LOGOUT_FAILED", "You are not logged in.");
define("APO_LOGOUT_SUBMIT", "Logout");

// To get started:
# Simply edit the localization.php file and add your translations.
# Each line will be defined as APO.<line> where <line> is the title of the text you'd like to translate.
# by default, all lines are already defined. It is recommended that you do not delete any lines,
# unless definitions were deleted prior.

// To translate:
# Simply replace the text and rewrite it in your preferred
# native language. For example, if you wanted to translate
# the title of the page, you would replace "Select your Panel"
# with the translation of your choice.

?>
