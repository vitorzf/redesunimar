<?php

function showlog($texto){
    $horario = date("d/m/Y H:i:s");
    echo "{$horario}....{$texto} ".PHP_EOL;
}