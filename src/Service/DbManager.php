<?php

namespace App\Service ;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;


class DbManager extends ServiceEntityRepository
{
    private $entity_manager;
   
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function generateTransactionsToJson()
    {
       $data =  $this->entityManager->getRepository('App:Transactions')
        ->findAll();
        return $data ;
    }
}