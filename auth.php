<?php

// Functions
# Function to check if user is logged in
function user_logged_in() {
    if ($_SESSION["logged_in"] == true) {
        return true;
    } else {
        return false;
    }
}

# Function that displays the Logout button
function logout_button() {
    echo "<form action='index.php' method='post'>";
    echo "<input type='hidden' name='action' value='" . FORM_LOGOUT . "'>";
    echo "<input type='submit' name='submit' value='" . APO_LOGOUT_SUBMIT . "'>";
    echo "</form>";
}

# Function to check if password is correct
function check_password($password) {
    foreach (AUTH_PASSWORD as $pass) {
        if (password_verify($password, password_hash($pass, PASSWORD_DEFAULT))) {
            return true;
        }
    }
    return false;
}

# Function that displays the login prompt
function login_prompt($failed = true, $msg = null) {
    echo "<div class='login-prompt'>";
    echo "<h1>" . SITE_NAME . "</h1>";
    if($msg == null || $msg == "" || empty($msg)) {
        $msg = APO_LOGIN_DEFAULT;
    }
    if ($failed && $msg != null) {
        echo "<p class='error'>" . APO_LOGIN_ERROR_PREFIX . ": $msg</p>";
    }
    echo "<p>" . APO_LOGIN_PG .".</p>";
    echo "<form action='index.php' method='post'>";
    echo "<input type='hidden' name='action' value='" . FORM_LOGIN . "'>";
    echo "<input type='password' name='password' placeholder='".APO_LOGIN_ENTRYBOX."' required>";
    echo "<input type='submit' name='submit' value='". APO_LOGIN_SUBMIT . "'>";
    echo "</form>";
    echo "</div>";
}

?>
<?php

// protect from direct access
if (!defined('APO')) {
    exit;
}

// When Auth Enabled
if (AUTH_ENABLED) {
    // Start Session
    session_start();

    // Check if user is logging in
    if (isset($_POST["action"]) && $_POST["action"] == FORM_LOGIN) {
        if (check_password($_POST["password"])) {
            $_SESSION["logged_in"] = true;
            header("Location: /");
        } else {
            exit(login_prompt(true, APO_LOGIN_FAILED_PASSWORD));
        }
    }

    // Check if logged in
    if(!user_logged_in()) {
        exit(login_prompt());
    }

    // Check if user is logging out
    if (isset($_POST["action"]) && $_POST["action"] == FORM_LOGOUT) {
        session_destroy();
        exit(login_prompt(true, APO_LOGOUT_SUCCESS));
    }
}

?>