<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>TESTE</title>
    <link rel="stylesheet" href="tst.css">
</head>

<body>

    <?php
  
     /* https://www.codexworld.com/distance-between-two-addresses-google-maps-api-php/ */
    $addressFrom = "ENDEREÇO DA FARMÁCIA";
    function getDistance($addressFrom, $addressTo, $unit = '')
    {
        //$apiKey = 'chave'; 

        $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);
        $formattedAddrTo     = str_replace(' ', '+', $addressTo);

        $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrFrom . '&sensor=false&key=' . $apiKey);
        $outputFrom = json_decode($geocodeFrom);
        if (!empty($outputFrom->error_message)) {
            return $outputFrom->error_message;
        }

        $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrTo . '&sensor=false&key=' . $apiKey);
        $outputTo = json_decode($geocodeTo);
        if (!empty($outputTo->error_message)) {
            return $outputTo->error_message;
        }

        $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
        $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
        $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
        $longitudeTo    = $outputTo->results[0]->geometry->location->lng;

        $theta    = $longitudeFrom - $longitudeTo;
        $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
        $dist    = acos($dist);
        $dist    = rad2deg($dist);
        $miles    = $dist * 60 * 1.1515;

        $unit = strtoupper($unit);
        if ($unit == "K") {
            return round($miles * 1.609344, 2) . ' km';
        } elseif ($unit == "M") {
            return round($miles * 1609.344, 2) . ' meters';
        } else {
            return round($miles, 2) . ' miles';
        }
    }
    ?>


    <div class="mgr">
        <div class="fora">
            <div class="den">
                <div class="form">
                    <img src="ali.png" alt="" srcset="">
                    <h2>-- PREÇOS --</h2>
                    <h3>Preços dos Medicamentos</h3>
                    <div class="linha">
                        <div class="nome">Soro fisiológico (unidade):</div>
                        <div class="preco">R$07,00</div>
                    </div>

                    <div class="linha">
                        <div class="nome">Gases (pacote):</div>
                        <div class="preco">R$03,00</div>
                    </div>

                    <div class="linha">
                        <div class="nome">Micropore (unidade):</div>
                        <div class="preco">R$06,00</div>
                    </div>

                    <div class="linha">
                        <div class="nome">Antisséptico Merthiolate (unidade):</div>
                        <div class="preco">R$15,00</div>
                    </div>

                    <div class="linha">
                        <div class="nome">Fita Glicêmica (unidade):</div>
                        <div class="preco">R$10,00</div>
                    </div>

                    <div class="linha">
                        <div class="nome">Medicação Losartana (caixa):</div>
                        <div class="preco">R$12,00</div>
                    </div>

                    <div class="linha">
                        <div class="nome">Citon Pios 5000 (ampola):</div>
                        <div class="preco">R$25,00</div>
                    </div>

                    <div class="linha">
                        <div class="nome">Aplicação com Seringa (unidade):</div>
                        <div class="preco">R$15,00</div>
                    </div>

                    <h3>ATENDIMENTO</h3>
                    <div class="linha">
                        <div class="nome">Atendimento Especializado Individual:</div>
                        <div class="preco">R$200,00</div>
                    </div>

                    <h3>valor da Quilometragem</h3>
                    <div class="linha">
                        <div class="nome">Quilômetro:</div>
                        <div class="preco">R$01,80</div>
                    </div>

                </div>
            </div>

            <div class="den">
                <?php
                error_reporting(E_ERROR | E_PARSE);
                $total_med = array();
                ?>
                <form class="form" name="_form" action="#" method="get">

                    <img src="ali.png" alt="" srcset="">
                    <h2>-- CALCULAR VALOR --</h2>


                    <!-- PARA POSSÍVEIS MEDICAMENTOS SOLICITADOS -->
                    <label for="_form">
                        <h3>Medicamentos</h3>
                    </label>



                    <div class="inpt">
                        <div class="med">
                            <input type="checkbox" name="med_1">
                            Soro fisiológico
                        </div>

                        <div class="qnt">
                            <input class="num" type="number" name="f_med1" min=0><br>
                        </div>
                    </div>

                    <?php
                    if ($_GET['med_1'] == true) {
                        $total_med[0] = 7 * $_GET['f_med1'];
                    }
                    ?>


                    <div class="inpt">
                        <div class="med">
                            <input type="checkbox" name="med_2">
                            Gases
                        </div>
                        <div class="qnt">
                            <input class="num" type="number" name="f_med2" min=0><br>
                        </div>
                    </div>

                    <?php
                    if ($_GET['med_2'] == true) {
                        $total_med[1] = 3 * $_GET['f_med2'];
                    }
                    ?>

                    <div class="inpt">
                        <div class="med">
                            <input type="checkbox" name="med_3">
                            Micropore
                        </div>
                        <div class="qnt">
                            <input class="num" type="number" name="f_med3" min=0><br>
                        </div>
                    </div>

                    <?php
                    if ($_GET['med_3'] == true) {
                        $total_med[2] = 6 * $_GET['f_med3'];
                    }
                    ?>

                    <div class="inpt">
                        <div class="med">
                            <input type="checkbox" name="med_4">
                            Antisséptico Merthiolate
                        </div>
                        <div class="qnt">
                            <input class="num" type="number" name="f_med4" min=0><br>
                        </div>
                    </div>

                    <?php
                    if ($_GET['med_4'] == true) {
                        $total_med[3] = 15 * $_GET['f_med4'];
                    }
                    ?>

                    <div class="inpt">
                        <div class="med">
                            <input type="checkbox" name="med_5">
                            Fita Glicêmica
                        </div>
                        <div class="qnt">
                            <input class="num" type="number" name="f_med5" min=0><br>
                        </div>
                    </div>

                    <?php
                    if ($_GET['med_5'] == true) {
                        $total_med[4] = 10 * $_GET['f_med5'];
                    }
                    ?>

                    <div class="inpt">
                        <div class="med">
                            <input type="checkbox" name="med_6">
                            Medicação Losartana
                        </div>
                        <div class="qnt">
                            <input class="num" type="number" name="f_med6" min=0><br>
                        </div>
                    </div>

                    <?php
                    if ($_GET['med_6'] == true) {
                        $total_med[5] = 12 * $_GET['f_med6'];
                    }
                    ?>

                    <div class="inpt">
                        <div class="med">
                            <input type="checkbox" name="med_7">
                            Citon Pios 5000
                        </div>
                        <div class="qnt">
                            <input class="num" type="number" name="f_med7" min=0><br>
                        </div>
                    </div>

                    <?php
                    if ($_GET['med_7'] == true) {
                        $total_med[6] = 25 * $_GET['f_med7'];
                    }
                    ?>

                    <div class="inpt">
                        <div class="med">
                            <input type="checkbox" name="med_8">
                            Aplicação com Seringa
                        </div>
                        <div class="qnt">
                            <input class="num" type="number" name="f_med8" min=0><br>
                        </div>
                    </div>

                    <?php
                    if ($_GET['med_8'] == true) {
                        $total_med[7] = 15 * $_GET['f_med8'];
                    }
                    ?>

                    <!-- PARA ATENDIMENTO FARMACÊUTICO ESPECIALIZADO -->
                    <label for="_form">
                        <h3>Solicitar Atendimento Especializado?</h3>
                    </label>
                    <div class="inpt2">
                        <div class="med2"><input type="radio" name="_atend" value="sim">
                            <div class="esp">Sim</div>
                        </div>
                        <div class="med2"><input type="radio" name="_atend" value="nao" checked>
                            <div class="esp">Não</div>
                        </div>
                    </div>

                    <?php
                    if ($_GET['_atend'] === "sim") {
                        $valor = $total_med[0] + $total_med[1] + $total_med[2] + $total_med[3] + $total_med[4] + $total_med[5] + $total_med[6] + $total_med[7] + 200;
                    } else {
                        $valor = $total_med[0] + $total_med[1] + $total_med[2] + $total_med[3] + $total_med[4] + $total_med[5] + $total_med[6] + $total_med[7];
                    }
                    ?>

                    <!-- PARA CAUCULAR E ADICIONAR O VALOOR DA DISTÂNCIA -->
                    <label for="_form">
                        <h3>Confirme seu endereço:</h3>
                    </label>

                    <table>
                        <tr>
                            <th><label for="_form">Rua:</label></th>
                            <td><input type="text" name="rua" id="edr"></td>
                        </tr>
                    </table>

                    <table>
                        <tr>
                            <th><label for="_form">Bairro:</label></th>
                            <td><input type="text" name="bairro" id="edr"></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <th><label for="_form">Cidade:</label></th>
                            <td><input type="text" name="cidade" id="edr"><br></td>
                        </tr>
                    </table>

                    <?php
                    $addressTo = $_GET['rua'] . ', ' . $_GET['bairro'] . ', ' . $_GET['cidade'];

                    $distance = (int)getDistance($addressFrom, $addressTo, "K");
                    if ($distance > 0) {
                        $valor = $valor + ($distance * 1.8);
                    }
                    ?>

                    <!-- ENVI0 E RESULTADO DAS INFORMAÇÕES COLETADAS DO FORMULÁRIO -->
                    <div class="fim">
                        <div class="box">
                            <div class="res">
                                <div class="element">
                                    Valor Total:
                                    <?php                           
                                        echo "R$" . $valor . ",00";                                    
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="sbm">
                            <input type="submit" value="Calcular">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
