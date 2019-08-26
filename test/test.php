<?php

// não vamos usar o autoload aqui para ficar compativel com clone ou composer
//require __DIR__ . '/../src/Cutter.php';
// funciona quando clonamos o cutter.
// para testar ao adicionar via composer tem de ajustar o caminho
require __DIR__ . '/../vendor/autoload.php';

use Uspdev\Cutter;

// Se quiser usar a lista original troque nomes.csv por /../src/cutter.csv.
// Para rodar ele vai demorar um tanto então não tenha pressa
//$arr = Cutter::load(__DIR__ . '/../src/cutter.csv');
$arr = Cutter::load(__DIR__ . '/nomes.csv');

$ok = 0;
$erro = 0;

echo 'Vamos pegar a lista conhecida "nomes.csv" e verificar os seus códigos cutter' . PHP_EOL;

$count = count($arr);
$i = 1;
$err = '';
$start_time = microtime(true);
foreach ($arr as $tuple) {

    $ret = Cutter::find($tuple[1]);
    if ($ret == (int) $tuple[0]) {
        $ok++;
    } else {
        $erro++;
        $err .= $erro . ': "' . $tuple[1] . '" deveria ser ' . $tuple[0] . ' porém retornou ' . $ret . "\n";
    }
    echo 'Testando ' . $i . ' de ' . $count . PHP_EOL . "\033[1A";
    $i++;
}
$elapsed_time = microtime(true) - $start_time;
echo "\n";
echo 'Testes ok: ' . $ok . PHP_EOL;
echo 'Testes com erro: ' . $erro . PHP_EOL;
echo $err ? $err . PHP_EOL : '';
echo 'Tempo gasto: ' . $elapsed_time . PHP_EOL;
