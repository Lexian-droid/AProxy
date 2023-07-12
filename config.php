<?php

// protect from direct access
if (!defined('APO')) {
    exit;
}

// define master url
define("MASTER_URL", "https://example.com");

// define site name
define("SITE_NAME", "Website Picker");

// Copyright
define("COPYRIGHT", "Myself");

// Authorization (Password)
define("AUTH_ENABLED", false);
define("AUTH_PASSWORD", array(
    "Change Me!",
));

// define the options array
define("OPTIONS", array(
        [
            'url' => 'https://example.com',
            'title' => 'My Awesome Website',
            'description' => "This is my awesome website!"
        ],
        [
            'url' => 'https://example.com',
            'title' => 'Control Panel',
            'description' => "My control panel!"
        ],
    )
);

// Form ID's
define("FORM_LOGIN", "EgprZi8HjU");
define("FORM_LOGOUT", "FSTNcqr1SH");

// Credits
define("CREDITS", "AProxy Online");

// Include Localization
require_once(ROOT_DIR . "/localization.php");

// Include Auth
require_once(ROOT_DIR . "/auth.php");

?>