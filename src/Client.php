<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;
use Yproximite\IovoxBundle\Api\Query;

class Client
{
    public function __construct(private ParameterBagInterface $parameterBag, private HttpClientInterface $client)
    {
    }

    public function getCallFlowSchema(): ResponseInterface
    {
        return $this->client->request(Request::METHOD_GET, 'https://ent.iovox.com/schema/callflow_schema.xsd');
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
