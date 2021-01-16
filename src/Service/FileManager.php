<?php 



namespace App\Service;
use Symfony\Component\Finder\Finder;


class FileManager
{
   

    private $transaction_csv_in ;

    private $file_manager ;
    public function __construct($transaction_csv_in)
    {
       
        $this->transaction_csv_in = $transaction_csv_in ;

    }

    public function fromCsvFileToString()
    {
        $finder = new Finder();

        $files =  $finder->files()->in($this->transaction_csv_in);;

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
}