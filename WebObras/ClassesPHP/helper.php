<?php

namespace helper;

class helper
{

    static public final function print_r($prString){

        print '<pre>';
        print_r($prString);
        exit;

    }

}