<!-- CHAVE DESATIVADA -->
<!-- FALTA TAXAR A DISTÂNCIA E ADICIONAR A TAXA AO VALOR FINAL -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>24/08 - 1</title>
</head>

<body>
    <!-- FORMULÁRIO PARA PREENCHIMENTO SIMPLES -->
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

        <!-- PARA CAUCULAR E ADICIONAR O VALOOR DA DISTÂNCIA -->
        <label for="_form">Rua:</label>
        <input type="text" name="rua" id="" required>
        <label for="_form">Bairro:</label>
        <input type="text" name="bairro" id="" required>
        <label for="_form">Cidade:</label>
        <input type="text" name="cidade" id="" required>

        <!-- ENVIAR FORMULÁRIO -->
        <input class="submit" type="submit">
    </form>

    <?php
    error_reporting(E_ERROR | E_PARSE);
    $total_med = array();
    /*---- ATRIBUINDO OS VALORES PARA A QUANTIDADE DE MEDICAMENTOS ----*/
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

    /*----VALOR TOTAL CASO O CLIENTE SOLICITE OU NÃO ATENDIMENTO ESPECIALIZADO----*/
    if ($_GET['_atend'] === "sim") {
        $valor = $total_med[0] + $total_med[1] + $total_med[2] + $total_med[3] + $total_med[4] + $total_med[5] + $total_med[6] + $total_med[7] + 200;
    } else {
        $valor = $total_med[0] + $total_med[1] + $total_med[2] + $total_med[3] + $total_med[4] + $total_med[5] + $total_med[6] + $total_med[7];
    }

    if ($valor != 0) {
        echo $valor;
    }


    /*---- CAUCULANDO A DISTÂNCIA ENTRE DOIS PONTOS NO GLOBO, LAT/LONG ----
    https://www.codexworld.com/distance-between-two-addresses-google-maps-api-php/ */
    function getDistance($addressFrom, $addressTo, $unit = '')
    {
        // Google API key
        //favor não fazer muitas solicitações, crédito limitado
        $apiKey = //'chave'; 

        // Remove a vígula entre o logradouro, o bairro e a cidade
        $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);
        $formattedAddrTo     = str_replace(' ', '+', $addressTo);

        // Faz uma requisição para a Geocoding API do Google Maps mostrando o local de partida
        $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrFrom . '&sensor=false&key=' . $apiKey);
        $outputFrom = json_decode($geocodeFrom);
        if (!empty($outputFrom->error_message)) {
            return $outputFrom->error_message;
        }

        // Faz uma requisição para a Geocoding API do Google Maps mostrando o destino
        $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrTo . '&sensor=false&key=' . $apiKey);
        $outputTo = json_decode($geocodeTo);
        if (!empty($outputTo->error_message)) {
            return $outputTo->error_message;
        }

        // Chama latitude/longitude dos endereços (local de partida/destino)
        $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
        $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
        $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
        $longitudeTo    = $outputTo->results[0]->geometry->location->lng;

        // Calcula a partir da fórmula de haversine a distância entre latitude e longitude
        $theta    = $longitudeFrom - $longitudeTo;
        $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
        $dist    = acos($dist);
        $dist    = rad2deg($dist);
        $miles    = $dist * 60 * 1.1515;

        // Convertendo a unidade de medida da distância de milhas para quilômetros, e retornando o resultado
        $unit = strtoupper($unit);
        if ($unit == "K") {
            return round($miles * 1.609344, 2) . ' km';
        } elseif ($unit == "M") {
            return round($miles * 1609.344, 2) . ' metros';
        } else {
            return round($miles, 2) . ' milhas';
        }
    }
    $addressFrom = "ENDEREÇO DA FARMÁCIA";
    $addressTo = $_GET['rua'] . ', ' . $_GET['bairro'] . ', ' . $_GET['cidade'];


    $distance = getDistance($addressFrom, $addressTo, "K");
    echo $distance;
    ?>

</body>

</html>
