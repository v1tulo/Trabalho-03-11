<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Gorjeta com Fator de Qualidade do Serviço</title>
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

		/* Estilização para o resumo */
		.resumo {
			margin-top: 30px;
			padding: 20px;
			background-color: #ddd; /* Alterando a cor de fundo para um tom mais escuro */
			border-radius: 8px;
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
			line-height: 0.5; /* Defina o espaçamento entre as linhas aqui */
		}

		.resumo h3 {
			margin-top: 0;
			color: #333;
		}

		.resumo p {
			margin-bottom: 10px; /* Adicionando margem inferior */
		}

		.resumo strong {
			font-weight: bold;
		}
	</style>
</head>
<body>
    <div class="container">
        <h2>Calculadora de Gorjeta com Fator de Qualidade do Serviço</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Valor da Conta: <input type="number" name="valor_conta" min="0" step="0.01" required><br>
            Percentual de Gorjeta:
            <input type="radio" name="percentual_gorjeta" value="0.10" required> 10%
            <input type="radio" name="percentual_gorjeta" value="0.15"> 15%
            <input type="radio" name="percentual_gorjeta" value="0.20"> 20%<br>
            Qualidade do Serviço:
            <input type="radio" name="qualidade_servico" value="0.8" required> Ruim
            <input type="radio" name="qualidade_servico" value="1.0"> Regular
            <input type="radio" name="qualidade_servico" value="1.1"> Bom
            <input type="radio" name="qualidade_servico" value="1.2"> Excelente<br>
            <input type="submit" name="submit" value="Calcular">
        </form>

        <?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
				$valor_conta = $_POST["valor_conta"];
				$percentual_gorjeta = $_POST["percentual_gorjeta"];
				$qualidade_servico = $_POST["qualidade_servico"];
			
				$gorjeta = $valor_conta * $percentual_gorjeta * $qualidade_servico;
				$total_a_pagar = $valor_conta + $gorjeta;
			
				echo "<div class='resumo'>";
				echo "<h3>Resumo da Gorjeta</h3>";
				echo "<p><strong>Valor da Conta:</strong> R$ " . number_format($valor_conta, 2, ',', '.') . "</p>";
				echo "<p><strong>Percentual de Gorjeta:</strong> " . ($percentual_gorjeta * 100) . "%</p>";
				echo "<p><strong>Qualidade do Serviço:</strong> ";
				if ($qualidade_servico == 0.8) {
					echo "Ruim";
				} elseif ($qualidade_servico == 1.0) {
					echo "Regular";
				} elseif ($qualidade_servico == 1.1) {
					echo "Bom";
				} elseif ($qualidade_servico == 1.2) {
					echo "Excelente";
				}
				echo "</p>";
				echo "<p><strong>Valor da Gorjeta:</strong> R$ " . number_format($gorjeta, 2, ',', '.') . "</p>";
				echo "<p><strong>Total a Pagar:</strong> R$ " . number_format($total_a_pagar, 2, ',', '.') . "</p>";
				echo "</div>";
			}
			?>
			
    </div>
</body>
</html>
