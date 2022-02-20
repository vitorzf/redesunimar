<?php

class request{

    public $host;
    public $destino;

    public function __construct($host, $destino){

        $this->host = $host;

        $this->destino = $destino;

    }

    public function send($text){

        // showlog("Enviando mensagem da pilha {$this->host} para pilha {$this->destino}");

        $camada3 = new Tostring();

        $camada3->send($this->host, $this->destino, $text);

    }

}
