<?php
/**
 * @author: aibayanyu
 * Time: 2020/6/19 13:56
 */
if (!function_exists("pk_decode")){
    function pk_decode($data){
        $rsa = app('\aibayanyu\rsa\Auth');
        return $rsa->pkDecrypt($data);
    }
}

if (!function_exists("pk_encode")){
    function pk_encode($data){
        $rsa = app('\aibayanyu\rsa\Auth');
        return $rsa->pkEncrypt($data);
    }
}

if (!function_exists("pu_decode")){
    function pu_decode($data){
        $rsa = app('\aibayanyu\rsa\Auth');
        return $rsa->puDecrypt($data);
    }
}

if (!function_exists("pu_encode")){
    function pu_encode($data){
        $rsa = app('\aibayanyu\rsa\Auth');
        return $rsa->puEncrypt($data);
    }
}