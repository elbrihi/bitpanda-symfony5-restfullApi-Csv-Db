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
use Symfony\Component\Finder\Finder;

class CsvManager
{
    private $file_manager;

    private $file;
    private $encoders ;
    private $transaction_csv_in;
    public function __construct( string $transaction_csv_in)
    {
        //$this->file_manager = new FileManager();
        $this->transaction_csv_in = $transaction_csv_in;
        $this->encoders =  [new XmlEncoder(), new JsonEncoder(),new CsvEncoder()];
    }

    public function generateTransactionsToJson()
    {
      //dd($this->fromCsvFileToString());
      $serializer = new Serializer([], $this->encoders);
      
      $data = $serializer->decode($this->fromCsvFileToString(), 'csv');

      return $data ;
    }

    public function fromCsvFileToString()
    {
        $finder = new Finder();

        $files =  $finder->files()->in($this->transaction_csv_in );;

        $finder->files()->name('transactions.csv');

        if ($finder->hasResults()) {
            
            foreach ($finder as $file) {
            
                $absoluteFilePath = $file->getRealPath();
             
                $fileNameWithExtension = $file->getRelativePathname();
                  
                $contents = $file->getContents();
                
             
             }
    
             return $contents;
    
        
        }
       
    }



    /*public function generateTransactionsToJson()
    {
      
      $serializer = new Serializer([], $this->encoders);
      
      $data = $serializer->decode($this->file_manager->fromCsvFileToString(), 'csv');

      return $data ;
   
    }*/

}


?>