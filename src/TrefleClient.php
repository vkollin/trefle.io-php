<?php

declare(strict_types = 1);

namespace Trefle;

use Trefle\Exception\TrefleRequestException;
use Trefle\Factory\ResponseFactory;
use Trefle\Http\Client;
use Trefle\Request\Request;
use Trefle\Request\SearchRequest;
use Trefle\Request\SingleRequest;
use Trefle\Response\PlantResponse;
use Trefle\Response\SearchSpeciesResponse;
use Trefle\Response\SpeciesResponse;

class TrefleClient
{
    public function __construct(
        private readonly Client                        $client,
        private readonly ResponseFactory               $responseFactory,
        #[SensitiveParameter] private readonly ?string $token,
    ) {
    }

    public static function create(?string $token): self
    {
        return new TrefleClient(new Client(), ResponseFactory::create(), $token);
    }

    /**
     * @throws TrefleRequestException
     */
    private function fetch(Request $request): array
    {
        $request->addParameter('token', $this->token);

        return $this->client->fetch($request);
    }

    /**
     * @throws TrefleRequestException
     */
    public function searchSpecies(SearchRequest $request): SearchSpeciesResponse
    {
        $request->setPath('/species/search');

        $response = $this->fetch($request);

        return $this->responseFactory->createSearchSpeciesResponse($response);
    }

    /**
     * @throws TrefleRequestException
     */
    public function getSpecies(string|int $slugOrId): SpeciesResponse
    {
        $request = new SingleRequest();
        $request->setPath(sprintf("/species/%s", $slugOrId));

        $response = $this->fetch($request);

        return $this->responseFactory->createSpeciesResponse($response);
    }

    /**
     * @throws TrefleRequestException
     */
    public function getPlant(string|int $slugOrId): PlantResponse
    {
        $request = new SingleRequest();
        $request->setPath(sprintf("/species/%s", $slugOrId));

        $response = $this->fetch($request);

        return $this->responseFactory->createPlantResponse($response);
    }
}
