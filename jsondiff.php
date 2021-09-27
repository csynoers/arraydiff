<?php
    $url1        = 'url_here';
    $url2        = 'url_here';
    $field          = 'id';
    $dataComplete   = '1';

    ini_set("allow_url_fopen", 1);
    $json1 = json_decode(file_get_contents($url1), true);
    $json2 = json_decode(file_get_contents($url2), true);
    $json1 = [['id'=>1],['id'=>2],['id'=>3],];
    $json2 = [['id'=>1],['id'=>2],];

    $array1 = [];
    foreach ($json1 as $key => $value) {
        array_push($array1, $value[$field]);
    }
    $array2 = [];
    foreach ($json2 as $key => $value) {
        array_push($array2, $value[$field]);
    }

    $arrayDiffByField = array_diff($array1, $array2);
    $dataDiff = [];
    foreach (${'json'.$dataComplete} as $key => $value) {
        if (in_array($value[$field], $arrayDiffByField)) {
            $dataDiff[] = $value;
        }
    }

    echo '<pre>';
    print_r($dataDiff);
    echo '</pre>';
