<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Gorjeta</title>
    <style>
		 body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: #f4f4f4;
		}

		.container {
			max-width: 400px;
			margin: 50px auto;
			background-color: #fff;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		h2 {
			color: #333;
			margin-bottom: 20px;
		}

		form {
			margin-top: 20px;
		}

		input[type="number"] {
			width: 100%;
			padding: 10px;
			margin-bottom: 15px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

		input[type="radio"] {
			margin-right: 10px;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			border: none;
			padding: 10px 20px;
			border-radius: 4px;
			cursor: pointer;
		}

		input[type="submit"]:hover {
			background-color: #45a049;
		}

		.resumo {
			margin-top: 30px;
			padding: 20px;
			background-color: #ddd;
			border-radius: 8px;
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
			line-height: 0.5;
		}

		.resumo h3 {
			margin-top: 0;
			color: #333;
		}

		.resumo p {
			margin-bottom: 10px; 
		}

		.resumo strong {
			font-weight: bold;
		}
	</style>
</head>
<body>
    <div class="container">
        <h2>Calculadora de Gorjeta</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Valor da Conta: <input type="number" name="valor_conta" min="0" step="0.01" required><br>
            Percentual de Gorjeta:
            <input type="radio" name="percentual_gorjeta" value="0.10" required> 10%
            <input type="radio" name="percentual_gorjeta" value="0.15"> 15%
            <input type="radio" name="percentual_gorjeta" value="0.20"> 20%<br>
            <input type="submit" name="submit" value="Calcular">
        </form>

        <?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$valor_conta = $_POST["valor_conta"];
        $percentual_gorjeta = $_POST["percentual_gorjeta"];

        $percentual_gorjeta = $valor_conta * $percentual_gorjeta;
        $total_a_pagar = $valor_conta + $percentual_gorjeta;

        echo "<div class='resumo'>";
        echo "<h3>Resumo do Desconto</h3>";
        echo "<p><strong>Valor Total da Compra:</strong> R$ " . number_format($valor_conta, 2, ',', '.') . "</p>";
        
        if ($percentual_gorjeta == 0.10) {
            echo "10%";
        } elseif ($percentual_gorjeta == 0.05) {
            echo "15%";
        } elseif ($percentual_gorjeta == 0.00) {
            echo "20%";
        }
        echo "</p>";
        echo "<p><strong>Valor da gorjeta:</strong> R$ " . number_format($percentual_gorjeta, 2, ',', '.') . "</p>";
        echo "<p><strong>Total a Pagar:</strong> R$ " . number_format($total_a_pagar, 2, ',', '.') . "</p>";
        echo "</div>";
				
		}
		?>
    </div>
</body>
</html>