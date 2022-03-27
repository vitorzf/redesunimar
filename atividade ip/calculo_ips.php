<?php

require "./funcoes.php";

$response = new stdClass();

$dados = (object) $_POST;

$funcoes = new Funcoes($dados->ip, $dados->mascara);

//Bloco para bits

//Fim bloco bits

//classe
$classe_ip = $funcoes->get_classe_ip();

//tipo de ip
$tipo_ip = $funcoes->get_tipo_ip();

$sub_rede = $funcoes->get_subrede();

$endereco_da_rede = $funcoes->get_endereco_de_rede();

$broadcast = $funcoes->get_broadcast();

$ips_disponiveis = $funcoes->get_qtd_ips();

$html = "<table class=\"table\" style=\"width:100%;\">
            <thead class=\"thead-dark\">
                <tr>
                    <th scope=\"col\">IP</th>
                    <th scope=\"col\">Classe</th>
                    <th scope=\"col\">Tipo</th>
                    <th scope=\"col\">Endereço da Rede</th>
                    <th scope=\"col\">Mascara da Sub-Rede</th>
                    <th scope=\"col\">Broadcast</th>
                    <th scope=\"col\">Intervalo de Hosts Válidos</th>
                    <th scope=\"col\">Quantidade de IPs Disponíveis</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{$dados->ip}/{$dados->mascara}</th>
                    <th>{$classe_ip}</th>
                    <th>{$tipo_ip}</th>
                    <th>{$endereco_da_rede}</th>
                    <th>{$sub_rede}</th>
                    <th>{$broadcast}</th>
                    <th>{$endereco_da_rede} - {$broadcast}</th>
                    <th>Rede: {$ips_disponiveis->ips_rede} - Válidos: {$ips_disponiveis->ips_validos}</th>
                </tr>
            </tbody>
        </table>";

echo json_encode(["error" => false, "tabela" => $html]);