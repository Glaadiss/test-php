<?php session_start();
if(!$_SESSION['nick'])
{
header('Location: zaloguj.php');
exit;
}
if($_POST){  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Wyniki</title>
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h2> Twoje odpowiedzi </h2>
<div>
<?php

$text = '';
$odp = array();
$a=1;
while(isset($_POST['p'.$a]))
{
$odp[]= $_POST['p'.$a];
$a++;
}
$suma = file('stats.txt');
$dane = $suma;
$odpp = implode($odp); 
$fp = fopen("odp.txt", "r");
$plik = implode(file('odp.txt'));
fclose($fp);

$nowy = fopen("stats.txt", "w+");
$plikkk = preg_replace('/\s+/', '', $plik);
$n = count($odp);
$punkty = 0 ;
for($i = 0; $i < $n; $i++){ 
if($odpp[$i] == $plikkk[$i])
{
$a = chop($dane[$i]);
$a.='1';
fwrite ($nowy,"$a\n");
$text.= $dane[$i].' \n';


$punkty++;
?>
<p>Zadanie <?php echo $i+1;?>. Twoja odpowiedź: <strong> <?php echo $odpp[$i];?></strong>. Poprawnie !! </p>
<?php
}
else
{
$a = chop($dane[$i]);
$a.='0';
fwrite ($nowy,"$a\n");
$text.= "$dane[$i] \n";

?> 
<p>Zadanie <?php echo $i+1;?>. Twoja odpowiedź: <strong> <?php echo $odpp[$i];?></strong>. Niestety, poprawna odpowiedź to: 
<strong><?php echo $plikkk[$i];?></strong>. </p>
<?php 
}
}





// zapisanie danych
//fputs($nowy, $text);

// zamknięcie pliku
fclose($nowy);

$procent = $punkty / $n * 100;
$procent = substr($procent, 0, 5); 
?>

<hr>
<h3> Odpowiedziałeś poprawnie na <?php echo $punkty; ?> z <?php echo $n; ?> pytań, co daje <?php echo $procent.'%'; ?>. </h3> 
</div>
</body>
</html>

<?php } ?>