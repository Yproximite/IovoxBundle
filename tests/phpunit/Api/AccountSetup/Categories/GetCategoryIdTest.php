<?php

declare(strict_types=1);

namespace Yproximite\IovoxBundle\Tests\phpunit\Api\AccountSetup\Categories;

use Yproximite\IovoxBundle\Api\AccountSetup\Categories\GetCategoryId;
use Yproximite\IovoxBundle\Api\AccountSetup\Categories\GetCategoryIdInterface;
use Yproximite\IovoxBundle\Exception\Api\BadQueryParameterException;
use Yproximite\IovoxBundle\Exception\Api\InvalidQueryParameterException;
use Yproximite\IovoxBundle\Model\Categories\CategoryIdModel;
use Yproximite\IovoxBundle\Tests\phpunit\Api\AbstractMockClient;

class GetCategoryIdTest extends AbstractMockClient
{
    private const TEST_DIRECTORY = 'Categories/GetCategoryId';

    private GetCategoryIdInterface $getCategoryId;

    protected function setUp(): void
    {
        parent::setUp();
        $this->getCategoryId = new GetCategoryId($this->client);
    }

    public function testExecuteQueryWithBadField(): void
    {
        static::expectException(BadQueryParameterException::class);
        $this->getCategoryId->executeQuery(['none exist param' => 'test']);
    }

    public function testExecuteQueryWithBadFieldType(): void
    {
        static::expectException(InvalidQueryParameterException::class);
        $this->getCategoryId->executeQuery(['value' => 1]);
    }

    public function testBasicExecuteQuery(): void
    {
        $this->clientMustReturnResponse($this->findFixture('basic-response.json', static::TEST_DIRECTORY));
        $this->getCategoryId = new GetCategoryId($this->client);
        $categories = $this->getCategoryId->executeQuery([
            'label' => 'platform',
            'value' => 'Plateforme 1',
        ]);

        static::assertEquals(1, $categories->currentPage);
        static::assertEquals(1, $categories->totalPages);
        static::assertEquals(1, $categories->totalResults);
        static::assertEquals(1, $categories->results->count());

        static::assertEquals(CategoryIdModel::create([
            'category_id' => '11405',
            'category_path' => 'Plateforme;Plateforme 1',
        ]), $categories->results->first());
    }
}
