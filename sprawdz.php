<?php session_start();
$fp = fopen("users.txt", "r");
$dane = fread($fp, filesize("users.txt"));
$nick = $_POST['nick'];
$haslo = $_POST['haslo'];
$pattern = '/'.$nick.'-'.$haslo.'/';
if(preg_match($pattern, $dane))
{
$_SESSION['nick']=$nick;
header('Location: index.php');
exit;
}
else
{
header('Location: zaloguj.php');	
exit;
}
?>

