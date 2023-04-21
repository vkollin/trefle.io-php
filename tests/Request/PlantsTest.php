<?php

declare(strict_types = 1);

namespace Trefle\Tests\Request;

use Trefle\Factory\ResponseFactory;
use Trefle\Tests\TrefleTestCase;
use Trefle\TrefleClient;

class PlantsTest extends TrefleTestCase
{
    public function testGetPlant(): void
    {
        $token = 'TOKEN';

        $client = $this->getMockedClient('plants-abies-balsamea.json');

        $trefleClient = new TrefleClient($client, ResponseFactory::create(), $token);

        $response = $trefleClient->getPlant('abies-balsamea');

        $plant = $response->getPlant();

        $this->assertEquals('Canada balsam', $plant->getCommonName());
    }
}
