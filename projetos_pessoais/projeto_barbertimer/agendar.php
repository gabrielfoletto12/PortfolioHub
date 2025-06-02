<?php
include_once("classes/funcoessql.php");
include_once("genericas.php");

$data_atual = date('Y-m-d');
?>

<style>
    .bnt-horario {
        margin: 5px 0;
    }

    .custom-alert {
        max-width: 410px; /* Defina a largura máxima desejada */
        margin-left: auto;
        margin-right: auto;
        padding: 0.75rem 1.25rem;
        font-size: 1rem;
        border-radius: 0.25rem;
        margin-bottom: 1rem;
    }
</style>
<body class="bg-dark">
<div class="container-sm mt-3">
    <h2>Agendamento de Horário:</h2>
    <form id="appointmentForm" method='post' onsubmit="return validateForm()">
        <div class="form-group">
            <label for="sel1" class="form-label" required>Selecione o Serviço:</label>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <select class="form-select" id="sel1" name="servico">
                        <option value="">Selecione uma opção</option>
                        <?php
                        $listaser = new funcoessql;
                        $listaser->setconsulta("select pkservico, concat(desc_categoria, ' / ', desc_servico,' - R$',preco) junto, pkcategoria from servico, categoria where pkcategoria = fkcategoria order by desc_categoria");
                        if ($listaser->total() > 0) {
                            foreach ($listaser->selecionar() as $s) {
                                echo "<option value=$s[0]>$s[1]</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <label for="sel2" class="form-label" required>Selecione o Profissional:</label>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <select class="form-select" id="sel2" name="profissional">
                        <option value="">Selecione uma opção</option>
                        <?php
                        $listabar = new funcoessql;
                        $listabar->setconsulta("select pklogin, nome from login, perfil where fkperfil = pkperfil and desc_perfil = upper('BARBEIRO')");
                        if ($listabar->total() > 0) {
                            foreach ($listabar->selecionar() as $b) {
                                echo "<option value=$b[0]>$b[1]</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-6 text-center">
                    <button type='submit' name='continuar' class='btn btn-dark'>Continuar</button><br>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
function validateForm() {
    var servico = document.getElementById("sel1").value;
    var profissional = document.getElementById("sel2").value;
    
    if (servico === "" || profissional === "") {
        alert("Por favor, selecione uma opção para Serviço e Profissional.");
        return false;
    }
    return true;
}
</script>

<?php
if (isset($_POST['continuar'])) {
    $_SESSION['idservico'] = $_POST['servico'];
    $_SESSION['idprofissional'] = $_POST['profissional'];
      
       
        $idpro = $_SESSION['idprofissional'];
        $idservico = $_SESSION['idservico'];
    
        $agenda = new funcoessql;
        $agenda->setconsulta("SELECT dias, hora_inicial, hora_final, hora_intervalo FROM barbearia.login where pklogin = $idpro");

        if ($agenda->total() > 0) {
            foreach ($agenda->selecionar() as $a) {
                $dtra = $a[0];
                $hini = intval($a[1]);
                $hfim = intval($a[2]);
                $hint = intval($a[3]);

                $_SESSION['hini'] = $hini;
                $_SESSION['hfim'] = $hfim;
                $_SESSION['hint'] = $hint;
            }

            $dias = explode('/', $dtra);
            $horas = array("");
            $cont = 0;
            $semana = array(
                'Mon' => 'seg',
                'Tue' => 'ter',
                'Wed' => 'qua',
                'Thu' => 'qui',
                'Fri' => 'sex',
                'Sat' => 'sab',
                'Sun' => 'dom'
            );

            $_SESSION['horas'] = $horas;
            $_SESSION['semana'] = $semana;
            $_SESSION['dias'] = $dias;

            echo "<h3>Escolha o dia</h3>";
            echo "<form method='post'>";
            echo "<table class='table'><thead><tr>";
            // imprimir cabecalho do dia da semana
            foreach (array_values($semana) as $dia) {
                echo "<th>$dia</th>";
            }
            echo "</tr></thead><tbody><tr>";

            $first_day_of_week = array_search(date('D', strtotime('monday this week')), array_keys($semana));
            for ($i = 0; $i < $first_day_of_week; $i++) {
                echo "<td></td>"; // Preencher os dias até o primeiro dia da semana
            }

            for ($i = 0; $i <= 30; $i++) {
                $data = date('D', strtotime("+$i days"));
                $datac = date('d-m-Y', strtotime("+$i days"));

                if (in_array($semana[$data], $dias)) {
                    echo "<td><a href='?pg=agendar&acao=horario'><button type='submit' class='btn btn-secondary' name='data' value='$datac'>" . date('d/m', strtotime("+$i days")) . "</button></a></td>";
                } else {
                    echo "<td>indisponível</td>"; // Recebe vazio
                }

                $cont++;
                if ($cont % 7 == 0) {
                    echo "</tr><tr>";
                }
            }
            echo "</tr></tbody></table></form>";
        }
      }
    
    
    

   



    //horarios

    if (isset($_POST['data'])) {
        $hini = $_SESSION['hini'];
        $hfim = $_SESSION['hfim'];
        $hint = $_SESSION['hint'];
        $horas = $_SESSION['horas'];
    
        $datac = $_POST['data'];
        $_SESSION['data'] = $_POST['data'];
        $idpro = $_SESSION['idprofissional'];
    
        $horarios = new funcoessql();
        $horarios->setconsulta("SELECT date_format(data_agendamento,'%H') hora FROM barbearia.agendamento where date_format(data_agendamento,'%d-%m-%Y') = '$datac' and fklogin = $idpro");
    
        if ($horarios->total() > 0) {
            foreach ($horarios->selecionar() as $h) {
                array_push($horas, $h[0]);
            }
        }
    
        echo "<h3>Horários disponíveis do dia: " . $datac . "</h3><br>
        <form method=post>";
        $count = 0;
        echo "<div class='row'>"; 
        for ($j = $hini; $j < $hfim; $j++) {
            if ($j != $hint && !in_array($j, $horas)) {
                $hora_fim = $j + 1;
                $inicio = str_pad($j, 2, '0', STR_PAD_LEFT) . ":00";
                $fim = str_pad($hora_fim, 2, '0', STR_PAD_LEFT) . ":00";
                $horatotal = "$inicio - $fim";
    
                // Adiciona um div para cada botão com uma classe de espaçamento
                echo "<div class='col-12 mb-1'><button type='submit' class='btn btn-secondary btn-horario' name='hora' value='$inicio'>$inicio - $fim</button></div>";
                
               
            }
        }
        echo "</div>"; 
        echo "<button type='submit' name='continuar' class='btn btn-outline-primary mt-3'>voltar</button></form>"; // botão "voltar"
    }
    
    
//informacoes pessoais

if (isset($_POST['hora'])) {
    $_SESSION['hora'] = $_POST['hora'];

    $info = "<form method=post><div class='container-sm mt-3'>
    <h3>Informações Pessoais </h3>
    <div class='row justify-content-center'>
                <div class='col-md-4'>
    
    <label class='form-label'>Primeiro Nome:</label>
    <input type='text' maxlength=50 class='form-control' name='prinome' required placeholder='Digite o primeiro nome'>
    <label class='form-label'>Segundo Nome:</label>
    <input type='text' maxlength=50 class='form-control' name='segnome' required placeholder='Digite o segundo nome'>
    <label class='form-label'>Telefone:</label>
    <input type='number' class='form-control' name='tel' required placeholder='Telefone'>
    <label class='form-label'>Email:</label>
    <input type='text' class='form-control' name='email' required placeholder='Email'>
    <button type='submit' class='btn btn-dark' name='info'>Continuar</button>
   
      
     </div>
    </div>
    </div></form>
    ";
    echo $info;
    $_SESSION['info'] = $info;

    
}elseif(isset($_POST['voltar1']))
  echo $_SESSION['info'];

//resumo

if (isset($_POST['info'])) 
{  
   
    $_SESSION['tel'] = $_POST['tel'];
    $_SESSION['email'] = $_POST['email'];

    if( strlen( $_SESSION['email']) >=5 and strpos( $_SESSION['email'],'@') > -1 and  strpos( $_SESSION['email'],'.')) 
    {
        if(strlen($_POST['tel']) >=10 and strlen($_POST['tel'])<=12)
        {
            $_SESSION['prinome'] = $_POST['prinome'];
            $_SESSION['segnome'] = $_POST['segnome']; 
            $data = $_SESSION['data'] ;   
            $idservico = $_SESSION['idservico'];
            $idpro = $_SESSION['idprofissional'];

            $lista = new funcoessql;
            $lista->setconsulta("select pkcategoria, nome, concat(desc_categoria, ' / ', desc_servico,' - R$',preco) junto
                                from servico, categoria, login
                                where pkcategoria = fkcategoria
                                and pkservico = $idservico
                                and pklogin =  $idpro
                                order by desc_categoria");
            if($lista->total() > 0 )
            {
                foreach($lista->selecionar() as $l)
                {
                    $idcategoria = $l[0];
                    $_SESSION['idcategoria'] = $l[0];
                    $nome = $l[1];
                    
                    $servicosele = $l[2];
                }
            }
            $hora = $_SESSION['hora'];
            echo $hora;


            echo "<form method=post>
            <div class='container-sm mt-3'>
            <div class='row justify-content-center'>
                <div class='col-md-4'>
            <h3>Resumo do Agendamento</h3>
                <label class='form-label'>Serviço:</label>
                <input class='form-control' type='text' value='$servicosele' readonly>
                <label class='form-label'>Profissional:</label>
                <input class='form-control' type='text' value='$nome' readonly>
                <label class='form-label'>Data: </label>
                <input class='form-control' type='text' value='$data' readonly>
                <label class='form-label'>Hora:</label>
                <input class='form-control' type='text' value='$hora' readonly>
            <button type='submit' class='btn btn-primary' name='agendar'>AGENDAR</button>
            </div>
            </div>
            </div>
               
            </form>";

        }else{
        echo"<br><div class='alert alert-danger custom-alert'>telefone inválido, informe o DD e o numero completo</div>";
        echo"<form method=post><button type='submit' name='voltar1' class='btn btn-outline-primary'>voltar</button></form>";
        }   
    }else{
        echo"<br><div class='alert alert-danger custom-alert'>Email inválido</div>";
        echo"<form method=post><button type='submit' name='voltar1' class='btn btn-outline-primary'>voltar</button></form>";
}
}


if (isset($_POST['agendar'])) {
    $prinome = $_SESSION['prinome'];
    $segnome = $_SESSION['segnome'];
    $tel     = $_SESSION['tel'];
    $email   = $_SESSION['email'];

    $idpro = $_SESSION['idprofissional'];
    $idservico = $_SESSION['idservico'];
    $idpro = $_SESSION['idprofissional'];
    $idcategoria = $_SESSION['idcategoria'];

    $data = $_SESSION['data'];
    $data_mysql = DateTime::createFromFormat('d-m-Y', $data)->format('Y-m-d');
    $hora = $_SESSION['hora']. ":00";
    

    $age = new funcoessql;
    $age->setconsulta("insert into agendamento values(null, '$data_mysql','$hora', '$prinome', '$segnome', '$tel', '$email', $idcategoria, $idpro, $idservico)");

    if ($age->inserir() == 0) {
        echo"<br><div class='alert alert-success custom-alert'>Agendamento concluído com sucesso</div>";
    } else {
        echo"<br><div class='alert alert-danger custom-alert'>Agendamento não concluido com sucesso</div>";
    }
}

?>

</body>
