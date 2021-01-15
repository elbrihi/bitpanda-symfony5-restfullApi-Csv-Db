<?php

namespace App\Factory;

use App\Service\CsvManager;

final class ManagerFactory
{
    public function __construct()
    {
        
    }

    public static function createManager($source)
    {
       

        $manager = '\\App\\Service\\'.ucfirst($source).'Manager';
       
        return new $manager;
    }
}