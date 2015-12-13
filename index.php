<?php session_start();
if(!$_SESSION['nick']){
header('Location: zaloguj.php');
exit;
}
?>
<!DOCTYPE html>
<html>
			<head>
				<title></title>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			</head>
			
			<body>
				<button ><a href="wyloguj.php"> WYLOGUJ  </a></button>

				<h1> Sprawdzian </h1>
             	
      
				<form method="post" action="wyniki.php">
                   <?php 
					$fp = fopen("pytania.txt", "r");
					$plik = implode(file('pytania.txt'));
					$tablica = explode('+', $plik);
					$n = count($tablica);
					$licznik = 0;
					$n2=1;
					for($j = 0; $j < $n/5; $j++)
					{
					?>
					<div>
						 <p> <?php echo $tablica[$licznik];?></p>
						 <input type="hidden" name="<?php echo 'p'.$n2; ?>"
                          value="0" checked>

						 <input type="radio" name="<?php echo 'p'.$n2; ?>"
                          value="A" >
						 <?php echo $tablica[$licznik+1];?>
						 <br>
						 <input type="radio" name="<?php echo 'p'.$n2; ?>"
                          value="B">
                         <?php echo $tablica[$licznik+2];?>
						 <br>
						 <input type="radio" name="<?php echo 'p'.$n2; ?>" 
                         value="C">
                         <?php echo $tablica[$licznik+3];?>
						 <br>
						 <input type="radio" name="<?php echo 'p'.$n2; ?>" 
                         value="D">
                         <?php echo $tablica[$licznik+4];?>
					</div>
					<?php 
					$licznik= $licznik + 5;
					$n2=$n2+1;
					} ?>
                    
                    <div>
                    <br>
                    <input type="submit" value="KONIEC TESTU">
                    </div>
				</form>
			</body>
</html>



