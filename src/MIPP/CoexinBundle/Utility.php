<?php

namespace MIPP\CoexinBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

Class Utility extends Bundle{
        public static function getNombreCne($ci){
        $url="http://www.cne.gov.ve/web/registro_electoral/ce.php?nacionalidad=V&cedula=$ci";
        $curl = curl_init();
        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // almacene en una variable
        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $cne='';
 
        if(curl_exec($curl) === false){
            echo 'Curl error: ' . curl_error($curl);
        }else
        {
            $cne = curl_exec($curl);
            $inicio = stripos($cne, '');
            if(strpos($cne, 'Nombre:')>0){
                $cne_datos = substr($cne,$inicio);
                list($ci,$resto )= explode('Nombre:</font></b></td>',$cne_datos);
                list($nombre_htmled,$lo_demas) = explode('<td align="left"><b><font color="#00387b">Estado:',$resto);
                list($nombre,$lo_otro) = explode('</b>',$nombre_htmled);
                $cne = str_replace('<td align="left"><b>', '', $nombre);
                
            }
            else{
                $cne = '';
            }
             
             
        }
        curl_close($curl);
         
        return $cne;
    }
    }