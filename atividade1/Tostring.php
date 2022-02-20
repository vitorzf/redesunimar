<?php

    class Tostring{

        public function send($host, $destino, $content){

            // showlog("Enviando mensagem convertida para string");

            $texto = (string) $content;

            showlog($texto);

            $camada2 = new Reverse();

            $camada2->send($host, $destino, $texto);

        }

        public function receive($host, $destino, $content){

            $texto = (string) $content;
            
            showlog($texto);

            showlog("Mensagem recebida com sucesso!");

        }
    }