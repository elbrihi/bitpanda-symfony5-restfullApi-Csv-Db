<?php

namespace App\Service;


use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use App\Service\FileManager;
use App\Entity\Transaction ;
use Symfony\Component\Finder\Finder;

class CsvManager
{

    const CSV_SOURCE = 'csv';

    private $file;

    private $encoders ;

    private $transaction_csv_in;

    private $file_manager ;



    public function __construct( string $transaction_csv_in,FileManager $file_manager )
    {

        $this->transaction_csv_in = $transaction_csv_in;
        
        $this->file_manager = $file_manager;

        $this->encoders =  [new XmlEncoder(), new JsonEncoder(),new CsvEncoder()];
    }

    public function generateTransactionsToJson()
    {
      $serializer = new Serializer([], $this->encoders);
      
      $data = $serializer->decode($this->file_manager->fromCsvFileToString(),  self::CSV_SOURCE);

      return $data ;
    }



}


?>