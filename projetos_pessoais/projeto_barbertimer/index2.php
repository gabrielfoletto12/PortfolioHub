<?php 
include_once("classes/funcoessql.php");

$agenda = new funcoessql;
$agenda->setconsulta("SELECT dias, hora_inicial, hora_final, hora_intervalo FROM barbearia.login where pklogin = 2 ");

if($agenda->total() > 0)
{
	foreach($agenda->selecionar() as $a)
	{
		$dtra = $a[0];
		$hini = intval($a[1]);
		$hfim = intval($a[2]);
		$hint = intval($a[3]);
	}
	$dias   = explode('/',$dtra);
	$horas  = array("");
	$semana = array(
			'Sun' => 'dom', 
			'Mon' => 'seg',
			'Tue' => 'ter',
			'Wed' => 'qua',
			'Thu' => 'qui',
			'Fri' => 'sex',
			'Sat' => 'sab');
	echo "</h1>Escolha o dia</h1><br>";
	for($i = 0; $i <= 60; $i++)
	{
		$data = date('D', strtotime("+$i days"));
		$datac = date('d-m-Y', strtotime("+$i days"));
		if(in_array($semana["$data"],$dias))
		{
		  echo "<a href=?pg=agendar&dia=$data><button type='submit' class='btn btn-dark'>".$semana["$data"] ." ". date('d/m/Y', strtotime("+$i days"))."</button></a><br>";
	
		//Horarios
			$horarios = new funcoessql();
			$horarios->setconsulta("SELECT date_format(data_agendamento,'%H') hora 
										FROM barbearia.agendamento
										where date_format(data_agendamento,'%d-%m-%Y') = '$datac'
										and fklogin = 2");
									  

			if($horarios->total() > 0)
			{
				foreach($horarios->selecionar() as $h)
				{
					array_push($horas,$h[0]);
				}
			}
			
			echo "horarios disponiveis<br>";
			for($j = $hini; $j < $hfim; $j++)
			{
				if($j != $hint and !in_array($j,$horas))
				{
					if(strlen($j) == 1)
					echo "0".$j.":00"."<br>";
					else
						echo $j.":00"."<br>";
				}
			}
	    }
    }
	
}

?>

