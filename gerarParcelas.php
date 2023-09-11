<?php

function gerarParcelas($numeroParcelas, $periodicidade, $dataInicio) {
    // Array para armazenar as datas das parcelas
    $parcelas = array();

    // Converter a data de início em um objeto DateTime
    $data = new DateTime($dataInicio);

    // Loop para gerar as datas das parcelas
    for ($i = 0; $i < $numeroParcelas; $i++) {
        // Clonar a data atual para evitar referência direta
        $dataParcela = clone $data;

        // Adicionar a periodicidade (em dias) à data da parcela
        $dataParcela->modify("+" . $i * $periodicidade . " days");

        // Adicionar a data da parcela ao array
        $parcelas[] = $dataParcela->format('Y-m-d'); // Formato 'YYYY-MM-DD'
    }

    return $parcelas;
}

// Exemplo de uso
$numeroParcelas = 5; // Número total de parcelas
$periodicidade = 30; // Intervalo entre as parcelas em dias (neste caso, 30 dias)
$dataInicio = '2023-09-01'; // Data de início das parcelas no formato 'YYYY-MM-DD'

$parcelasGeradas = gerarParcelas($numeroParcelas, $periodicidade, $dataInicio);
print_r($parcelasGeradas);