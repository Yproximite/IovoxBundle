<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Api\Numbering\Purchase;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Yproximite\IovoxBundle\Api\ErrorResult\GenericErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\InternalErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\RequestEmptyErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\RequestMethodInvalidErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\VersionEmptyErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\VersionInvalidErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\XmlEmptyErrorResult;
use Yproximite\IovoxBundle\Api\ErrorResult\XmlParseErrorResult;
use Yproximite\IovoxBundle\Api\Numbering\Purchase\Payload\PurchaseVoxnumbersPayload;
use Yproximite\IovoxBundle\Api\QueryParameter\MethodQueryParameter;
use Yproximite\IovoxBundle\Api\QueryParameter\VersionQueryParameter;
use Yproximite\IovoxBundle\Client;
use Yproximite\IovoxBundle\Exception\Api\BadResponseReturnException;
use Yproximite\IovoxBundle\Exception\Api\CannotConvertXmlToArrayException;
use Yproximite\IovoxBundle\Exception\Api\ValidationPayloadException;
use Yproximite\IovoxBundle\Model\Purchase\PurchaseVoxnumbersResponseModel;
use Yproximite\IovoxBundle\Serializer\IovoxSerializer;
use Yproximite\IovoxBundle\Utils\ConvertXmlString;

/**
 * @see https://docs.iovox.com/display/RA/purchaseVoxNumbers
 */
class PurchaseVoxnumbers extends AbstractPurchase implements PurchaseVoxnumbersInterface
{
    public function __construct(protected Client $client, protected IovoxSerializer $serializer, protected ValidatorInterface $validator)
    {
        parent::__construct($client);
    }

    public function executeQuery(PurchaseVoxnumbersPayload $payload): PurchaseVoxnumbersResponseModel
    {
        $query = $this->createQuery();

        $validate = $this->validator->validate($payload, null, [PurchaseVoxnumbersPayload::GROUP_PURCHASE]);
        if ($validate->count() > 0) {
            throw new ValidationPayloadException($validate);
        }

        $query->setContent($this->serializer->serialize($payload, 'xml', ['groups' => [PurchaseVoxnumbersPayload::GROUP_PURCHASE]]));
        $response = $this->client->executeQuery($query);

        if (Response::HTTP_CREATED !== $response->getStatusCode()) {
            throw new BadResponseReturnException($response, $this->errorResults);
        }

        try {
            $data = ConvertXmlString::convertXmlStringToArray($response->getContent());
            if (null === $data) {
                throw new CannotConvertXmlToArrayException($response->getContent());
            }

            return PurchaseVoxnumbersResponseModel::create($data);
        } catch (\Throwable) {
            throw new BadResponseReturnException($response, $this->errorResults);
        }
    }

    protected function setMethod(): void
    {
        $this->method = Request::METHOD_POST;
    }

    protected function setQueryParameters(): void
    {
        $this->editableQueryParameters = [];

        $this->allQueryParameters = array_merge([
            VersionQueryParameter::getParameterName() => new VersionQueryParameter(),
            MethodQueryParameter::getParameterName()  => new MethodQueryParameter('purchaseVoxNumbers'),
        ], $this->editableQueryParameters);
    }

    protected function setErrorResults(): void
    {
        $this->errorResults = [
            new VersionEmptyErrorResult(),
            new VersionInvalidErrorResult(),
            new RequestMethodInvalidErrorResult($this->method),
            new XmlEmptyErrorResult(),
            new XmlParseErrorResult(),
            new RequestEmptyErrorResult(),
            new GenericErrorResult(400, 'Basket Item \d+ of \d+ is not correct.', 'The phone number requested in the item x of y does not exist. Choose an existing one by requesting the method getVoxnumberRegions first, it provide a matching country_code, area_code and number_type.'),
            new InternalErrorResult(),
        ];
    }
}
