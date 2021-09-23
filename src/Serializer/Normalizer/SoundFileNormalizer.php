<?php

namespace Yproximite\IovoxBundle\Serializer\Normalizer;

use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Yproximite\IovoxBundle\Api\SoundFiles\SoundFilePayload;

class SoundFileNormalizer implements NormalizerInterface, NormalizerAwareInterface
{
    use NormalizerAwareTrait;

    /**
     * @param SoundFilePayload $object
     */
    public function normalize($object, string $format = null, array $context = []): array
    {
        $data = [
            'sound_label' => $object->soundLabel,
            'sound_file'  => $object->soundFile,
        ];

        if ($object->soundGroup !== null) {
            $data['sound_group'] = $object->soundGroup;
        }

        if ($object->notes !== null) {
            $data['notes'] = $object->notes;
        }

        return $data;
    }

    public function supportsNormalization($data, string $format = null)
    {
        return $data instanceof SoundFilePayload;
    }
}
