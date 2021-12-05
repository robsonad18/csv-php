<?php 

require __DIR__.'/vendor/autoload.php';

use \App\Files\Csv;

$dataCreate = [
    [
        "id",
        "nome",
        "descricao"
    ],
    [
        1,
        "Produto teste",
        "Teste produto"
    ],
    [
        2,
        "Produto teste 2",
        "Teste produto 2"
    ]
];

$fileName = base64_encode(time());

// cria arquivo csv
Csv::createFile(__DIR__."/files/". $fileName.".csv", $dataCreate, ",");
// le arquivo csv
$data = Csv::readFile(__DIR__."/files/" . $fileName . ".csv");

print_r($data);