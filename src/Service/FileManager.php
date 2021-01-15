<?php 



namespace App\Service;
use Symfony\Component\Finder\Finder;


class FileManager
{
    private $finder ;

    private $transaction_csv_in;

    public function __construct($transaction_csv_in)
    {
        $finder = new Finder();
       
        $this->finder = $finder;  
        $this->transaction_csv_in =  $transaction_csv_in;
    }

    public function fromFileCsvToString()
    {

        //dd($this->transaction_csv_in);
        $finder = new Finder();

        
        $files =  $finder->files()->in($this->hotels_csv_out);

        $finder->files()->name('*'.$file_name);
      
        
        if (!$finder->hasResults()) {
            echo  "doesn't exist any file with this name ".$file_name ;
            die;
            return [];
            
        }
     
        foreach ($finder as $file) {
            
            $absoluteFilePath = $file->getRealPath();
         
            $fileNameWithExtension = $file->getRelativePathname();
              
            $contents = $file->getContents();
            
         
         }
         
      
        return $contents ;
    }
}