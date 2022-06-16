<?php
	$Guardado=Array();
?>
<html>
<title>Practica No. 7</title>
<body>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<h1><center> Practica No. 7 <br /></center></h1>
	<center> Maquina Turing </center>
	<center>Manual (Max 20) o aleatorio</center>
<form method="post" align="center">
<h4>Ingresa tu cadena iniciando con 0 ó escribe aleatorio<input class="boton" type="search" name="total" MAXLENGTH=20 size="25"><a><input type="submit" class="boton" value="Generar"></a></h4>
</form>
<?php
	$cadena=$_POST['total'];
		function generate_string($length) 
		{
		    $characters = '01';
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		} 
	if($cadena<>"aleatorio")
	{
		$tot=$cadena;
		echo "<center>Maquina de turing manual</center>";
		$c=$d=$b=$a=$i=0;//posicion izquierda a derecha
		$tamaño = strlen($cadena)-1;
		$j=$tamaño;//posicion derecha a izquiersa
		$manual=fopen("manual_maquina_turing.txt","w");
		echo "<center>".$tot."</center>";
		$total=$tamaño*2;
		while($c<=$total)
		{
			$Guardado[$b]=$tot;
			$b++;
			if($tot[$i]=='0')
			{
				$tot[$i]="X";
				echo "<center>0->q0->X</center>";
				$Guardado[$b]="0[".$i."]->q0->X";
				$b++;
				$Guardado[$b]=$tot;
				$i++;
				$b++;
				$c++;
				echo "<center>".$tot."</center>";
			}
			elseif($tot[$j]=='1')
			{
					$tot[$j]="Y";				
					echo "<center>1->q1->Y</center>";
					$Guardado[$b]="1[".$j."]->q1->Y";
					$b++;
					$Guardado[$b]=$tot;
					$j--;
					$b++;
					$c++;
					echo "<center>".$tot."</center>";
			}
			else
			{
				$j--;
				$i++;
				$c++;
			}
		}
		echo "<center>La cadena fue reemplazada correctamente.</center>";
		foreach ($Guardado as $key => $value) 
		{
			fwrite($manual,"[".$key."] ".$value.PHP_EOL);
		}
		fclose($manual);
	}
	else
	{
		$numero=rand(1,10000); //j es la posicion izquierda a derecha
		$tot=generate_string($numero);
		$aleatorio=fopen("aleatorio_maquina_turing.txt","w");
		echo "<center>Maquina de turing aleatoria<br>".$tot."<br></center>";
		$c=$d=$b=$a=$i=0;//posicion izquierda a derecha
		$j=$numero;//posicion derecha a izquiersa
		$total=$numero*2;
		while($c<=$total)
		{
			$Guardado[$b]=$tot;
			$b++;
			if($tot[$i]=='0')
			{
				$tot[$i]="X";
				echo "<center>0->q0->X</center>";
				$Guardado[$b]="0[".$i."]->q0->X";
				$b++;
				$Guardado[$b]=$tot;
				$i++;
				$b++;
				$c++;
				echo "<center>".$tot."</center>";
			}
			elseif($tot[$j]=='1')
			{
					$tot[$j]="Y";				
					echo "<center>1->q1->Y</center>";
					$Guardado[$b]="1[".$j."]->q1->Y";
					$b++;
					$Guardado[$b]=$tot;
					$j--;
					$b++;
					$c++;
					echo "<center>".$tot."</center>";
			}
			else
			{
				$j--;
				$i++;
				$c++;
			}
		}
		echo "<center>La cadena fue reemplazada correctamente.</center>";
		foreach ($Guardado as $key => $value) 
		{
			fwrite($aleatorio,"[".$key."]=".$value.PHP_EOL);
		}
		fclose($aleatorio);
	}
?>
</body>
<footer>
	<table align="center">
		<tr>
			<th>Sanchez Zavala Carlos Enrique</th>
			<th>2CM11</th>
			<th>Teoria Computacional</th>
		</tr>
	</table>
</footer>
</html>