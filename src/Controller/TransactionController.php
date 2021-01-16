<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Symfony\Component\Validator\Constraints;

use App\Service\CsvManager as CsvManager;
use FOS\RestBundle\View\View; 

use App\Factory\ManagerFactory;
new CsvManager();

/**
 * 
 * @Route("api/")
 */
class TransactionController extends AbstractController
{
    
    private $csv_manager;

    private $manager_factory ;

    public function __construct(ManagerFactory $manager_factory)
    {
        $this->manager_factory = $manager_factory; 
    }

    /**
     * @Rest\View()
     * @Rest\Get("transaction", name="transaction")
     * @QueryParam(name="source", requirements="[a-z]+", nullable=false, description="this param conente just arument 'csv' or 'db'") 
     * 
     * install composer require symfony/validator
     * 
    */
    public function generateTransactionCsvToJson(Request $request, ParamFetcherInterface $paramFetcher)
    {
        
        $source= $paramFetcher->get('source');

        if($source ==='csv' || $source ==='db')
        {
            return $this->manager_factory->createManager($source)->generateTransactionCsvToJson();
        }
        
        
        return $source;
    }


}
