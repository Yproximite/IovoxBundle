<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Serializer;

use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class IovoxSerializer implements SerializerInterface
{
    private Serializer $serializer;

    public function __construct()
    {
        $xmlEncoderDefaultConfig = [
            'xml_format_output'  => 'true',
            'xml_encoding'       => 'utf-8',
            'xml_root_node_name' => 'request',
            'remove_empty_tags'  => true,
        ];

        $classMetadataFactory       = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $metadataAwareNameConverter = new MetadataAwareNameConverter($classMetadataFactory, new CamelCaseToSnakeCaseNameConverter());

        $this->serializer = new Serializer([new ObjectNormalizer($classMetadataFactory, $metadataAwareNameConverter)], ['xml' => new XmlEncoder($xmlEncoderDefaultConfig)]);
    }

    public function serialize($data, string $format, array $context = []): string
    {
        return $this->serializer->serialize($data, $format, $context);
    }

    public function deserialize($data, string $type, string $format, array $context = []): mixed
    {
        return $this->serializer->deserialize($data, $type, $format, $context);
    }
}
