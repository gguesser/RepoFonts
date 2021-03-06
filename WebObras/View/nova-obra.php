<?php

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

    $html ='<html>'.

    Header::headerPrincipal('Cadastro de Obras')

    .'<body>
              <div class="container">
                <div class="row">
                    <div class="col-xs-12 cabecalhoReport">
                        <div class="col-xs-3">
                            <div class="img">
                                <img src="../././Imagens/atende.php.png" class="img-responsive">
                            </div>
                        </div>
                        <div class="col-xs-9 titulo">
                            <h1 id="titulo">SECRETARIA DE INFRAESTRUTURA</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 corpoReport">
                        <fieldset>
                            <legend>MORADOR</legend>
                            <div class="col-xs-6">
                                <label for="" class="componente_linha_3">Nome:</label>
                                '.$morador.'
                                <label for="" class="componente_linha_3">E-mail:</label>
                                '.$emailMorador.'
                            </div>
                            <div class="col-xs-6">
                                <label for="" class="componente_linha_3">Registro:</label>
                                '.$dataRegistro.'
                                <label for="" class="componente_linha_3">Protocolo:</label>
                                '.$protocolo.'
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>LOCALIDADE</legend>
                            <div class="col-xs-6">
                                <label for="" class="componente_linha_3">Bairro:</label>
                                '.$bairro.'
                                <label for="" class="componente_linha_3">Rua:</label>
                                '.$rua.'
                                <label for="" class="componente_linha_3">Fiscal:</label>
                                '.$fiscal.'
                            </div>
                            <div class="col-xs-6">
                                <label for="" class="componente_linha_3">Previsão:</label>
                                '.$dataPrevisao.'
                                <label for="" class="componente_linha_3">Status:</label>
                                '.$status.'
                            </div>
                        </fieldset>
                        <fieldset style="height: 10%">
                            <legend>PROBLEMA</legend>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                '.$problema.'
                            </div>
                        </fieldset>

                        <fieldset style="height: 10%">
                            <legend>Materiais Utilizados</legend>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                '.$problema.'
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="col-xs-6">
                                <label for="">Secretário</label>
                                <hr>
                            </div>
                            <div class="col-xs-6">
                                <label for="">Fiscal</label>
                                <hr>
                            </div>
                        </fieldset>

                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 rodapeReport" class="componente_linha_3">
                        <h4>Secretaria de Ifraestrutura</h4>
                    </div>
                </div>
              </div>
         </body>
         </html>

    ';

print $html;
exit;

?>