<?php

    class Reverse{

        public function send($host, $destino, $content){

            $texto = strrev($content);

            showlog($texto);

            $camada1 = new Tochar();

            $camada1->send($host, $destino, $texto);

        }

        public function receive($host, $destino, $content){

            // showlog("Mensagem recebida de {$host}");

            $texto = strrev($content);

            showlog($texto);

            $camada3 = new Tostring();
            $camada3->receive($host, $destino, $texto);

        }
    }