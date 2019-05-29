<?php

// não vamos usar o autoload aqui para ficar compativel com clone ou composer
require __DIR__ . '/../src/Cutter.php';

use Uspdev\Cutter;

// Se quiser usar a lista original troque nomes.csv por /../src/cutter.csv.
// Para rodar ele vai demorar um tanto então não tenha pressa
#$arr = Cutter::load(__DIR__ . '/../src/cutter.csv');
$arr = Cutter::load(__DIR__ . '/nomes.csv');

$ok = 0;
$erro = 0;

echo 'Vamos pegar a lista conhecida "nomes.csv" e verificar os seus códigos cutter' . PHP_EOL;

$count = count($arr);
$i = 1;
$err = '';
foreach ($arr as $tuple) {

    $ret = Cutter::find($tuple[1]);
    if ($ret == (int) $tuple[0]) {
        $ok++;
    } else {
        $erro++;
        $err .= $erro.': "' . $tuple[1] . '" deveria ser ' . $tuple[0] . ' porém retornou ' . $ret . "\n";
    }
    echo 'Testando ' . $i . ' de ' . $count . PHP_EOL. "\033[1A";
    $i++;
}
echo "\n";
echo 'Testes ok: ' . $ok . PHP_EOL;
echo 'Testes com erro: ' . $erro . PHP_EOL;
echo $err ? $err . PHP_EOL: '';
