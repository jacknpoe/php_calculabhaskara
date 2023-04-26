<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<title>Calcula a fórmula de Bhaskara</title>
 		<link rel="stylesheet" href="php_calculabhaskara.css"/>
		<link rel="icon" type="image/png" href="php_calculabhaskara.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<?php
			header( "Content-Type: text/html; charset=ISO-8859-1", true);
			date_default_timezone_set ("America/Sao_Paulo");

			$resultado = '';
			$valor_a = '';
			$valor_b = '';
			$valor_c = '';

			if( isset( $_POST[ 'calcular']))
			{
				$valor_a = $_POST["valor_a"];
				$valor_b = $_POST["valor_b"];
				$valor_c = $_POST["valor_c"];
				$float_a = floatval( str_replace( ',', '.', $valor_a));
				$float_b = floatval( str_replace( ',', '.', $valor_b));
				$float_c = floatval( str_replace( ',', '.', $valor_c));

				// mágica
				if( $float_a == 0.0)
				{
					if( $float_b == 0.0)
					{
						$resultado = " x é indefinido";
					} else {
						if( $float_c == 0.0)
						{
							$resultado = "x = 0";
						} else {
							$resultado = "x = " . strval( $float_c / $float_b * -1 );
						}
					}
				} else {
					$delta = pow( $float_b, 2) - ( 4 * $float_a * $float_c);
					if( $delta < 0)
					{
						$resultado = "x é indefinido";
					} else {
						if( $delta == 0 )
						{
							$valor_x = ( $float_b * -1 ) / ( 2 * $float_a);
							if( $valor_x == -0.0)
							{
								$valor_x = 0.0;
							}
							$resultado = "x = " . strval( $valor_x);
						} else {
							$valor_x1 = ( $float_b * -1 - sqrt( $delta) ) / ( 2 * $float_a);
							$valor_x2 = ( $float_b * -1 + sqrt( $delta) ) / ( 2 * $float_a);
							if( $valor_x1 == -0.0)
							{
								$valor_x1 = 0.0;
							}
							if( $valor_x2 == -0.0)
							{
								$valor_x2 = 0.0;
							}
							$resultado = "x = " . strval( $valor_x1) . " e " . strval( $valor_x2);
						}
					}
				}
				$resultado = str_replace( '.', ',', $resultado);
			}
		?>
		<h1>Calcula a fórmula de Bhaskara<br></h1>

		<form action="php_calculabhaskara.php" method="POST" style="border: 0px">
			<p>
				<input type="text" name="valor_a" style="width: 50px" value="<?php echo $valor_a; ?>"> x² +
				<input type="text" name="valor_b" style="width: 50px" value="<?php echo $valor_b; ?>"> x +
				<input type="text" name="valor_c" style="width: 50px" value="<?php echo $valor_c; ?>"> = 0
			</p>
			<p><input type="submit" name="calcular" value="Calcular"></p>
		</form>

		<br><p>Resultado: <?php echo $resultado; ?></p><br><br>
		<p><a href="https://github.com/jacknpoe/php_calculabhaskara">Repositório no GitHub</a></p><br><br>
		<form action="index.html" method="POST" style="border: 0px">
			<p><input type="submit" name="voltar" value="Voltar"></p>
		</form>
	</body>
</html>