# Cutter

Biblioteca que retorna o código cutter de uma string.

Para saber o que é e para que serve veja https://pt.wikipedia.org/wiki/Tabela_de_Cutter.

Esta biblioteca foi inspirada pelo projeto https://github.com/bcunhasa/gerador-cutter que está escrito em python. Especificamente aproveitei boa parte do método recursivo para encontrar o código.

A tabela utilizada foi retirada do endereço http://203.241.185.12/asd/board/Author/upfile/abcd.htm, visitado em 28/5/2019. Parece ser a mesma tabela publicada em http://conteudo.icmc.usp.br/Portal/Sistemas/Biblioteca/cutter/ e em http://biblioteca.eesc.usp.br/index.php?option=com_content&view=article&id=206&Itemid=375.

## Utilização

Essa biblioteca foi testada em Linux Ubuntu 18.04 mas deve funcionar em qualquer sistema sem problemas. Inclusive não requer dependência alguma.

Adicione esta biblioteca ao seu projeto

```sh
composer require uspdev/cutter
```

Exemplo de teste

```php
<?php

require 'vendor/autoload.php';

use Uspdev\Cutter;

echo Cutter::find('Kawabata, Neto').PHP_EOL;

```

## Teste

Na pasta ```/test``` é feito a busca por alguns nomes e verifica o resultado. Essa lista não é longa hoje mas será aumentada ao longo do tempo. Para rodar o teste digite na linha de comando

```sh
php vendor/uspdev/cutter/test/test.php
```

Se você clonou o projeto no github o caminho para o teste é

```sh
php test/test.php
```


