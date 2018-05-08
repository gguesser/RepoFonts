<?php

    $protocolo = $_GET['protocolo'];
    $status    = $_GET['status'];

    $sql  = ' UPDATE prefguara_obras';
    $sql .= ' SET status = "' . $status . '"';
    $sql .= ', dtConclusao = ' . ($status == 'Concluida' ? '"' . date('Y-m-d') . '"' : 'NULL') . '';
    $sql .= ' WHERE 1';
    $sql .= ' AND codProtocolo = ' . $protocolo;

    $conexaoBanco = mysqli_connect('localhost', 'root', 'guilherme22082002guesser', 'prefguara_mainBase', '3306');

    $alteracao = mysqli_query($conexaoBanco, $sql);

    print $alteracao;