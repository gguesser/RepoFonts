<?php

    /*$protocolo = $_GET['protocolo'];
    $url       = $_GET['url'];*/

    include('.././ClassesPHP/Header.php');

    use Header\Header;
    Header::headerPrincipal('Cadastro de Obras');

    /**Variáveis que compoem o relatório*/

    $morador        = $_GET['nome'];
    $emailMorador   = $_GET['email'];
    $dataRegistro   = $_GET['registro'];
    $protocolo      = $_GET['protocolo'];
    $bairro         = $_GET['bairro'];
    $rua            = $_GET['rua'];
    $fiscal         = $_GET['fiscal'];
    $dataPrevisao   = $_GET['previsao'];
    $status         = $_GET['status'];
    $problema       = $_GET['problema'];
    $materiais      = $_GET['materiais'];

    $html ='<html>'.

    Header::headerPrincipal('Cadastro de Obras')

    .'<body>
      <div class="container">
        <fieldset style="background-color: lightgoldenrodyellow">
            <div class="row">
                <div class="col-xs-12 cabecalhoReport">
                    <div class="col-xs-3">
                        <div class="img">
                        </div>
                    </div>
                    <div class="col-xs-9 titulo">
                        <h1 id="titulo" align="center">SECRETARIA DE INFRAESTRUTURA</h1>
                        <h2 align="center">Registro de Obra</h2>
                    </div>
                </div>
            </div>
        </fieldset>
        <br>
        <div class="row">
            <div class="col-xs-12 corpoReport">
                <fieldset>
                    <legend>MORADOR</legend>
                    <div class="col-xs-6">
                        <label for="" class="componente_linha_3">Nome:</label>
                        '.$morador.'
                        <br>
                        <label for="" class="componente_linha_3">E-mail:</label>
                        '.$emailMorador.'
                    </div>
                    <div class="col-xs-6">
                        <label for="" class="componente_linha_3">Registro:</label>
                        '.$dataRegistro.'
                        <br>
                        <label for="" class="componente_linha_3">Protocolo:</label>
                        '.$protocolo.'
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <legend>LOCALIDADE</legend>
                    <div class="col-xs-6">
                        <label for="" class="componente_linha_3">Bairro:</label>
                        '.$bairro.'
                        <br>
                        <label for="" class="componente_linha_3">Rua:</label>
                        '.$rua.'
                        <br>
                        <label for="" class="componente_linha_3">Fiscal:</label>
                        '.$fiscal.'
                    </div>
                    <div class="col-xs-6">
                        <label for="" class="componente_linha_3">Previsão:</label>
                        '.$dataPrevisao.'
                        <br>
                        <label for="" class="componente_linha_3">Status:</label>
                        '.$status.'
                    </div>
                </fieldset>
                <br>
                <fieldset style="height: 10%">
                    <legend>PROBLEMA</legend>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        '.$problema.'
                    </div>
                </fieldset>
                <br>
                <fieldset style="height: 13%">
                    <legend>MATERIAIS</legend>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        '.$materiais.'
                    </div>
                </fieldset>
                <br>
                <fieldset style="text-align: center">
                    <div>
                            <div class="col-xs-6" style="float: left; width: 45%; margin: 1%;">
                                <label for="">Secretário</label>
                                <div>&nbsp;</div>  
                                <div>&nbsp;</div>                          
                                <hr>
                            </div>
                            <div class="col-xs-6" style="float: left; width: 50%; margin: 1%">
                                <label for="">Fiscal</label>
                                <div>&nbsp;</div>
                                <div>&nbsp;</div>
                                <hr>
                            </div>
                        </div>
                </fieldset>
                <br>
                <fieldset style="background-color: lightgoldenrodyellow; text-align: center">
                    <div class="row" align="center">
                        <div class="col-xs-12 rodapeReport" class="componente_linha_3">
                            <h4>Secretaria de Ifraestrutura</h4>
                        </div>
                    </div>
                </fieldset>

            </div>
        </div>
      </div>
     </body>
    </html>

    ';

    require_once '.././vendor/autoload.php';

    use Knp\Snappy\Pdf;

    $snappy = new Pdf('/usr/local/bin/wkhtmltopdf');

    header('Content-Type: application/pdf');

    echo $snappy->getOutputFromHtml(utf8_decode($html));

    //    header('Location: /Prefeitura/WebObras/View/cadastroObras.php?protocolo='.$protocolo);