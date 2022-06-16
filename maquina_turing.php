<?php
	$Guardado=Array(); // Crea el arreglo
?>
<html>
<title>Practica Final</title>
<body>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<h1><center> Practica Final <br /></center></h1>
	<center> Maquina Turing </center>
	<center>Manual (Max 20) o aleatorio</center>
<form method="post" align="center">
<h4>Ingresa tu cadena iniciando con 0 ó escribe aleatorio<input class="boton" type="search" name="total" MAXLENGTH=20 size="25"><a><input type="submit" class="boton" value="Generar"></a></h4>
</form>
<?php
	$cadena=$_POST['total']; //Caja de texto para ingresar la cadena de texto
		function generate_string($length) // Es la funcion la cual crea la cadena de caracteres de ceros y unos
		{
		  $characters = '01'; //Caracteres de la cadena
		  $charactersLength = strlen($characters); //Tamaño de la cadena
		  $randomString = '';
		  for ($i = 0; $i < $length; $i++) {
		       $randomString .= $characters[rand(0, $charactersLength - 1)]; // Crea la cadena aleatorio de los caracteres
		   }
		  return $randomString;
		} 
	if($cadena<>"aleatorio") // Analiza el texto insgresado en el campo de texto
	{
		$tot=$cadena;
		echo "<center>Maquina de turing manual</center>";
		$c=$d=$b=$a=$i=0;// I posicion izquierda a derecha
		$tamaño = strlen($cadena)-1;
		$j=$tamaño;// J posicion derecha a izquiersa
		$manual=fopen("manual_maquina_turing.txt","w"); // Crea el archivo txt o lo sobreescribe el archivo
		echo "<center>".$tot."</center>";
		$total=$tamaño*2; // Control de ciclo
		while($c<=$total)
		{
			$Guardado[$b]=$tot; // Guarda en el arreglo
			$b++; // Posicion del arreglo
			if($tot[$i]=='0') 
			{
				$tot[$i]="X"; // Reemplaza X
				echo "<center>0->q0->X</center>";
				$Guardado[$b]="0[".$i."]->q0->X"; // Guarda en el arreglo
				$b++; // Posicion del Arreglo 
				$Guardado[$b]=$tot; // Guarda en el arreglo
				$i++; // Movimiento de posicion de izqueirda a derecha
				$b++; // Posicion del arreglo
				$c++; // Control
				echo "<center>".$tot."</center>";
			}
			elseif($tot[$j]=='1')
			{
					$tot[$j]="Y";	// Reemplaza Y
					echo "<center>1->q1->Y</center>";
					$Guardado[$b]="1[".$j."]->q1->Y"; // Guarda en el arreglo
					$b++; // Posicion del arreglo
					$Guardado[$b]=$tot; // Guarda en el arreglo
					$j--; // Posicion de derecha a izquierda
					$b++; // Posicion del arreglo
					$c++; // Control
					echo "<center>".$tot."</center>";
			}
			else
			{
				$j--; // Movimiento de derecha a izquierda
				$i++; // Movimiento de izquierda a derecha
				$c++; // Control
			}
		}
		echo "<center>La cadena fue reemplazada correctamente.</center>";
		foreach ($Guardado as $key => $value) // Muestra y guarda en el archivo txt
		{
			fwrite($manual,"[".$key."] ".$value.PHP_EOL); // Escribe en el archivo txt
		}
		fclose($manual); // Cierra el archivo txt
	}
	else
	{
		$numero=rand(21,10000); 
		$tot=generate_string($numero);
		$aleatorio=fopen("aleatorio_maquina_turing.txt","w");
		echo "<center>Maquina de turing aleatoria<br>".$tot."<br></center>";
		$c=$d=$b=$a=$i=0;// I posicion izquierda a derecha
		$j=$numero;// J posicion derecha a izquiersa
		$total=$numero*2; // Control
		while($c<=$total)
		{
			$Guardado[$b]=$tot; // Guarda en el arreglo
			$b++; // Posicion del arreglo
			if($tot[$i]=='0')
			{
				$tot[$i]="X";
				echo "<center>0->q0->X</center>";
				$Guardado[$b]="0[".$i."]->q0->X"; // Guarda en el arreglo
				$b++; // Posicion del arreglo
				$Guardado[$b]=$tot; // Guarda en el arreglo
				$i++; // Posicion de derecha a izquierda
				$b++; // Posicion del arreglo
				$c++; // Control
				echo "<center>".$tot."</center>";
			}
			elseif($tot[$j]=='1')
			{
					$tot[$j]="Y";				
					echo "<center>1->q1->Y</center>";
					$Guardado[$b]="1[".$j."]->q1->Y"; // Guarda en el arreglo
					$b++; // Posicion del arreglo
					$Guardado[$b]=$tot; // Guarda en el arreglo
					$j--; // Posicion de derecha a izquierda
					$b++; // Posicion del arreglo
					$c++; // Control
					echo "<center>".$tot."</center>";
			}
			else
			{
				$j--; // Movimiento de derecha a izquierda
				$i++; // Moviemiento de izquierda a derecha
				$c++; // Control
			}
		}
		echo "<center>La cadena fue reemplazada correctamente.</center>";
		foreach ($Guardado as $key => $value) // Muestra y guarad todo el contenido del arreglo
		{
			fwrite($aleatorio,"[".$key."]=".$value.PHP_EOL); // Escribe en el archivo txt
		}
		fclose($aleatorio); // Cierra el archiva txt
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