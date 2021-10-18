<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Tests\phpunit\Api;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Yproximite\IovoxBundle\Client;

abstract class AbstractMockClient extends KernelTestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        $this->createDefaultClient();
    }

    protected function findFixture(string $filenameWithExtension, ?string $directory = null): string
    {
        if (null !== $directory) {
            $directory .= '/';
        }

        return file_get_contents(sprintf('%s/../Fixtures/%s%s', __DIR__, $directory ?? '', $filenameWithExtension));
    }

    protected function clientMustReturnResponse(string $response, array $info = []): void
    {
        $httpClient = new MockHttpClient([
            new MockResponse($response, $info),
        ]);

        $this->client = new Client(new ParameterBag($this->getDefaultParameters()), $httpClient);
    }

    protected function createDefaultClient(): void
    {
        $httpClient   = new MockHttpClient($this->getDefaultCallback());
        $this->client = new Client(new ParameterBag($this->getDefaultParameters()), $httpClient);
    }

    /**
     * @return array{ 'iovox.username':string, 'iovox.secure_key':string, 'iovox.endpoint':string }
     */
    private function getDefaultParameters(): array
    {
        return [
            'iovox.username'   => 'username',
            'iovox.secure_key' => 'secure_key',
            'iovox.endpoint'   => 'http://127.0.0.1:444',
        ];
    }

    private function getDefaultCallback(): callable
    {
        return function ($method, $url, $options): MockResponse {
            $elements = parse_url($url);
            $path     = $elements['path'] ?? null;
            $queries  = $options['query'] ?? [];
            $file     = http_build_query($queries);
            $file     = sprintf(__DIR__.'/../Fixtures%s/%s-%s.%s', $path, $method, $file, $queries['output'] ?? 'XML' === 'JSON' ? 'json' : 'xml');

            return new MockResponse(file_get_contents($file));
        };
    }
}
