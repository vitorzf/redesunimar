<?php

    require_once(__DIR__.DIRECTORY_SEPARATOR."request.php");
    require_once(__DIR__.DIRECTORY_SEPARATOR."functions.php");
    require_once(__DIR__.DIRECTORY_SEPARATOR."Tostring.php");
    require_once(__DIR__.DIRECTORY_SEPARATOR."Reverse.php");
    require_once(__DIR__.DIRECTORY_SEPARATOR."Tochar.php");

    showlog("Digite qual pilha deseja utilizar para enviar uma mensagem, A ou B");
    $handle = fopen ("php://stdin","r");
    $host = strtoupper(trim(fgets($handle)));

    if($host != 'A' && $host != "B"){
        showlog("Finalizando a execução");
        fclose($handle);
        exit();
    }

    fclose($handle);

    $destino = ($host == "A" ? "B" : "A");

    $requisicao = new request($host, $destino);

    while(true){

        showlog("Digite a mensagem a ser enviada da pilha {$host} -> {$destino} ------ \"exit\" para finalizar o programa");
        $handle = fopen ("php://stdin","r");

        $line = trim(fgets($handle));

        if(trim($line) == 'exit'){
            showlog("Finalizando a execução");
            fclose($handle);
        }

        if(!empty($line)){
            $requisicao->send($line);
        }
        fclose($handle);

    }
