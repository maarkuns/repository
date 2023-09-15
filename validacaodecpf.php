<?php
function validarCPF($cpf) {
    // Remove caracteres não numéricos
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    // Verifica se o CPF possui 11 dígitos
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se todos os dígitos são iguais (caso contrário, não é um CPF válido)
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Calcula os dígitos verificadores
    for ($i = 9; $i < 11; $i++) {
        $soma = 0;
        for ($j = 0; $j < $i; $j++) {
            $soma += $cpf[$j] * (($i + 1) - $j);
        }
        $resto = $soma % 11;
        $digito = ($resto < 2) ? 0 : 11 - $resto;
        if ($digito != $cpf[$i]) {
            return false;
        }
    }

    return true;
}

// Exemplo de uso
$cpf = "123.456.789-09"; // Substitua pelo CPF que deseja verificar
if (validarCPF($cpf)) {
    echo "CPF válido.";
} else {
    echo "CPF inválido.";
}
?>
