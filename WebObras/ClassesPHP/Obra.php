<?php

namespace Obra;

class Obra
{
    public static function selecionaObras($prStatusObra){

        $conexaoBanco = mysqli_connect('localhost', 'root', 'guilherme22082002guesser', 'prefguara_mainBase', '3306');

        if($conexaoBanco){

            $sql  = ' SELECT obr.*, fisc.Nome AS Fiscal FROM prefguara_obras AS obr';
            $sql .= ' LEFT JOIN  prefguara_Fiscais AS fisc ON(fisc.codFiscal = obr.codFiscal)';
            $sql .= ' WHERE 1';
            $sql .= ' AND status = ' . $prStatusObra;

            $selecionaObras = mysqli_query($conexaoBanco, $sql);

            $obrasSelecionadas = array();

            $contador = 0;

            while($resultado = mysqli_fetch_assoc($selecionaObras)){
                $obrasSelecionadas[$contador] = $resultado;
                $contador = $contador + 1;
            }

            return $obrasSelecionadas;

        }else{
            print '<script>';
                print 'swal(\'"Erro!", "Não foi possível conectar a base de dados.", "error"\');';
            print '</script>';
        }

    }
}