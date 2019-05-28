<?php
namespace Uspdev;

class Cutter
{
    public static function find($search)
    {
        $search = trim($search);
        $search = strtolower(Cutter::removeAccents($search));

        // esta lista foi compilada a partir do endereço
        // http://203.241.185.12/asd/board/Author/upfile/abcd.htm visitado em 28/5/2019
        $list = Cutter::load(__DIR__ . '/cutter.csv');

        return Cutter::recursiveSearch($search, $list, 0);
    }

    protected static function removeAccents($string)
    {
        return preg_replace('/[`^~\'"]/', null, iconv('UTF-8', 'ASCII//TRANSLIT', $string));
    }

    public static function load($file)
    {
        // $file está no formato 000;xxxx
        $csv = file_get_contents($file);

        //vamos remover as linhas que começam com #
        $csv = preg_replace('/#.*.\n/', '', $csv);

        $arr = array_map(function ($v) {return str_getcsv($v, ";");}, explode("\n", $csv)); // vamos converter para array
        return $arr;
    }

    // método interativo de busca do código cutter
    protected static function recursiveSearch($search, $list, $i)
    {
        $new_list = [];

        foreach ($list as $tuple) {

            $tuple[0] = (int) $tuple[0];
            $tuple[1] = strtolower(trim($tuple[1]));

            if ($i >= strlen($search)) {
                return $list[0][0];
            }

            if ($i > strlen($tuple[1])) {
                break;
            }

            // em alguns momentos $tuple[1][$i] (um caracter) pode não existir, pr isso testamos antes
            if (!empty($tuple[1][$i]) && $search[$i] == $tuple[1][$i]) {
                array_push($new_list, $tuple);
            }
        }

        if (!empty($new_list)) {
            return Cutter::recursiveSearch($search, $new_list, $i + 1);
        } else {
            return $list[0][0];
        }
    }
}
