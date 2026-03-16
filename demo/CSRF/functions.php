<?php
/**
 * Wrapper around session_start that redirects based on login state
 * Sends headers and exits on first access or failure
 */
function require_unlogined_session()
{
  // Start session
  @session_start();
  // Redirect to /index.php when already logged in
  if (isset($_SESSION['username'])) {
      header('Location: ./index.php');
      exit;
  }
}
function require_logined_session()
{
  // Start session
  @session_start();
  // Redirect to /login.php when not logged in
  if (!isset($_SESSION['username'])) {
      header('Location: ./login.php');
      exit;
  }
}

/**
 * Generate CSRF token
 *
 * @return string Token
 */
function generate_token()
{
  // Generate hash from session ID
  return hash('sha256', session_id());
}

/**
 * Validate CSRF token
 *
 * @param string $token
 * @return bool Validation result
 */
function validate_token($token)
{
  // Verify submitted $token matches locally generated hash
  return $token === generate_token();
}

/**
 * Wrapper around htmlspecialchars
 *
 * @param string $str
 * @return string
 */
function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
