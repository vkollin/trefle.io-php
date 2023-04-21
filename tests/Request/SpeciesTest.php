<?php

declare(strict_types = 1);

namespace Trefle\Tests\Request;

use Trefle\Factory\ResponseFactory;
use Trefle\Request\SearchRequest;
use Trefle\Response\Enumeration\TextureEnumeration;
use Trefle\Tests\TrefleTestCase;
use Trefle\TrefleClient;

class SpeciesTest extends TrefleTestCase
{
    public function testSearchSpecies(): void
    {
        $token = 'TOKEN';

        $client = $this->getMockedClient('search_species.json');

        $trefleClient = new TrefleClient($client, ResponseFactory::create(), $token);

        $request = (new SearchRequest())->setQuery('quercus robur')->setLimit(1);

        $response = $trefleClient->searchSpecies($request);

        $this->assertCount(5, $response->getSpecies());
    }

    public function testGetSpecies(): void
    {
        $token = 'TOKEN';

        $client = $this->getMockedClient('species-quercus-rubra.json');

        $trefleClient = new TrefleClient($client, ResponseFactory::create(), $token);

        $response = $trefleClient->getSpecies('quercus-rubra');

        $species = $response->getSpecies();

        $this->assertFalse($species->isVegetable());
        $this->assertFalse($species->isEdible());
        $this->assertEquals(TextureEnumeration::MEDIUM, $species->getFoliage()->getTexture());
    }

    public function testGetSpecies2(): void
    {
        $token = 'TOKEN';

        $client = $this->getMockedClient('species-fragaria-x-ananassa.json');

        $trefleClient = new TrefleClient($client, ResponseFactory::create(), $token);

        $response = $trefleClient->getSpecies('fragaria-x-ananassa');

        $species = $response->getSpecies();

        $this->assertEquals(5.5, $species->getGrowth()->getPhMinimum());
        $this->assertEquals(35, $species->getGrowth()->getRowSpacing());
    }
}
