<?php

    class Tochar{

        public function send($host, $destino, $content){

            $texto = str_split($content);

            showlog(json_encode($texto));
            
            showlog("Enviando mensagem para camada 1 da pilha {$destino}");

            $camada3 = new Tochar();

            $camada3->receive($host, $destino, $texto);

        }

        public function receive($host, $destino, $content){

            showlog("Mensagem recebida da camada 1 da pilha {$host}");

            showlog(json_encode($content));

            $camada2 = new Reverse();
            $camada2->receive($host, $destino, implode("", $content));

        }
    }