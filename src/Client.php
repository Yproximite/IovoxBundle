<?php

namespace Yproximite\IovoxBundle;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Yproximite\IovoxBundle\Api\Query;

class Client
{
    public function __construct(private ParameterBagInterface $parameterBag, private HttpClientInterface $client)
    {
    }

    public function executeQuery(Query $query)
    {
        $response = $this->client->request($query->method, sprintf('%s%s', $this->parameterBag->get('iovox.endpoint'), $query->endpoint), [
            'query'   => $query->getQueryParameters(),
            'headers' => [
                'username'  => $this->parameterBag->get('iovox.username'),
                'secureKey' => $this->parameterBag->get('iovox.secure_key'),
            ],
        ]);

        return $response->getContent();
    }
}
