<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Utils;

class ConvertXmlString
{
    /**
     * @return array<int|string, mixed>|null
     */
    public static function convertXmlStringToArray(string $xmlString): ?array
    {
        $xml  = simplexml_load_string($xmlString);
        $json = json_encode($xml);
        if (false !== $json) {
            return json_decode($json, true);
        }

        return null;
    }
}
