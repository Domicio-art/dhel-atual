<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">

    <title>Sistema de Cadastro</title>
    <link rel="stylesheet" href="components/_css/estilo.css">

</head>

<body>


<?php

include_once("conexao.php");

$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";
$sql = "select * from usuarios where servico='$filtro'";
$consulta = mysqli_query($conexao,$sql);
$registros = mysqli_num_rows($consulta);
?>


   

		
    <div class="container">

			<section>
			<h1>Agendamento de Serviço</h1>
            
            <hr><br><br>
			<h3>Selecione o Serviço desejado para ver os horários reservados:</h3>
         <form method="get" action="">
			<input type="radio" name='servico' value='a-b-Cabelo'/> Cabelo<br>
			<input type='radio' name='servico' value='c-d-Unha'/> Unha<br>
			<input type='radio' name='servico' value='e-f-Sobrancelha'/> Sobrancelha<br>
			
			<input type="hidden" name="filtro" class="campo" id="valor" placeholder="" value="" />
			
			<input type="submit" value="Ver Horários" class="btn">
		</form>

            <?php
                print "Você escolheu:<strong> $filtro</strong><br>";
                print "Horários Reservados: <strong>$registros</strong><br>" ;
                              
                while($exibirRegistros = mysqli_fetch_array($consulta)){
                				                              
                    $data=$exibirRegistros[6];
                    $data = date("d-m-Y", strtotime($data));
                    $horario=$exibirRegistros[7];
                    $horario = date("H:i", strtotime($horario));
                    print "$data"; 
                    print " -  $horario<br>";                
                }
               
                mysqli_close($conexao);
                
                ?>

            <hr><br><br>
			<h3>Preencha todos os campos do formulário baixo:</h3>
           
				<form method="post" action="processa.php">
               <strong> Selecione o tipo de Serviço</strong><br>
                <input type="radio" name="servico" value="Cabelo" />
                Cabelo
                <br />
                <input type="radio" name="servico" value="Unha" />
                Unha
                <br />
                <input type="radio" name="servico" value="Sobrancelha" />
                Sobrancelha
                <br />
                <br>

                <input type="text" name="nome" placeholder="Nome" class="campo" maxlength="50" required autofocus><br>

                <input type="email" name="email" placeholder="Email" class="campo" maxlength="40" required><br>

                <input type="Interger" name="telefone" placeholder="Telefone" class="campo" maxlength="12" required><br>

                <input type="text" name="sexo" placeholder="Sexo" class="campo" maxlength="12" required><br>




                <input type="date" name="data" placeholder="Data" class="campo" maxlength="9" required>Data<br>


                <select name="horario">
                    <option type="time" value="9:00"class="campo" maxlength="5" required>9:00</option>
                    <option type="time" value="9:30" class="campo" maxlength="5" required>9:30</option>
                    <option type="time" value="10:00" class="campo" maxlength="5" required>10:00</option>
                    <option type="time" value="10:30" class="campo" maxlength="5" required>10:30</option>
                   <option type="time" value="11:00" class="campo" maxlength="5" required>11:00</option>
                   <option type="time" value="11:30" class="campo" maxlength="5" required>11:30</option>
                   <option type="time" value="12:00" class="campo" maxlength="5" required>12:00</option>
                   <option type="time" value="12:30" class="campo" maxlength="5" required>12:30</option>
                   <option type="time" value="14:00" class="campo" maxlength="5" required>14:00</option>
                   <option type="time" value="14:30" class="campo" maxlength="5" required>14:30</option>
                   <option type="time" value="15:00" class="campo" maxlength="5" required>15:00</option>
                   <option type="time" value="15:30" class="campo" maxlength="5" required>15:30</option>
                   <option type="time" value="16:00" class="campo" maxlength="5" required>16:00</option>
                   <option type="time" value="16:30" class="campo" maxlength="5" required>16:30</option>
                  
                </select>Selecione um horário<br>


                <textarea type="text" name="descricao" placeholder="Descreva o serviço à ser executado" class="campo"
                    maxlength="255" required></textarea><br><br>

                <input type="submit" value="Enviar" class="btn">



            </form>
        
		</section>
		
    </div>
<script>
var radios = document.querySelectorAll("[name=servico]");
for(var x=0; x<radios.length; x++){
   radios[x].onclick = function(){
      document.querySelector("[name=filtro]").value =this.value.split("-").pop();
   }
}

</script>

</body>

</html>
