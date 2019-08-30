<?php

/**
 * The logout file
 * destroys the session
 * expires the cookie
 * redirects to login.php
 */
session_start();
if (isset($_SESSION['user_name'])) {
  unset($_SESSION['user_name']);
}
else if (isset($_SESSION['pass'])) {
  unset($_SESSION['pass']);
}
else if (isset($_SESSION['admin_login'])) {
  unset($_SESSION['admin_login']);
}
session_destroy();
setcookie('user_name', '', time() - (10 * 365 * 24 * 60 * 60), "/");

header("location: ../index.php");
?>