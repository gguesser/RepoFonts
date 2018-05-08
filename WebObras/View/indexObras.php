<html>
    <?php

    include('.././ClassesPHP/Header.php');
    include('.././ClassesPHP/Obra.php');

    use Header\Header;
    use Obra\Obra;

    session_start();

    if(isset($_SESSION['validade'])){

        Header::headerPrincipal('Secretaria de Infraestrutura');

    }else{
        header('Location: /Prefeitura/WebObras/View/ErroPagina.php');
    }
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

                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                            <div class="search hidden-xs">
                                <h3>GERAL OBRAS</h3>
                            </div>

                        </div>
                        <div class="col-md-6">
<!--                            <div class="pull-right">-->
<!--                                <label for="">Usuário: --><?php //print $_SESSION['nomeUsuario']?><!--</label>-->
<!--                                <br>-->
<!--                                <label for="">Dia: --><?php //print date('d/m/Y')?><!--</label>-->
<!--                            </div>-->
                        </div>

                    </header>
                    <div class="row quadro-principal">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <b>EM PROCESSO</b>
                            </div>
                            <div class="panel-body">
                                <?php
                                    $resultadoSelecao = Obra::selecionaObras(2);
                                    print '<div class="table-responsive">';
                                        print '<table class="table display dataTable">';
                                            print '<thead>';
                                                print '<tr>';
                                                    print '<th><b>Protocolo</b></th>';
                                                    print '<th><b>Titulo</b></th>';
                                                    print '<th><b>Bairro</b></th>';
                                                    print '<th><b>Rua</b></th>';
                                                    print '<th><b>Morador</b></th>';
                                                    print '<th><b>Abertura</b></th>';
                                                    print '<th><b>Fiscal</b></th>';
                                                    print '<th><b>Previsão</b></th>';
                                                print '</tr>';
                                            print '</thead>';

                                            print '<tbody>';
                                            foreach($resultadoSelecao as $obrasSelecionadas){
                                                print '<tr>';
                                                    print '<td>';
                                                        $metodo = 'cadastroObras.php?protocolo='.$obrasSelecionadas['codProtocolo'];
                                                        print '<button class="btn btn-primary componente_linha_3" onClick=location.href="'.$metodo.'">'.$obrasSelecionadas['codProtocolo'].'</button>';
                                                    print '</td>';
                                                    print '<td>';
                                                        print $obrasSelecionadas['Titulo'];
                                                    print '</td>';
                                                    print '<td>';
                                                        print $obrasSelecionadas['Bairro'];
                                                    print '</td>';
                                                    print '<td>';
                                                        print $obrasSelecionadas['Rua'];
                                                    print '</td>';
                                                    print '<td>';
                                                        print $obrasSelecionadas['Nome'];
                                                    print '</td>';
                                                    print '<td>';
                                                        print date('d/m/Y', strtotime($obrasSelecionadas['dtRegistro']));
                                                    print '</td>';
                                                    print '<td>';
                                                        print $obrasSelecionadas['Fiscal'];
                                                    print '</td>';
                                                    print '<td>';
                                                        print date('d/m/Y', strtotime($obrasSelecionadas['dtPrevisao']));
                                                    print '</td>';
                                                print '</tr>';
                                            }
                                            print '</tbody>';
                                        print '</table>';
                                    print '</div>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row quadro-principal">
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <b>ABERTAS</b>
                                    </div>
                                    <div class="panel-body">
                                        <?php
                                            $resultadoSelecao = Obra::selecionaObras(1);
                                            print '<div class="table-responsive">';
                                                print '<table class="table display dataTable">';
                                                    print '<thead>';
                                                        print '<tr>';
                                                            print '<td><b>Protocolo</b></td>';
                                                            print '<td><b>Titulo</b></td>';
                                                            print '<td><b>Bairro</b></td>';
                                                            print '<td><b>Abertura</b></td>';
                                                            print '<td><b>Fiscal</b></td>';
                                                        print '</tr>';
                                                    print '</thead>';
                                                    print '<tbody>';
                                                    foreach($resultadoSelecao as $obrasSelecionadas){
                                                        print '<tr>';
                                                            print '<td>';
                                                                $metodo = 'cadastroObras.php?protocolo='.$obrasSelecionadas['codProtocolo'];
                                                                print '<button class="btn btn-danger componente_linha_3" onClick=location.href="'.$metodo.'">'.$obrasSelecionadas['codProtocolo'].'</button>';
                                                            print '</td>';
                                                            print '<td>';
                                                                print $obrasSelecionadas['Titulo'];
                                                            print '</td>';
                                                            print '<td>';
                                                                print $obrasSelecionadas['Bairro'];
                                                            print '</td>';
                                                            print '<td>';
                                                                print date('d/m/Y', strtotime($obrasSelecionadas['dtRegistro']));
                                                            print '</td>';
                                                            print '<td>';
                                                                print $obrasSelecionadas['Fiscal'];
                                                            print '</td>';
                                                        print '</tr>';
                                                    }
                                                    print '</tbody>';
                                                print '</table>';
                                            print '</div>';
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <b>CONCLUÍDAS</b>
                                    </div>
                                    <div class="panel-body">
                                        <?php
                                            $resultadoSelecao = Obra::selecionaObras(3);
                                            print '<div class="table-responsive">';
                                                print '<table class="table display dataTable">';
                                                    print '<thead>';
                                                        print '<tr>';
                                                            print '<td><b>Protocolo</b></td>';
                                                            print '<td><b>Titulo</b></td>';
                                                            print '<td><b>Bairro</b></td>';
                                                            print '<td><b>Conclusao</b></td>';
                                                            print '<td><b>Fiscal</b></td>';
                                                        print '</tr>';
                                                    print '</thead>';
                                                    print '<tbody>';
                                                        foreach($resultadoSelecao as $obrasSelecionadas){
                                                            print '<tr>';
                                                                print '<td>';
                                                                    $metodo = 'cadastroObras.php?protocolo='.$obrasSelecionadas['codProtocolo'];
                                                                    print '<button class="btn btn-success componente_linha_3" onClick=location.href="'.$metodo.'">'.$obrasSelecionadas['codProtocolo'].'</button>';
                                                                print '</td>';
                                                                print '<td>';
                                                                    print $obrasSelecionadas['Titulo'];
                                                                print '</td>';
                                                                print '<td>';
                                                                    print $obrasSelecionadas['Bairro'];
                                                                print '</td>';
                                                                print '<td>';
                                                                    print date('d/m/Y', strtotime($obrasSelecionadas['dtConclusao']));
                                                                print '</td>';
                                                                print '<td>';
                                                                    print $obrasSelecionadas['Fiscal'];
                                                                print '</td>';
                                                            print '</tr>';
                                                        }
                                                    print '</tbody>';
                                                print '</table>';
                                             print '</div>';
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<script>

    $(document).ready(function() {

        $('.dataTable').DataTable({

            responsive: true,
            language: {
                "lengthMenu": "_MENU_",
                "zeroRecords": "Nenhuma obra encontrada",
                "info": "Página _PAGE_ de _PAGES_",
                "infoEmpty": "",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search": '',
                "searchPlaceholder": "Pesquise",
                "paginate": {
                    "first":      "Primeiro",
                    "last":       "Último",
                    "next":       "Próximo",
                    "previous":   "Anterior"
                }
            }

        });

    } );

</script>