<?php
include_once("conexao.php");

$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";
$query = " DELETE FROM usuarios WHERE data='$filtro'";  
$consulta = mysqli_query($conexao,$query);


?>


<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="utf-8">

    <title>Seviços agendados</title>
    <link rel="stylesheet" href="components/_css/estilo.css">

</head>

<body>
    <div class="container">

        <section>
            <h1>Serviços agendados</h1>
            <hr><br><br>

            <form method="get" action="">
                Filtrar por Serviço: <input type="text" name="filtro" class="campo" required autofocus>
                <input type="submit" value="pesquisar" class="btn">
                <input type="submit" value="Apagar" class="btn" action="delete"><br>
            </form>
			
		</section>
	</div>
</body>
</html>	
