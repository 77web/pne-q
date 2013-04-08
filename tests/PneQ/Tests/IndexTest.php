<?php

namespace PneQ\Tests;

use Silex\WebTestCase;

require __DIR__.'/../../../lib/vendor/autoload.php';

class IndexTest extends WebTestCase
{
    public function createApplication()
    {
        $app = require __DIR__.'/../../../lib/app.php';
        $app['session.test'] = true;
        
        return $app;
    }
    
    public function testIndexPage()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/');
        
        $this->assertTrue($client->getResponse()->isOk());
        $this->assertCount(2, $crawler->filter('h2'));
        $this->assertCount(3, $crawler->filter('ul li a'));
    }
}