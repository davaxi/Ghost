<?php

use Davaxi\Ghost\Client as GhostClient;
error_reporting(E_ALL ^ E_DEPRECATED);

require_once __DIR__ . '/../vendor/autoload.php';

date_default_timezone_set('Europe/Paris');

if (class_exists('\PHPUnit_Framework_TestCase')) {
    class GhostPHPUnit extends PHPUnit_Framework_TestCase
    {
    }
} else {
    class GhostPHPUnit extends \PHPUnit\Framework\TestCase
    {
    }
}

class GhostClientMockup extends GhostClient
{
    public function getAttribute($attribute)
    {
        return $this->$attribute;
    }
}
