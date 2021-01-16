<?php 



namespace App\Service;
use Symfony\Component\Finder\Finder;


class FileManager
{
   

    private $trasaction_file ;

    public function __construct()
    {
        $this->file_path = str_replace("public","",$_SERVER['DOCUMENT_ROOT']).'var/in/';

    }

    public function fromCsvFileToString()
    {
        $finder = new Finder();

        $files =  $finder->files()->in($this->file_path);;

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