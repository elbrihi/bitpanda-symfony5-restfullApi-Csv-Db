<?php

namespace App\Factory;

use App\Service\CsvManager;
use App\Service\DbManager ;
use Doctrine\ORM\EntityManagerInterface  ;
use Doctrine\Common\Persistence\ManagerRegistry;

final class ManagerFactory
{
    private $entity_manager;

    private $transaction_csv_in;

    public function __construct(EntityManagerInterface $entityManager, string $transaction_csv_in)
    {
        $this->entityManager = $entityManager;
        $this->transaction_csv_in= $transaction_csv_in;
    }

  

    public function createManager($source)
    {
     
            switch ($source) {
                case 'db':
                    $transactions_manager = new DbManager($this->entityManager);
                break;
                case 'csv':
                    $transactions_manager = new CsvManager($this->transaction_csv_in);
                
            }
    
            return $transactions_manager;
        
    }
}