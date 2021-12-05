<?php

namespace App\Files;

/**
 * Responsavel por gerenciar arquivos CSV
 */
class Csv
{
    /**
     * Metodo responsavel por ler um arquivo CSV e retornar um array de dados
     */
    public static function readFile(string $file, bool $header = true, $delimiter = ",")
    {
        if (!file_exists($file)) die("Arquivo não encontrado");

        // dados das linhas do arquivo
        $data = [];
        // abre o arquivo
        $csv = fopen($file, 'r');
        // cabeçalho dos dados
        $headerData = $header ? fgetcsv($csv, 0, $delimiter) : [];
            
        while ($row = fgetcsv($csv, 0, $delimiter)) 
        {
            $data[] = $header ? array_combine($headerData, $row) : $row;
        }

        fclose($csv);

        return $data;
    }



    /**
     * Cria um arquivo csv
     */
    public static function createFile(string $file, array $data, string $delimiter = ","):bool
    {
        // abre o arquivo para escrita
        $csv = fopen($file, "w");

        // cria o corpo do arquivo csv
        foreach($data as $row) fputcsv($csv, $row, $delimiter);
        
        fclose($csv);

        return true;
    }

}
