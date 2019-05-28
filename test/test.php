<?php
require __DIR__ . '/../vendor/autoload.php';

use Uspdev\Cutter;

$arr = Cutter::load(__DIR__ . '/nomes.csv');

$ok = 0;
$erro = 0;

echo 'Vamos pegar a lista conhecida "nomes.csv" e verificar os seus códigos cutter' . PHP_EOL;

foreach ($arr as $tuple) {

    $ret = Cutter::find($tuple[1]);
    if ($ret == (int) $tuple[0]) {
        $ok++;
    } else {
        $erro++;
        echo '"' . $tuple[1] . '" deveria ser ' . $tuple[0] . ' porém retornou ' . $ret . "\n";
    }
}

echo 'Testes ok: ' . $ok . "\n";
echo 'Testes com erro: ' . $erro . "\n";
