<?php 
$path = 'data/country.json';
$jsonString = file_get_contents($path);
$jsonData = json_decode($jsonString, true);

$newData = [];
foreach($jsonData['country'] as $key => $val){
    $val['flag'] = 'https://vansales.github.io/world-schema/src/flags/'.strtolower($val['code']).'.svg';
    $newData[] = $val;
}
// print_r($newData);

$jsonData['country'][] = $newData;
$jsonString = json_encode($jsonData, JSON_PRETTY_PRINT);
// Write in the file

$fp = fopen('data/country-new.json', 'w');
fwrite($fp, $jsonString);
fclose($fp);

?>