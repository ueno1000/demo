<?php
require_once __DIR__ . '/functions.php';
require_logined_session();

// Validate CSRF token
if (!validate_token(filter_input(INPUT_GET, 'token'))) {
    // "400 Bad Request"
    header('Content-Type: text/plain; charset=UTF-8', true, 400);
    exit('Invalid token');
}

// Delete session cookie
setcookie(session_name(), '', 1);
// Delete session file
session_destroy();
// Redirect to /login.php after logout
header('Location: ./login.php');
?>
