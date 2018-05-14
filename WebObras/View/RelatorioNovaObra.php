<?php

    /*$protocolo = $_GET['protocolo'];
    $url       = $_GET['url'];*/

    include('.././ClassesPHP/Header.php');

    use Header\Header;

    Header::headerPrincipal('Cadastro de Obras');

    $conexao = mysqli_connect('localhost', 'root', 'guilherme22082002guesser', 'prefguara_mainBase', '3306');

    $sql = ' SELECT obr.*, fisc.Nome AS Fiscal FROM prefguara_obras AS obr';
    $sql.= ' LEFT JOIN prefguara_Fiscais AS fisc ON(fisc.codFiscal = obr.codFiscal)';
    $sql.= ' WHERE codProtocolo = ' . $_GET['protocolo'];

    $selectObra = mysqli_query($conexao, $sql);

    $resultadoSelecao = mysqli_fetch_assoc($selectObra);

    $sqlMateriais  = ' SELECT cad.*, SUM(obr.Quantidade) AS quantidadeMaterial FROM prefguara_materiaisPorObras AS obr';
    $sqlMateriais .= ' LEFT JOIN prefguara_cadastroMateriais AS cad ON(cad.codMat = obr.Material)';
    $sqlMateriais .= ' WHERE 1';
    $sqlMateriais .= ' AND obr.Obra = ' . $_GET['protocolo'];
    $sqlMateriais .= ' GROUP BY Material';

    $selectMateriais = mysqli_query($conexao, $sqlMateriais);

    $materiais = '';

    while($resultadoMateriais = mysqli_fetch_assoc($selectMateriais))
    {
        $materiais = $materiais . '<br>' . $resultadoMateriais['NomeMat'] . ' - ' . $resultadoMateriais['quantidadeMaterial'] . ' ' .$resultadoMateriais['UnidadeMedidaMat'];
    }

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
                        <h4 id="titulo" align="center">SECRETARIA DE INFRAESTRUTURA</h4>
                        <h5 align="center">Título Obra: <i>' . $resultadoSelecao['Titulo'] . '</i></h5>
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
                        <label for="" class="componente_linha_3"><b>Protocolo:</b></label>
                        '.$resultadoSelecao['codProtocolo'].'
                        <br>
                        <label for="" class="componente_linha_3"><b>Nome:</b></label>
                        '.$resultadoSelecao['Nome'].'
                        <br>
                    </div>
                    <div class="col-xs-6">
                        <label for="" class="componente_linha_3"><b>Telefone:</b></label>
                        '.$resultadoSelecao['Telefone'].'
                        <br>
                        <label for="" class="componente_linha_3"><b>Registro:</b></label>
                        '.date('d/m/Y', strtotime($resultadoSelecao['dtRegistro'])).'
                        <br>
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <legend>LOCALIDADE</legend>
                    <div class="col-xs-6">
                        <label for="" class="componente_linha_3"><b>Bairro:</b></label>
                        '.$resultadoSelecao['Bairro'].'
                        <br>
                        <label for="" class="componente_linha_3"><b>Rua:</b></label>
                        '.$resultadoSelecao['Rua'].'
                        <br>
                        <label for="" class="componente_linha_3"><b>Complemento:</b></label>
                        '.$resultadoSelecao['dscAdicional'].'
                        <br>
                        <label for="" class="componente_linha_3"><b>Fiscal:</b></label>
                        '.$resultadoSelecao['Fiscal'].'
                    </div>
                    <div class="col-xs-6">
                        <label for="" class="componente_linha_3"><b>Previsão:</b></label>
                        '.date('d/m/Y', strtotime($resultadoSelecao['dtPrevisao'])).'
                        <br>
                        <label for="" class="componente_linha_3"><b>Status:</b></label>
                        '.$resultadoSelecao['Status'].'
                    </div>
                </fieldset>
                <br>
                <fieldset style="height: 9%">
                    <legend>PROBLEMA</legend>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        '.$resultadoSelecao['dscProblema'].'
                    </div>
                </fieldset>
                <br>
                <fieldset style="height: 23%">
                    <legend>MATERIAIS</legend>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        '.$materiais.'
                    </div>
                </fieldset>
                <br>
                <fieldset style="text-align: center">
                    <div>
                        <div class="col-xs-6" style="float: left; width: 45%; margin: 1%;">
                            <label for=""><b>Secretário</b></label>
                            <div>&nbsp;</div>  
                            <div>&nbsp;</div>                          
                            <hr>
                            Sandro Luiz Depin
                        </div>
                        <div class="col-xs-6" style="float: left; width: 50%; margin: 1%">
                            <label for=""><b>Fiscal</b></label>
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                            <hr>
                            '.$resultadoSelecao['Fiscal'].'
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

    ob_clean();
    header('Content-Type: application/pdf');

    echo $snappy->getOutputFromHtml(utf8_decode($html));

    //    header('Location: /Prefeitura/WebObras/View/cadastroObras.php?protocolo='.$protocolo);