<?php

namespace Yproximite\IovoxBundle;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;
use Yproximite\IovoxBundle\Api\Query;

class Client
{
    public function __construct(private ParameterBagInterface $parameterBag, private HttpClientInterface $client)
    {
    }

    public function executeQuery(Query $query): ResponseInterface
    {
        $options = [
            'query'   => $query->getQueryParameters(),
            'headers' => [
                'username'  => $this->parameterBag->get('iovox.username'),
                'secureKey' => $this->parameterBag->get('iovox.secure_key'),
            ],
        ];

        if (null !== $content = $query->getContent()) {
            $options['body'] = $content;
        }

        return $this->client->request($query->method, sprintf('%s%s', $this->parameterBag->get('iovox.endpoint'), $query->endpoint), $options);
    }
}
