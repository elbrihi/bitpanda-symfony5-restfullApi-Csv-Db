<?php

namespace App\Service;

use  App\Service\FileManager;

use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use App\Entity\Transaction ;
class CsvManager
{
    private $file_manager;

    private $file;
    private $encoders ;
    public function __construct()
    {
        $this->file_manager = new FileManager();
        $this->encoders =  [new XmlEncoder(), new JsonEncoder(),new CsvEncoder()];
    }

    public function generateTransactionCsvToJson()
    {
      
      $serializer = new Serializer([], $this->encoders);
      
      $data = $serializer->decode($this->file_manager->fromCsvFileToString(), 'csv');

      return $data ;
   
    }
}


?>