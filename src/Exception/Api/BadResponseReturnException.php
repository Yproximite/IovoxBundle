<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Exception\Api;

use Symfony\Contracts\HttpClient\ResponseInterface;
use Yproximite\IovoxBundle\Api\ErrorResult\ErrorResultInterface;

class BadResponseReturnException extends \Exception
{
    /**
     * @param array<int, ErrorResultInterface> $listErrorResults
     */
    public function __construct(ResponseInterface $response, array $listErrorResults)
    {
        parent::__construct($this->formatMessage($response, $listErrorResults));
    }

    /**
     * @param array<int, ErrorResultInterface> $listErrorResults
     */
    private function formatMessage(ResponseInterface $response, array $listErrorResults): string
    {
        $code   = $response->getStatusCode();
        $errors = $this->decodeContent($response);

        $messages = [];
        foreach ($errors as $error) {
            $messages[] = $this->findResolution($code, $error, $listErrorResults);
        }

        return implode("\n", $messages);
    }

    /**
     * @return array<int|string, string>
     */
    private function decodeContent(ResponseInterface $response): array
    {
        try {
            $xml    = simplexml_load_string($response->getContent(false));
            $json   = json_encode($xml);
            $errors = ['An error occurred'];
            if (false !== $json) {
                $errors = json_decode($json, true);
            }
        } catch (\Throwable $e) {
            try {
                $errors = json_decode($response->getContent(false), true)['errors'] ?? ['An error occurred'];
            } catch (\Throwable $e) {
                $errors = [$response->getContent(false)];
            }
        }

        return $errors;
    }

    /**
     * @param array<int, ErrorResultInterface> $listErrorResults
     */
    private function findResolution(int $code, string $error, array $listErrorResults): string
    {
        foreach ($listErrorResults as $listErrorResult) {
            if ($listErrorResult->getCode() !== $code) {
                continue;
            }

            if (1 === preg_match(sprintf('/^%s$/', $listErrorResult->getError()), $error)) {
                return sprintf('%s => %s', $error, $listErrorResult->getResolution());
            }
        }

        return $error;
    }
}
