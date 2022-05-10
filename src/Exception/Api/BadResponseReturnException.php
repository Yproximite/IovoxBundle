<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Exception\Api;

use Symfony\Contracts\HttpClient\ResponseInterface;
use Yproximite\IovoxBundle\Api\ErrorResult\ErrorResultInterface;
use Yproximite\IovoxBundle\Utils\ConvertXmlString;

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
            $errors = ConvertXmlString::convertXmlStringToArray($response->getContent(false));
            if (null === $errors) {
                $errors = ['An error occurred'];
            }
        } catch (\Throwable) {
            try {
                $errors = json_decode($response->getContent(false), true)['errors'] ?? ['An error occurred'];
            } catch (\Throwable) {
                $errors = [$response->getContent(false)];
            }
        }

        if (\array_key_exists('error', $errors) && !\is_string($errors['error'])) {
            return $errors['error'];
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
