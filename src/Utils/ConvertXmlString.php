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

    /**
     * @return array<int|string, mixed>|null
     */
    public static function convertXsdStringToArray(string $xsdString): ?array
    {
        $tmpXsdFile = sprintf('%s/schema.xsd', sys_get_temp_dir());
        file_put_contents($tmpXsdFile, $xsdString);

        $tmpFile                 = sprintf('%s/schema.xml', sys_get_temp_dir());
        $doc                     = new \DOMDocument();
        $doc->preserveWhiteSpace = true;
        $doc->load($tmpXsdFile);
        $doc->save($tmpFile);

        $file = file_get_contents($tmpFile);
        if (!$doc->lastChild instanceof \DOMNode || false === $file) {
            return null;
        }

        $parseObj = str_replace($doc->lastChild->prefix.':', '', $file);

        return static::convertXmlStringToArray($parseObj);
    }
}
