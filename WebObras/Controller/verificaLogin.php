<?php

//    ini_set('display_errors', true);

    $usuario = $_POST['txtUsuario'];
    $senha   = $_POST['txtSenha'];

    $sql = 'SELECT * FROM prefguara_usuarios WHERE Login = "'.$usuario.'" AND Password = "'.md5($senha).'"';

    $conexaoBanco = mysqli_connect('localhost', 'root', 'guilherme22082002guesser', 'prefguara_mainBase', '3306');
//    $conexaoBanco->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);

    $selectUsuario = mysqli_query($conexaoBanco, $sql);

    while($resultado = mysqli_fetch_assoc($selectUsuario)) {
        $resultadoSelect = $resultado;
    }

    if($resultadoSelect){

        $get = '?usuario='.$usuario.'&senha='.md5($senha);

        session_start();

        $_SESSION['validade'] = "ok";

        if($resultadoSelect['Privileges'] == 'A'){
            $redirecionameto = "indexObras.php";
        }else{
            $redirecionameto = "indexObras.php".$get;
        }

        $_SESSION['nomeUsuario'] = $resultadoSelect['Nome'];

        header('Location: /Prefeitura/WebObras/View/'.$redirecionameto);
    }
    else{
        header('Location: /Prefeitura/WebObras/View?Erro=1');
    }

