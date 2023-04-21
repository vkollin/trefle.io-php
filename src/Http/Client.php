<?php

declare(strict_types = 1);

namespace Trefle\Http;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Trefle\Exception\NotFoundException;
use Trefle\Exception\TrefleRequestException;
use Trefle\Exception\UnauthorizedException;
use Trefle\Request\Request;

/**
 * @internal
 * Map a client request to a HTTP request
 */
class Client
{
    private GuzzleClient $client;

    public function __construct()
    {
        $this->client = new GuzzleClient();
    }

    /**
     * @throws TrefleRequestException
     */
    public function fetch(Request $clientRequest): array
    {

        $uri = $this->buildUri($clientRequest);
        $method = $clientRequest->getMethod()->value;

        $httpRequest = new GuzzleRequest($method, $uri);

        try {
            $response = $this->client->sendRequest($httpRequest);
        } catch (ClientExceptionInterface $e) {
            throw new TrefleRequestException($e->getMessage(), $e->getCode(), $e);
        }

        if ($response->getStatusCode() === 200) {
            try {
                return json_decode(
                    $response->getBody()->getContents(),
                    true,
                    JSON_THROW_ON_ERROR,
                    JSON_THROW_ON_ERROR
                );
            } catch (JsonException $e) {
                throw new TrefleRequestException($e->getMessage(), $e->getCode(), $e);
            }
        }

        if ($response->getStatusCode() === 401) {
            throw new UnauthorizedException();
        }

        if ($response->getStatusCode() === 404) {
            throw new NotFoundException([$uri, $method]);
        }

        throw new TrefleRequestException($response->getReasonPhrase(), $response->getStatusCode());
    }

    /**
     * @param Request $clientRequest
     * @return string
     */
    public function buildUri(Request $clientRequest): string
    {
        $url = $clientRequest->getUrl();
        $queryPart = $this->buildQueryPart($clientRequest);

        return $queryPart === null
            ? $url
            : sprintf(
                '%s%s',
                $url,
                $queryPart
            );
    }

    private function buildQueryPart(Request $clientRequest): ?string
    {
        $parameters = array_filter($clientRequest->getParameters());

        return empty($parameters)
            ? null
            : sprintf('?%s', http_build_query($parameters));
    }
}
