<?php

    namespace Model;


    class banco
    {

        public static final function resultSet($prSql)
        {

            $requisicao = mysqli_query(self::conecta(), $prSql);

            while($resultadoQuery = mysqli_fetch_assoc($requisicao))
            {

                $aRegistros[] = $resultadoQuery;

            }

            return $aRegistros;

        }

        public static final function conecta()
        {

            $conexaoBanco = mysqli_connect('localhost', 'root', 'guilherme22082002guesser', 'prefguara_mainBase', '3306');

            return $conexaoBanco;

        }

    }