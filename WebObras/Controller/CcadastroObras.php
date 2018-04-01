<?php

    include('.././ClassesPHP/Model/banco.php');

    session_start();

    $protocolo       = $_POST['txtProtocolo'];
    $tituloObra      = $_POST['txtTitulo'];
    $nomeMorador     = $_POST['txtNome'];
    $dataRegistro    = date('Y-m-d');
    $rua             = $_POST['txtRua'];
    $numero          = $_POST['txtNumero'];
    $bairro          = $_POST['cbbBairro'];
    $telefoneMorador = $_POST['txtTelefoneDDD'] . $_POST['txtTelefone'];
    $emailMorador    = $_POST['txtEmail'];
    $problema        = $_POST['dscProblema'];
    $fiscal          = $_POST['cbbFiscal'];
    $dataPrevisao    = date('Y-m-d', strtotime(str_replace("/", "-", $_POST["dtPrevisao"])));
    $status          = $_POST['cbbStatus'];
    $dscAdicional    = $_POST['dscAdicional'];
    $dataConclusao   = 'NULL';
    $codigoMateriais = NULL;

    $_SESSION['novaObra'] = array(
        'protocolo'       => $protocolo,
        'tituloObra'      => $tituloObra,
        'nomeMorador'     => $nomeMorador,
        'dataRegistro'    => $dataRegistro,
        'rua'             => $rua,
        'numero'          => $numero,
        'bairro'          => $bairro,
        'telefoneMorador' => $telefoneMorador,
        'emailMorador'    => $emailMorador,
        'problema'        => $problema,
        'fiscal'          => $fiscal,
        'dataPrevisao'    => $dataPrevisao,
        'status'          => $status,
        'dscAdicional'    => $dscAdicional,
        'dataConclusao'   => $dataConclusao,
        'codigoMateriais' => $codigoMateriais
    );

    $conexaoBanco = mysqli_connect('localhost', 'root', 'guilherme22082002guesser', 'prefguara_mainBase', '3306');

    $url = 'RelatorioNovaObra.php?protocolo='.$protocolo;
    $acao = false;

    if (!isset($_SESSION['ocorrenciaObra'])) {

        $status = '1';

        $sql  = ' INSERT INTO prefguara_obras';
        $sql .= ' (codProtocolo, Titulo, Nome, dtRegistro, Rua, Numero, Telefone, Email, dscProblema, codFiscal, dtPrevisao, Status, dscAdicional, dtConclusao, CodigoMateriais, Bairro, Url)';
        $sql .= " VALUES ('" . $protocolo . "', '" . $tituloObra . "','" . $nomeMorador . "', '" . $dataRegistro . "', '" . $rua . "', '" . $numero . "', '" . $telefoneMorador . "', '" . $emailMorador . "', '" . $problema . "', '" . $fiscal . "', '" . $dataPrevisao . "', '" . $status . "', '" . $dscAdicional . "', " . $dataConclusao . ", '" . $codigoMateriais . "', '" . $bairro . "', '" . $url . "');";

        $acao = true;

    } else {

        unset($_SESSION['ocorrenciaObra']);

        $sql  = ' UPDATE prefguara_obras';
        $sql .= ' SET Titulo = "' . $tituloObra . '", Nome = "' . $nomeMorador . '", Rua = "' . $rua . '", Numero = ' . $numero . ', Telefone = "' . $telefoneMorador . '", Email = "' . $emailMorador . '", dscProblema = "' . $problema . '", codFiscal = "' . $fiscal . '", dtPrevisao = "' . $dataPrevisao . '", Status = "' . $status . '", dscAdicional = "' . $dscAdicional . '", Bairro = "' . $bairro . '", Url = "' . $url . '"';
        $sql .= ' WHERE codProtocolo = ' . $protocolo;

    }

    $insercaoBanco = mysqli_query($conexaoBanco, $sql);

    if (!$insercaoBanco) {

        $_SESSION['erroRequisicao'] = true;

    } else {
        $_SESSION['erroRequisicao'] = false;
    }

    mysqli_close($conexaoBanco);

    header('Location: /Prefeitura/WebObras/View/cadastroObras.php?protocolo=' . $protocolo);

