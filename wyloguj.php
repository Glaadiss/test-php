<?php session_start();
if(!$_SESSION['nick'])
{
header('Location: zaloguj.php');
exit;
}
session_unset($_SESSION['nick']);
header('Location: zaloguj.php');
exit;
?>