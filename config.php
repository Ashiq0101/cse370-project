<?php
session_start(); #Manage user login state consistently.

if (!isset($_SESSION['customer_email'])) {
    $_SESSION['customer_email'] = 'unset';
} else {
    return;
}

?>