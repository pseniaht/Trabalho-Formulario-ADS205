<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>23/08 - 1</title>
    <style>
        form {
            max-width: 400px;
            margin: auto;
        } 

        label,
        .submit {
            display: flex;
            margin: auto;
        }
    </style>
</head>

<body>
    <form name="_form" action="#" method="get">
        <!-- PARA POSSÍVEIS MEDICAMENTOS SOLICITADOS -->
        <label for="_form">Medicamentos:</label>

        <input type="checkbox" name="med_1">Soro fisiológico
        <input type="number" name="f_med1" min=0><br><br>

        <input type="checkbox" name="med_2">Gases
        <input type="number" name="f_med2" min=0><br><br>

        <input type="checkbox" name="med_3">Micropore
        <input type="number" name="f_med3" min=0><br><br>

        <input type="checkbox" name="med_4">Antisséptico Merthiolate
        <input type="number" name="f_med4" min=0><br><br>

        <input type="checkbox" name="med_5">Fita Glicêmica
        <input type="number" name="f_med5" min=0><br><br>

        <input type="checkbox" name="med_6">Medicação Losartana
        <input type="number" name="f_med6" min=0><br><br>

        <input type="checkbox" name="med_7">Medicação Citon Pios 5000
        <input type="number" name="f_med7" min=0><br><br>

        <input type="checkbox" name="med_8">Aplicação c/ seringa
        <input type="number" name="f_med8" min=0><br><br>

        <!-- PARA ATENDIMENTO FARMACÊUTICO ESPECIALIZADO -->

        <label for="_form">Solicitar Atendimento Especializado?</label>
        <input type="radio" name="_atend" value="sim">Sim
        <input type="radio" name="_atend" value="nao" checked>Não

        <input class="submit" type="submit">
    </form>

    <?php
    error_reporting(E_ERROR | E_PARSE);
    $total_med = array();
    if ($_GET['med_1'] == true) {
        $total_med[0] = 7 * $_GET['f_med1'];
    }

    if ($_GET['med_2'] == true) {
        $total_med[1] = 3 * $_GET['f_med2'];
    }

    if ($_GET['med_3'] == true) {
        $total_med[2] = 6 * $_GET['f_med3'];
    }

    if ($_GET['med_4'] == true) {
        $total_med[3] = 15 * $_GET['f_med4'];
    }

    if ($_GET['med_5'] == true) {
        $total_med[4] = 10 * $_GET['f_med5'];
    }

    if ($_GET['med_6'] == true) {
        $total_med[5] = 12 * $_GET['f_med6'];
    }

    if ($_GET['med_7'] == true) {
        $total_med[6] = 25 * $_GET['f_med7'];
    }

    if ($_GET['med_8'] == true) {
        $total_med[7] = 15 * $_GET['f_med8'];
    }

    /*----VALOR DOS MEDICAMENTOS CASO O CLIENTE SOLICITE OU NÃO ATENDIMENTO ESPECIALIZADO----*/
    if ($_GET['_atend'] === "sim") {
        $valor = $total_med[0] + $total_med[1] + $total_med[2] + $total_med[3] + $total_med[4] + $total_med[5] + $total_med[6] + $total_med[7] + 200;
    } else {
        $valor = $total_med[0] + $total_med[1] + $total_med[2] + $total_med[3] + $total_med[4] + $total_med[5] + $total_med[6] + $total_med[7];
    }
    echo $valor;

    ?>

</body>

</html>
