<?php

declare(strict_types = 1);

namespace Trefle\Tests;

use JsonException;
use PHPUnit\Framework\MockObject\Stub;
use PHPUnit\Framework\TestCase;
use Trefle\Http\Client;

abstract class TrefleTestCase extends TestCase
{
    protected function getClientMock(): Stub&Client
    {
        return $this->createStub(Client::class);
    }

    /**
     * @param string $fileName
     * @return array<string, mixed>
     * @throws JsonException
     */
    protected function getResource(string $fileName): array
    {
        return json_decode(
            file_get_contents(sprintf("%s/resource/%s", __DIR__, $fileName)),
            true,
            JSON_THROW_ON_ERROR,
            JSON_THROW_ON_ERROR
        );
    }

    protected function getMockedClient(string $fileName): Client
    {
        $client = $this->getClientMock();
        $client->method('fetch')->willReturn($this->getResource($fileName));

        /** @var Client */
        return $client;
    }
}
