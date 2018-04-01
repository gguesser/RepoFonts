<html>

    <?php

        session_start();

        include('.././ClassesPHP/Header.php');

        use Header\Header;

        Header::headerPrincipal('Estatísticas');

        $conexao = mysqli_connect('localhost', 'root', 'guilherme22082002guesser', 'prefguara_mainBase', '3306');

        /**Quadro de comparação*/

        $sql_total_obras = 'SELECT COUNT(*) AS total_obras FROM prefguara_obras';

        $select_total_obras = mysqli_query($conexao, $sql_total_obras);

        $total_obras = mysqli_fetch_assoc($select_total_obras);

        $total_obras = $total_obras['total_obras'];


        //Abertas

        $sql_aberta = 'SELECT COUNT(*) as total_aberta FROM prefguara_obras WHERE Status = 1';

        $selecao_aberta = mysqli_query($conexao, $sql_aberta);

        $total_aberta = mysqli_fetch_assoc($selecao_aberta);

        $total_aberta = $total_aberta['total_aberta'];

            //Dentro Prazo

            $sql_aberta_dentroprazo = 'SELECT COUNT(*) AS total_aberta_dentroprazo FROM prefguara_obras WHERE Status = 1 AND dtPrevisao > "' . date('Y-m-d' . '"');

            $select_aberta_dentroprazo = mysqli_query($conexao, $sql_aberta_dentroprazo);

            $total_aberta_dentroprazo = mysqli_fetch_assoc($select_aberta_dentroprazo);

            $total_aberta_dentroprazo = $total_aberta_dentroprazo['total_aberta_dentroprazo'];

            //Fora Prazo

            $sql_aberta_foraprazo = 'SELECT COUNT(*) AS total_aberta_foraprazo FROM prefguara_obras WHERE Status = 1 AND dtPrevisao < "' . date('Y-m-d' . '"');

            $select_aberta_foraprazo = mysqli_query($conexao, $sql_aberta_foraprazo);

            $total_aberta_foraprazo = mysqli_fetch_assoc($select_aberta_foraprazo);

            $total_aberta_foraprazo = $total_aberta_foraprazo['total_aberta_foraprazo'];

        //Em processo

        $sql_emprocesso = 'SELECT COUNT(*) AS total_emprocesso FROM prefguara_obras WHERE Status = 2';

        $select_emprocesso = mysqli_query($conexao, $sql_emprocesso);

        $total_emprocesso = mysqli_fetch_assoc($select_emprocesso);

        $total_emprocesso = $total_emprocesso['total_emprocesso'];

            //Dentro Prazo

            $sql_emprocesso_dentroprazo = 'SELECT COUNT(*) AS total_emprocesso_dentroprazo FROM prefguara_obras WHERE Status = 2 AND dtPrevisao > "' . date('Y-m-d' . '"');

            $select_emprocesso_dentroprazo = mysqli_query($conexao, $sql_emprocesso_dentroprazo);

            $total_emprocesso_dentroprazo = mysqli_fetch_assoc($select_emprocesso_dentroprazo);

            $total_emprocesso_dentroprazo = $total_emprocesso_dentroprazo['total_emprocesso_dentroprazo'];

            //Fora Prazo

            $sql_emprocesso_foraprazo = 'SELECT COUNT(*) AS total_emprocesso_foraprazo FROM prefguara_obras WHERE Status = 2 AND dtPrevisao < "' . date('Y-m-d' . '"');

            $select_emprocesso_foraprazo = mysqli_query($conexao, $sql_emprocesso_foraprazo);

            $total_emprocesso_foraprazo = mysqli_fetch_assoc($select_emprocesso_foraprazo);

            $total_emprocesso_foraprazo = $total_emprocesso_foraprazo['total_emprocesso_foraprazo'];


        //Buscas a quantidade de obras Finalizadas

        $sql_finalizada = 'SELECT COUNT(*) AS total_finalizada FROM prefguara_obras WHERE Status = 3';

        $selecao_finalizada = mysqli_query($conexao, $sql_finalizada);

        $total_finalizada = mysqli_fetch_assoc($selecao_finalizada);

        $total_finalizada = $total_finalizada['total_finalizada'];

            //Dentro Prazo

            $sql_finalizada_dentroprazo = 'SELECT COUNT(*) AS total_finalizada_dentroprazo FROM prefguara_obras WHERE Status = 3 AND dtPrevisao > "' . date('Y-m-d' . '"');

            $select_finalizada_dentroprazo = mysqli_query($conexao, $sql_finalizada_dentroprazo);

            $total_finalizada_dentroprazo = mysqli_fetch_assoc($select_finalizada_dentroprazo);

            $total_finalizada_dentroprazo = $total_finalizada_dentroprazo['total_finalizada_dentroprazo'];

            //Fora Prazo

            $sql_finalizada_foraprazo = 'SELECT COUNT(*) AS total_finalizada_foraprazo FROM prefguara_obras WHERE Status = 3 AND dtPrevisao < "' . date('Y-m-d' . '"');

            $select_finalizada_foraprazo = mysqli_query($conexao, $sql_finalizada_foraprazo);

            $total_finalizada_foraprazo = mysqli_fetch_assoc($select_finalizada_foraprazo);

            $total_finalizada_foraprazo = $total_finalizada_foraprazo['total_finalizada_foraprazo'];


    /**Quadro Pizza*/

    $sql_fiscal = ' SELECT fis.Nome AS name, COUNT(obr.codProtocolo) AS y FROM prefguara_obras AS obr';
    $sql_fiscal.= ' LEFT JOIN prefguara_Fiscais AS fis ON(obr.codFiscal = fis.codFiscal)';
    $sql_fiscal.= ' WHERE fis.Operante = 1';
    $sql_fiscal.= ' GROUP BY fis.codFiscal';

    $select_fiscal = mysqli_query($conexao, $sql_fiscal);

    while($total_fiscal = mysqli_fetch_assoc($select_fiscal))
    {

        $estatistica_fiscal[] = $total_fiscal;

    }

    $estatistica_fiscal = json_encode($estatistica_fiscal);

    ?>

    <body class="home">
        <div class="container-fluid display-table">
            <div class="row display-table-row">
                <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                    <div class="logo">
                        <img src="../Imagens/atende.php.png" alt="prefeitura_guaramirim" class="img-responsive">
                    </div>
                    <div class="navi">
                        <ul>
                            <li>
                                <a href="indexObras.php">Inicio</a>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastros</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="cadastroObras.php">Nova Obra</a>
                                    </li>
                                    <li>
                                        <a href="cadastroFiscais.php">Novo Fiscal</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="estatisticas.php">Estatísticas</a>
                            </li>
                            <li>
                                <a href="index.php">Sair</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10 col-sm-11 display-table-cell v-align">
                    <header>
                        <div class="col-md-6">
                            <nav class="navbar-default pull-left">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </nav>
                            <div class="search hidden-xs">
                                <h3>ESTATÍSTICAS</h3>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="pull-right">
                                <label for="">Usuário: <?php print $_SESSION['nomeUsuario']?></label>
                                <br>
                                <label for="">Dia: <?php print date('d/m/Y')?></label>
                            </div>
                        </div>
                    </header>

                    <div class="row quadro-principal">

                        <div class="col-md-12 col-lg-12">

                            <div id="container" class="pull-left" style="width:100%; height:400px;"></div>

                        </div>

                    </div>

                    <div class="row quadro-principal">

                        <div class="col-md-12 col-lg-12">

                            <div id="pieChart" class="pull-left" style="width:100%; height:400px;"></div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </body>

</html>

<script>

    $(function () {

        var total_aberta     = parseFloat('<?php print $total_aberta; ?>');
        var total_aberta_dentroprazo = parseFloat('<?php print $total_aberta_dentroprazo; ?>');
        var total_aberta_foraprazo = parseFloat('<?php print $total_aberta_foraprazo; ?>');

        var total_emprocesso = parseFloat('<?php print $total_emprocesso; ?>');
        var total_emprocesso_dentroprazo = parseFloat('<?php print $total_emprocesso_dentroprazo; ?>');
        var total_emprocesso_foraprazo = parseFloat('<?php print $total_emprocesso_foraprazo; ?>');

        var total_finalizada = parseFloat('<?php print $total_finalizada; ?>');
        var total_finalizada_dentroprazo = parseFloat('<?php print $total_finalizada_dentroprazo; ?>');
        var total_finalizada_foraprazo = parseFloat('<?php print $total_finalizada_foraprazo; ?>');

        var myChart = Highcharts.chart('container', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Obras Geral'
            },

            xAxis: {
                categories: ['Abertas', 'Em processo', 'Finalizadas']
            },
            yAxis: {
                title: {
                    text: ' ---'
                }
            },

            series: [
                {
                    name: 'Total',
                    data: [total_aberta, total_emprocesso, total_finalizada]
                },{
                    name: 'Dentro do prazo',
                    data: [total_aberta_dentroprazo, total_emprocesso_dentroprazo, total_finalizada_dentroprazo]
                }, {
                    name: 'Fora do prazo',
                    data: [total_aberta_foraprazo, total_emprocesso_foraprazo, total_finalizada_foraprazo]
                }]
        });


        /**Quadro Pizza*/

        var estatistica_fiscal = <?php print $estatistica_fiscal;?>;

        var fiscal = new Array();

        for (i = 0; i < estatistica_fiscal.length; i++){
            fiscal.push([estatistica_fiscal[i]['name'], parseFloat(estatistica_fiscal[i]['y'])]);
        }

        var pieChart = Highcharts.chart('pieChart', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Alocação de obras por fiscal - 2018'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Percentual',
                colorByPoint: true,
                data: fiscal
            }]
        });

    });

</script>