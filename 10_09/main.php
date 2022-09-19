<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>TESTE</title>
    <link rel="stylesheet" href="novo.css">
</head>

<body>
    <?php
    include('funcao.php');
    $total_med = array();
    error_reporting(E_ERROR | E_PARSE);
    ?>
    <div class="marg">
        <div class="fora">

            <div class="dentro">
                <div class="conteudo">
                    <div class="head">
                        <div class="foto1">
                            <img src="foto1.png" alt="">
                        </div>
                        <div class="tit">
                            <h2>PREÇOS</h2>
                        </div>
                    </div>

                    <div class="t1">PRODUTOS:</div>
                    <div class="l">
                        <div class="linha">
                            <div class="nome">Soro fisiológico (unidade):</div>
                            <div class="preco">R$ 7,00</div>
                        </div>
                    </div>


                    <div class="l">
                        <div class="linha">
                            <div class="nome">Gases (pacote):</div>
                            <div class="preco">R$ 3,00</div>
                        </div>
                    </div>

                    <div class="l">
                        <div class="linha">
                            <div class="nome">Micropore (unidade):</div>
                            <div class="preco">R$ 6,00</div>
                        </div>
                    </div>

                    <div class="l">
                        <div class="linha">
                            <div class="nome">Antisséptico Merthiolate (unidade):</div>
                            <div class="preco">R$15,00</div>
                        </div>
                    </div>

                    <div class="l">
                        <div class="linha">
                            <div class="nome">Fita Glicêmica (unidade):</div>
                            <div class="preco">R$10,00</div>
                        </div>
                    </div>

                    <div class="l">
                        <div class="linha">
                            <div class="nome">Medicação Losartana (caixa):</div>
                            <div class="preco">R$12,00</div>
                        </div>
                    </div>

                    <div class="l">
                        <div class="linha">
                            <div class="nome">Citon Pios 5000 (ampola):</div>
                            <div class="preco">R$25,00</div>
                        </div>
                    </div>

                    <div class="l">
                        <div class="linha">
                            <div class="nome">Aplicação com Seringa (unidade):</div>
                            <div class="preco">R$15,00</div>
                        </div>
                    </div>

                    <div class="t1">SERVIÇOS / ENTREGA:</div>
                    <div class="l">
                        <div class="linha">
                            <div class="nome">Atendimento Especializado Individual:</div>
                            <div class="preco">R$200,00</div>
                        </div>
                    </div>

                    <div class="l">
                        <div class="linhaf">
                            <div class="nome">Quilômetro:</div>
                            <div class="preco">R$ 1,80</div>
                        </div>
                        <div class="foto2">
                            <img src="foto3.png" alt="">
                        </div>
                    </div>



                </div>
            </div>


            <div class="dentro">
                <div class="conteudo">

                    <div class="head">
                        <div class="foto1">
                            <img src="foto1.png" alt="">
                        </div>
                        <div class="tit">
                            <h2>CALCULAR VALOR</h2>
                        </div>
                    </div>
                    <form action="main.php" method="$_GET">

                        <div class="t1">MEDICAMENTOS:</div>
                        <div class="i">
                            <div class="inp">
                                <div class="med">
                                    Soro fisiológico
                                </div>
                                <div class="qnt">
                                    <input class="num" type="number" name="f_med1" min="0">
                                </div>
                            </div>
                        </div>

                        <?php
                        if ($_GET['f_med1'] > 0) {
                            $total_med[0] = 7 * $_GET['f_med1'];
                        }
                        ?>

                        <div class="i">
                            <div class="inp">
                                <div class="med">
                                    Gases
                                </div>
                                <div class="qnt">
                                    <input class="num" type="number" name="f_med2" min="0">
                                </div>
                            </div>
                        </div>

                        <?php
                        if ($_GET['f_med2'] > 0) {
                            $total_med[1] = 3 * $_GET['f_med2'];
                        }
                        ?>

                        <div class="i">
                            <div class="inp">
                                <div class="med">
                                    Micropore
                                </div>
                                <div class="qnt">
                                    <input class="num" type="number" name="f_med3" min="0">
                                </div>
                            </div>
                        </div>

                        <?php
                        if ($_GET['f_med3'] > 0) {
                            $total_med[2] = 6 * $_GET['f_med3'];
                        }
                        ?>

                        <div class="i">
                            <div class="inp">
                                <div class="med">
                                    Antisséptico Merthiolate
                                </div>
                                <div class="qnt">
                                    <input class="num" type="number" name="f_med4" min="0">
                                </div>
                            </div>
                        </div>

                        <?php
                        if ($_GET['f_med4'] > 0) {
                            $total_med[3] = 15 * $_GET['f_med4'];
                        }
                        ?>

                        <div class="i">
                            <div class="inp">
                                <div class="med">
                                    Fita Glicêmica
                                </div>
                                <div class="qnt">
                                    <input class="num" type="number" name="f_med5" min="0">
                                </div>
                            </div>
                        </div>

                        <?php
                        if ($_GET['f_med5'] > 0) {
                            $total_med[4] = 10 * $_GET['f_med5'];
                        }
                        ?>

                        <div class="i">
                            <div class="inp">
                                <div class="med">
                                    Medicação Losartana
                                </div>
                                <div class="qnt">
                                    <input class="num" type="number" name="f_med6" min="0">
                                </div>
                            </div>
                        </div>

                        <?php
                        if ($_GET['f_med6'] > 0) {
                            $total_med[5] = 12 * $_GET['f_med6'];
                        }
                        ?>

                        <div class="i">
                            <div class="inp">
                                <div class="med">
                                    Citon Pios 5000
                                </div>
                                <div class="qnt">
                                    <input class="num" type="number" name="f_med7" min="0">
                                </div>
                            </div>
                        </div>

                        <?php
                        if ($_GET['f_med7'] > 0) {
                            $total_med[6] = 25 * $_GET['f_med7'];
                        }
                        ?>

                        <div class="i">
                            <div class="inp">
                                <div class="med">
                                    Aplicação com Seringa
                                </div>
                                <div class="qnt">
                                    <input class="num" type="number" name="f_med8" min="0">
                                </div>
                            </div>
                        </div>

                        <?php
                        if ($_GET['f_med8'] > 0) {
                            $total_med[7] = 15 * $_GET['f_med8'];
                        }
                        ?>

                        <div class="t1">SOLICITAR ATENDIMENTO ESPECIALIZADO?</div>
                        <div class="inp2">
                            <div class="at">
                                <div class="cnt">
                                    <input type="radio" name="_atend" value="sim">
                                    <div class="esp">Sim</div>
                                </div>
                            </div>
                            <div class="at">
                                <div class="cnt">
                                    <input type="radio" name="_atend" value="nao" checked>
                                    <div class="esp">Não</div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($_GET['_atend'] === "sim") {
                            $valor = $total_med[0] + $total_med[1] + $total_med[2] + $total_med[3] + $total_med[4] + $total_med[5] + $total_med[6] + $total_med[7] + 200;
                        } else {
                            $valor = $total_med[0] + $total_med[1] + $total_med[2] + $total_med[3] + $total_med[4] + $total_med[5] + $total_med[6] + $total_med[7];
                        }
                        ?>

                        <div class="t1">CONFIRME SEU ENDEREÇO:</div>
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
                        $valor = $valor + ($distance * 1.8);
                        ?>


                        <div class="fim">
                            <div class="val">
                                <div class="res">
                                    <div class="fix">
                                        Valor total:
                                        <?php
                                        $valor = str_replace('.', ',', $valor);
                                        echo "R$" . $valor /*. ",00"*/;
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="cal">
                                <input type="submit" value="Calcular">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

</html>
